<?php
/**
 * Class that operate on table 'rp_submitter_note'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 09:44
 */
class RpSubmitterNoteMySqlDAO implements RpSubmitterNoteDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return RpSubmitterNoteMySql 
	 */
	public function load($submitterId, $submitterBatchId, $noteId){
		$sql = 'SELECT * FROM rp_submitter_note WHERE submitter_id = ?  AND submitter_batch_id = ?  AND note_id = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($submitterId);
		$sqlQuery->setNumber($submitterBatchId);
		$sqlQuery->setNumber($noteId);

		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM rp_submitter_note';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM rp_submitter_note ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param rpSubmitterNote primary key
 	 */
	public function delete($submitterId, $submitterBatchId, $noteId){
		$sql = 'DELETE FROM rp_submitter_note WHERE submitter_id = ?  AND submitter_batch_id = ?  AND note_id = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($submitterId);
		$sqlQuery->setNumber($submitterBatchId);
		$sqlQuery->setNumber($noteId);

		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RpSubmitterNoteMySql rpSubmitterNote
 	 */
	public function insert($rpSubmitterNote){
		$sql = 'INSERT INTO rp_submitter_note (update_datetime, submitter_id, submitter_batch_id, note_id) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($rpSubmitterNote->updateDatetime);

		
		$sqlQuery->setNumber($rpSubmitterNote->submitterId);

		$sqlQuery->setNumber($rpSubmitterNote->submitterBatchId);

		$sqlQuery->setNumber($rpSubmitterNote->noteId);

		$this->executeInsert($sqlQuery);	
		//$rpSubmitterNote->id = $id;
		//return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param RpSubmitterNoteMySql rpSubmitterNote
 	 */
	public function update($rpSubmitterNote){
		$sql = 'UPDATE rp_submitter_note SET update_datetime = ? WHERE submitter_id = ?  AND submitter_batch_id = ?  AND note_id = ? ';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($rpSubmitterNote->updateDatetime);

		
		$sqlQuery->setNumber($rpSubmitterNote->submitterId);

		$sqlQuery->setNumber($rpSubmitterNote->submitterBatchId);

		$sqlQuery->setNumber($rpSubmitterNote->noteId);

		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM rp_submitter_note';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByUpdateDatetime($value){
		$sql = 'SELECT * FROM rp_submitter_note WHERE update_datetime = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByUpdateDatetime($value){
		$sql = 'DELETE FROM rp_submitter_note WHERE update_datetime = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return RpSubmitterNoteMySql 
	 */
	protected function readRow($row){
		$rpSubmitterNote = new RpSubmitterNote();
		
		$rpSubmitterNote->submitterId = $row['submitter_id'];
		$rpSubmitterNote->submitterBatchId = $row['submitter_batch_id'];
		$rpSubmitterNote->noteId = $row['note_id'];
		$rpSubmitterNote->updateDatetime = $row['update_datetime'];

		return $rpSubmitterNote;
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
	 * @return RpSubmitterNoteMySql 
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