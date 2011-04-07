<?php
/**
 * Class that operate on table 'rp_source_note'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-04-07 19:07
 */
class RpSourceNoteMySqlDAO implements RpSourceNoteDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return RpSourceNoteMySql
	 */
	public function load($id){
		$sql = 'SELECT * FROM rp_source_note WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
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
	public function delete($id){
		$sql = 'DELETE FROM rp_source_note WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Insert record to table
 	 *
 	 * @param RpSourceNoteMySql rpSourceNote
 	 */
	public function insert($rpSourceNote){
		$sql = 'INSERT INTO rp_source_note (source_id, source_batch_id, note, update_datetime) VALUES (?, ?, ?, now())';
		$sqlQuery = new SqlQuery($sql);

		$sqlQuery->set($rpSourceNote->sourceId);
		$sqlQuery->setNumber($rpSourceNote->sourceBatchId);
		$sqlQuery->set($rpSourceNote->note);

		$id = $this->executeInsert($sqlQuery);
		$rpSourceNote->id = $id;
		return $id;
	}

	/**
 	 * Update record in table
 	 *
 	 * @param RpSourceNoteMySql rpSourceNote
 	 */
	public function update($rpSourceNote){
		$sql = 'UPDATE rp_source_note SET source_id = ?, source_batch_id = ?, note = ?, update_datetime = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);

		$sqlQuery->set($rpSourceNote->sourceId);
		$sqlQuery->setNumber($rpSourceNote->sourceBatchId);
		$sqlQuery->set($rpSourceNote->note);
		$sqlQuery->setNumber($rpSourceNote->updateDatetime);

		$sqlQuery->setNumber($rpSourceNote->id);
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

	public function queryBySourceId($value){
		$sql = 'SELECT * FROM rp_source_note WHERE source_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySourceBatchId($value){
		$sql = 'SELECT * FROM rp_source_note WHERE source_batch_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNote($value){
		$sql = 'SELECT * FROM rp_source_note WHERE note = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUpdateDatetime($value){
		$sql = 'SELECT * FROM rp_source_note WHERE update_datetime = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteBySourceId($value){
		$sql = 'DELETE FROM rp_source_note WHERE source_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySourceBatchId($value){
		$sql = 'DELETE FROM rp_source_note WHERE source_batch_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNote($value){
		$sql = 'DELETE FROM rp_source_note WHERE note = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
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

		$rpSourceNote->id = $row['id'];
		$rpSourceNote->sourceId = $row['source_id'];
		$rpSourceNote->sourceBatchId = $row['source_batch_id'];
		$rpSourceNote->note = $row['note'];
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