<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 09:44
 */
interface RpNameNoteDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return RpNameNote 
	 */
	public function load($nameId, $noteId);

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
	public function delete($nameId, $noteId);
	
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

	public function queryByUpdateDatetime($value);


	public function deleteByUpdateDatetime($value);


}
?>