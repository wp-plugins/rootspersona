<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 09:44
 */
interface RpNameCiteDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return RpNameCite 
	 */
	public function load($nameId, $citeId);

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
 	 * @param rpNameCite primary key
 	 */
	public function delete($nameId, $citeId);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RpNameCite rpNameCite
 	 */
	public function insert($rpNameCite);
	
	/**
 	 * Update record in table
 	 *
 	 * @param RpNameCite rpNameCite
 	 */
	public function update($rpNameCite);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByUpdateDatetime($value);


	public function deleteByUpdateDatetime($value);


}
?>