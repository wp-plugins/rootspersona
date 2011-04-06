<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-04-06 07:37
 */
interface RpIndiFamDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return RpIndiFam 
	 */
	public function load($indiId, $indiBatchId, $famId, $famBatchId, $linkType);

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
 	 * @param rpIndiFam primary key
 	 */
	public function delete($indiId, $indiBatchId, $famId, $famBatchId, $linkType);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RpIndiFam rpIndiFam
 	 */
	public function insert($rpIndiFam);
	
	/**
 	 * Update record in table
 	 *
 	 * @param RpIndiFam rpIndiFam
 	 */
	public function update($rpIndiFam);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByStatus($value);

	public function queryByPedigree($value);

	public function queryByUpdateDatetime($value);


	public function deleteByStatus($value);

	public function deleteByPedigree($value);

	public function deleteByUpdateDatetime($value);


}
?>