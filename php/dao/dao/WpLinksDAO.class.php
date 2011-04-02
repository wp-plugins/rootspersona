<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 09:44
 */
interface WpLinksDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return WpLinks 
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
 	 * @param wpLink primary key
 	 */
	public function delete($link_id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param WpLinks wpLink
 	 */
	public function insert($wpLink);
	
	/**
 	 * Update record in table
 	 *
 	 * @param WpLinks wpLink
 	 */
	public function update($wpLink);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByLinkUrl($value);

	public function queryByLinkName($value);

	public function queryByLinkImage($value);

	public function queryByLinkTarget($value);

	public function queryByLinkDescription($value);

	public function queryByLinkVisible($value);

	public function queryByLinkOwner($value);

	public function queryByLinkRating($value);

	public function queryByLinkUpdated($value);

	public function queryByLinkRel($value);

	public function queryByLinkNotes($value);

	public function queryByLinkRss($value);


	public function deleteByLinkUrl($value);

	public function deleteByLinkName($value);

	public function deleteByLinkImage($value);

	public function deleteByLinkTarget($value);

	public function deleteByLinkDescription($value);

	public function deleteByLinkVisible($value);

	public function deleteByLinkOwner($value);

	public function deleteByLinkRating($value);

	public function deleteByLinkUpdated($value);

	public function deleteByLinkRel($value);

	public function deleteByLinkNotes($value);

	public function deleteByLinkRss($value);


}
?>