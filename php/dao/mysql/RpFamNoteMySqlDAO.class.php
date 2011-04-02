<?php
/**
 * Class that operate on table 'rp_fam_note'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 09:44
 */
class RpFamNoteMySqlDAO implements RpFamNoteDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return RpFamNoteMySql 
	 */
	public function load($famId, $famBatchId, $noteId){
		$sql = 'SELECT * FROM rp_fam_note WHERE fam_id = ?  AND fam_batch_id = ?  AND note_id = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($famId);
		$sqlQuery->setNumber($famBatchId);
		$sqlQuery->setNumber($noteId);

		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM rp_fam_note';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM rp_fam_note ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param rpFamNote primary key
 	 */
	public function delete($famId, $famBatchId, $noteId){
		$sql = 'DELETE FROM rp_fam_note WHERE fam_id = ?  AND fam_batch_id = ?  AND note_id = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($famId);
		$sqlQuery->setNumber($famBatchId);
		$sqlQuery->setNumber($noteId);

		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RpFamNoteMySql rpFamNote
 	 */
	public function insert($rpFamNote){
		$sql = 'INSERT INTO rp_fam_note (update_datetime, fam_id, fam_batch_id, note_id) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($rpFamNote->updateDatetime);

		
		$sqlQuery->setNumber($rpFamNote->famId);

		$sqlQuery->setNumber($rpFamNote->famBatchId);

		$sqlQuery->setNumber($rpFamNote->noteId);

		$this->executeInsert($sqlQuery);	
		//$rpFamNote->id = $id;
		//return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param RpFamNoteMySql rpFamNote
 	 */
	public function update($rpFamNote){
		$sql = 'UPDATE rp_fam_note SET update_datetime = ? WHERE fam_id = ?  AND fam_batch_id = ?  AND note_id = ? ';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($rpFamNote->updateDatetime);

		
		$sqlQuery->setNumber($rpFamNote->famId);

		$sqlQuery->setNumber($rpFamNote->famBatchId);

		$sqlQuery->setNumber($rpFamNote->noteId);

		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM rp_fam_note';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByUpdateDatetime($value){
		$sql = 'SELECT * FROM rp_fam_note WHERE update_datetime = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByUpdateDatetime($value){
		$sql = 'DELETE FROM rp_fam_note WHERE update_datetime = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return RpFamNoteMySql 
	 */
	protected function readRow($row){
		$rpFamNote = new RpFamNote();
		
		$rpFamNote->famId = $row['fam_id'];
		$rpFamNote->famBatchId = $row['fam_batch_id'];
		$rpFamNote->noteId = $row['note_id'];
		$rpFamNote->updateDatetime = $row['update_datetime'];

		return $rpFamNote;
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
	 * @return RpFamNoteMySql 
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