<?php
/**
 * Class that operate on table 'rp_address'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 09:44
 */
class RpAddressMySqlDAO implements RpAddressDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return RpAddressMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM rp_address WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM rp_address';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM rp_address ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param rpAddres primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM rp_address WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RpAddressMySql rpAddres
 	 */
	public function insert($rpAddres){
		$sql = 'INSERT INTO rp_address (line1, line2, line3, city, ctry_subentity, ctry, postal_code, phone1, phone2, phone3, email1, email2, email3, www1, www2, www3, fax1, fax2, fax3, update_datetime) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($rpAddres->line1);
		$sqlQuery->set($rpAddres->line2);
		$sqlQuery->set($rpAddres->line3);
		$sqlQuery->set($rpAddres->city);
		$sqlQuery->set($rpAddres->ctrySubentity);
		$sqlQuery->set($rpAddres->ctry);
		$sqlQuery->set($rpAddres->postalCode);
		$sqlQuery->set($rpAddres->phone1);
		$sqlQuery->set($rpAddres->phone2);
		$sqlQuery->set($rpAddres->phone3);
		$sqlQuery->set($rpAddres->email1);
		$sqlQuery->set($rpAddres->email2);
		$sqlQuery->set($rpAddres->email3);
		$sqlQuery->set($rpAddres->www1);
		$sqlQuery->set($rpAddres->www2);
		$sqlQuery->set($rpAddres->www3);
		$sqlQuery->set($rpAddres->fax1);
		$sqlQuery->set($rpAddres->fax2);
		$sqlQuery->set($rpAddres->fax3);
		$sqlQuery->set($rpAddres->updateDatetime);

		$id = $this->executeInsert($sqlQuery);	
		$rpAddres->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param RpAddressMySql rpAddres
 	 */
	public function update($rpAddres){
		$sql = 'UPDATE rp_address SET line1 = ?, line2 = ?, line3 = ?, city = ?, ctry_subentity = ?, ctry = ?, postal_code = ?, phone1 = ?, phone2 = ?, phone3 = ?, email1 = ?, email2 = ?, email3 = ?, www1 = ?, www2 = ?, www3 = ?, fax1 = ?, fax2 = ?, fax3 = ?, update_datetime = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($rpAddres->line1);
		$sqlQuery->set($rpAddres->line2);
		$sqlQuery->set($rpAddres->line3);
		$sqlQuery->set($rpAddres->city);
		$sqlQuery->set($rpAddres->ctrySubentity);
		$sqlQuery->set($rpAddres->ctry);
		$sqlQuery->set($rpAddres->postalCode);
		$sqlQuery->set($rpAddres->phone1);
		$sqlQuery->set($rpAddres->phone2);
		$sqlQuery->set($rpAddres->phone3);
		$sqlQuery->set($rpAddres->email1);
		$sqlQuery->set($rpAddres->email2);
		$sqlQuery->set($rpAddres->email3);
		$sqlQuery->set($rpAddres->www1);
		$sqlQuery->set($rpAddres->www2);
		$sqlQuery->set($rpAddres->www3);
		$sqlQuery->set($rpAddres->fax1);
		$sqlQuery->set($rpAddres->fax2);
		$sqlQuery->set($rpAddres->fax3);
		$sqlQuery->set($rpAddres->updateDatetime);

		$sqlQuery->setNumber($rpAddres->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM rp_address';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByLine1($value){
		$sql = 'SELECT * FROM rp_address WHERE line1 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLine2($value){
		$sql = 'SELECT * FROM rp_address WHERE line2 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLine3($value){
		$sql = 'SELECT * FROM rp_address WHERE line3 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCity($value){
		$sql = 'SELECT * FROM rp_address WHERE city = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCtrySubentity($value){
		$sql = 'SELECT * FROM rp_address WHERE ctry_subentity = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCtry($value){
		$sql = 'SELECT * FROM rp_address WHERE ctry = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPostalCode($value){
		$sql = 'SELECT * FROM rp_address WHERE postal_code = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPhone1($value){
		$sql = 'SELECT * FROM rp_address WHERE phone1 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPhone2($value){
		$sql = 'SELECT * FROM rp_address WHERE phone2 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPhone3($value){
		$sql = 'SELECT * FROM rp_address WHERE phone3 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEmail1($value){
		$sql = 'SELECT * FROM rp_address WHERE email1 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEmail2($value){
		$sql = 'SELECT * FROM rp_address WHERE email2 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEmail3($value){
		$sql = 'SELECT * FROM rp_address WHERE email3 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByWww1($value){
		$sql = 'SELECT * FROM rp_address WHERE www1 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByWww2($value){
		$sql = 'SELECT * FROM rp_address WHERE www2 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByWww3($value){
		$sql = 'SELECT * FROM rp_address WHERE www3 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFax1($value){
		$sql = 'SELECT * FROM rp_address WHERE fax1 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFax2($value){
		$sql = 'SELECT * FROM rp_address WHERE fax2 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFax3($value){
		$sql = 'SELECT * FROM rp_address WHERE fax3 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUpdateDatetime($value){
		$sql = 'SELECT * FROM rp_address WHERE update_datetime = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByLine1($value){
		$sql = 'DELETE FROM rp_address WHERE line1 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLine2($value){
		$sql = 'DELETE FROM rp_address WHERE line2 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLine3($value){
		$sql = 'DELETE FROM rp_address WHERE line3 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCity($value){
		$sql = 'DELETE FROM rp_address WHERE city = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCtrySubentity($value){
		$sql = 'DELETE FROM rp_address WHERE ctry_subentity = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCtry($value){
		$sql = 'DELETE FROM rp_address WHERE ctry = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPostalCode($value){
		$sql = 'DELETE FROM rp_address WHERE postal_code = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPhone1($value){
		$sql = 'DELETE FROM rp_address WHERE phone1 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPhone2($value){
		$sql = 'DELETE FROM rp_address WHERE phone2 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPhone3($value){
		$sql = 'DELETE FROM rp_address WHERE phone3 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEmail1($value){
		$sql = 'DELETE FROM rp_address WHERE email1 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEmail2($value){
		$sql = 'DELETE FROM rp_address WHERE email2 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEmail3($value){
		$sql = 'DELETE FROM rp_address WHERE email3 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByWww1($value){
		$sql = 'DELETE FROM rp_address WHERE www1 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByWww2($value){
		$sql = 'DELETE FROM rp_address WHERE www2 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByWww3($value){
		$sql = 'DELETE FROM rp_address WHERE www3 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFax1($value){
		$sql = 'DELETE FROM rp_address WHERE fax1 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFax2($value){
		$sql = 'DELETE FROM rp_address WHERE fax2 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFax3($value){
		$sql = 'DELETE FROM rp_address WHERE fax3 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUpdateDatetime($value){
		$sql = 'DELETE FROM rp_address WHERE update_datetime = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return RpAddressMySql 
	 */
	protected function readRow($row){
		$rpAddres = new RpAddres();
		
		$rpAddres->id = $row['id'];
		$rpAddres->line1 = $row['line1'];
		$rpAddres->line2 = $row['line2'];
		$rpAddres->line3 = $row['line3'];
		$rpAddres->city = $row['city'];
		$rpAddres->ctrySubentity = $row['ctry_subentity'];
		$rpAddres->ctry = $row['ctry'];
		$rpAddres->postalCode = $row['postal_code'];
		$rpAddres->phone1 = $row['phone1'];
		$rpAddres->phone2 = $row['phone2'];
		$rpAddres->phone3 = $row['phone3'];
		$rpAddres->email1 = $row['email1'];
		$rpAddres->email2 = $row['email2'];
		$rpAddres->email3 = $row['email3'];
		$rpAddres->www1 = $row['www1'];
		$rpAddres->www2 = $row['www2'];
		$rpAddres->www3 = $row['www3'];
		$rpAddres->fax1 = $row['fax1'];
		$rpAddres->fax2 = $row['fax2'];
		$rpAddres->fax3 = $row['fax3'];
		$rpAddres->updateDatetime = $row['update_datetime'];

		return $rpAddres;
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
	 * @return RpAddressMySql 
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