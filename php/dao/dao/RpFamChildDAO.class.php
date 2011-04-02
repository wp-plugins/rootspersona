<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 09:44
 */
interface RpFamChildDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return RpFamChild 
	 */
	public function load($famId, $famBatchId, $childId, $indiBatchId);

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
 	 * @param rpFamChild primary key
 	 */
	public function delete($famId, $famBatchId, $childId, $indiBatchId);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RpFamChild rpFamChild
 	 */
	public function insert($rpFamChild);
	
	/**
 	 * Update record in table
 	 *
 	 * @param RpFamChild rpFamChild
 	 */
	public function update($rpFamChild);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByUpdateDatetime($value);


	public function deleteByUpdateDatetime($value);


}
?>