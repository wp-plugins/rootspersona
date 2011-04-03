<?php
/**
 * Class that operate on table 'rp_fam'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 09:44
 */
class RpFamMySqlDAO implements RpFamDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return RpFamMySql 
	 */
	public function load($id, $batchId){
		$sql = 'SELECT * FROM rp_fam WHERE id = ?  AND batch_id = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		$sqlQuery->setNumber($batchId);

		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM rp_fam';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM rp_fam ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param rpFam primary key
 	 */
	public function delete($id, $batchId){
		$sql = 'DELETE FROM rp_fam WHERE id = ?  AND batch_id = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		$sqlQuery->setNumber($batchId);

		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RpFamMySql rpFam
 	 */
	public function insert($rpFam){
		$sql = 'INSERT INTO rp_fam (spouse1, indi_batch_id_1, spouse2, indi_batch_id_2, auto_rec_id, ged_change_date, update_datetime, id, batch_id) VALUES (?, ?, ?, ?, ?, ?, now(), ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($rpFam->spouse1);
		$sqlQuery->setNumber($rpFam->indiBatchId1);
		$sqlQuery->set($rpFam->spouse2);
		$sqlQuery->setNumber($rpFam->indiBatchId2);
		$sqlQuery->set($rpFam->autoRecId);
		$sqlQuery->set($rpFam->gedChangeDate);
		$sqlQuery->set($rpFam->id);

		$sqlQuery->setNumber($rpFam->batchId);

		$this->executeInsert($sqlQuery);	
		//$rpFam->id = $id;
		//return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param RpFamMySql rpFam
 	 */
	public function update($rpFam){
		$sql = 'UPDATE rp_fam SET spouse1 = ?, indi_batch_id_1 = ?, spouse2 = ?, indi_batch_id_2 = ?, auto_rec_id = ?, ged_change_date = ?, update_datetime = now() WHERE id = ?  AND batch_id = ? ';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($rpFam->spouse1);
		$sqlQuery->setNumber($rpFam->indiBatchId1);
		$sqlQuery->set($rpFam->spouse2);
		$sqlQuery->setNumber($rpFam->indiBatchId2);
		$sqlQuery->set($rpFam->autoRecId);
		$sqlQuery->set($rpFam->gedChangeDate);
		$sqlQuery->set($rpFam->id);

		$sqlQuery->setNumber($rpFam->batchId);

		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM rp_fam';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryBySpouse1($value){
		$sql = 'SELECT * FROM rp_fam WHERE spouse1 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIndiBatchId1($value){
		$sql = 'SELECT * FROM rp_fam WHERE indi_batch_id_1 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySpouse2($value){
		$sql = 'SELECT * FROM rp_fam WHERE spouse2 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIndiBatchId2($value){
		$sql = 'SELECT * FROM rp_fam WHERE indi_batch_id_2 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAutoRecId($value){
		$sql = 'SELECT * FROM rp_fam WHERE auto_rec_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByGedChangeDate($value){
		$sql = 'SELECT * FROM rp_fam WHERE ged_change_date = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUpdateDatetime($value){
		$sql = 'SELECT * FROM rp_fam WHERE update_datetime = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteBySpouse1($value){
		$sql = 'DELETE FROM rp_fam WHERE spouse1 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIndiBatchId1($value){
		$sql = 'DELETE FROM rp_fam WHERE indi_batch_id_1 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySpouse2($value){
		$sql = 'DELETE FROM rp_fam WHERE spouse2 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIndiBatchId2($value){
		$sql = 'DELETE FROM rp_fam WHERE indi_batch_id_2 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAutoRecId($value){
		$sql = 'DELETE FROM rp_fam WHERE auto_rec_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByGedChangeDate($value){
		$sql = 'DELETE FROM rp_fam WHERE ged_change_date = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUpdateDatetime($value){
		$sql = 'DELETE FROM rp_fam WHERE update_datetime = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return RpFamMySql 
	 */
	protected function readRow($row){
		$rpFam = new RpFam();
		
		$rpFam->id = $row['id'];
		$rpFam->batchId = $row['batch_id'];
		$rpFam->spouse1 = $row['spouse1'];
		$rpFam->indiBatchId1 = $row['indi_batch_id_1'];
		$rpFam->spouse2 = $row['spouse2'];
		$rpFam->indiBatchId2 = $row['indi_batch_id_2'];
		$rpFam->autoRecId = $row['auto_rec_id'];
		$rpFam->gedChangeDate = $row['ged_change_date'];
		$rpFam->updateDatetime = $row['update_datetime'];

		return $rpFam;
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
	 * @return RpFamMySql 
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