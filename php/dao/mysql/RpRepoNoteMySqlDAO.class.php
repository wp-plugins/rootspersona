<?php
/**
 * Class that operate on table 'rp_repo_note'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 09:44
 */
class RpRepoNoteMySqlDAO implements RpRepoNoteDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return RpRepoNoteMySql 
	 */
	public function load($repoId, $repoBatchId, $noteId){
		$sql = 'SELECT * FROM rp_repo_note WHERE repo_id = ?  AND repo_batch_id = ?  AND note_id = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($repoId);
		$sqlQuery->setNumber($repoBatchId);
		$sqlQuery->setNumber($noteId);

		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM rp_repo_note';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM rp_repo_note ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param rpRepoNote primary key
 	 */
	public function delete($repoId, $repoBatchId, $noteId){
		$sql = 'DELETE FROM rp_repo_note WHERE repo_id = ?  AND repo_batch_id = ?  AND note_id = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($repoId);
		$sqlQuery->setNumber($repoBatchId);
		$sqlQuery->setNumber($noteId);

		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RpRepoNoteMySql rpRepoNote
 	 */
	public function insert($rpRepoNote){
		$sql = 'INSERT INTO rp_repo_note (update_datetime, repo_id, repo_batch_id, note_id) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($rpRepoNote->updateDatetime);

		
		$sqlQuery->setNumber($rpRepoNote->repoId);

		$sqlQuery->setNumber($rpRepoNote->repoBatchId);

		$sqlQuery->setNumber($rpRepoNote->noteId);

		$this->executeInsert($sqlQuery);	
		//$rpRepoNote->id = $id;
		//return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param RpRepoNoteMySql rpRepoNote
 	 */
	public function update($rpRepoNote){
		$sql = 'UPDATE rp_repo_note SET update_datetime = ? WHERE repo_id = ?  AND repo_batch_id = ?  AND note_id = ? ';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($rpRepoNote->updateDatetime);

		
		$sqlQuery->setNumber($rpRepoNote->repoId);

		$sqlQuery->setNumber($rpRepoNote->repoBatchId);

		$sqlQuery->setNumber($rpRepoNote->noteId);

		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM rp_repo_note';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByUpdateDatetime($value){
		$sql = 'SELECT * FROM rp_repo_note WHERE update_datetime = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByUpdateDatetime($value){
		$sql = 'DELETE FROM rp_repo_note WHERE update_datetime = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return RpRepoNoteMySql 
	 */
	protected function readRow($row){
		$rpRepoNote = new RpRepoNote();
		
		$rpRepoNote->repoId = $row['repo_id'];
		$rpRepoNote->repoBatchId = $row['repo_batch_id'];
		$rpRepoNote->noteId = $row['note_id'];
		$rpRepoNote->updateDatetime = $row['update_datetime'];

		return $rpRepoNote;
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
	 * @return RpRepoNoteMySql 
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