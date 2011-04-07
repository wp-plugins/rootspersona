<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-04-07 19:07
 */
interface RpNameNoteDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return RpNameNote 
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
 	 * @param rpNameNote primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RpNameNote rpNameNote
 	 */
	public function insert($rpNameNote);
	
	/**
 	 * Update record in table
 	 *
 	 * @param RpNameNote rpNameNote
 	 */
	public function update($rpNameNote);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNameId($value);

	public function queryByNote($value);

	public function queryByUpdateDatetime($value);


	public function deleteByNameId($value);

	public function deleteByNote($value);

	public function deleteByUpdateDatetime($value);


}
?>