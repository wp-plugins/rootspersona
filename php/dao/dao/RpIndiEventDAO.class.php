<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-04-03 21:25
 */
interface RpIndiEventDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return RpIndiEvent 
	 */
	public function load($indiId, $indiBatchId, $eventId);

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
 	 * @param rpIndiEvent primary key
 	 */
	public function delete($indiId, $indiBatchId, $eventId);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RpIndiEvent rpIndiEvent
 	 */
	public function insert($rpIndiEvent);
	
	/**
 	 * Update record in table
 	 *
 	 * @param RpIndiEvent rpIndiEvent
 	 */
	public function update($rpIndiEvent);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByUpdateDatetime($value);


	public function deleteByUpdateDatetime($value);


}
?>