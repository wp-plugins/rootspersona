<?php
/**
 * Class that operate on table 'rp_indi'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 09:44
 */
class RpIndiMySqlDAO implements RpIndiDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return RpIndiMySql
	 */
	public function load($id, $batchId){
		$sql = 'SELECT * FROM rp_indi WHERE id = ?  AND batch_id = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($id);
		$sqlQuery->setNumber($batchId);

		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM rp_indi';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}

	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM rp_indi ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}

	/**
 	 * Delete record from table
 	 * @param rpIndi primary key
 	 */
	public function delete($id, $batchId){
		$sql = 'DELETE FROM rp_indi WHERE id = ?  AND batch_id = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($id);
		$sqlQuery->setNumber($batchId);

		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Insert record to table
 	 *
 	 * @param RpIndiMySql rpIndi
 	 */
	public function insert($rpIndi){
		$sql = 'INSERT INTO rp_indi (restriction_notice, gender, perm_rec_file_nbr, anc_rec_file_nbr, auto_rec_id, ged_change_date, update_datetime, id, batch_id) VALUES (?, ?, ?, ?, ?, ?, now(), ?, ?)';
		$sqlQuery = new SqlQuery($sql);

		$sqlQuery->set($rpIndi->restrictionNotice);
		$sqlQuery->set($rpIndi->gender);
		$sqlQuery->set($rpIndi->permRecFileNbr);
		$sqlQuery->set($rpIndi->ancRecFileNbr);
		$sqlQuery->set($rpIndi->autoRecId);
		$sqlQuery->set($rpIndi->gedChangeDate);


		$sqlQuery->set($rpIndi->id);

		$sqlQuery->setNumber($rpIndi->batchId);

		$this->executeInsert($sqlQuery);
		//$rpIndi->id = $id;
		//return $id;
	}

	/**
 	 * Update record in table
 	 *
 	 * @param RpIndiMySql rpIndi
 	 */
	public function update($rpIndi){
		$sql = 'UPDATE rp_indi SET restriction_notice = ?, gender = ?, perm_rec_file_nbr = ?, anc_rec_file_nbr = ?, auto_rec_id = ?, ged_change_date = ?, update_datetime = now() WHERE id = ?  AND batch_id = ? ';
		$sqlQuery = new SqlQuery($sql);

		$sqlQuery->set($rpIndi->restrictionNotice);
		$sqlQuery->set($rpIndi->gender);
		$sqlQuery->set($rpIndi->permRecFileNbr);
		$sqlQuery->set($rpIndi->ancRecFileNbr);
		$sqlQuery->set($rpIndi->autoRecId);
		$sqlQuery->set($rpIndi->gedChangeDate);

		$sqlQuery->set($rpIndi->id);

		$sqlQuery->setNumber($rpIndi->batchId);

		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM rp_indi';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByRestrictionNotice($value){
		$sql = 'SELECT * FROM rp_indi WHERE restriction_notice = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByGender($value){
		$sql = 'SELECT * FROM rp_indi WHERE gender = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPermRecFileNbr($value){
		$sql = 'SELECT * FROM rp_indi WHERE perm_rec_file_nbr = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAncRecFileNbr($value){
		$sql = 'SELECT * FROM rp_indi WHERE anc_rec_file_nbr = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAutoRecId($value){
		$sql = 'SELECT * FROM rp_indi WHERE auto_rec_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByGedChangeDate($value){
		$sql = 'SELECT * FROM rp_indi WHERE ged_change_date = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUpdateDatetime($value){
		$sql = 'SELECT * FROM rp_indi WHERE update_datetime = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByRestrictionNotice($value){
		$sql = 'DELETE FROM rp_indi WHERE restriction_notice = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByGender($value){
		$sql = 'DELETE FROM rp_indi WHERE gender = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPermRecFileNbr($value){
		$sql = 'DELETE FROM rp_indi WHERE perm_rec_file_nbr = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAncRecFileNbr($value){
		$sql = 'DELETE FROM rp_indi WHERE anc_rec_file_nbr = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAutoRecId($value){
		$sql = 'DELETE FROM rp_indi WHERE auto_rec_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByGedChangeDate($value){
		$sql = 'DELETE FROM rp_indi WHERE ged_change_date = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUpdateDatetime($value){
		$sql = 'DELETE FROM rp_indi WHERE update_datetime = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}



	/**
	 * Read row
	 *
	 * @return RpIndiMySql
	 */
	protected function readRow($row){
		$rpIndi = new RpIndi();

		$rpIndi->id = $row['id'];
		$rpIndi->batchId = $row['batch_id'];
		$rpIndi->restrictionNotice = $row['restriction_notice'];
		$rpIndi->gender = $row['gender'];
		$rpIndi->permRecFileNbr = $row['perm_rec_file_nbr'];
		$rpIndi->ancRecFileNbr = $row['anc_rec_file_nbr'];
		$rpIndi->autoRecId = $row['auto_rec_id'];
		$rpIndi->gedChangeDate = $row['ged_change_date'];
		$rpIndi->updateDatetime = $row['update_datetime'];

		return $rpIndi;
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
	 * @return RpIndiMySql
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