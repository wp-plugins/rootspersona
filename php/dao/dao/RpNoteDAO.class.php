<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 09:44
 */
interface RpNoteDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return RpNote 
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
 	 * @param rpNote primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RpNote rpNote
 	 */
	public function insert($rpNote);
	
	/**
 	 * Update record in table
 	 *
 	 * @param RpNote rpNote
 	 */
	public function update($rpNote);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByCiteId($value);

	public function queryByAutoRecId($value);

	public function queryByGedChangeDate($value);

	public function queryByUpdateDatetime($value);

	public function queryBySubmitterText($value);


	public function deleteByCiteId($value);

	public function deleteByAutoRecId($value);

	public function deleteByGedChangeDate($value);

	public function deleteByUpdateDatetime($value);

	public function deleteBySubmitterText($value);


}
?>