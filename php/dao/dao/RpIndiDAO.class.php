<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 09:44
 */
interface RpIndiDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return RpIndi 
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
 	 * @param rpIndi primary key
 	 */
	public function delete($id, $batchId);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RpIndi rpIndi
 	 */
	public function insert($rpIndi);
	
	/**
 	 * Update record in table
 	 *
 	 * @param RpIndi rpIndi
 	 */
	public function update($rpIndi);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByRestrictionNotice($value);

	public function queryByGender($value);

	public function queryByPermRecFileNbr($value);

	public function queryByAncRecFileNbr($value);

	public function queryByAutoRecId($value);

	public function queryByGedChangeDate($value);

	public function queryByUpdateDatetime($value);


	public function deleteByRestrictionNotice($value);

	public function deleteByGender($value);

	public function deleteByPermRecFileNbr($value);

	public function deleteByAncRecFileNbr($value);

	public function deleteByAutoRecId($value);

	public function deleteByGedChangeDate($value);

	public function deleteByUpdateDatetime($value);


}
?>