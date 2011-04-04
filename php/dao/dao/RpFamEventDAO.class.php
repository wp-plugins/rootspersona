<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-04-03 21:25
 */
interface RpFamEventDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return RpFamEvent 
	 */
	public function load($famId, $famBatchId, $eventId);

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
 	 * @param rpFamEvent primary key
 	 */
	public function delete($famId, $famBatchId, $eventId);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RpFamEvent rpFamEvent
 	 */
	public function insert($rpFamEvent);
	
	/**
 	 * Update record in table
 	 *
 	 * @param RpFamEvent rpFamEvent
 	 */
	public function update($rpFamEvent);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByUpdateDatetime($value);


	public function deleteByUpdateDatetime($value);


}
?>