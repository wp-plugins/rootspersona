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
	public function loadList($indiId, $indiBatchId){
		$sql = 'SELECT * FROM rp_indi_name WHERE indi_id = ?  AND indi_batch_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($indiId);
		$sqlQuery->setNumber($indiBatchId);

		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param rpIndiName primary key
 	 */
	public function delete($indiId, $indiBatchId){
		$sql = 'DELETE FROM rp_indi_name WHERE indi_id = ?  AND indi_batch_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($indiId);
		$sqlQuery->setNumber($indiBatchId);

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