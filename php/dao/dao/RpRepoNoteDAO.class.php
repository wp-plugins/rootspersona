<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 09:44
 */
interface RpRepoNoteDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return RpRepoNote 
	 */
	public function load($repoId, $repoBatchId, $noteId);

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
	public function delete($repoId, $repoBatchId, $noteId);
	
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

	public function queryByUpdateDatetime($value);


	public function deleteByUpdateDatetime($value);


}
?>