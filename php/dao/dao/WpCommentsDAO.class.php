<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 09:44
 */
interface WpCommentsDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return WpComments 
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
 	 * @param wpComment primary key
 	 */
	public function delete($comment_ID);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param WpComments wpComment
 	 */
	public function insert($wpComment);
	
	/**
 	 * Update record in table
 	 *
 	 * @param WpComments wpComment
 	 */
	public function update($wpComment);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByCommentPostID($value);

	public function queryByCommentAuthor($value);

	public function queryByCommentAuthorEmail($value);

	public function queryByCommentAuthorUrl($value);

	public function queryByCommentAuthorIP($value);

	public function queryByCommentDate($value);

	public function queryByCommentDateGmt($value);

	public function queryByCommentContent($value);

	public function queryByCommentKarma($value);

	public function queryByCommentApproved($value);

	public function queryByCommentAgent($value);

	public function queryByCommentType($value);

	public function queryByCommentParent($value);

	public function queryByUserId($value);


	public function deleteByCommentPostID($value);

	public function deleteByCommentAuthor($value);

	public function deleteByCommentAuthorEmail($value);

	public function deleteByCommentAuthorUrl($value);

	public function deleteByCommentAuthorIP($value);

	public function deleteByCommentDate($value);

	public function deleteByCommentDateGmt($value);

	public function deleteByCommentContent($value);

	public function deleteByCommentKarma($value);

	public function deleteByCommentApproved($value);

	public function deleteByCommentAgent($value);

	public function deleteByCommentType($value);

	public function deleteByCommentParent($value);

	public function deleteByUserId($value);


}
?>