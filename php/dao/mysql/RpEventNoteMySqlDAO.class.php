<?php
/**
 * Class that operate on table 'rp_event_note'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-04-07 19:07
 */
class RpEventNoteMySqlDAO implements RpEventNoteDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return RpEventNoteMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM rp_event_note WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM rp_event_note';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM rp_event_note ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param rpEventNote primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM rp_event_note WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RpEventNoteMySql rpEventNote
 	 */
	public function insert($rpEventNote){
		$sql = 'INSERT INTO rp_event_note (event_id, note, update_datetime) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($rpEventNote->eventId);
		$sqlQuery->set($rpEventNote->note);
		$sqlQuery->setNumber($rpEventNote->updateDatetime);

		$id = $this->executeInsert($sqlQuery);	
		$rpEventNote->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param RpEventNoteMySql rpEventNote
 	 */
	public function update($rpEventNote){
		$sql = 'UPDATE rp_event_note SET event_id = ?, note = ?, update_datetime = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($rpEventNote->eventId);
		$sqlQuery->set($rpEventNote->note);
		$sqlQuery->setNumber($rpEventNote->updateDatetime);

		$sqlQuery->setNumber($rpEventNote->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM rp_event_note';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByEventId($value){
		$sql = 'SELECT * FROM rp_event_note WHERE event_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNote($value){
		$sql = 'SELECT * FROM rp_event_note WHERE note = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUpdateDatetime($value){
		$sql = 'SELECT * FROM rp_event_note WHERE update_datetime = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByEventId($value){
		$sql = 'DELETE FROM rp_event_note WHERE event_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNote($value){
		$sql = 'DELETE FROM rp_event_note WHERE note = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUpdateDatetime($value){
		$sql = 'DELETE FROM rp_event_note WHERE update_datetime = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return RpEventNoteMySql 
	 */
	protected function readRow($row){
		$rpEventNote = new RpEventNote();
		
		$rpEventNote->id = $row['id'];
		$rpEventNote->eventId = $row['event_id'];
		$rpEventNote->note = $row['note'];
		$rpEventNote->updateDatetime = $row['update_datetime'];

		return $rpEventNote;
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
	 * @return RpEventNoteMySql 
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