<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 09:44
 */
interface RpSourceCiteDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return RpSourceCite 
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
 	 * @param rpSourceCite primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RpSourceCite rpSourceCite
 	 */
	public function insert($rpSourceCite);
	
	/**
 	 * Update record in table
 	 *
 	 * @param RpSourceCite rpSourceCite
 	 */
	public function update($rpSourceCite);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryBySourceId($value);

	public function queryBySourceBatchId($value);

	public function queryBySourcePage($value);

	public function queryByEventType($value);

	public function queryByEventRole($value);

	public function queryByQuay($value);

	public function queryBySourceDescription($value);

	public function queryByUpdateDatetime($value);


	public function deleteBySourceId($value);

	public function deleteBySourceBatchId($value);

	public function deleteBySourcePage($value);

	public function deleteByEventType($value);

	public function deleteByEventRole($value);

	public function deleteByQuay($value);

	public function deleteBySourceDescription($value);

	public function deleteByUpdateDatetime($value);


}
?>