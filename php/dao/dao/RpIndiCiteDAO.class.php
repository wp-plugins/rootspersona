<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 09:44
 */
interface RpIndiCiteDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return RpIndiCite 
	 */
	public function load($indiId, $indiBatchId, $citeId);

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
 	 * @param rpIndiCite primary key
 	 */
	public function delete($indiId, $indiBatchId, $citeId);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RpIndiCite rpIndiCite
 	 */
	public function insert($rpIndiCite);
	
	/**
 	 * Update record in table
 	 *
 	 * @param RpIndiCite rpIndiCite
 	 */
	public function update($rpIndiCite);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByUpdateDatetime($value);


	public function deleteByUpdateDatetime($value);


}
?>