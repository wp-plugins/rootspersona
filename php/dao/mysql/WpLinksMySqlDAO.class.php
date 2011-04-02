<?php
/**
 * Class that operate on table 'wp_links'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 09:44
 */
class WpLinksMySqlDAO implements WpLinksDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return WpLinksMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM wp_links WHERE link_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM wp_links';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM wp_links ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param wpLink primary key
 	 */
	public function delete($link_id){
		$sql = 'DELETE FROM wp_links WHERE link_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($link_id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param WpLinksMySql wpLink
 	 */
	public function insert($wpLink){
		$sql = 'INSERT INTO wp_links (link_url, link_name, link_image, link_target, link_description, link_visible, link_owner, link_rating, link_updated, link_rel, link_notes, link_rss) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($wpLink->linkUrl);
		$sqlQuery->set($wpLink->linkName);
		$sqlQuery->set($wpLink->linkImage);
		$sqlQuery->set($wpLink->linkTarget);
		$sqlQuery->set($wpLink->linkDescription);
		$sqlQuery->set($wpLink->linkVisible);
		$sqlQuery->set($wpLink->linkOwner);
		$sqlQuery->setNumber($wpLink->linkRating);
		$sqlQuery->set($wpLink->linkUpdated);
		$sqlQuery->set($wpLink->linkRel);
		$sqlQuery->set($wpLink->linkNotes);
		$sqlQuery->set($wpLink->linkRss);

		$id = $this->executeInsert($sqlQuery);	
		$wpLink->linkId = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param WpLinksMySql wpLink
 	 */
	public function update($wpLink){
		$sql = 'UPDATE wp_links SET link_url = ?, link_name = ?, link_image = ?, link_target = ?, link_description = ?, link_visible = ?, link_owner = ?, link_rating = ?, link_updated = ?, link_rel = ?, link_notes = ?, link_rss = ? WHERE link_id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($wpLink->linkUrl);
		$sqlQuery->set($wpLink->linkName);
		$sqlQuery->set($wpLink->linkImage);
		$sqlQuery->set($wpLink->linkTarget);
		$sqlQuery->set($wpLink->linkDescription);
		$sqlQuery->set($wpLink->linkVisible);
		$sqlQuery->set($wpLink->linkOwner);
		$sqlQuery->setNumber($wpLink->linkRating);
		$sqlQuery->set($wpLink->linkUpdated);
		$sqlQuery->set($wpLink->linkRel);
		$sqlQuery->set($wpLink->linkNotes);
		$sqlQuery->set($wpLink->linkRss);

		$sqlQuery->set($wpLink->linkId);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM wp_links';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByLinkUrl($value){
		$sql = 'SELECT * FROM wp_links WHERE link_url = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLinkName($value){
		$sql = 'SELECT * FROM wp_links WHERE link_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLinkImage($value){
		$sql = 'SELECT * FROM wp_links WHERE link_image = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLinkTarget($value){
		$sql = 'SELECT * FROM wp_links WHERE link_target = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLinkDescription($value){
		$sql = 'SELECT * FROM wp_links WHERE link_description = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLinkVisible($value){
		$sql = 'SELECT * FROM wp_links WHERE link_visible = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLinkOwner($value){
		$sql = 'SELECT * FROM wp_links WHERE link_owner = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLinkRating($value){
		$sql = 'SELECT * FROM wp_links WHERE link_rating = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLinkUpdated($value){
		$sql = 'SELECT * FROM wp_links WHERE link_updated = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLinkRel($value){
		$sql = 'SELECT * FROM wp_links WHERE link_rel = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLinkNotes($value){
		$sql = 'SELECT * FROM wp_links WHERE link_notes = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLinkRss($value){
		$sql = 'SELECT * FROM wp_links WHERE link_rss = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByLinkUrl($value){
		$sql = 'DELETE FROM wp_links WHERE link_url = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLinkName($value){
		$sql = 'DELETE FROM wp_links WHERE link_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLinkImage($value){
		$sql = 'DELETE FROM wp_links WHERE link_image = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLinkTarget($value){
		$sql = 'DELETE FROM wp_links WHERE link_target = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLinkDescription($value){
		$sql = 'DELETE FROM wp_links WHERE link_description = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLinkVisible($value){
		$sql = 'DELETE FROM wp_links WHERE link_visible = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLinkOwner($value){
		$sql = 'DELETE FROM wp_links WHERE link_owner = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLinkRating($value){
		$sql = 'DELETE FROM wp_links WHERE link_rating = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLinkUpdated($value){
		$sql = 'DELETE FROM wp_links WHERE link_updated = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLinkRel($value){
		$sql = 'DELETE FROM wp_links WHERE link_rel = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLinkNotes($value){
		$sql = 'DELETE FROM wp_links WHERE link_notes = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLinkRss($value){
		$sql = 'DELETE FROM wp_links WHERE link_rss = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return WpLinksMySql 
	 */
	protected function readRow($row){
		$wpLink = new WpLink();
		
		$wpLink->linkId = $row['link_id'];
		$wpLink->linkUrl = $row['link_url'];
		$wpLink->linkName = $row['link_name'];
		$wpLink->linkImage = $row['link_image'];
		$wpLink->linkTarget = $row['link_target'];
		$wpLink->linkDescription = $row['link_description'];
		$wpLink->linkVisible = $row['link_visible'];
		$wpLink->linkOwner = $row['link_owner'];
		$wpLink->linkRating = $row['link_rating'];
		$wpLink->linkUpdated = $row['link_updated'];
		$wpLink->linkRel = $row['link_rel'];
		$wpLink->linkNotes = $row['link_notes'];
		$wpLink->linkRss = $row['link_rss'];

		return $wpLink;
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
	 * @return WpLinksMySql 
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