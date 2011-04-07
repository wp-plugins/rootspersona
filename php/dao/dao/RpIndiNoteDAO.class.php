<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-04-07 19:07
 */
interface RpIndiNoteDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return RpIndiNote 
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
 	 * @param rpIndiNote primary key
 	 */
	public function delete($id);
	
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

	public function queryByIndiId($value);

	public function queryByIndiBatchId($value);

	public function queryByNote($value);

	public function queryByUpdateDatetime($value);


	public function deleteByIndiId($value);

	public function deleteByIndiBatchId($value);

	public function deleteByNote($value);

	public function deleteByUpdateDatetime($value);


}
?>