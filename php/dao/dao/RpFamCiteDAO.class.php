<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 09:44
 */
interface RpFamCiteDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return RpFamCite 
	 */
	public function load($famId, $famBatchId, $citeId);

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
 	 * @param rpFamCite primary key
 	 */
	public function delete($famId, $famBatchId, $citeId);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RpFamCite rpFamCite
 	 */
	public function insert($rpFamCite);
	
	/**
 	 * Update record in table
 	 *
 	 * @param RpFamCite rpFamCite
 	 */
	public function update($rpFamCite);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByUpdateDatetime($value);


	public function deleteByUpdateDatetime($value);


}
?>