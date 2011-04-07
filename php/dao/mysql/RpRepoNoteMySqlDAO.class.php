<?php
/**
 * Class that operate on table 'rp_repo_note'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-04-07 19:07
 */
class RpRepoNoteMySqlDAO implements RpRepoNoteDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return RpRepoNoteMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM rp_repo_note WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
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
	public function delete($id){
		$sql = 'DELETE FROM rp_repo_note WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RpRepoNoteMySql rpRepoNote
 	 */
	public function insert($rpRepoNote){
		$sql = 'INSERT INTO rp_repo_note (repo_id, repo_batch_id, note, update_datetime) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($rpRepoNote->repoId);
		$sqlQuery->setNumber($rpRepoNote->repoBatchId);
		$sqlQuery->set($rpRepoNote->note);
		$sqlQuery->set($rpRepoNote->updateDatetime);

		$id = $this->executeInsert($sqlQuery);	
		$rpRepoNote->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param RpRepoNoteMySql rpRepoNote
 	 */
	public function update($rpRepoNote){
		$sql = 'UPDATE rp_repo_note SET repo_id = ?, repo_batch_id = ?, note = ?, update_datetime = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($rpRepoNote->repoId);
		$sqlQuery->setNumber($rpRepoNote->repoBatchId);
		$sqlQuery->set($rpRepoNote->note);
		$sqlQuery->set($rpRepoNote->updateDatetime);

		$sqlQuery->setNumber($rpRepoNote->id);
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

	public function queryByRepoId($value){
		$sql = 'SELECT * FROM rp_repo_note WHERE repo_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRepoBatchId($value){
		$sql = 'SELECT * FROM rp_repo_note WHERE repo_batch_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNote($value){
		$sql = 'SELECT * FROM rp_repo_note WHERE note = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUpdateDatetime($value){
		$sql = 'SELECT * FROM rp_repo_note WHERE update_datetime = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByRepoId($value){
		$sql = 'DELETE FROM rp_repo_note WHERE repo_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRepoBatchId($value){
		$sql = 'DELETE FROM rp_repo_note WHERE repo_batch_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNote($value){
		$sql = 'DELETE FROM rp_repo_note WHERE note = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
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
		
		$rpRepoNote->id = $row['id'];
		$rpRepoNote->repoId = $row['repo_id'];
		$rpRepoNote->repoBatchId = $row['repo_batch_id'];
		$rpRepoNote->note = $row['note'];
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