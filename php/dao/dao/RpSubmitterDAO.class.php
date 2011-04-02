<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 09:44
 */
interface RpSubmitterDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return RpSubmitter 
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
 	 * @param rpSubmitter primary key
 	 */
	public function delete($id, $batchId);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RpSubmitter rpSubmitter
 	 */
	public function insert($rpSubmitter);
	
	/**
 	 * Update record in table
 	 *
 	 * @param RpSubmitter rpSubmitter
 	 */
	public function update($rpSubmitter);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryBySubmitterName($value);

	public function queryByAddrId($value);

	public function queryByLang1($value);

	public function queryByLang2($value);

	public function queryByLang3($value);

	public function queryByRegisteredRfn($value);

	public function queryByAutoRecId($value);

	public function queryByGedChangeDate($value);

	public function queryByUpdateDatetime($value);


	public function deleteBySubmitterName($value);

	public function deleteByAddrId($value);

	public function deleteByLang1($value);

	public function deleteByLang2($value);

	public function deleteByLang3($value);

	public function deleteByRegisteredRfn($value);

	public function deleteByAutoRecId($value);

	public function deleteByGedChangeDate($value);

	public function deleteByUpdateDatetime($value);


}
?>