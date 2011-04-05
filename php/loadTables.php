<?php
require_once ('temp.inc.php');
require_once ('include_dao.php');

class GedcomLoader {
	var $ged;
	var $credentials;
	function loadTables($credentials, $gedcomFile) {
		$this->credentials = $credentials;
		$this->ged = new GedcomManager();
		$this->ged->parse($gedcomFile, $this);
//		foreach ($ged->gedcomObjects['IndiRecs'] as $obj) {
//			$this->addIndi($obj);
//		}
//
//		foreach ($ged->gedcomObjects['FamRecs'] as $obj) {
//			$this->addFam($obj);
//		}
	}

	function addIndi($person) {
		$needUpdate = false;
		$indi = new RpIndi();
		$indi->id = $person->Id;
		$indi->batchId = 1;
		$indi->restrictionNotice = $person->Restriction;
		$indi->gender = $person->Gender;
		$indi->permRecFileNbr = $person->PermRecFileNbr;
		$indi->ancRecFileNbr = $person->AncFileNbr;
		$indi->autoRecId = $person->AutoRecId;
		$indi->gedChangeDate = $person->ChangeDate->Date;
		try {
			$transaction = new Transaction($this->credentials);
			DAOFactory::getRpIndiDAO()->insert($indi);

		} catch (Exception $e) {
			if(stristr($e->getMessage,'Duplicate entry') >= 0) {
				$needUpdate = true;
			} else {
				echo $e->getMessage();
				throw $e;
			}
		}
		if($needUpdate) {
			try {
				DAOFactory::getRpIndiDAO()->update($indi);
			} catch (Exception $e) {
				echo $e->getMessage();
				throw $e;
			}
		}
		$this->updateNames($person);
		$this->updateIndiEvents($person);
		$transaction->commit();
	}

	function updateIndiEvents($person) {
		$oldEevents = DAOFactory::getRpIndiEventDAO()->loadList($person->Id,1);
		if($oldEevents != null && count($oldEevents)>0) {
			foreach($oldEevents as $eve) {
				DAOFactory::getRpEventDetailDAO()->delete($eve->eventId);
			}
			DAOFactory::getRpIndiEventDAO()->deleteByIndi($person->Id, 1);
		}

		foreach($person->Events as $pEvent) {
			$event = new RpEventDetail();
			$event->eventType = ($pEvent->Tag === 'EVEN'?$pEvent->Type:$pEvent->_TYPES[$pEvent->Tag]);
			$event->classification = $pEvent->Descr;
			$event->eventDate = $pEvent->Date;
			$event->place = $pEvent->Place->Name;
			//$event->addrId;
			$event->respAgency = $pEvent->RespAgency;
			$event->religiousAff = $pEvent->ReligiousAffiliation;
			$event->cause = $pEvent->Cause;
			$event->restrictionNotice = $pEvent->Restriction;

			$id = null;
			try {
				$id = DAOFactory::getRpEventDetailDAO()->insert($event);
			} catch (Exception $e) {
				echo $e->getMessage();
				throw $e;
			}
			$indiEvent = new RpIndiEvent();
			$indiEvent->indiId = $person->Id;
			$indiEvent->indiBatchId = 1;
			$indiEvent->eventId = $id;
			try {
				$id = DAOFactory::getRpIndiEventDAO()->insert($indiEvent);
			} catch (Exception $e) {
				echo $e->getMessage();
				throw $e;
			}
		}
	}

	function updateNames($person) {
		$oldNames = DAOFactory::getRpIndiNameDAO()->loadList($person->Id,1);
		if($oldNames != null && count($oldNames)>0) {
			foreach($oldNames as $name) {
				DAOFactory::getRpNamePersonalDAO()->delete($name->nameId);
			}
			DAOFactory::getRpIndiNameDAO()->deleteByIndi($person->Id, 1);
		}

		foreach($person->Names as $pName) {
			$name = new RpNamePersonal();
			$name->personalName = $pName->rpName->getFullName();
			$name->nameType = $pName->rpName->Type;
			$name->prefix = $pName->rpName->Pieces->Prefix;
			$name->given = $pName->rpName->Pieces->Given;
			$name->nickname = $pName->rpName->Pieces->NickName;
			$name->surnamePrefix = $pName->rpName->Pieces->SurnamePrefix;
			$name->surname = $pName->rpName->getSurname();
			$name->suffix = $pName->rpName->Pieces->Suffix;

			$id = null;
			try {
				$id = DAOFactory::getRpNamePersonalDAO()->insert($name);
			} catch (Exception $e) {
				echo $e->getMessage();
				throw $e;
			}
			$indiName = new RpIndiName();
			$indiName->indiId = $person->Id;
			$indiName->indiBatchId = 1;
			$indiName->nameId = $id;
			try {
				$id = DAOFactory::getRpIndiNameDAO()->insert($indiName);
			} catch (Exception $e) {
				echo $e->getMessage();
				throw $e;
			}
		}
	}

