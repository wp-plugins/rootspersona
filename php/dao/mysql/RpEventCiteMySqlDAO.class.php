<?php
/**
 * Class that operate on table 'rp_event_cite'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 09:44
 */
class RpEventCiteMySqlDAO implements RpEventCiteDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return RpEventCiteMySql 
	 */
	public function load($eventId, $citeId){
		$sql = 'SELECT * FROM rp_event_cite WHERE event_id = ?  AND cite_id = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($eventId);
		$sqlQuery->setNumber($citeId);

		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM rp_event_cite';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM rp_event_cite ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param rpEventCite primary key
 	 */
	public function delete($eventId, $citeId){
		$sql = 'DELETE FROM rp_event_cite WHERE event_id = ?  AND cite_id = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($eventId);
		$sqlQuery->setNumber($citeId);

		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RpEventCiteMySql rpEventCite
 	 */
	public function insert($rpEventCite){
		$sql = 'INSERT INTO rp_event_cite (update_datetime, event_id, cite_id) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($rpEventCite->updateDatetime);

		
		$sqlQuery->setNumber($rpEventCite->eventId);

		$sqlQuery->setNumber($rpEventCite->citeId);

		$this->executeInsert($sqlQuery);	
		//$rpEventCite->id = $id;
		//return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param RpEventCiteMySql rpEventCite
 	 */
	public function update($rpEventCite){
		$sql = 'UPDATE rp_event_cite SET update_datetime = ? WHERE event_id = ?  AND cite_id = ? ';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($rpEventCite->updateDatetime);

		
		$sqlQuery->setNumber($rpEventCite->eventId);

		$sqlQuery->setNumber($rpEventCite->citeId);

		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM rp_event_cite';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByUpdateDatetime($value){
		$sql = 'SELECT * FROM rp_event_cite WHERE update_datetime = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByUpdateDatetime($value){
		$sql = 'DELETE FROM rp_event_cite WHERE update_datetime = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return RpEventCiteMySql 
	 */
	protected function readRow($row){
		$rpEventCite = new RpEventCite();
		
		$rpEventCite->eventId = $row['event_id'];
		$rpEventCite->citeId = $row['cite_id'];
		$rpEventCite->updateDatetime = $row['update_datetime'];

		return $rpEventCite;
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
	 * @return RpEventCiteMySql 
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