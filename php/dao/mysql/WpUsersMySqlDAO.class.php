<?php
/**
 * Class that operate on table 'wp_users'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 09:44
 */
class WpUsersMySqlDAO implements WpUsersDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return WpUsersMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM wp_users WHERE ID = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM wp_users';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM wp_users ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param wpUser primary key
 	 */
	public function delete($ID){
		$sql = 'DELETE FROM wp_users WHERE ID = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($ID);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param WpUsersMySql wpUser
 	 */
	public function insert($wpUser){
		$sql = 'INSERT INTO wp_users (user_login, user_pass, user_nicename, user_email, user_url, user_registered, user_activation_key, user_status, display_name) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($wpUser->userLogin);
		$sqlQuery->set($wpUser->userPass);
		$sqlQuery->set($wpUser->userNicename);
		$sqlQuery->set($wpUser->userEmail);
		$sqlQuery->set($wpUser->userUrl);
		$sqlQuery->set($wpUser->userRegistered);
		$sqlQuery->set($wpUser->userActivationKey);
		$sqlQuery->setNumber($wpUser->userStatus);
		$sqlQuery->set($wpUser->displayName);

		$id = $this->executeInsert($sqlQuery);	
		$wpUser->iD = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param WpUsersMySql wpUser
 	 */
	public function update($wpUser){
		$sql = 'UPDATE wp_users SET user_login = ?, user_pass = ?, user_nicename = ?, user_email = ?, user_url = ?, user_registered = ?, user_activation_key = ?, user_status = ?, display_name = ? WHERE ID = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($wpUser->userLogin);
		$sqlQuery->set($wpUser->userPass);
		$sqlQuery->set($wpUser->userNicename);
		$sqlQuery->set($wpUser->userEmail);
		$sqlQuery->set($wpUser->userUrl);
		$sqlQuery->set($wpUser->userRegistered);
		$sqlQuery->set($wpUser->userActivationKey);
		$sqlQuery->setNumber($wpUser->userStatus);
		$sqlQuery->set($wpUser->displayName);

		$sqlQuery->set($wpUser->iD);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM wp_users';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByUserLogin($value){
		$sql = 'SELECT * FROM wp_users WHERE user_login = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUserPass($value){
		$sql = 'SELECT * FROM wp_users WHERE user_pass = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUserNicename($value){
		$sql = 'SELECT * FROM wp_users WHERE user_nicename = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUserEmail($value){
		$sql = 'SELECT * FROM wp_users WHERE user_email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUserUrl($value){
		$sql = 'SELECT * FROM wp_users WHERE user_url = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUserRegistered($value){
		$sql = 'SELECT * FROM wp_users WHERE user_registered = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUserActivationKey($value){
		$sql = 'SELECT * FROM wp_users WHERE user_activation_key = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUserStatus($value){
		$sql = 'SELECT * FROM wp_users WHERE user_status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDisplayName($value){
		$sql = 'SELECT * FROM wp_users WHERE display_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByUserLogin($value){
		$sql = 'DELETE FROM wp_users WHERE user_login = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUserPass($value){
		$sql = 'DELETE FROM wp_users WHERE user_pass = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUserNicename($value){
		$sql = 'DELETE FROM wp_users WHERE user_nicename = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUserEmail($value){
		$sql = 'DELETE FROM wp_users WHERE user_email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUserUrl($value){
		$sql = 'DELETE FROM wp_users WHERE user_url = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUserRegistered($value){
		$sql = 'DELETE FROM wp_users WHERE user_registered = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUserActivationKey($value){
		$sql = 'DELETE FROM wp_users WHERE user_activation_key = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUserStatus($value){
		$sql = 'DELETE FROM wp_users WHERE user_status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDisplayName($value){
		$sql = 'DELETE FROM wp_users WHERE display_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return WpUsersMySql 
	 */
	protected function readRow($row){
		$wpUser = new WpUser();
		
		$wpUser->iD = $row['ID'];
		$wpUser->userLogin = $row['user_login'];
		$wpUser->userPass = $row['user_pass'];
		$wpUser->userNicename = $row['user_nicename'];
		$wpUser->userEmail = $row['user_email'];
		$wpUser->userUrl = $row['user_url'];
		$wpUser->userRegistered = $row['user_registered'];
		$wpUser->userActivationKey = $row['user_activation_key'];
		$wpUser->userStatus = $row['user_status'];
		$wpUser->displayName = $row['display_name'];

		return $wpUser;
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
	 * @return WpUsersMySql 
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