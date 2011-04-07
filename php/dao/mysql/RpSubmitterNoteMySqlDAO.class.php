<?php
/**
 * Class that operate on table 'rp_submitter_note'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-04-07 19:07
 */
class RpSubmitterNoteMySqlDAO implements RpSubmitterNoteDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return RpSubmitterNoteMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM rp_submitter_note WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
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
	public function delete($id){
		$sql = 'DELETE FROM rp_submitter_note WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RpSubmitterNoteMySql rpSubmitterNote
 	 */
	public function insert($rpSubmitterNote){
		$sql = 'INSERT INTO rp_submitter_note (submitter_id, submitter_batch_id, note, update_datetime) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($rpSubmitterNote->submitterId);
		$sqlQuery->setNumber($rpSubmitterNote->submitterBatchId);
		$sqlQuery->set($rpSubmitterNote->note);
		$sqlQuery->set($rpSubmitterNote->updateDatetime);

		$id = $this->executeInsert($sqlQuery);	
		$rpSubmitterNote->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param RpSubmitterNoteMySql rpSubmitterNote
 	 */
	public function update($rpSubmitterNote){
		$sql = 'UPDATE rp_submitter_note SET submitter_id = ?, submitter_batch_id = ?, note = ?, update_datetime = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($rpSubmitterNote->submitterId);
		$sqlQuery->setNumber($rpSubmitterNote->submitterBatchId);
		$sqlQuery->set($rpSubmitterNote->note);
		$sqlQuery->set($rpSubmitterNote->updateDatetime);

		$sqlQuery->setNumber($rpSubmitterNote->id);
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

	public function queryBySubmitterId($value){
		$sql = 'SELECT * FROM rp_submitter_note WHERE submitter_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySubmitterBatchId($value){
		$sql = 'SELECT * FROM rp_submitter_note WHERE submitter_batch_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNote($value){
		$sql = 'SELECT * FROM rp_submitter_note WHERE note = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUpdateDatetime($value){
		$sql = 'SELECT * FROM rp_submitter_note WHERE update_datetime = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteBySubmitterId($value){
		$sql = 'DELETE FROM rp_submitter_note WHERE submitter_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySubmitterBatchId($value){
		$sql = 'DELETE FROM rp_submitter_note WHERE submitter_batch_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNote($value){
		$sql = 'DELETE FROM rp_submitter_note WHERE note = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
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
		
		$rpSubmitterNote->id = $row['id'];
		$rpSubmitterNote->submitterId = $row['submitter_id'];
		$rpSubmitterNote->submitterBatchId = $row['submitter_batch_id'];
		$rpSubmitterNote->note = $row['note'];
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