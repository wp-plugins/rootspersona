<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 09:44
 */
interface RpSourceDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return RpSource 
	 */
	public function load($id, $batchId);

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
 	 * @param rpSource primary key
 	 */
	public function delete($id, $batchId);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RpSource rpSource
 	 */
	public function insert($rpSource);
	
	/**
 	 * Update record in table
 	 *
 	 * @param RpSource rpSource
 	 */
	public function update($rpSource);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByOriginator($value);

	public function queryBySourceTitle($value);

	public function queryByAbbr($value);

	public function queryByPublicationFacts($value);

	public function queryByText($value);

	public function queryByAutoRecId($value);

	public function queryByGedChangeDate($value);

	public function queryByUpdateDatetime($value);


	public function deleteByOriginator($value);

	public function deleteBySourceTitle($value);

	public function deleteByAbbr($value);

	public function deleteByPublicationFacts($value);

	public function deleteByText($value);

	public function deleteByAutoRecId($value);

	public function deleteByGedChangeDate($value);

	public function deleteByUpdateDatetime($value);


}
?>