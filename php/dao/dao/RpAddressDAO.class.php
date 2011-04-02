<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 09:44
 */
interface RpAddressDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return RpAddress 
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
 	 * @param rpAddres primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RpAddress rpAddres
 	 */
	public function insert($rpAddres);
	
	/**
 	 * Update record in table
 	 *
 	 * @param RpAddress rpAddres
 	 */
	public function update($rpAddres);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByLine1($value);

	public function queryByLine2($value);

	public function queryByLine3($value);

	public function queryByCity($value);

	public function queryByCtrySubentity($value);

	public function queryByCtry($value);

	public function queryByPostalCode($value);

	public function queryByPhone1($value);

	public function queryByPhone2($value);

	public function queryByPhone3($value);

	public function queryByEmail1($value);

	public function queryByEmail2($value);

	public function queryByEmail3($value);

	public function queryByWww1($value);

	public function queryByWww2($value);

	public function queryByWww3($value);

	public function queryByFax1($value);

	public function queryByFax2($value);

	public function queryByFax3($value);

	public function queryByUpdateDatetime($value);


	public function deleteByLine1($value);

	public function deleteByLine2($value);

	public function deleteByLine3($value);

	public function deleteByCity($value);

	public function deleteByCtrySubentity($value);

	public function deleteByCtry($value);

	public function deleteByPostalCode($value);

	public function deleteByPhone1($value);

	public function deleteByPhone2($value);

	public function deleteByPhone3($value);

	public function deleteByEmail1($value);

	public function deleteByEmail2($value);

	public function deleteByEmail3($value);

	public function deleteByWww1($value);

	public function deleteByWww2($value);

	public function deleteByWww3($value);

	public function deleteByFax1($value);

	public function deleteByFax2($value);

	public function deleteByFax3($value);

	public function deleteByUpdateDatetime($value);


}
?>