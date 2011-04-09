<?php
require_once ('temp.inc.php');
require_once ('temp.dao.php');
//require_once ('include.inc.php');
//require_once ('include.dao.php');

class XmlToDatabaseImporter {
	var $credentials;

	function loadTables($credentials, $dataDir) {
		$this->credentials = $credentials;
		$dh  = opendir($dataDir);
		while (false !== ($filename = readdir($dh))) {
			if(strpos($filename,"xml") <= 0
			|| $filename == "p000.xml"
			|| $filename == "templatePerson.xml"
			|| $filename == "f000.xml") continue;

			$dom = DOMDocument::load($dataDir . "/" . $filename);
			$root = $dom->documentElement;
			if(isset($root)) {
				if($root->tagName == "persona:person") {
					$this->addPerson($dom);
				} elseif ($root->tagName == "persona:familyGroup") {
					$this->addFamily($dom);
				} elseif ($root->tagName == "cite:evidence") {
					$evidenceDoc = $dom;
				} elseif ($root->tagName == "map:idMap") {
					$mapDoc = $dom;
				}
			}
		}
		if ($evidenceDoc != null) {
			$this->addEvidence($evidenceDoc);
		}
		if ($mapDoc != null) {
			$this->addMappingData($evidenceDoc);
		}
		//then archive(?) and delete the files and data dir
	}

	function addPerson($dom){
		$needUpdate = false;
		$root = $dom->documentElement;
		$id = $root->getAttribute('id');
		$c1 = $root->getElementsByTagName("characteristics");
		$c2 = $c1->item(0)->getElementsByTagName("characteristic");
		$gender = null;
		$name = null;
		$surname = null;
		for($idx=0;$idx<$c2->length;$idx++) {
			$type = $c2->item($idx)->getAttribute('type');
			switch($type) {
				case 'gender':
					$gender = $c2->item($idx)->nodeValue;
					break;
				case 'name':
					$name = $c2->item($idx)->nodeValue;
					break;
				case 'surname':
					$surname = $c2->item($idx)->nodeValue;
					break;
			}
		}
		$indi = new RpIndi();
		$indi->id = $id;
		$indi->batchId = 1;
		$indi->gender = $gender;
		try {
			$transaction = new Transaction($this->credentials);
			DAOFactory::getRpIndiDAO()->insert($indi);
		} catch (Exception $e) {
			if(stristr($e->getMessage,'Duplicate entry') >= 0) {
				$needUpdate = true;
			} else {
				$transaction->rollback();
				echo $e->getMessage();
				throw $e;
			}
		}
		if($needUpdate) {
			try {
				DAOFactory::getRpIndiDAO()->update($indi);
			} catch (Exception $e) {
				$transaction->rollback();
				echo $e->getMessage();
				throw $e;
			}
		}
		$this->updateNames($id, $name, $surname);
		$this->updateIndiEvents($id, $dom);

		$this->updateFamilyLinks($id, $dom);

		$transaction->commit();
	}

	function updateNames($pid, $fullname, $surname) {
		$oldNames = DAOFactory::getRpIndiNameDAO()->loadList($pid,1);
		if($oldNames != null && count($oldNames)>0) {
			foreach($oldNames as $name) {
				DAOFactory::getRpNamePersonalDAO()->delete($name->nameId);
			}
			DAOFactory::getRpIndiNameDAO()->deleteByIndi($pid, 1);
		}

		$name = new RpNamePersonal();
		$name->personalName = $fullname;
		$name->surname = $surname==null?'Unknown':$surname;
		if($surname != null) {
			$name->given = trim(str_replace($surname,'',$fullname));
		}

		$id = null;
		try {
			$id = DAOFactory::getRpNamePersonalDAO()->insert($name);
		} catch (Exception $e) {
			echo $e->getMessage();
			throw $e;
		}
		$indiName = new RpIndiName();
		$indiName->indiId = $pid;
		$indiName->indiBatchId = 1;
		$indiName->nameId = $id;
		try {
			DAOFactory::getRpIndiNameDAO()->insert($indiName);
		} catch (Exception $e) {
			echo $e->getMessage();
			throw $e;
		}
	}

	function updateIndiEvents($dom) {
		//		$oldEvents = DAOFactory::getRpIndiEventDAO()->loadList($person->Id,1);
		//		if($oldEvents != null && count($oldEvents)>0) {
		//			foreach($oldEvents as $eve) {
		//				DAOFactory::getRpEventDetailDAO()->delete($eve->eventId);
		//				DAOFactory::getRpEventCiteDAO()->deleteByEventId($eve->eventId);
		//				DAOFactory::getRpSourceCiteDAO()->deleteOrphans();
		//			}
		//			DAOFactory::getRpIndiEventDAO()->deleteByIndi($person->Id, 1);
		//		}
		//
		//		foreach($person->Events as $pEvent) {
		//			$event = new RpEventDetail();
		//			$event->eventType = ($pEvent->Tag === 'EVEN'?$pEvent->Type:$pEvent->_TYPES[$pEvent->Tag]);
		//			$event->eventDate = $pEvent->Date;
		//			$event->place = $pEvent->Place->Name;
		//
		//			$id = null;
		//			try {
		//				$id = DAOFactory::getRpEventDetailDAO()->insert($event);
		//			} catch (Exception $e) {
		//				echo $e->getMessage();
		//				throw $e;
		//			}
		//			$indiEvent = new RpIndiEvent();
		//			$indiEvent->indiId = $person->Id;
		//			$indiEvent->indiBatchId = 1;
		//			$indiEvent->eventId = $id;
		//			try {
		//				DAOFactory::getRpIndiEventDAO()->insert($indiEvent);
		//			} catch (Exception $e) {
		//				echo $e->getMessage();
		//				throw $e;
		//			}
		//			//$this->updateEventCitations($id, 1, $pEvent->Citations);
		//		}
	}

