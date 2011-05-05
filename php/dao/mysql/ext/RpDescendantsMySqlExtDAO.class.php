<?php

class RpDescendantsMySqlExtDAO {
	public function getChildren($persona, $options){

		$sql = "SELECT child_id, event_date, place"
		. " FROM rp_indi_event rie"
		. " JOIN rp_event_detail red ON red.id = rie.event_id"
		. " WHERE rie.indi_id = ? AND rie.indi_batch_id = ?";


		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($id);
		$sqlQuery->setNumber($batchId);
		$rows =  $this->getRows($sqlQuery);
		$cnt = count($rows);
		$events = null;
		if($rows > 0) {
			$events = array();
			for($idx = 0; $idx <$cnt;$idx++ ) {
				$event = array();
				$event['type'] = $rows[$idx]['event_type'];
				$event['date'] = $rows[$idx]['event_date'];
				$event['place'] = $rows[$idx]['place'];
				$event['associatedPerson'] = null;//array('name'=>'', 'isPrivate'=> false);
				$events[$idx] = $event;
			}
		}

		return $events;
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
		$rpPersona->father = $row['father'];
		$rpPersona->mother = $row['mother'];

		return $rpPersona;
	}

	protected function getRows($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		return $tab;
	}

	protected function querySingleResult($sqlQuery){
		return QueryExecutor::queryForString($sqlQuery);
	}
}
?>