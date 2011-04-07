<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-04-07 19:07
 */
interface RpSourceNoteDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return RpSourceNote 
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
 	 * @param rpSourceNote primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RpSourceNote rpSourceNote
 	 */
	public function insert($rpSourceNote);
	
	/**
 	 * Update record in table
 	 *
 	 * @param RpSourceNote rpSourceNote
 	 */
	public function update($rpSourceNote);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryBySourceId($value);

	public function queryBySourceBatchId($value);

	public function queryByNote($value);

	public function queryByUpdateDatetime($value);


	public function deleteBySourceId($value);

	public function deleteBySourceBatchId($value);

	public function deleteByNote($value);

	public function deleteByUpdateDatetime($value);


}
?>