	function addFam($family) {
		$needUpdate = false;
		$fam = new RpFam();
		$fam->id = $family->Id;
		$fam->batchId = 1;
		$fam->restrictionNotice = $family->Restriction;
		$fam->spouse1 = $family->Husband;
		$fam->indiBatchId1 = 1;
		$fam->spouse2 = $family->Wife;
		$fam->indiBatchId2 = 1;
		$fam->autoRecId = $family->AutoRecId;
		$fam->gedChangeDate = $family->ChangeDate->Date;

		try {
			$transaction = new Transaction($this->credentials);
			DAOFactory::getRpFamDAO()->insert($fam);
		} catch (Exception $e) {
			if(stristr($e->getMessage,'Duplicate entry') >= 0) {
				$needUpdate = true;
			} else {
				echo $e->getMessage();
				throw $e;
			}
		}
		if($needUpdate) {
			try {
				DAOFactory::getRpFamDAO()->update($fam);
			} catch (Exception $e) {
				echo $e->getMessage();
				throw $e;
			}
		}
		$this->updateChildren($family);
		$this->updateFamEvents($family);
		$transaction->commit();
	}

	function updateChildren($family) {
		DAOFactory::getRpFamChildDAO()->deleteChildren($family->Id, 1);
		foreach($family->Children as $child) {
			$famChild = new RpFamChild();
			$famChild->famId = $family->Id;
			$famChild->famBatchId = 1;
			$famChild->childId = $child;
			$famChild->indiBatchId = 1;
			try {
				$id = DAOFactory::getRpFamChildDAO()->insert($famChild);
			} catch (Exception $e) {
				echo $e->getMessage();
				throw $e;
			}
		}
	}

	function updateFamEvents($family) {
		$oldEevents = DAOFactory::getRpFamEventDAO()->loadList($family->Id,1);
		if($oldEevents != null && count($oldEevents)>0) {
			foreach($oldEevents as $eve) {
				DAOFactory::getRpEventDetailDAO()->delete($eve->eventId);
			}
			DAOFactory::getRpFamEventDAO()->deleteByFam($family->Id, 1);
		}

		foreach($family->Events as $pEvent) {
			$event = new RpEventDetail();
			$event->eventType = ($pEvent->Tag === 'EVEN'?$pEvent->Type:$pEvent->_TYPES[$pEvent->Tag]);
			$event->classification = $pEvent->Descr;
			$event->eventDate = $pEvent->Date;
			$event->place = $pEvent->Place->Name;
			//$event->addrId;
			$event->respAgency = $pEvent->RespAgency;
			$event->religiousAff = $pEvent->ReligiousAffiliation;
			$event->cause = $pEvent->Cause;
			$event->restrictionNotice = $pEvent->Restriction;

			$id = null;
			try {
				$id = DAOFactory::getRpEventDetailDAO()->insert($event);
			} catch (Exception $e) {
				echo $e->getMessage();
				throw $e;
			}
			$famEvent = new RpFamEvent();
			$famEvent->famId = $family->Id;
			$famEvent->famBatchId = 1;
			$famEvent->eventId = $id;
			try {
				$id = DAOFactory::getRpFamEventDAO()->insert($famEvent);
			} catch (Exception $e) {
				echo $e->getMessage();
				throw $e;
			}
		}
	}

	function processHeader($rec) {
		//$this->ged->gedcomObjects['HeaderRec'] = $rec;
	}

	function processSubmission($rec) {
		//$this->ged->gedcomObjects['SubnRec'] = $rec;
	}

	function processFamily($rec) {
		$this->addFam($rec);
	}

	function processIndividual($rec) {
		$this->addIndi($rec);
	}

	function processMedia($rec) {
		//$this->ged->gedcomObjects['MediaRecs']["$rec->Id"] = $rec;
	}

	function processNote($rec) {
		//$this->ged->gedcomObjects['NoteRecs']["$rec->Id"] = $rec;
	}

	function processRepository($rec) {
		//$this->ged->gedcomObjects['RepoRecs']["$rec->Id"] = $rec;
	}

	function processSource($rec) {
		//$this->ged->gedcomObjects['SrcRecs']["$rec->Id"] = $rec;
	}

	function processSubmitter($rec) {
		//$this->ged->gedcomObjects['SubmRecs']["$rec->Id"] = $rec;
	}
}
//$gedcomFile = "C:\\Users\\ed\\Desktop\\adabell.ged";
$gedcomFile = "C:\\Users\\ed\\Desktop\\20110208.ged";
$credentials = array( 'hostname' => 'localhost',
				'dbuser' => 'wpuser1',
				'dbpassword' => 'wpuser1',
				'dbname' =>'wpuser1');
$g = new GedcomLoader();
$time_start = microtime(true);

$g->loadTables($credentials, $gedcomFile);

$time = microtime(true) - $time_start;
echo "Done in $time seconds using " . memory_get_peak_usage (true)/1024/1024 . "MB." ;

?>