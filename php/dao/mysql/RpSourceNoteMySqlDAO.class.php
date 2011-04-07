<?php
/**
 * Class that operate on table 'rp_source_note'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 09:44
 */
class RpSourceNoteMySqlDAO implements RpSourceNoteDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return RpSourceNoteMySql
	 */
	public function load($sourceId, $sourceBatchId, $noteId){
		$sql = 'SELECT * FROM rp_source_note WHERE source_id = ?  AND source_batch_id = ?  AND note_id = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($sourceId);
		$sqlQuery->setNumber($sourceBatchId);
		$sqlQuery->setNumber($noteId);

		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM rp_source_note';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}

	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM rp_source_note ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}

	/**
 	 * Delete record from table
 	 * @param rpSourceNote primary key
 	 */
	public function delete($sourceId, $sourceBatchId, $noteId){
		$sql = 'DELETE FROM rp_source_note WHERE source_id = ?  AND source_batch_id = ?  AND note_id = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($sourceId);
		$sqlQuery->setNumber($sourceBatchId);
		$sqlQuery->setNumber($noteId);

		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Insert record to table
 	 *
 	 * @param RpSourceNoteMySql rpSourceNote
 	 */
	public function insert($rpSourceNote){
		$sql = 'INSERT INTO rp_source_note (update_datetime, source_id, source_batch_id, note_id) VALUES (now(), ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);

		$sqlQuery->set($rpSourceNote->sourceId);

		$sqlQuery->setNumber($rpSourceNote->sourceBatchId);

		$sqlQuery->setNumber($rpSourceNote->noteId);

		$this->executeInsert($sqlQuery);
		//$rpSourceNote->id = $id;
		//return $id;
	}

	/**
 	 * Update record in table
 	 *
 	 * @param RpSourceNoteMySql rpSourceNote
 	 */
	public function update($rpSourceNote){
		$sql = 'UPDATE rp_source_note SET update_datetime = now() WHERE source_id = ?  AND source_batch_id = ?  AND note_id = ? ';
		$sqlQuery = new SqlQuery($sql);

		$sqlQuery->set($rpSourceNote->sourceId);

		$sqlQuery->setNumber($rpSourceNote->sourceBatchId);

		$sqlQuery->setNumber($rpSourceNote->noteId);

		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM rp_source_note';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByUpdateDatetime($value){
		$sql = 'SELECT * FROM rp_source_note WHERE update_datetime = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByUpdateDatetime($value){
		$sql = 'DELETE FROM rp_source_note WHERE update_datetime = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}



	/**
	 * Read row
	 *
	 * @return RpSourceNoteMySql
	 */
	protected function readRow($row){
		$rpSourceNote = new RpSourceNote();

		$rpSourceNote->sourceId = $row['source_id'];
		$rpSourceNote->sourceBatchId = $row['source_batch_id'];
		$rpSourceNote->noteId = $row['note_id'];
		$rpSourceNote->updateDatetime = $row['update_datetime'];

		return $rpSourceNote;
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
	 * @return RpSourceNoteMySql
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