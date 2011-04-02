<?php
/**
 * Class that operate on table 'rp_name_name'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 09:44
 */
class RpNameNameMySqlDAO implements RpNameNameDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return RpNameNameMySql 
	 */
	public function load($nameId, $assocNameId){
		$sql = 'SELECT * FROM rp_name_name WHERE name_id = ?  AND assoc_name_id = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($nameId);
		$sqlQuery->setNumber($assocNameId);

		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM rp_name_name';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM rp_name_name ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param rpNameName primary key
 	 */
	public function delete($nameId, $assocNameId){
		$sql = 'DELETE FROM rp_name_name WHERE name_id = ?  AND assoc_name_id = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($nameId);
		$sqlQuery->setNumber($assocNameId);

		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RpNameNameMySql rpNameName
 	 */
	public function insert($rpNameName){
		$sql = 'INSERT INTO rp_name_name (assoc_name_type, update_datetime, name_id, assoc_name_id) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($rpNameName->assocNameType);
		$sqlQuery->setNumber($rpNameName->updateDatetime);

		
		$sqlQuery->setNumber($rpNameName->nameId);

		$sqlQuery->setNumber($rpNameName->assocNameId);

		$this->executeInsert($sqlQuery);	
		//$rpNameName->id = $id;
		//return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param RpNameNameMySql rpNameName
 	 */
	public function update($rpNameName){
		$sql = 'UPDATE rp_name_name SET assoc_name_type = ?, update_datetime = ? WHERE name_id = ?  AND assoc_name_id = ? ';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($rpNameName->assocNameType);
		$sqlQuery->setNumber($rpNameName->updateDatetime);

		
		$sqlQuery->setNumber($rpNameName->nameId);

		$sqlQuery->setNumber($rpNameName->assocNameId);

		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM rp_name_name';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByAssocNameType($value){
		$sql = 'SELECT * FROM rp_name_name WHERE assoc_name_type = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUpdateDatetime($value){
		$sql = 'SELECT * FROM rp_name_name WHERE update_datetime = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByAssocNameType($value){
		$sql = 'DELETE FROM rp_name_name WHERE assoc_name_type = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUpdateDatetime($value){
		$sql = 'DELETE FROM rp_name_name WHERE update_datetime = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return RpNameNameMySql 
	 */
	protected function readRow($row){
		$rpNameName = new RpNameName();
		
		$rpNameName->nameId = $row['name_id'];
		$rpNameName->assocNameId = $row['assoc_name_id'];
		$rpNameName->assocNameType = $row['assoc_name_type'];
		$rpNameName->updateDatetime = $row['update_datetime'];

		return $rpNameName;
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
	 * @return RpNameNameMySql 
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