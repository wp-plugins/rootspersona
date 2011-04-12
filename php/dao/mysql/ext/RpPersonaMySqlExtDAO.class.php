<?php

class RpPersonaMySqlExtDAO {

	public function getPersona($id,$batchId){
		$sql = "SELECT ri.id AS id, ri.batch_id AS batch_id, rnp.personal_name AS full_name, ri.gender AS gender"
		. ", e1.event_date AS birth_date, e2.event_date AS death_date"
		. " FROM rp_indi ri"
		. " JOIN rp_indi_name rip ON ri.id = rip.indi_id AND ri.batch_id = rip.indi_batch_id"
		. " JOIN rp_name_personal rnp ON rip.name_id = rnp.id"
		. " LEFT OUTER JOIN (SELECT indi_id, indi_batch_id, event_date"
		. " FROM rp_indi_event rie1"
		. " JOIN rp_event_detail red1 ON red1.id = rie1.event_id and red1.event_type = 'Birth')"
		. " AS e1 ON e1.indi_id = ri.id AND e1.indi_batch_id = ri.batch_id"
		. " LEFT OUTER JOIN (SELECT indi_id, indi_batch_id, event_date"
		. " FROM rp_indi_event rie2"
		. " JOIN rp_event_detail red2 ON red2.id = rie2.event_id and red2.event_type = 'Death')"
		. " AS e2 ON e2.indi_id = ri.id AND e2.indi_batch_id = ri.batch_id"
		. " WHERE ri.id = ? AND ri.batch_id = ?";

		$sqlQuery = new SqlQuery($sql);

		$sqlQuery->set($id);
		$sqlQuery->setNumber($batchId);

		return $this->getRow($sqlQuery);;
	}
	protected function getRow($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		if(count($tab)==0){
			return null;
		}
		return $this->readRow($tab[0]);
	}

	protected function readRow($row){
		$rpPersona = new RpPersona();

		$rpPersona->id = $row['id'];
		$rpPersona->batchId = $row['batch_id'];
		$rpPersona->gender = $row['gender'];
		$rpPersona->fullName = $row['full_name'];

		$rpPersona->birthDate = $row['birth_date'];

		$rpPersona->deathDate = $row['death_date'];

		return $rpPersona;
	}
}
?>