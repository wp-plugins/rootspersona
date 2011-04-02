<?php
/**
 * Class that operate on table 'wp_comments'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 09:44
 */
class WpCommentsMySqlDAO implements WpCommentsDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return WpCommentsMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM wp_comments WHERE comment_ID = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM wp_comments';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM wp_comments ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param wpComment primary key
 	 */
	public function delete($comment_ID){
		$sql = 'DELETE FROM wp_comments WHERE comment_ID = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($comment_ID);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param WpCommentsMySql wpComment
 	 */
	public function insert($wpComment){
		$sql = 'INSERT INTO wp_comments (comment_post_ID, comment_author, comment_author_email, comment_author_url, comment_author_IP, comment_date, comment_date_gmt, comment_content, comment_karma, comment_approved, comment_agent, comment_type, comment_parent, user_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($wpComment->commentPostID);
		$sqlQuery->set($wpComment->commentAuthor);
		$sqlQuery->set($wpComment->commentAuthorEmail);
		$sqlQuery->set($wpComment->commentAuthorUrl);
		$sqlQuery->set($wpComment->commentAuthorIP);
		$sqlQuery->set($wpComment->commentDate);
		$sqlQuery->set($wpComment->commentDateGmt);
		$sqlQuery->set($wpComment->commentContent);
		$sqlQuery->setNumber($wpComment->commentKarma);
		$sqlQuery->set($wpComment->commentApproved);
		$sqlQuery->set($wpComment->commentAgent);
		$sqlQuery->set($wpComment->commentType);
		$sqlQuery->set($wpComment->commentParent);
		$sqlQuery->set($wpComment->userId);

		$id = $this->executeInsert($sqlQuery);	
		$wpComment->commentID = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param WpCommentsMySql wpComment
 	 */
	public function update($wpComment){
		$sql = 'UPDATE wp_comments SET comment_post_ID = ?, comment_author = ?, comment_author_email = ?, comment_author_url = ?, comment_author_IP = ?, comment_date = ?, comment_date_gmt = ?, comment_content = ?, comment_karma = ?, comment_approved = ?, comment_agent = ?, comment_type = ?, comment_parent = ?, user_id = ? WHERE comment_ID = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($wpComment->commentPostID);
		$sqlQuery->set($wpComment->commentAuthor);
		$sqlQuery->set($wpComment->commentAuthorEmail);
		$sqlQuery->set($wpComment->commentAuthorUrl);
		$sqlQuery->set($wpComment->commentAuthorIP);
		$sqlQuery->set($wpComment->commentDate);
		$sqlQuery->set($wpComment->commentDateGmt);
		$sqlQuery->set($wpComment->commentContent);
		$sqlQuery->setNumber($wpComment->commentKarma);
		$sqlQuery->set($wpComment->commentApproved);
		$sqlQuery->set($wpComment->commentAgent);
		$sqlQuery->set($wpComment->commentType);
		$sqlQuery->set($wpComment->commentParent);
		$sqlQuery->set($wpComment->userId);

		$sqlQuery->set($wpComment->commentID);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM wp_comments';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByCommentPostID($value){
		$sql = 'SELECT * FROM wp_comments WHERE comment_post_ID = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCommentAuthor($value){
		$sql = 'SELECT * FROM wp_comments WHERE comment_author = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCommentAuthorEmail($value){
		$sql = 'SELECT * FROM wp_comments WHERE comment_author_email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCommentAuthorUrl($value){
		$sql = 'SELECT * FROM wp_comments WHERE comment_author_url = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCommentAuthorIP($value){
		$sql = 'SELECT * FROM wp_comments WHERE comment_author_IP = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCommentDate($value){
		$sql = 'SELECT * FROM wp_comments WHERE comment_date = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCommentDateGmt($value){
		$sql = 'SELECT * FROM wp_comments WHERE comment_date_gmt = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCommentContent($value){
		$sql = 'SELECT * FROM wp_comments WHERE comment_content = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCommentKarma($value){
		$sql = 'SELECT * FROM wp_comments WHERE comment_karma = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCommentApproved($value){
		$sql = 'SELECT * FROM wp_comments WHERE comment_approved = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCommentAgent($value){
		$sql = 'SELECT * FROM wp_comments WHERE comment_agent = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCommentType($value){
		$sql = 'SELECT * FROM wp_comments WHERE comment_type = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCommentParent($value){
		$sql = 'SELECT * FROM wp_comments WHERE comment_parent = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUserId($value){
		$sql = 'SELECT * FROM wp_comments WHERE user_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByCommentPostID($value){
		$sql = 'DELETE FROM wp_comments WHERE comment_post_ID = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCommentAuthor($value){
		$sql = 'DELETE FROM wp_comments WHERE comment_author = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCommentAuthorEmail($value){
		$sql = 'DELETE FROM wp_comments WHERE comment_author_email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCommentAuthorUrl($value){
		$sql = 'DELETE FROM wp_comments WHERE comment_author_url = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCommentAuthorIP($value){
		$sql = 'DELETE FROM wp_comments WHERE comment_author_IP = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCommentDate($value){
		$sql = 'DELETE FROM wp_comments WHERE comment_date = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCommentDateGmt($value){
		$sql = 'DELETE FROM wp_comments WHERE comment_date_gmt = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCommentContent($value){
		$sql = 'DELETE FROM wp_comments WHERE comment_content = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCommentKarma($value){
		$sql = 'DELETE FROM wp_comments WHERE comment_karma = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCommentApproved($value){
		$sql = 'DELETE FROM wp_comments WHERE comment_approved = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCommentAgent($value){
		$sql = 'DELETE FROM wp_comments WHERE comment_agent = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCommentType($value){
		$sql = 'DELETE FROM wp_comments WHERE comment_type = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCommentParent($value){
		$sql = 'DELETE FROM wp_comments WHERE comment_parent = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUserId($value){
		$sql = 'DELETE FROM wp_comments WHERE user_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return WpCommentsMySql 
	 */
	protected function readRow($row){
		$wpComment = new WpComment();
		
		$wpComment->commentID = $row['comment_ID'];
		$wpComment->commentPostID = $row['comment_post_ID'];
		$wpComment->commentAuthor = $row['comment_author'];
		$wpComment->commentAuthorEmail = $row['comment_author_email'];
		$wpComment->commentAuthorUrl = $row['comment_author_url'];
		$wpComment->commentAuthorIP = $row['comment_author_IP'];
		$wpComment->commentDate = $row['comment_date'];
		$wpComment->commentDateGmt = $row['comment_date_gmt'];
		$wpComment->commentContent = $row['comment_content'];
		$wpComment->commentKarma = $row['comment_karma'];
		$wpComment->commentApproved = $row['comment_approved'];
		$wpComment->commentAgent = $row['comment_agent'];
		$wpComment->commentType = $row['comment_type'];
		$wpComment->commentParent = $row['comment_parent'];
		$wpComment->userId = $row['user_id'];

		return $wpComment;
	}
	
	protected function getList($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		$ret = array();
		for($i=0;$i<count($tab);$i++){
			$ret[$i] = $this->readRow($tab[$i]);
		}
		return $ret;
	}
	
	/**
	 * Get row
	 *
	 * @return WpCommentsMySql 
	 */
	protected function getRow($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		if(count($tab)==0){
			return null;
		}
		return $this->readRow($tab[0]);		
	}
	
	/**
	 * Execute sql query
	 */
	protected function execute($sqlQuery){
		return QueryExecutor::execute($sqlQuery);
	}
	
		
	/**
	 * Execute sql query
	 */
	protected function executeUpdate($sqlQuery){
		return QueryExecutor::executeUpdate($sqlQuery);
	}

	/**
	 * Query for one row and one column
	 */
	protected function querySingleResult($sqlQuery){
		return QueryExecutor::queryForString($sqlQuery);
	}

	/**
	 * Insert row to table
	 */
	protected function executeInsert($sqlQuery){
		return QueryExecutor::executeInsert($sqlQuery);
	}
}
?>