	function updateFamilyLinks($id, $dom) {
		DAOFactory::getRpIndiFamDAO()->deleteByIndi($id,1);
		$root = $dom->documentElement;
		$c1 = $root->getElementsByTagName("references");
		if($c1 != null) {

			$c2 = $c1->item(0)->getElementsByTagName("familyGroups");
			$c3 = $c2->item(0)->getElementsByTagName("familyGroup");

			for($idx=0;$idx<$c3->length;$idx++) {
				$linkType = $c3->item($idx)->getAttribute('selfType');
				$fid = $c3->item($idx)->getAttribute('refId');
				$link = new RpIndiFam();
				$link->indiId = $id;
				$link->indiBatchId = 1;
				$link->famId = $fid;
				$link->famBatchId = 1;
				$link->linkType = $linkType=='child'?'C':'S';
				try {
					DAOFactory::getRpIndiFamDAO()->insert($link);
				} catch (Exception $e) {
					echo $e->getMessage();
					throw $e;
				}
			}
		}
	}

	function addFamily($dom) {
		$needUpdate = false;
		$root = $dom->documentElement;
		$fid = $root->getAttribute('id');
		$c1 = $root->getElementsByTagName("parents");
		$c2 = $c1->item(0)->getElementsByTagName("relation");
		for($idx=0;$idx<$c2->length;$idx++) {
			$type = $c2->item($idx)->getAttribute('type');
			$p = $c2->item($idx)->getElementsByTagName('person');
			$pid = $p->item(0)->getAttribute('id');
			switch($type) {
				case 'father':
					$father = $pid;
					break;
				case 'mother':
					$mother = $pid;
					break;
			}
		}
		$fam = new RpFam();
		$fam->id = $fid;
		$fam->batchId = 1;
		$fam->spouse1 = $father;
		$fam->indiBatchId1 = 1;
		$fam->spouse2 = $mother;
		$fam->indiBatchId2 = 1;

		try {
			$transaction = new Transaction($this->credentials);
			DAOFactory::getRpFamDAO()->insert($fam);
		} catch (Exception $e) {
			if(stristr($e->getMessage,'Duplicate entry') >= 0) {
				$needUpdate = true;
			} else {
				$transaction->rollback();
				echo $e->getMessage();
				throw $e;
			}
		}
		if($needUpdate) {
			try {
				DAOFactory::getRpFamDAO()->update($fam);
			} catch (Exception $e) {
				$transaction->rollback();
				echo $e->getMessage();
				throw $e;
			}
		}
		$this->updateChildren($fid, $dom);
		//$this->updateFamEvents($dom);
		$transaction->commit();
	}

	function updateChildren($fid, $dom) {
		DAOFactory::getRpFamChildDAO()->deleteChildren($fid, 1);
		$root = $dom->documentElement;
		$c1 = $root->getElementsByTagName("children");
		$c2 = $c1->item(0)->getElementsByTagName("relation");
		for($idx=0;$idx<$c2->length;$idx++) {
			$type = $c2->item($idx)->getAttribute('type');
			$p = $c2->item($idx)->getElementsByTagName('person');
			$pid = $p->item(0)->getAttribute('id');
			if($type == 'child') {
				$famChild = new RpFamChild();
				$famChild->famId = $fid;
				$famChild->famBatchId = 1;
				$famChild->childId = $pid;
				$famChild->indiBatchId = 1;
				try {
					$id = DAOFactory::getRpFamChildDAO()->insert($famChild);
				} catch (Exception $e) {
					echo $e->getMessage();
					throw $e;
				}
			}
		}
	}

	function addEvidence($dom) {

	}

	function addMappingData($dom) {

	}
}

$dataDir = 'C:\development\XAMPP\htdocs\wpuser1\wp-content\rootsPersonaData';
$credentials = array( 'hostname' => 'localhost',
				'dbuser' => 'wpuser1',
				'dbpassword' => 'wpuser1',
				'dbname' =>'wpuser1');
$g = new XmlToDatabaseImporter();
$time_start = microtime(true);

$g->loadTables($credentials, $dataDir);

$time = microtime(true) - $time_start;
echo "Done in $time seconds using " . memory_get_peak_usage (true)/1024/1024 . "MB." ;

?>