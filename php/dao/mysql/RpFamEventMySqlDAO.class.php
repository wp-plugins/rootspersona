<?php
/**
 * Class that operate on table 'rp_fam_event'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-04-03 21:25
 */
class RpFamEventMySqlDAO implements RpFamEventDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return RpFamEventMySql
	 */
	public function load($famId, $famBatchId, $eventId){
		$sql = 'SELECT * FROM rp_fam_event WHERE fam_id = ?  AND fam_batch_id = ?  AND event_id = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($famId);
		$sqlQuery->setNumber($famBatchId);
		$sqlQuery->setNumber($eventId);

		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM rp_fam_event';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}

	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM rp_fam_event ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}

	/**
 	 * Delete record from table
 	 * @param rpFamEvent primary key
 	 */
	public function delete($famId, $famBatchId, $eventId){
		$sql = 'DELETE FROM rp_fam_event WHERE fam_id = ?  AND fam_batch_id = ?  AND event_id = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($famId);
		$sqlQuery->setNumber($famBatchId);
		$sqlQuery->setNumber($eventId);

		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Insert record to table
 	 *
 	 * @param RpFamEventMySql rpFamEvent
 	 */
	public function insert($rpFamEvent){
		$sql = 'INSERT INTO rp_fam_event (update_datetime, fam_id, fam_batch_id, event_id) VALUES (now(), ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);

		$sqlQuery->set($rpFamEvent->famId);

		$sqlQuery->setNumber($rpFamEvent->famBatchId);

		$sqlQuery->setNumber($rpFamEvent->eventId);

		$this->executeInsert($sqlQuery);
	}

	/**
 	 * Update record in table
 	 *
 	 * @param RpFamEventMySql rpFamEvent
 	 */
	public function update($rpFamEvent){
		$sql = 'UPDATE rp_fam_event SET update_datetime = now() WHERE fam_id = ?  AND fam_batch_id = ?  AND event_id = ? ';
		$sqlQuery = new SqlQuery($sql);

		$sqlQuery->set($rpFamEvent->famId);

		$sqlQuery->setNumber($rpFamEvent->famBatchId);

		$sqlQuery->setNumber($rpFamEvent->eventId);

		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM rp_fam_event';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByUpdateDatetime($value){
		$sql = 'SELECT * FROM rp_fam_event WHERE update_datetime = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByUpdateDatetime($value){
		$sql = 'DELETE FROM rp_fam_event WHERE update_datetime = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}



	/**
	 * Read row
	 *
	 * @return RpFamEventMySql
	 */
	protected function readRow($row){
		$rpFamEvent = new RpFamEvent();

		$rpFamEvent->famId = $row['fam_id'];
		$rpFamEvent->famBatchId = $row['fam_batch_id'];
		$rpFamEvent->eventId = $row['event_id'];
		$rpFamEvent->updateDatetime = $row['update_datetime'];

		return $rpFamEvent;
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
	 * @return RpFamEventMySql
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