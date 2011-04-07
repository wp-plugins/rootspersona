<?php
/**
 * Class that operate on table 'rp_indi_note'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-04-07 19:07
 */
class RpIndiNoteMySqlDAO implements RpIndiNoteDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return RpIndiNoteMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM rp_indi_note WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
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
	public function delete($id){
		$sql = 'DELETE FROM rp_indi_note WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RpIndiNoteMySql rpIndiNote
 	 */
	public function insert($rpIndiNote){
		$sql = 'INSERT INTO rp_indi_note (indi_id, indi_batch_id, note, update_datetime) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($rpIndiNote->indiId);
		$sqlQuery->setNumber($rpIndiNote->indiBatchId);
		$sqlQuery->set($rpIndiNote->note);
		$sqlQuery->set($rpIndiNote->updateDatetime);

		$id = $this->executeInsert($sqlQuery);	
		$rpIndiNote->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param RpIndiNoteMySql rpIndiNote
 	 */
	public function update($rpIndiNote){
		$sql = 'UPDATE rp_indi_note SET indi_id = ?, indi_batch_id = ?, note = ?, update_datetime = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($rpIndiNote->indiId);
		$sqlQuery->setNumber($rpIndiNote->indiBatchId);
		$sqlQuery->set($rpIndiNote->note);
		$sqlQuery->set($rpIndiNote->updateDatetime);

		$sqlQuery->setNumber($rpIndiNote->id);
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

	public function queryByIndiId($value){
		$sql = 'SELECT * FROM rp_indi_note WHERE indi_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIndiBatchId($value){
		$sql = 'SELECT * FROM rp_indi_note WHERE indi_batch_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNote($value){
		$sql = 'SELECT * FROM rp_indi_note WHERE note = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUpdateDatetime($value){
		$sql = 'SELECT * FROM rp_indi_note WHERE update_datetime = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIndiId($value){
		$sql = 'DELETE FROM rp_indi_note WHERE indi_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIndiBatchId($value){
		$sql = 'DELETE FROM rp_indi_note WHERE indi_batch_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNote($value){
		$sql = 'DELETE FROM rp_indi_note WHERE note = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
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
		
		$rpIndiNote->id = $row['id'];
		$rpIndiNote->indiId = $row['indi_id'];
		$rpIndiNote->indiBatchId = $row['indi_batch_id'];
		$rpIndiNote->note = $row['note'];
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