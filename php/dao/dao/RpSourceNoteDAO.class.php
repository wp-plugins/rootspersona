<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 09:44
 */
interface RpSourceNoteDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return RpSourceNote 
	 */
	public function load($sourceId, $sourceBatchId, $noteId);

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
	public function delete($sourceId, $sourceBatchId, $noteId);
	
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

	public function queryByUpdateDatetime($value);


	public function deleteByUpdateDatetime($value);


}
?>