<?php

class RpPersonaMySqlExtDAO {

	public function getPersona($id,$batchId){
		$sql1 = "SELECT ri.id AS id, ri.batch_id AS batch_id, rnp.personal_name AS full_name, ri.gender AS gender"
		. " FROM rp_indi ri"
		. " JOIN rp_indi_name rip ON ri.id = rip.indi_id AND ri.batch_id = rip.indi_batch_id"
		. " JOIN rp_name_personal rnp ON rip.name_id = rnp.id"
		. " WHERE ri.id = ? AND ri.batch_id = ?";

		$sql2 = "SELECT event_date"
		. " FROM rp_indi_event rie"
		. " JOIN rp_event_detail red ON red.id = rie.event_id and red.event_type = 'Birth'"
		. " WHERE rie.indi_id = ? AND rie.indi_batch_id = ?";

		$sql3 = "SELECT event_date"
		. " FROM rp_indi_event rie"
		. " JOIN rp_event_detail red ON red.id = rie.event_id and red.event_type = 'Death'"
		. " WHERE rie.indi_id = ? AND rie.indi_batch_id = ?";

		$sqlQuery = new SqlQuery($sql1);
		$sqlQuery->set($id);
		$sqlQuery->setNumber($batchId);
		$persona =  $this->getRow($sqlQuery);

		$sqlQuery = new SqlQuery($sql2);
		$sqlQuery->set($id);
		$sqlQuery->setNumber($batchId);
		$persona->birthDate =  $this->querySingleResult($sqlQuery);

		$sqlQuery = new SqlQuery($sql3);
		$sqlQuery->set($id);
		$sqlQuery->setNumber($batchId);
		$persona->deathDate =  $this->querySingleResult($sqlQuery);
		return $persona;
	}

	public function getPersonaEvents($id,$batchId){

		$sql = "SELECT event_type, event_date, place"
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

	public function getPersonaSources($id,$batchId){

		$sql = "SELECT DISTINCT id,page,title,abbr FROM"
		. " (SELECT rs.id AS id, rs.wp_page_id AS page,rs.source_title AS title,rs.abbr AS abbr"
		. " FROM rp_indi_cite ric"
		. " JOIN rp_source_cite rsc ON ric.cite_id = rsc.id"
		. " JOIN rp_source rs ON rs.id = rsc.source_id AND rs.batch_id = ?"
		. " WHERE ric.indi_id = ? AND ric.indi_batch_id = rs.batch_id"
		. " UNION"
		. " SELECT rs.id AS id, rs.wp_page_id AS page,rs.source_title AS title,rs.abbr AS abbr"
		. " FROM rp_event_cite rec"
		. " JOIN rp_source_cite rsc ON rec.cite_id = rsc.id"
		. " JOIN rp_source rs ON rs.id = rsc.source_id AND rs.batch_id = ?"
		. " WHERE rec.event_id IN"
		. " (SELECT event_id FROM rp_indi_event rie WHERE rie.indi_id = ? AND rie.indi_batch_id = rs.batch_id)"
		. " UNION"
		. " SELECT rs.id AS id, rs.wp_page_id AS page,rs.source_title AS title,rs.abbr AS abbr"
		. " FROM rp_fam_cite rfc"
		. " JOIN rp_source_cite rsc ON rfc.cite_id = rsc.id"
		. " JOIN rp_source rs ON rs.id = rsc.source_id AND rs.batch_id = ?"
		. " WHERE rfc.fam_id IN"
		. " (SELECT fam_id FROM rp_indi_fam rif  WHERE rif.indi_id = ? AND rif.indi_batch_id = rs.batch_id)"
		. " AND rfc.fam_batch_id = rs.batch_id"
		. " UNION"
		. " SELECT rs.id AS id, rs.wp_page_id AS page,rs.source_title AS title,rs.abbr AS abbr"
		. " FROM rp_name_cite rnc"
		. " JOIN rp_source_cite rsc ON rnc.cite_id = rsc.id"
		. " JOIN rp_source rs ON rs.id = rsc.source_id AND rs.batch_id = ?"
		. " WHERE rnc.name_id IN"
		. " (SELECT name_id FROM rp_indi_name rin WHERE rin.indi_id = ? AND rin.indi_batch_id = rs.batch_id )) AS t1";

		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($batchId);
		$sqlQuery->set($id);
		$sqlQuery->setNumber($batchId);
		$sqlQuery->set($id);
		$sqlQuery->setNumber($batchId);
		$sqlQuery->set($id);
		$sqlQuery->setNumber($batchId);
		$sqlQuery->set($id);

		$rows =  $this->getRows($sqlQuery);
		$cnt = count($rows);
		$sources = null;
		if($rows > 0) {
			$sources = array();
			for($idx = 0; $idx <$cnt;$idx++ ) {
				$src = array();
				$src['srcId'] = $rows[$idx]['id'];
				$src['srcTitle'] = $rows[$idx]['title'];
				$src['srcAbbr'] = $rows[$idx]['abbr'];
				$src['pageId'] = $rows[$idx]['page'];
				$sources[$idx] = $src;
			}
		}

		return $sources;
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