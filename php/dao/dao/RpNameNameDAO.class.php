<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 09:44
 */
interface RpNameNameDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return RpNameName 
	 */
	public function load($nameId, $assocNameId);

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
 	 * @param rpNameName primary key
 	 */
	public function delete($nameId, $assocNameId);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RpNameName rpNameName
 	 */
	public function insert($rpNameName);
	
	/**
 	 * Update record in table
 	 *
 	 * @param RpNameName rpNameName
 	 */
	public function update($rpNameName);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByAssocNameType($value);

	public function queryByUpdateDatetime($value);


	public function deleteByAssocNameType($value);

	public function deleteByUpdateDatetime($value);


}
?>