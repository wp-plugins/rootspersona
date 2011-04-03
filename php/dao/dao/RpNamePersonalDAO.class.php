<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 09:44
 */
interface RpNamePersonalDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return RpNamePersonal 
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
 	 * @param rpNamePersonal primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RpNamePersonal rpNamePersonal
 	 */
	public function insert($rpNamePersonal);
	
	/**
 	 * Update record in table
 	 *
 	 * @param RpNamePersonal rpNamePersonal
 	 */
	public function update($rpNamePersonal);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByPersonalName($value);

	public function queryByNameType($value);

	public function queryByPrefix($value);

	public function queryByGiven($value);

	public function queryByNickname($value);

	public function queryBySurnamePrefix($value);

	public function queryBySurname($value);

	public function queryBySuffix($value);

	public function queryByUpdateDatetime($value);


	public function deleteByPersonalName($value);

	public function deleteByNameType($value);

	public function deleteByPrefix($value);

	public function deleteByGiven($value);

	public function deleteByNickname($value);

	public function deleteBySurnamePrefix($value);

	public function deleteBySurname($value);

	public function deleteBySuffix($value);

	public function deleteByUpdateDatetime($value);


}
?>