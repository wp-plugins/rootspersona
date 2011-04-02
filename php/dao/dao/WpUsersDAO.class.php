<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 09:44
 */
interface WpUsersDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return WpUsers 
	 */
	public function load($id);

	/**
	 * Get all records from table
	 */
	public function queryAll();
	
	/**
	 * Get all records from table ordered by field
	 * @Param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn);
	
	/**
 	 * Delete record from table
 	 * @param wpUser primary key
 	 */
	public function delete($ID);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param WpUsers wpUser
 	 */
	public function insert($wpUser);
	
	/**
 	 * Update record in table
 	 *
 	 * @param WpUsers wpUser
 	 */
	public function update($wpUser);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByUserLogin($value);

	public function queryByUserPass($value);

	public function queryByUserNicename($value);

	public function queryByUserEmail($value);

	public function queryByUserUrl($value);

	public function queryByUserRegistered($value);

	public function queryByUserActivationKey($value);

	public function queryByUserStatus($value);

	public function queryByDisplayName($value);


	public function deleteByUserLogin($value);

	public function deleteByUserPass($value);

	public function deleteByUserNicename($value);

	public function deleteByUserEmail($value);

	public function deleteByUserUrl($value);

	public function deleteByUserRegistered($value);

	public function deleteByUserActivationKey($value);

	public function deleteByUserStatus($value);

	public function deleteByDisplayName($value);


}
?>