<?php
/**
 * Class that operate on table 'rp_indi_fam'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-04-06 07:37
 */
class RpIndiFamMySqlDAO implements RpIndiFamDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return RpIndiFamMySql
	 */
	public function load($indiId, $indiBatchId, $famId, $famBatchId, $linkType){
		$sql = 'SELECT * FROM rp_indi_fam WHERE indi_id = ?  AND indi_batch_id = ?  AND fam_id = ?  AND fam_batch_id = ?  AND link_type = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($indiId);
		$sqlQuery->setNumber($indiBatchId);
		$sqlQuery->setNumber($famId);
		$sqlQuery->setNumber($famBatchId);
		$sqlQuery->setNumber($linkType);

		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM rp_indi_fam';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}

	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM rp_indi_fam ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}

	/**
 	 * Delete record from table
 	 * @param rpIndiFam primary key
 	 */
	public function delete($indiId, $indiBatchId, $famId, $famBatchId, $linkType){
		$sql = 'DELETE FROM rp_indi_fam WHERE indi_id = ?  AND indi_batch_id = ?  AND fam_id = ?  AND fam_batch_id = ?  AND link_type = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($indiId);
		$sqlQuery->setNumber($indiBatchId);
		$sqlQuery->setNumber($famId);
		$sqlQuery->setNumber($famBatchId);
		$sqlQuery->setNumber($linkType);

		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Insert record to table
 	 *
 	 * @param RpIndiFamMySql rpIndiFam
 	 */
	public function insert($rpIndiFam){
		$sql = 'INSERT INTO rp_indi_fam (link_status, pedigree, update_datetime, indi_id, indi_batch_id, fam_id, fam_batch_id, link_type) VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);

		$sqlQuery->set($rpIndiFam->linkStatus);
		$sqlQuery->set($rpIndiFam->pedigree);
		$sqlQuery->set($rpIndiFam->updateDatetime);


		$sqlQuery->setNumber($rpIndiFam->indiId);

		$sqlQuery->setNumber($rpIndiFam->indiBatchId);

		$sqlQuery->setNumber($rpIndiFam->famId);

		$sqlQuery->setNumber($rpIndiFam->famBatchId);

		$sqlQuery->setNumber($rpIndiFam->linkType);

		$this->executeInsert($sqlQuery);
		//$rpIndiFam->id = $id;
		//return $id;
	}

	/**
 	 * Update record in table
 	 *
 	 * @param RpIndiFamMySql rpIndiFam
 	 */
	public function update($rpIndiFam){
		$sql = 'UPDATE rp_indi_fam SET link_status = ?, pedigree = ?, update_datetime = ? WHERE indi_id = ?  AND indi_batch_id = ?  AND fam_id = ?  AND fam_batch_id = ?  AND link_type = ? ';
		$sqlQuery = new SqlQuery($sql);

		$sqlQuery->set($rpIndiFam->linkStatus);
		$sqlQuery->set($rpIndiFam->pedigree);
		$sqlQuery->set($rpIndiFam->updateDatetime);


		$sqlQuery->setNumber($rpIndiFam->indiId);

		$sqlQuery->setNumber($rpIndiFam->indiBatchId);

		$sqlQuery->setNumber($rpIndiFam->famId);

		$sqlQuery->setNumber($rpIndiFam->famBatchId);

		$sqlQuery->setNumber($rpIndiFam->linkType);

		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM rp_indi_fam';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM rp_indi_fam WHERE link_status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPedigree($value){
		$sql = 'SELECT * FROM rp_indi_fam WHERE pedigree = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUpdateDatetime($value){
		$sql = 'SELECT * FROM rp_indi_fam WHERE update_datetime = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByStatus($value){
		$sql = 'DELETE FROM rp_indi_fam WHERE link_status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPedigree($value){
		$sql = 'DELETE FROM rp_indi_fam WHERE pedigree = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUpdateDatetime($value){
		$sql = 'DELETE FROM rp_indi_fam WHERE update_datetime = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}



	/**
	 * Read row
	 *
	 * @return RpIndiFamMySql
	 */
	protected function readRow($row){
		$rpIndiFam = new RpIndiFam();

		$rpIndiFam->indiId = $row['indi_id'];
		$rpIndiFam->indiBatchId = $row['indi_batch_id'];
		$rpIndiFam->famId = $row['fam_id'];
		$rpIndiFam->famBatchId = $row['fam_batch_id'];
		$rpIndiFam->linkType = $row['link_type'];
		$rpIndiFam->linkStatus = $row['link_status'];
		$rpIndiFam->pedigree = $row['pedigree'];
		$rpIndiFam->updateDatetime = $row['update_datetime'];

		return $rpIndiFam;
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
	 * @return RpIndiFamMySql
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