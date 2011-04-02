<?php
/**
 * Class that operate on table 'rp_indi_note'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 09:44
 */
class RpIndiNoteMySqlDAO implements RpIndiNoteDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return RpIndiNoteMySql 
	 */
	public function load($indiId, $indiBatchId, $noteId){
		$sql = 'SELECT * FROM rp_indi_note WHERE indi_id = ?  AND indi_batch_id = ?  AND note_id = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($indiId);
		$sqlQuery->setNumber($indiBatchId);
		$sqlQuery->setNumber($noteId);

		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM rp_indi_note';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM rp_indi_note ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param rpIndiNote primary key
 	 */
	public function delete($indiId, $indiBatchId, $noteId){
		$sql = 'DELETE FROM rp_indi_note WHERE indi_id = ?  AND indi_batch_id = ?  AND note_id = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($indiId);
		$sqlQuery->setNumber($indiBatchId);
		$sqlQuery->setNumber($noteId);

		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RpIndiNoteMySql rpIndiNote
 	 */
	public function insert($rpIndiNote){
		$sql = 'INSERT INTO rp_indi_note (update_datetime, indi_id, indi_batch_id, note_id) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($rpIndiNote->updateDatetime);

		
		$sqlQuery->setNumber($rpIndiNote->indiId);

		$sqlQuery->setNumber($rpIndiNote->indiBatchId);

		$sqlQuery->setNumber($rpIndiNote->noteId);

		$this->executeInsert($sqlQuery);	
		//$rpIndiNote->id = $id;
		//return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param RpIndiNoteMySql rpIndiNote
 	 */
	public function update($rpIndiNote){
		$sql = 'UPDATE rp_indi_note SET update_datetime = ? WHERE indi_id = ?  AND indi_batch_id = ?  AND note_id = ? ';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($rpIndiNote->updateDatetime);

		
		$sqlQuery->setNumber($rpIndiNote->indiId);

		$sqlQuery->setNumber($rpIndiNote->indiBatchId);

		$sqlQuery->setNumber($rpIndiNote->noteId);

		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM rp_indi_note';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByUpdateDatetime($value){
		$sql = 'SELECT * FROM rp_indi_note WHERE update_datetime = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByUpdateDatetime($value){
		$sql = 'DELETE FROM rp_indi_note WHERE update_datetime = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return RpIndiNoteMySql 
	 */
	protected function readRow($row){
		$rpIndiNote = new RpIndiNote();
		
		$rpIndiNote->indiId = $row['indi_id'];
		$rpIndiNote->indiBatchId = $row['indi_batch_id'];
		$rpIndiNote->noteId = $row['note_id'];
		$rpIndiNote->updateDatetime = $row['update_datetime'];

		return $rpIndiNote;
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
	 * @return RpIndiNoteMySql 
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