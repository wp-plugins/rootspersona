<?php
/**
 * Class that operate on table 'rp_fam_cite'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 09:44
 */
class RpFamCiteMySqlDAO implements RpFamCiteDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return RpFamCiteMySql 
	 */
	public function load($famId, $famBatchId, $citeId){
		$sql = 'SELECT * FROM rp_fam_cite WHERE fam_id = ?  AND fam_batch_id = ?  AND cite_id = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($famId);
		$sqlQuery->setNumber($famBatchId);
		$sqlQuery->setNumber($citeId);

		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM rp_fam_cite';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM rp_fam_cite ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param rpFamCite primary key
 	 */
	public function delete($famId, $famBatchId, $citeId){
		$sql = 'DELETE FROM rp_fam_cite WHERE fam_id = ?  AND fam_batch_id = ?  AND cite_id = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($famId);
		$sqlQuery->setNumber($famBatchId);
		$sqlQuery->setNumber($citeId);

		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RpFamCiteMySql rpFamCite
 	 */
	public function insert($rpFamCite){
		$sql = 'INSERT INTO rp_fam_cite (update_datetime, fam_id, fam_batch_id, cite_id) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($rpFamCite->updateDatetime);

		
		$sqlQuery->setNumber($rpFamCite->famId);

		$sqlQuery->setNumber($rpFamCite->famBatchId);

		$sqlQuery->setNumber($rpFamCite->citeId);

		$this->executeInsert($sqlQuery);	
		//$rpFamCite->id = $id;
		//return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param RpFamCiteMySql rpFamCite
 	 */
	public function update($rpFamCite){
		$sql = 'UPDATE rp_fam_cite SET update_datetime = ? WHERE fam_id = ?  AND fam_batch_id = ?  AND cite_id = ? ';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($rpFamCite->updateDatetime);

		
		$sqlQuery->setNumber($rpFamCite->famId);

		$sqlQuery->setNumber($rpFamCite->famBatchId);

		$sqlQuery->setNumber($rpFamCite->citeId);

		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM rp_fam_cite';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByUpdateDatetime($value){
		$sql = 'SELECT * FROM rp_fam_cite WHERE update_datetime = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByUpdateDatetime($value){
		$sql = 'DELETE FROM rp_fam_cite WHERE update_datetime = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return RpFamCiteMySql 
	 */
	protected function readRow($row){
		$rpFamCite = new RpFamCite();
		
		$rpFamCite->famId = $row['fam_id'];
		$rpFamCite->famBatchId = $row['fam_batch_id'];
		$rpFamCite->citeId = $row['cite_id'];
		$rpFamCite->updateDatetime = $row['update_datetime'];

		return $rpFamCite;
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
	 * @return RpFamCiteMySql 
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