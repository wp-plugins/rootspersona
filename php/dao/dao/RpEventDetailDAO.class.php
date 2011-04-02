<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 09:44
 */
interface RpEventDetailDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return RpEventDetail 
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
 	 * @param rpEventDetail primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RpEventDetail rpEventDetail
 	 */
	public function insert($rpEventDetail);
	
	/**
 	 * Update record in table
 	 *
 	 * @param RpEventDetail rpEventDetail
 	 */
	public function update($rpEventDetail);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByEventType($value);

	public function queryByClassification($value);

	public function queryByEventDate($value);

	public function queryByPlace($value);

	public function queryByAddrId($value);

	public function queryByRespAgency($value);

	public function queryByReligiousAff($value);

	public function queryByCause($value);

	public function queryByRestrictionNotice($value);

	public function queryByUpdateDatetime($value);


	public function deleteByEventType($value);

	public function deleteByClassification($value);

	public function deleteByEventDate($value);

	public function deleteByPlace($value);

	public function deleteByAddrId($value);

	public function deleteByRespAgency($value);

	public function deleteByReligiousAff($value);

	public function deleteByCause($value);

	public function deleteByRestrictionNotice($value);

	public function deleteByUpdateDatetime($value);


}
?>