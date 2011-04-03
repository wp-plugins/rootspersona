<?php
/**
 * Class that operate on table 'rp_submitter'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 09:44
 */
class RpSubmitterMySqlDAO implements RpSubmitterDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return RpSubmitterMySql 
	 */
	public function load($id, $batchId){
		$sql = 'SELECT * FROM rp_submitter WHERE id = ?  AND batch_id = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		$sqlQuery->setNumber($batchId);

		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM rp_submitter';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM rp_submitter ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param rpSubmitter primary key
 	 */
	public function delete($id, $batchId){
		$sql = 'DELETE FROM rp_submitter WHERE id = ?  AND batch_id = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		$sqlQuery->setNumber($batchId);

		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RpSubmitterMySql rpSubmitter
 	 */
	public function insert($rpSubmitter){
		$sql = 'INSERT INTO rp_submitter (submitter_name, addr_id, lang1, lang2, lang3, registered_rfn, auto_rec_id, ged_change_date, update_datetime, id, batch_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($rpSubmitter->submitterName);
		$sqlQuery->setNumber($rpSubmitter->addrId);
		$sqlQuery->set($rpSubmitter->lang1);
		$sqlQuery->set($rpSubmitter->lang2);
		$sqlQuery->set($rpSubmitter->lang3);
		$sqlQuery->set($rpSubmitter->registeredRfn);
		$sqlQuery->set($rpSubmitter->autoRecId);
		$sqlQuery->set($rpSubmitter->gedChangeDate);
		$sqlQuery->set($rpSubmitter->updateDatetime);

		
		$sqlQuery->setNumber($rpSubmitter->id);

		$sqlQuery->setNumber($rpSubmitter->batchId);

		$this->executeInsert($sqlQuery);	
		//$rpSubmitter->id = $id;
		//return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param RpSubmitterMySql rpSubmitter
 	 */
	public function update($rpSubmitter){
		$sql = 'UPDATE rp_submitter SET submitter_name = ?, addr_id = ?, lang1 = ?, lang2 = ?, lang3 = ?, registered_rfn = ?, auto_rec_id = ?, ged_change_date = ?, update_datetime = ? WHERE id = ?  AND batch_id = ? ';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($rpSubmitter->submitterName);
		$sqlQuery->setNumber($rpSubmitter->addrId);
		$sqlQuery->set($rpSubmitter->lang1);
		$sqlQuery->set($rpSubmitter->lang2);
		$sqlQuery->set($rpSubmitter->lang3);
		$sqlQuery->set($rpSubmitter->registeredRfn);
		$sqlQuery->set($rpSubmitter->autoRecId);
		$sqlQuery->set($rpSubmitter->gedChangeDate);
		$sqlQuery->set($rpSubmitter->updateDatetime);

		
		$sqlQuery->setNumber($rpSubmitter->id);

		$sqlQuery->setNumber($rpSubmitter->batchId);

		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM rp_submitter';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryBySubmitterName($value){
		$sql = 'SELECT * FROM rp_submitter WHERE submitter_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAddrId($value){
		$sql = 'SELECT * FROM rp_submitter WHERE addr_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLang1($value){
		$sql = 'SELECT * FROM rp_submitter WHERE lang1 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLang2($value){
		$sql = 'SELECT * FROM rp_submitter WHERE lang2 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLang3($value){
		$sql = 'SELECT * FROM rp_submitter WHERE lang3 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRegisteredRfn($value){
		$sql = 'SELECT * FROM rp_submitter WHERE registered_rfn = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAutoRecId($value){
		$sql = 'SELECT * FROM rp_submitter WHERE auto_rec_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByGedChangeDate($value){
		$sql = 'SELECT * FROM rp_submitter WHERE ged_change_date = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUpdateDatetime($value){
		$sql = 'SELECT * FROM rp_submitter WHERE update_datetime = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteBySubmitterName($value){
		$sql = 'DELETE FROM rp_submitter WHERE submitter_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAddrId($value){
		$sql = 'DELETE FROM rp_submitter WHERE addr_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLang1($value){
		$sql = 'DELETE FROM rp_submitter WHERE lang1 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLang2($value){
		$sql = 'DELETE FROM rp_submitter WHERE lang2 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLang3($value){
		$sql = 'DELETE FROM rp_submitter WHERE lang3 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRegisteredRfn($value){
		$sql = 'DELETE FROM rp_submitter WHERE registered_rfn = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAutoRecId($value){
		$sql = 'DELETE FROM rp_submitter WHERE auto_rec_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByGedChangeDate($value){
		$sql = 'DELETE FROM rp_submitter WHERE ged_change_date = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUpdateDatetime($value){
		$sql = 'DELETE FROM rp_submitter WHERE update_datetime = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return RpSubmitterMySql 
	 */
	protected function readRow($row){
		$rpSubmitter = new RpSubmitter();
		
		$rpSubmitter->id = $row['id'];
		$rpSubmitter->batchId = $row['batch_id'];
		$rpSubmitter->submitterName = $row['submitter_name'];
		$rpSubmitter->addrId = $row['addr_id'];
		$rpSubmitter->lang1 = $row['lang1'];
		$rpSubmitter->lang2 = $row['lang2'];
		$rpSubmitter->lang3 = $row['lang3'];
		$rpSubmitter->registeredRfn = $row['registered_rfn'];
		$rpSubmitter->autoRecId = $row['auto_rec_id'];
		$rpSubmitter->gedChangeDate = $row['ged_change_date'];
		$rpSubmitter->updateDatetime = $row['update_datetime'];

		return $rpSubmitter;
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
	 * @return RpSubmitterMySql 
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