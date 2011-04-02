<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 09:44
 */
interface RpIndiNameDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return RpIndiName 
	 */
	public function load($indiId, $indiBatchId, $nameId);

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
 	 * @param rpIndiName primary key
 	 */
	public function delete($indiId, $indiBatchId, $nameId);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RpIndiName rpIndiName
 	 */
	public function insert($rpIndiName);
	
	/**
 	 * Update record in table
 	 *
 	 * @param RpIndiName rpIndiName
 	 */
	public function update($rpIndiName);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByUpdateDatetime($value);


	public function deleteByUpdateDatetime($value);


}
?>