<?php
/**
 * Class that operate on table 'rp_indi_name'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 09:44
 */
class RpIndiNameMySqlDAO implements RpIndiNameDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return RpIndiNameMySql
	 */
	public function load($indiId, $indiBatchId, $nameId){
		$sql = 'SELECT * FROM rp_indi_name WHERE indi_id = ?  AND indi_batch_id = ?  AND name_id = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($indiId);
		$sqlQuery->setNumber($indiBatchId);
		$sqlQuery->setNumber($nameId);

		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM rp_indi_name';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}

	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM rp_indi_name ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}

	/**
 	 * Delete record from table
 	 * @param rpIndiName primary key
 	 */
	public function delete($indiId, $indiBatchId, $nameId){
		$sql = 'DELETE FROM rp_indi_name WHERE indi_id = ?  AND indi_batch_id = ?  AND name_id = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($indiId);
		$sqlQuery->setNumber($indiBatchId);
		$sqlQuery->setNumber($nameId);

		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Insert record to table
 	 *
 	 * @param RpIndiNameMySql rpIndiName
 	 */
	public function insert($rpIndiName){
		$sql = 'INSERT INTO rp_indi_name (update_datetime, indi_id, indi_batch_id, name_id) VALUES (now(), ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);

		$sqlQuery->set($rpIndiName->indiId);

		$sqlQuery->setNumber($rpIndiName->indiBatchId);

		$sqlQuery->setNumber($rpIndiName->nameId);

		$this->executeInsert($sqlQuery);
		//$rpIndiName->id = $id;
		//return $id;
	}

	/**
 	 * Update record in table
 	 *
 	 * @param RpIndiNameMySql rpIndiName
 	 */
	public function update($rpIndiName){
		$sql = 'UPDATE rp_indi_name SET update_datetime = now() WHERE indi_id = ?  AND indi_batch_id = ?  AND name_id = ? ';
		$sqlQuery = new SqlQuery($sql);

		$sqlQuery->set($rpIndiName->indiId);

		$sqlQuery->setNumber($rpIndiName->indiBatchId);

		$sqlQuery->setNumber($rpIndiName->nameId);

		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM rp_indi_name';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByUpdateDatetime($value){
		$sql = 'SELECT * FROM rp_indi_name WHERE update_datetime = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByUpdateDatetime($value){
		$sql = 'DELETE FROM rp_indi_name WHERE update_datetime = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}



	/**
	 * Read row
	 *
	 * @return RpIndiNameMySql
	 */
	protected function readRow($row){
		$rpIndiName = new RpIndiName();

		$rpIndiName->indiId = $row['indi_id'];
		$rpIndiName->indiBatchId = $row['indi_batch_id'];
		$rpIndiName->nameId = $row['name_id'];
		$rpIndiName->updateDatetime = $row['update_datetime'];

		return $rpIndiName;
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
	 * @return RpIndiNameMySql
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