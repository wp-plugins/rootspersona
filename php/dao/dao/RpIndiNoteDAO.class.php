<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 09:44
 */
interface RpIndiNoteDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return RpIndiNote 
	 */
	public function load($indiId, $indiBatchId, $noteId);

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
 	 * @param rpIndiNote primary key
 	 */
	public function delete($indiId, $indiBatchId, $noteId);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RpIndiNote rpIndiNote
 	 */
	public function insert($rpIndiNote);
	
	/**
 	 * Update record in table
 	 *
 	 * @param RpIndiNote rpIndiNote
 	 */
	public function update($rpIndiNote);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByUpdateDatetime($value);


	public function deleteByUpdateDatetime($value);


}
?>