<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 09:44
 */
interface RpEventNoteDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return RpEventNote 
	 */
	public function load($eventId, $noteId);

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
 	 * @param rpEventNote primary key
 	 */
	public function delete($eventId, $noteId);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RpEventNote rpEventNote
 	 */
	public function insert($rpEventNote);
	
	/**
 	 * Update record in table
 	 *
 	 * @param RpEventNote rpEventNote
 	 */
	public function update($rpEventNote);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByUpdateDatetime($value);


	public function deleteByUpdateDatetime($value);


}
?>