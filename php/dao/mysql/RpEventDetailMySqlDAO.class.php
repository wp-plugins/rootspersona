<?php
/**
 * Class that operate on table 'rp_event_detail'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 09:44
 */
class RpEventDetailMySqlDAO implements RpEventDetailDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return RpEventDetailMySql
	 */
	public function load($id){
		$sql = 'SELECT * FROM rp_event_detail WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM rp_event_detail';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}

	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM rp_event_detail ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}

	/**
 	 * Delete record from table
 	 * @param rpEventDetail primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM rp_event_detail WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Insert record to table
 	 *
 	 * @param RpEventDetailMySql rpEventDetail
 	 */
	public function insert($rpEventDetail){
		$sql = 'INSERT INTO rp_event_detail (event_type, classification, event_date, place, addr_id, resp_agency, religious_aff, cause, restriction_notice, update_datetime) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, now())';
		$sqlQuery = new SqlQuery($sql);

		$sqlQuery->set($rpEventDetail->eventType);
		$sqlQuery->set($rpEventDetail->classification);
		$sqlQuery->set($rpEventDetail->eventDate);
		$sqlQuery->set($rpEventDetail->place);
		$sqlQuery->setNumber($rpEventDetail->addrId);
		$sqlQuery->set($rpEventDetail->respAgency);
		$sqlQuery->set($rpEventDetail->religiousAff);
		$sqlQuery->set($rpEventDetail->cause);
		$sqlQuery->set($rpEventDetail->restrictionNotice);

		$id = $this->executeInsert($sqlQuery);
		$rpEventDetail->id = $id;
		return $id;
	}

	/**
 	 * Update record in table
 	 *
 	 * @param RpEventDetailMySql rpEventDetail
 	 */
	public function update($rpEventDetail){
		$sql = 'UPDATE rp_event_detail SET event_type = ?, classification = ?, event_date = ?, place = ?, addr_id = ?, resp_agency = ?, religious_aff = ?, cause = ?, restriction_notice = ?, update_datetime = now() WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);

		$sqlQuery->set($rpEventDetail->eventType);
		$sqlQuery->set($rpEventDetail->classification);
		$sqlQuery->set($rpEventDetail->eventDate);
		$sqlQuery->set($rpEventDetail->place);
		$sqlQuery->setNumber($rpEventDetail->addrId);
		$sqlQuery->set($rpEventDetail->respAgency);
		$sqlQuery->set($rpEventDetail->religiousAff);
		$sqlQuery->set($rpEventDetail->cause);
		$sqlQuery->set($rpEventDetail->restrictionNotice);

		$sqlQuery->setNumber($rpEventDetail->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM rp_event_detail';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByEventType($value){
		$sql = 'SELECT * FROM rp_event_detail WHERE event_type = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByClassification($value){
		$sql = 'SELECT * FROM rp_event_detail WHERE classification = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEventDate($value){
		$sql = 'SELECT * FROM rp_event_detail WHERE event_date = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPlace($value){
		$sql = 'SELECT * FROM rp_event_detail WHERE place = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAddrId($value){
		$sql = 'SELECT * FROM rp_event_detail WHERE addr_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRespAgency($value){
		$sql = 'SELECT * FROM rp_event_detail WHERE resp_agency = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByReligiousAff($value){
		$sql = 'SELECT * FROM rp_event_detail WHERE religious_aff = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCause($value){
		$sql = 'SELECT * FROM rp_event_detail WHERE cause = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRestrictionNotice($value){
		$sql = 'SELECT * FROM rp_event_detail WHERE restriction_notice = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUpdateDatetime($value){
		$sql = 'SELECT * FROM rp_event_detail WHERE update_datetime = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByEventType($value){
		$sql = 'DELETE FROM rp_event_detail WHERE event_type = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByClassification($value){
		$sql = 'DELETE FROM rp_event_detail WHERE classification = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEventDate($value){
		$sql = 'DELETE FROM rp_event_detail WHERE event_date = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPlace($value){
		$sql = 'DELETE FROM rp_event_detail WHERE place = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAddrId($value){
		$sql = 'DELETE FROM rp_event_detail WHERE addr_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRespAgency($value){
		$sql = 'DELETE FROM rp_event_detail WHERE resp_agency = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByReligiousAff($value){
		$sql = 'DELETE FROM rp_event_detail WHERE religious_aff = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCause($value){
		$sql = 'DELETE FROM rp_event_detail WHERE cause = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRestrictionNotice($value){
		$sql = 'DELETE FROM rp_event_detail WHERE restriction_notice = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUpdateDatetime($value){
		$sql = 'DELETE FROM rp_event_detail WHERE update_datetime = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}



	/**
	 * Read row
	 *
	 * @return RpEventDetailMySql
	 */
	protected function readRow($row){
		$rpEventDetail = new RpEventDetail();

		$rpEventDetail->id = $row['id'];
		$rpEventDetail->eventType = $row['event_type'];
		$rpEventDetail->classification = $row['classification'];
		$rpEventDetail->eventDate = $row['event_date'];
		$rpEventDetail->place = $row['place'];
		$rpEventDetail->addrId = $row['addr_id'];
		$rpEventDetail->respAgency = $row['resp_agency'];
		$rpEventDetail->religiousAff = $row['religious_aff'];
		$rpEventDetail->cause = $row['cause'];
		$rpEventDetail->restrictionNotice = $row['restriction_notice'];
		$rpEventDetail->updateDatetime = $row['update_datetime'];

		return $rpEventDetail;
	}

	protected function getList($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		$ret = array();
		for($i=0;$i<count($tab);$i++){
			$ret[$i] = $this->readRow($tab[$i]);
		}
		return $ret;
	}

	/**
	 * Get row
	 *
	 * @return RpEventDetailMySql
	 */
	protected function getRow($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		if(count($tab)==0){
			return null;
		}
		return $this->readRow($tab[0]);
	}

	/**
	 * Execute sql query
	 */
	protected function execute($sqlQuery){
		return QueryExecutor::execute($sqlQuery);
	}


	/**
	 * Execute sql query
	 */
	protected function executeUpdate($sqlQuery){
		return QueryExecutor::executeUpdate($sqlQuery);
	}

	/**
	 * Query for one row and one column
	 */
	protected function querySingleResult($sqlQuery){
		return QueryExecutor::queryForString($sqlQuery);
	}

	/**
	 * Insert row to table
	 */
	protected function executeInsert($sqlQuery){
		return QueryExecutor::executeInsert($sqlQuery);
	}
}
?>