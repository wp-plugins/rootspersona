<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-04-07 19:07
 */
interface RpSubmitterNoteDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return RpSubmitterNote 
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
 	 * @param rpSubmitterNote primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RpSubmitterNote rpSubmitterNote
 	 */
	public function insert($rpSubmitterNote);
	
	/**
 	 * Update record in table
 	 *
 	 * @param RpSubmitterNote rpSubmitterNote
 	 */
	public function update($rpSubmitterNote);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryBySubmitterId($value);

	public function queryBySubmitterBatchId($value);

	public function queryByNote($value);

	public function queryByUpdateDatetime($value);


	public function deleteBySubmitterId($value);

	public function deleteBySubmitterBatchId($value);

	public function deleteByNote($value);

	public function deleteByUpdateDatetime($value);


}
?>