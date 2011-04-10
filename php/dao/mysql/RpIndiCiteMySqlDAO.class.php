<?php
/**
 * Class that operate on table 'rp_indi_cite'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 09:44
 */
class RpIndiCiteMySqlDAO implements RpIndiCiteDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return RpIndiCiteMySql
	 */
	public function load($indiId, $indiBatchId, $citeId){
		$sql = 'SELECT * FROM rp_indi_cite WHERE indi_id = ?  AND indi_batch_id = ?  AND cite_id = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($indiId);
		$sqlQuery->setNumber($indiBatchId);
		$sqlQuery->setNumber($citeId);

		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM rp_indi_cite';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}

	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM rp_indi_cite ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}

	/**
 	 * Delete record from table
 	 * @param rpIndiCite primary key
 	 */
	public function delete($indiId, $indiBatchId, $citeId){
		$sql = 'DELETE FROM rp_indi_cite WHERE indi_id = ?  AND indi_batch_id = ?  AND cite_id = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($indiId);
		$sqlQuery->setNumber($indiBatchId);
		$sqlQuery->setNumber($citeId);

		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Insert record to table
 	 *
 	 * @param RpIndiCiteMySql rpIndiCite
 	 */
	public function insert($rpIndiCite){
		$sql = 'INSERT INTO rp_indi_cite (update_datetime, indi_id, indi_batch_id, cite_id) VALUES (now(), ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);

		$sqlQuery->set($rpIndiCite->indiId);

		$sqlQuery->setNumber($rpIndiCite->indiBatchId);

		$sqlQuery->setNumber($rpIndiCite->citeId);

		$this->executeInsert($sqlQuery);
	}

	/**
 	 * Update record in table
 	 *
 	 * @param RpIndiCiteMySql rpIndiCite
 	 */
	public function update($rpIndiCite){
		$sql = 'UPDATE rp_indi_cite SET update_datetime = now() WHERE indi_id = ?  AND indi_batch_id = ?  AND cite_id = ? ';
		$sqlQuery = new SqlQuery($sql);

		$sqlQuery->set($rpIndiCite->indiId);

		$sqlQuery->setNumber($rpIndiCite->indiBatchId);

		$sqlQuery->setNumber($rpIndiCite->citeId);

		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM rp_indi_cite';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByUpdateDatetime($value){
		$sql = 'SELECT * FROM rp_indi_cite WHERE update_datetime = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByUpdateDatetime($value){
		$sql = 'DELETE FROM rp_indi_cite WHERE update_datetime = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}



	/**
	 * Read row
	 *
	 * @return RpIndiCiteMySql
	 */
	protected function readRow($row){
		$rpIndiCite = new RpIndiCite();

		$rpIndiCite->indiId = $row['indi_id'];
		$rpIndiCite->indiBatchId = $row['indi_batch_id'];
		$rpIndiCite->citeId = $row['cite_id'];
		$rpIndiCite->updateDatetime = $row['update_datetime'];

		return $rpIndiCite;
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
	 * @return RpIndiCiteMySql
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