<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-04-03 18:56
 */
interface RpFamDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return RpFam 
	 */
	public function load($id, $batchId);

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
 	 * @param rpFam primary key
 	 */
	public function delete($id, $batchId);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RpFam rpFam
 	 */
	public function insert($rpFam);
	
	/**
 	 * Update record in table
 	 *
 	 * @param RpFam rpFam
 	 */
	public function update($rpFam);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByRestrictionNotice($value);

	public function queryBySpouse1($value);

	public function queryByIndiBatchId1($value);

	public function queryBySpouse2($value);

	public function queryByIndiBatchId2($value);

	public function queryByAutoRecId($value);

	public function queryByGedChangeDate($value);

	public function queryByUpdateDatetime($value);


	public function deleteByRestrictionNotice($value);

	public function deleteBySpouse1($value);

	public function deleteByIndiBatchId1($value);

	public function deleteBySpouse2($value);

	public function deleteByIndiBatchId2($value);

	public function deleteByAutoRecId($value);

	public function deleteByGedChangeDate($value);

	public function deleteByUpdateDatetime($value);


}
?>