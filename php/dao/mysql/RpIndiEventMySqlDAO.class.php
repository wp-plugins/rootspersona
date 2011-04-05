<?php
/**
 * Class that operate on table 'rp_indi_event'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-04-03 21:25
 */
class RpIndiEventMySqlDAO implements RpIndiEventDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return RpIndiEventMySql
	 */
	public function load($indiId, $indiBatchId, $eventId){
		$sql = 'SELECT * FROM rp_indi_event WHERE indi_id = ?  AND indi_batch_id = ?  AND event_id = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($indiId);
		$sqlQuery->setNumber($indiBatchId);
		$sqlQuery->setNumber($eventId);

		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM rp_indi_event';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}

	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM rp_indi_event ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}

	/**
 	 * Delete record from table
 	 * @param rpIndiEvent primary key
 	 */
	public function delete($indiId, $indiBatchId, $eventId){
		$sql = 'DELETE FROM rp_indi_event WHERE indi_id = ?  AND indi_batch_id = ?  AND event_id = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($indiId);
		$sqlQuery->setNumber($indiBatchId);
		$sqlQuery->setNumber($eventId);

		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Insert record to table
 	 *
 	 * @param RpIndiEventMySql rpIndiEvent
 	 */
	public function insert($rpIndiEvent){
		$sql = 'INSERT INTO rp_indi_event (update_datetime, indi_id, indi_batch_id, event_id) VALUES (now(), ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);

		$sqlQuery->set($rpIndiEvent->indiId);

		$sqlQuery->setNumber($rpIndiEvent->indiBatchId);

		$sqlQuery->setNumber($rpIndiEvent->eventId);

		$this->executeInsert($sqlQuery);
	}

	/**
 	 * Update record in table
 	 *
 	 * @param RpIndiEventMySql rpIndiEvent
 	 */
	public function update($rpIndiEvent){
		$sql = 'UPDATE rp_indi_event SET update_datetime = now() WHERE indi_id = ?  AND indi_batch_id = ?  AND event_id = ? ';
		$sqlQuery = new SqlQuery($sql);

		$sqlQuery->set($rpIndiEvent->indiId);

		$sqlQuery->setNumber($rpIndiEvent->indiBatchId);

		$sqlQuery->setNumber($rpIndiEvent->eventId);

		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM rp_indi_event';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByUpdateDatetime($value){
		$sql = 'SELECT * FROM rp_indi_event WHERE update_datetime = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByUpdateDatetime($value){
		$sql = 'DELETE FROM rp_indi_event WHERE update_datetime = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}



	/**
	 * Read row
	 *
	 * @return RpIndiEventMySql
	 */
	protected function readRow($row){
		$rpIndiEvent = new RpIndiEvent();

		$rpIndiEvent->indiId = $row['indi_id'];
		$rpIndiEvent->indiBatchId = $row['indi_batch_id'];
		$rpIndiEvent->eventId = $row['event_id'];
		$rpIndiEvent->updateDatetime = $row['update_datetime'];

		return $rpIndiEvent;
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
	 * @return RpIndiEventMySql
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