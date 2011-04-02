<?php
/**
 * Class that operate on table 'rp_name_personal'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 09:44
 */
class RpNamePersonalMySqlDAO implements RpNamePersonalDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return RpNamePersonalMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM rp_name_personal WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM rp_name_personal';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM rp_name_personal ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param rpNamePersonal primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM rp_name_personal WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RpNamePersonalMySql rpNamePersonal
 	 */
	public function insert($rpNamePersonal){
		$sql = 'INSERT INTO rp_name_personal (personal_name, name_type, prefix, given, nickname, surname_prefix, surname, suffix, update_datetime) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($rpNamePersonal->personalName);
		$sqlQuery->set($rpNamePersonal->nameType);
		$sqlQuery->set($rpNamePersonal->prefix);
		$sqlQuery->set($rpNamePersonal->given);
		$sqlQuery->set($rpNamePersonal->nickname);
		$sqlQuery->set($rpNamePersonal->surnamePrefix);
		$sqlQuery->set($rpNamePersonal->surname);
		$sqlQuery->set($rpNamePersonal->suffix);
		$sqlQuery->set($rpNamePersonal->updateDatetime);

		$id = $this->executeInsert($sqlQuery);	
		$rpNamePersonal->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param RpNamePersonalMySql rpNamePersonal
 	 */
	public function update($rpNamePersonal){
		$sql = 'UPDATE rp_name_personal SET personal_name = ?, name_type = ?, prefix = ?, given = ?, nickname = ?, surname_prefix = ?, surname = ?, suffix = ?, update_datetime = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($rpNamePersonal->personalName);
		$sqlQuery->set($rpNamePersonal->nameType);
		$sqlQuery->set($rpNamePersonal->prefix);
		$sqlQuery->set($rpNamePersonal->given);
		$sqlQuery->set($rpNamePersonal->nickname);
		$sqlQuery->set($rpNamePersonal->surnamePrefix);
		$sqlQuery->set($rpNamePersonal->surname);
		$sqlQuery->set($rpNamePersonal->suffix);
		$sqlQuery->set($rpNamePersonal->updateDatetime);

		$sqlQuery->setNumber($rpNamePersonal->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM rp_name_personal';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByPersonalName($value){
		$sql = 'SELECT * FROM rp_name_personal WHERE personal_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNameType($value){
		$sql = 'SELECT * FROM rp_name_personal WHERE name_type = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPrefix($value){
		$sql = 'SELECT * FROM rp_name_personal WHERE prefix = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByGiven($value){
		$sql = 'SELECT * FROM rp_name_personal WHERE given = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNickname($value){
		$sql = 'SELECT * FROM rp_name_personal WHERE nickname = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySurnamePrefix($value){
		$sql = 'SELECT * FROM rp_name_personal WHERE surname_prefix = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySurname($value){
		$sql = 'SELECT * FROM rp_name_personal WHERE surname = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySuffix($value){
		$sql = 'SELECT * FROM rp_name_personal WHERE suffix = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUpdateDatetime($value){
		$sql = 'SELECT * FROM rp_name_personal WHERE update_datetime = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByPersonalName($value){
		$sql = 'DELETE FROM rp_name_personal WHERE personal_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNameType($value){
		$sql = 'DELETE FROM rp_name_personal WHERE name_type = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPrefix($value){
		$sql = 'DELETE FROM rp_name_personal WHERE prefix = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByGiven($value){
		$sql = 'DELETE FROM rp_name_personal WHERE given = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNickname($value){
		$sql = 'DELETE FROM rp_name_personal WHERE nickname = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySurnamePrefix($value){
		$sql = 'DELETE FROM rp_name_personal WHERE surname_prefix = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySurname($value){
		$sql = 'DELETE FROM rp_name_personal WHERE surname = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySuffix($value){
		$sql = 'DELETE FROM rp_name_personal WHERE suffix = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUpdateDatetime($value){
		$sql = 'DELETE FROM rp_name_personal WHERE update_datetime = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return RpNamePersonalMySql 
	 */
	protected function readRow($row){
		$rpNamePersonal = new RpNamePersonal();
		
		$rpNamePersonal->id = $row['id'];
		$rpNamePersonal->personalName = $row['personal_name'];
		$rpNamePersonal->nameType = $row['name_type'];
		$rpNamePersonal->prefix = $row['prefix'];
		$rpNamePersonal->given = $row['given'];
		$rpNamePersonal->nickname = $row['nickname'];
		$rpNamePersonal->surnamePrefix = $row['surname_prefix'];
		$rpNamePersonal->surname = $row['surname'];
		$rpNamePersonal->suffix = $row['suffix'];
		$rpNamePersonal->updateDatetime = $row['update_datetime'];

		return $rpNamePersonal;
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
	 * @return RpNamePersonalMySql 
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