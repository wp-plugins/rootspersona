<?php
/**
 * Class that operate on table 'rp_name_cite'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 09:44
 */
class RpNameCiteMySqlDAO implements RpNameCiteDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return RpNameCiteMySql 
	 */
	public function load($nameId, $citeId){
		$sql = 'SELECT * FROM rp_name_cite WHERE name_id = ?  AND cite_id = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($nameId);
		$sqlQuery->setNumber($citeId);

		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM rp_name_cite';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM rp_name_cite ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param rpNameCite primary key
 	 */
	public function delete($nameId, $citeId){
		$sql = 'DELETE FROM rp_name_cite WHERE name_id = ?  AND cite_id = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($nameId);
		$sqlQuery->setNumber($citeId);

		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RpNameCiteMySql rpNameCite
 	 */
	public function insert($rpNameCite){
		$sql = 'INSERT INTO rp_name_cite (update_datetime, name_id, cite_id) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($rpNameCite->updateDatetime);

		
		$sqlQuery->setNumber($rpNameCite->nameId);

		$sqlQuery->setNumber($rpNameCite->citeId);

		$this->executeInsert($sqlQuery);	
		//$rpNameCite->id = $id;
		//return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param RpNameCiteMySql rpNameCite
 	 */
	public function update($rpNameCite){
		$sql = 'UPDATE rp_name_cite SET update_datetime = ? WHERE name_id = ?  AND cite_id = ? ';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($rpNameCite->updateDatetime);

		
		$sqlQuery->setNumber($rpNameCite->nameId);

		$sqlQuery->setNumber($rpNameCite->citeId);

		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM rp_name_cite';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByUpdateDatetime($value){
		$sql = 'SELECT * FROM rp_name_cite WHERE update_datetime = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByUpdateDatetime($value){
		$sql = 'DELETE FROM rp_name_cite WHERE update_datetime = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return RpNameCiteMySql 
	 */
	protected function readRow($row){
		$rpNameCite = new RpNameCite();
		
		$rpNameCite->nameId = $row['name_id'];
		$rpNameCite->citeId = $row['cite_id'];
		$rpNameCite->updateDatetime = $row['update_datetime'];

		return $rpNameCite;
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
	 * @return RpNameCiteMySql 
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