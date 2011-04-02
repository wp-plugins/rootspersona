<?php
/**
 * Class that operate on table 'wp_posts'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 09:44
 */
class WpPostsMySqlDAO implements WpPostsDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return WpPostsMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM wp_posts WHERE ID = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM wp_posts';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM wp_posts ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param wpPost primary key
 	 */
	public function delete($ID){
		$sql = 'DELETE FROM wp_posts WHERE ID = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($ID);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param WpPostsMySql wpPost
 	 */
	public function insert($wpPost){
		$sql = 'INSERT INTO wp_posts (post_author, post_date, post_date_gmt, post_content, post_title, post_excerpt, post_status, comment_status, ping_status, post_password, post_name, to_ping, pinged, post_modified, post_modified_gmt, post_content_filtered, post_parent, guid, menu_order, post_type, post_mime_type, comment_count) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($wpPost->postAuthor);
		$sqlQuery->set($wpPost->postDate);
		$sqlQuery->set($wpPost->postDateGmt);
		$sqlQuery->set($wpPost->postContent);
		$sqlQuery->set($wpPost->postTitle);
		$sqlQuery->set($wpPost->postExcerpt);
		$sqlQuery->set($wpPost->postStatus);
		$sqlQuery->set($wpPost->commentStatus);
		$sqlQuery->set($wpPost->pingStatus);
		$sqlQuery->set($wpPost->postPassword);
		$sqlQuery->set($wpPost->postName);
		$sqlQuery->set($wpPost->toPing);
		$sqlQuery->set($wpPost->pinged);
		$sqlQuery->set($wpPost->postModified);
		$sqlQuery->set($wpPost->postModifiedGmt);
		$sqlQuery->set($wpPost->postContentFiltered);
		$sqlQuery->set($wpPost->postParent);
		$sqlQuery->set($wpPost->guid);
		$sqlQuery->setNumber($wpPost->menuOrder);
		$sqlQuery->set($wpPost->postType);
		$sqlQuery->set($wpPost->postMimeType);
		$sqlQuery->set($wpPost->commentCount);

		$id = $this->executeInsert($sqlQuery);	
		$wpPost->iD = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param WpPostsMySql wpPost
 	 */
	public function update($wpPost){
		$sql = 'UPDATE wp_posts SET post_author = ?, post_date = ?, post_date_gmt = ?, post_content = ?, post_title = ?, post_excerpt = ?, post_status = ?, comment_status = ?, ping_status = ?, post_password = ?, post_name = ?, to_ping = ?, pinged = ?, post_modified = ?, post_modified_gmt = ?, post_content_filtered = ?, post_parent = ?, guid = ?, menu_order = ?, post_type = ?, post_mime_type = ?, comment_count = ? WHERE ID = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($wpPost->postAuthor);
		$sqlQuery->set($wpPost->postDate);
		$sqlQuery->set($wpPost->postDateGmt);
		$sqlQuery->set($wpPost->postContent);
		$sqlQuery->set($wpPost->postTitle);
		$sqlQuery->set($wpPost->postExcerpt);
		$sqlQuery->set($wpPost->postStatus);
		$sqlQuery->set($wpPost->commentStatus);
		$sqlQuery->set($wpPost->pingStatus);
		$sqlQuery->set($wpPost->postPassword);
		$sqlQuery->set($wpPost->postName);
		$sqlQuery->set($wpPost->toPing);
		$sqlQuery->set($wpPost->pinged);
		$sqlQuery->set($wpPost->postModified);
		$sqlQuery->set($wpPost->postModifiedGmt);
		$sqlQuery->set($wpPost->postContentFiltered);
		$sqlQuery->set($wpPost->postParent);
		$sqlQuery->set($wpPost->guid);
		$sqlQuery->setNumber($wpPost->menuOrder);
		$sqlQuery->set($wpPost->postType);
		$sqlQuery->set($wpPost->postMimeType);
		$sqlQuery->set($wpPost->commentCount);

		$sqlQuery->set($wpPost->iD);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM wp_posts';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByPostAuthor($value){
		$sql = 'SELECT * FROM wp_posts WHERE post_author = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPostDate($value){
		$sql = 'SELECT * FROM wp_posts WHERE post_date = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPostDateGmt($value){
		$sql = 'SELECT * FROM wp_posts WHERE post_date_gmt = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPostContent($value){
		$sql = 'SELECT * FROM wp_posts WHERE post_content = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPostTitle($value){
		$sql = 'SELECT * FROM wp_posts WHERE post_title = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPostExcerpt($value){
		$sql = 'SELECT * FROM wp_posts WHERE post_excerpt = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPostStatus($value){
		$sql = 'SELECT * FROM wp_posts WHERE post_status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCommentStatus($value){
		$sql = 'SELECT * FROM wp_posts WHERE comment_status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPingStatus($value){
		$sql = 'SELECT * FROM wp_posts WHERE ping_status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPostPassword($value){
		$sql = 'SELECT * FROM wp_posts WHERE post_password = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPostName($value){
		$sql = 'SELECT * FROM wp_posts WHERE post_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByToPing($value){
		$sql = 'SELECT * FROM wp_posts WHERE to_ping = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPinged($value){
		$sql = 'SELECT * FROM wp_posts WHERE pinged = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPostModified($value){
		$sql = 'SELECT * FROM wp_posts WHERE post_modified = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPostModifiedGmt($value){
		$sql = 'SELECT * FROM wp_posts WHERE post_modified_gmt = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPostContentFiltered($value){
		$sql = 'SELECT * FROM wp_posts WHERE post_content_filtered = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPostParent($value){
		$sql = 'SELECT * FROM wp_posts WHERE post_parent = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByGuid($value){
		$sql = 'SELECT * FROM wp_posts WHERE guid = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMenuOrder($value){
		$sql = 'SELECT * FROM wp_posts WHERE menu_order = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPostType($value){
		$sql = 'SELECT * FROM wp_posts WHERE post_type = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPostMimeType($value){
		$sql = 'SELECT * FROM wp_posts WHERE post_mime_type = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCommentCount($value){
		$sql = 'SELECT * FROM wp_posts WHERE comment_count = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByPostAuthor($value){
		$sql = 'DELETE FROM wp_posts WHERE post_author = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPostDate($value){
		$sql = 'DELETE FROM wp_posts WHERE post_date = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPostDateGmt($value){
		$sql = 'DELETE FROM wp_posts WHERE post_date_gmt = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPostContent($value){
		$sql = 'DELETE FROM wp_posts WHERE post_content = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPostTitle($value){
		$sql = 'DELETE FROM wp_posts WHERE post_title = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPostExcerpt($value){
		$sql = 'DELETE FROM wp_posts WHERE post_excerpt = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPostStatus($value){
		$sql = 'DELETE FROM wp_posts WHERE post_status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCommentStatus($value){
		$sql = 'DELETE FROM wp_posts WHERE comment_status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPingStatus($value){
		$sql = 'DELETE FROM wp_posts WHERE ping_status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPostPassword($value){
		$sql = 'DELETE FROM wp_posts WHERE post_password = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPostName($value){
		$sql = 'DELETE FROM wp_posts WHERE post_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByToPing($value){
		$sql = 'DELETE FROM wp_posts WHERE to_ping = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPinged($value){
		$sql = 'DELETE FROM wp_posts WHERE pinged = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPostModified($value){
		$sql = 'DELETE FROM wp_posts WHERE post_modified = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPostModifiedGmt($value){
		$sql = 'DELETE FROM wp_posts WHERE post_modified_gmt = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPostContentFiltered($value){
		$sql = 'DELETE FROM wp_posts WHERE post_content_filtered = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPostParent($value){
		$sql = 'DELETE FROM wp_posts WHERE post_parent = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByGuid($value){
		$sql = 'DELETE FROM wp_posts WHERE guid = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMenuOrder($value){
		$sql = 'DELETE FROM wp_posts WHERE menu_order = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPostType($value){
		$sql = 'DELETE FROM wp_posts WHERE post_type = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPostMimeType($value){
		$sql = 'DELETE FROM wp_posts WHERE post_mime_type = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCommentCount($value){
		$sql = 'DELETE FROM wp_posts WHERE comment_count = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return WpPostsMySql 
	 */
	protected function readRow($row){
		$wpPost = new WpPost();
		
		$wpPost->iD = $row['ID'];
		$wpPost->postAuthor = $row['post_author'];
		$wpPost->postDate = $row['post_date'];
		$wpPost->postDateGmt = $row['post_date_gmt'];
		$wpPost->postContent = $row['post_content'];
		$wpPost->postTitle = $row['post_title'];
		$wpPost->postExcerpt = $row['post_excerpt'];
		$wpPost->postStatus = $row['post_status'];
		$wpPost->commentStatus = $row['comment_status'];
		$wpPost->pingStatus = $row['ping_status'];
		$wpPost->postPassword = $row['post_password'];
		$wpPost->postName = $row['post_name'];
		$wpPost->toPing = $row['to_ping'];
		$wpPost->pinged = $row['pinged'];
		$wpPost->postModified = $row['post_modified'];
		$wpPost->postModifiedGmt = $row['post_modified_gmt'];
		$wpPost->postContentFiltered = $row['post_content_filtered'];
		$wpPost->postParent = $row['post_parent'];
		$wpPost->guid = $row['guid'];
		$wpPost->menuOrder = $row['menu_order'];
		$wpPost->postType = $row['post_type'];
		$wpPost->postMimeType = $row['post_mime_type'];
		$wpPost->commentCount = $row['comment_count'];

		return $wpPost;
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
	 * @return WpPostsMySql 
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