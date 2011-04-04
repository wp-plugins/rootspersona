<?php
require_once ('temp.inc.php');
require_once ('include_dao.php');

function loadTables($credentials, $ged) {
	foreach ($ged->gedcomObjects['IndiRecs'] as $obj) {
		addIndi($credentials, $obj);
	}

	foreach ($ged->gedcomObjects['FamRecs'] as $obj) {
		addFam($credentials, $obj);
	}
}

function addIndi($credentials, $person) {
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
		$transaction = new Transaction($credentials);
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
	updateNames($person);
	updateEvents($person);
	$transaction->commit();
}

function updateEvents($person) {
	$oldEevents = DAOFactory::getRpIndiEventDAO()->loadList($person->Id,1);
	if($oldEevents != null && count($oldEevents)>0) {
		foreach($oldEevents as $eve) {
			DAOFactory::getRpEventDetailDAO()->delete($eve->id);
		}
		DAOFactory::getRpIndiEventDAO()->deleteByIndi($person->Id, 1);
	}

	foreach($person->Events as $pEvent) {
		$event = new RpEventDetail();
		$event->id;
		$event->eventType;
		$event->classification;
		$event->eventDate;
		$event->place;
		$event->addrId;
		$event->respAgency;
		$event->religiousAff;
		$event->cause;
		$event->restrictionNotice;


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
			DAOFactory::getRpNamePersonalDAO()->delete($name->id);
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

function addFam($credentials, $family) {
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
		$transaction = new Transaction($credentials);
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
	updateChildren($family);
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

$gedcomFile = "C:\\Users\\ed\\Desktop\\20110208.ged";
$credentials = array( 'hostname' => 'localhost',
	'dbuser' => 'wpuser1',
	'dbpassword' => 'wpuser1',
	'dbname' =>'wpuser1');

$ged = new GedcomManager();
$ged->parse($gedcomFile);
loadTables($credentials, $ged);
echo 'Done.';

?>