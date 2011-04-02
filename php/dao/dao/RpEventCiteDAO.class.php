<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 09:44
 */
interface RpEventCiteDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return RpEventCite 
	 */
	public function load($eventId, $citeId);

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
 	 * @param rpEventCite primary key
 	 */
	public function delete($eventId, $citeId);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RpEventCite rpEventCite
 	 */
	public function insert($rpEventCite);
	
	/**
 	 * Update record in table
 	 *
 	 * @param RpEventCite rpEventCite
 	 */
	public function update($rpEventCite);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByUpdateDatetime($value);


	public function deleteByUpdateDatetime($value);


}
?>