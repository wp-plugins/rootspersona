<?php
/**
 * Class that operate on table 'rp_name_note'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-04-07 19:07
 */
class RpNameNoteMySqlDAO implements RpNameNoteDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return RpNameNoteMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM rp_name_note WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM rp_name_note';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM rp_name_note ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param rpNameNote primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM rp_name_note WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RpNameNoteMySql rpNameNote
 	 */
	public function insert($rpNameNote){
		$sql = 'INSERT INTO rp_name_note (name_id, note, update_datetime) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($rpNameNote->nameId);
		$sqlQuery->set($rpNameNote->note);
		$sqlQuery->setNumber($rpNameNote->updateDatetime);

		$id = $this->executeInsert($sqlQuery);	
		$rpNameNote->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param RpNameNoteMySql rpNameNote
 	 */
	public function update($rpNameNote){
		$sql = 'UPDATE rp_name_note SET name_id = ?, note = ?, update_datetime = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($rpNameNote->nameId);
		$sqlQuery->set($rpNameNote->note);
		$sqlQuery->setNumber($rpNameNote->updateDatetime);

		$sqlQuery->setNumber($rpNameNote->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM rp_name_note';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByNameId($value){
		$sql = 'SELECT * FROM rp_name_note WHERE name_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNote($value){
		$sql = 'SELECT * FROM rp_name_note WHERE note = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUpdateDatetime($value){
		$sql = 'SELECT * FROM rp_name_note WHERE update_datetime = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByNameId($value){
		$sql = 'DELETE FROM rp_name_note WHERE name_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNote($value){
		$sql = 'DELETE FROM rp_name_note WHERE note = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUpdateDatetime($value){
		$sql = 'DELETE FROM rp_name_note WHERE update_datetime = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return RpNameNoteMySql 
	 */
	protected function readRow($row){
		$rpNameNote = new RpNameNote();
		
		$rpNameNote->id = $row['id'];
		$rpNameNote->nameId = $row['name_id'];
		$rpNameNote->note = $row['note'];
		$rpNameNote->updateDatetime = $row['update_datetime'];

		return $rpNameNote;
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
	 * @return RpNameNoteMySql 
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