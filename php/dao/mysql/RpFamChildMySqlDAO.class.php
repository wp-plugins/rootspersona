<?php
/**
 * Class that operate on table 'rp_fam_child'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 09:44
 */
class RpFamChildMySqlDAO implements RpFamChildDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return RpFamChildMySql
	 */
	public function load($famId, $famBatchId, $childId, $indiBatchId){
		$sql = 'SELECT * FROM rp_fam_child WHERE fam_id = ?  AND fam_batch_id = ?  AND child_id = ?  AND indi_batch_id = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($famId);
		$sqlQuery->setNumber($famBatchId);
		$sqlQuery->set($childId);
		$sqlQuery->setNumber($indiBatchId);

		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM rp_fam_child';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}

	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM rp_fam_child ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}

	/**
 	 * Delete record from table
 	 * @param rpFamChild primary key
 	 */
	public function delete($famId, $famBatchId, $childId, $indiBatchId){
		$sql = 'DELETE FROM rp_fam_child WHERE fam_id = ?  AND fam_batch_id = ?  AND child_id = ?  AND indi_batch_id = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($famId);
		$sqlQuery->setNumber($famBatchId);
		$sqlQuery->setNumber($childId);
		$sqlQuery->set($indiBatchId);

		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Insert record to table
 	 *
 	 * @param RpFamChildMySql rpFamChild
 	 */
	public function insert($rpFamChild){
		$sql = 'INSERT INTO rp_fam_child (update_datetime, fam_id, fam_batch_id, child_id, indi_batch_id) VALUES (now(), ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);

		$sqlQuery->set($rpFamChild->famId);

		$sqlQuery->setNumber($rpFamChild->famBatchId);

		$sqlQuery->set($rpFamChild->childId);

		$sqlQuery->setNumber($rpFamChild->indiBatchId);

		$this->executeInsert($sqlQuery);
		//$rpFamChild->id = $id;
		//return $id;
	}

	/**
 	 * Update record in table
 	 *
 	 * @param RpFamChildMySql rpFamChild
 	 */
	public function update($rpFamChild){
		$sql = 'UPDATE rp_fam_child SET update_datetime = now() WHERE fam_id = ?  AND fam_batch_id = ?  AND child_id = ?  AND indi_batch_id = ? ';
		$sqlQuery = new SqlQuery($sql);

		$sqlQuery->set($rpFamChild->famId);

		$sqlQuery->setNumber($rpFamChild->famBatchId);

		$sqlQuery->set($rpFamChild->childId);

		$sqlQuery->setNumber($rpFamChild->indiBatchId);

		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM rp_fam_child';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByUpdateDatetime($value){
		$sql = 'SELECT * FROM rp_fam_child WHERE update_datetime = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByUpdateDatetime($value){
		$sql = 'DELETE FROM rp_fam_child WHERE update_datetime = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}



	/**
	 * Read row
	 *
	 * @return RpFamChildMySql
	 */
	protected function readRow($row){
		$rpFamChild = new RpFamChild();

		$rpFamChild->famId = $row['fam_id'];
		$rpFamChild->famBatchId = $row['fam_batch_id'];
		$rpFamChild->childId = $row['child_id'];
		$rpFamChild->indiBatchId = $row['indi_batch_id'];
		$rpFamChild->updateDatetime = $row['update_datetime'];

		return $rpFamChild;
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
	 * @return RpFamChildMySql
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