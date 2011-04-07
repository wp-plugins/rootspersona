<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-04-07 19:07
 */
interface RpRepoNoteDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return RpRepoNote 
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
 	 * @param rpRepoNote primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RpRepoNote rpRepoNote
 	 */
	public function insert($rpRepoNote);
	
	/**
 	 * Update record in table
 	 *
 	 * @param RpRepoNote rpRepoNote
 	 */
	public function update($rpRepoNote);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByRepoId($value);

	public function queryByRepoBatchId($value);

	public function queryByNote($value);

	public function queryByUpdateDatetime($value);


	public function deleteByRepoId($value);

	public function deleteByRepoBatchId($value);

	public function deleteByNote($value);

	public function deleteByUpdateDatetime($value);


}
?>