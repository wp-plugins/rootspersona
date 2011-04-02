<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 09:44
 */
interface WpPostsDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return WpPosts 
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
 	 * @param wpPost primary key
 	 */
	public function delete($ID);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param WpPosts wpPost
 	 */
	public function insert($wpPost);
	
	/**
 	 * Update record in table
 	 *
 	 * @param WpPosts wpPost
 	 */
	public function update($wpPost);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByPostAuthor($value);

	public function queryByPostDate($value);

	public function queryByPostDateGmt($value);

	public function queryByPostContent($value);

	public function queryByPostTitle($value);

	public function queryByPostExcerpt($value);

	public function queryByPostStatus($value);

	public function queryByCommentStatus($value);

	public function queryByPingStatus($value);

	public function queryByPostPassword($value);

	public function queryByPostName($value);

	public function queryByToPing($value);

	public function queryByPinged($value);

	public function queryByPostModified($value);

	public function queryByPostModifiedGmt($value);

	public function queryByPostContentFiltered($value);

	public function queryByPostParent($value);

	public function queryByGuid($value);

	public function queryByMenuOrder($value);

	public function queryByPostType($value);

	public function queryByPostMimeType($value);

	public function queryByCommentCount($value);


	public function deleteByPostAuthor($value);

	public function deleteByPostDate($value);

	public function deleteByPostDateGmt($value);

	public function deleteByPostContent($value);

	public function deleteByPostTitle($value);

	public function deleteByPostExcerpt($value);

	public function deleteByPostStatus($value);

	public function deleteByCommentStatus($value);

	public function deleteByPingStatus($value);

	public function deleteByPostPassword($value);

	public function deleteByPostName($value);

	public function deleteByToPing($value);

	public function deleteByPinged($value);

	public function deleteByPostModified($value);

	public function deleteByPostModifiedGmt($value);

	public function deleteByPostContentFiltered($value);

	public function deleteByPostParent($value);

	public function deleteByGuid($value);

	public function deleteByMenuOrder($value);

	public function deleteByPostType($value);

	public function deleteByPostMimeType($value);

	public function deleteByCommentCount($value);


}
?>