<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 09:44
 */
interface RpHeaderDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return RpHeader 
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
 	 * @param rpHeader primary key
 	 */
	public function delete($id, $batchId);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RpHeader rpHeader
 	 */
	public function insert($rpHeader);
	
	/**
 	 * Update record in table
 	 *
 	 * @param RpHeader rpHeader
 	 */
	public function update($rpHeader);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryBySrcSystemId($value);

	public function queryBySrcSystemVersion($value);

	public function queryByProductName($value);

	public function queryByCorpName($value);

	public function queryByCorpAddrId($value);

	public function queryBySrcDataName($value);

	public function queryByPublicationDate($value);

	public function queryByCopyrightSrcData($value);

	public function queryByReceivingSysName($value);

	public function queryByTransmissionDate($value);

	public function queryByTransmissionTime($value);

	public function queryBySubmitterId($value);

	public function queryBySubmitterBatchId($value);

	public function queryBySubmissionId($value);

	public function queryBySubmissionBatchId($value);

	public function queryByFileName($value);

	public function queryByCopyrightGedFile($value);

	public function queryByLang($value);

	public function queryByGedcVersion($value);

	public function queryByGedcForm($value);

	public function queryByCharSet($value);

	public function queryByCharSetVersion($value);

	public function queryByPlaceHierarchy($value);

	public function queryByGedContentDescription($value);

	public function queryByUpdateDatetime($value);


	public function deleteBySrcSystemId($value);

	public function deleteBySrcSystemVersion($value);

	public function deleteByProductName($value);

	public function deleteByCorpName($value);

	public function deleteByCorpAddrId($value);

	public function deleteBySrcDataName($value);

	public function deleteByPublicationDate($value);

	public function deleteByCopyrightSrcData($value);

	public function deleteByReceivingSysName($value);

	public function deleteByTransmissionDate($value);

	public function deleteByTransmissionTime($value);

	public function deleteBySubmitterId($value);

	public function deleteBySubmitterBatchId($value);

	public function deleteBySubmissionId($value);

	public function deleteBySubmissionBatchId($value);

	public function deleteByFileName($value);

	public function deleteByCopyrightGedFile($value);

	public function deleteByLang($value);

	public function deleteByGedcVersion($value);

	public function deleteByGedcForm($value);

	public function deleteByCharSet($value);

	public function deleteByCharSetVersion($value);

	public function deleteByPlaceHierarchy($value);

	public function deleteByGedContentDescription($value);

	public function deleteByUpdateDatetime($value);


}
?>