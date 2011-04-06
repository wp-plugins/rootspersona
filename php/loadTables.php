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
	}
	function addSubm($rec ) {
		$subm = new RpSubmitter();
		$subm->batchId = '1';
		$subm->id = $rec->Id;
		$subm->submitterName = $rec->Name;
		//$subm->addrId = $rec->;
		$subm->lang1 = $rec->Language;
		//$subm->lang2 = $rec->;
		//$subm->lang3 = $rec->;
		$subm->registeredRfn = $rec->SubmitterRefNbr;
		$subm->autoRecId = $rec->AutoRecId;
		$subm->gedChangeDate = $rec->ChangeDate->Date;
		try {
			$transaction = new Transaction($this->credentials);
			DAOFactory::getRpSubmitterDAO()->deleteByBatchId($subm->batchId);
			DAOFactory::getRpSubmitterDAO()->insert($subm);
		} catch (Exception $e) {
			echo $e->getMessage();
			throw $e;
		}
		$transaction->commit();
	}
	function addSubn($rec ) {

	}
	function addHdr($rec ) {
		$hdr = new RpHeader();
		$hdr->batchId = '1';
		$hdr->srcSystemId = $rec->SourceSystem->SystemId;
		$hdr->srcSystemVersion = $rec->SourceSystem->VerNbr;
		$hdr->productName = $rec->SourceSystem->ProductName;
		$hdr->corpName = $rec->SourceSystem->Corporation->Name;
		//$hdr->corpAddrId = $rec->;
		$hdr->srcDataName = $rec->SourceSystem->rpData->SourceName;
		$hdr->publicationDate = $rec->SourceSystem->rpData->Date;
		$hdr->copyrightSrcData = $rec->SourceSystem->rpData->Copyright;
		$hdr->receivingSysName = $rec->DestinationSystem;
		$hdr->transmissionDate = $rec->TransmissionDateTime;
		//$hdr->transmissionTime = $rec->;
		$hdr->submitterId = $rec->SubmitterId;
		$hdr->submitterBatchId = $hdr->batchId;
		$hdr->submissionId = $rec->SubmissionId;
		$hdr->submissionBatchId = $hdr->batchId;
		$hdr->fileName = $rec->Filename;
		$hdr->copyrightGedFile = $rec->Copyright;
		$hdr->lang = $rec->Language;
		$hdr->gedcVersion = $rec->GedC->VerNbr;
		$hdr->gedcForm = $rec->GedC->Form;
		$hdr->charSet = $rec->CharacterSet->CharacterSet;
		$hdr->charSetVersion = $rec->CharacterSet->VerNbr;
		$hdr->placeHierarchy = $rec->PlaceForm;
		$hdr->gedContentDescription = $rec->Note->Text;

		try {
			$transaction = new Transaction($this->credentials);
			DAOFactory::getRpHeaderDAO()->deleteByBatchId($hdr->batchId);
			DAOFactory::getRpHeaderDAO()->insert($hdr);
		} catch (Exception $e) {
			echo $e->getMessage();
			throw $e;
		}
		$transaction->commit();
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
		$oldEvents = DAOFactory::getRpIndiEventDAO()->loadList($person->Id,1);
		if($oldEvents != null && count($oldEvents)>0) {
			foreach($oldEvents as $eve) {
				DAOFactory::getRpEventDetailDAO()->delete($eve->eventId);
				DAOFactory::getRpEventCiteDAO()->deleteByEventId($eve->eventId);
				DAOFactory::getRpSourceCiteDAO()->deleteOrphans();
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
				DAOFactory::getRpIndiEventDAO()->insert($indiEvent);
			} catch (Exception $e) {
				echo $e->getMessage();
				throw $e;
			}
			$this->updateEventCitations($id, 1, $pEvent->Citations);
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
			$name->surname = $sName==null?'Unknown':$sName;
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
		$oldEvents = DAOFactory::getRpFamEventDAO()->loadList($family->Id,1);
		if($oldEvents != null && count($oldEvents)>0) {
			foreach($oldEvents as $eve) {
				DAOFactory::getRpEventDetailDAO()->delete($eve->eventId);
				DAOFactory::getRpEventCiteDAO()->deleteByEventId($eve->eventId);
				DAOFactory::getRpSourceCiteDAO()->deleteOrphans();
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
				DAOFactory::getRpFamEventDAO()->insert($famEvent);
			} catch (Exception $e) {
				echo $e->getMessage();
				throw $e;
			}
			$this->updateEventCitations($id, 1, $pEvent->Citations);
		}
	}

	function updateEventCitations($eventId, $batchId, $citations) {
		foreach($citations as $citation) {
			$cite = new RpSourceCite();
			$cite->sourceId = $citation->SourceId;
			$cite->sourceBatchId = $batchId;
			$cite->sourcePage = $citation->Page;
			$cite->eventType = $citation->EventType;
			$cite->eventRole = $citation->RoleInEvent;
			$cite->quay = $citation->Quay;
			//$cite->sourceDescription = $citation->;

			try {
				$id = DAOFactory::getRpSourceCiteDAO()->insert($cite);
			} catch (Exception $e) {
				echo $e->getMessage();
				throw $e;
			}
			$eventCite = new RpEventCite();
			$eventCite->eventId = $eventId;
			$eventCite->citeId = $id;
			try {
				$id = DAOFactory::getRpEventCiteDAO()->insert($eventCite);
			} catch (Exception $e) {
				echo $e->getMessage();
				throw $e;
			}
		}
	}

	function processHeader($rec) {
		$this->addHdr($rec);
	}

	function processSubmission($rec) {
		$this->addSubn($rec);
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
		$this->addSubm($rec);
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