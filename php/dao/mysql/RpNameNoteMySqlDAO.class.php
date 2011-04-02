<?php
/**
 * Class that operate on table 'rp_name_note'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 09:44
 */
class RpNameNoteMySqlDAO implements RpNameNoteDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return RpNameNoteMySql 
	 */
	public function load($nameId, $noteId){
		$sql = 'SELECT * FROM rp_name_note WHERE name_id = ?  AND note_id = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($nameId);
		$sqlQuery->setNumber($noteId);

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
	public function delete($nameId, $noteId){
		$sql = 'DELETE FROM rp_name_note WHERE name_id = ?  AND note_id = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($nameId);
		$sqlQuery->setNumber($noteId);

		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RpNameNoteMySql rpNameNote
 	 */
	public function insert($rpNameNote){
		$sql = 'INSERT INTO rp_name_note (update_datetime, name_id, note_id) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($rpNameNote->updateDatetime);

		
		$sqlQuery->setNumber($rpNameNote->nameId);

		$sqlQuery->setNumber($rpNameNote->noteId);

		$this->executeInsert($sqlQuery);	
		//$rpNameNote->id = $id;
		//return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param RpNameNoteMySql rpNameNote
 	 */
	public function update($rpNameNote){
		$sql = 'UPDATE rp_name_note SET update_datetime = ? WHERE name_id = ?  AND note_id = ? ';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($rpNameNote->updateDatetime);

		
		$sqlQuery->setNumber($rpNameNote->nameId);

		$sqlQuery->setNumber($rpNameNote->noteId);

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

	public function queryByUpdateDatetime($value){
		$sql = 'SELECT * FROM rp_name_note WHERE update_datetime = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
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
		
		$rpNameNote->nameId = $row['name_id'];
		$rpNameNote->noteId = $row['note_id'];
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