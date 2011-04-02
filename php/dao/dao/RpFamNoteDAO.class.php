<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 09:44
 */
interface RpFamNoteDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return RpFamNote 
	 */
	public function load($famId, $famBatchId, $noteId);

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
 	 * @param rpFamNote primary key
 	 */
	public function delete($famId, $famBatchId, $noteId);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RpFamNote rpFamNote
 	 */
	public function insert($rpFamNote);
	
	/**
 	 * Update record in table
 	 *
 	 * @param RpFamNote rpFamNote
 	 */
	public function update($rpFamNote);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByUpdateDatetime($value);


	public function deleteByUpdateDatetime($value);


}
?>