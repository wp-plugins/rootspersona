<?php
/**
 * Class that operate on table 'wp_commentmeta'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 09:44
 */
class WpCommentmetaMySqlDAO implements WpCommentmetaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return WpCommentmetaMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM wp_commentmeta WHERE meta_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM wp_commentmeta';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM wp_commentmeta ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param wpCommentmeta primary key
 	 */
	public function delete($meta_id){
		$sql = 'DELETE FROM wp_commentmeta WHERE meta_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($meta_id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param WpCommentmetaMySql wpCommentmeta
 	 */
	public function insert($wpCommentmeta){
		$sql = 'INSERT INTO wp_commentmeta (comment_id, meta_key, meta_value) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($wpCommentmeta->commentId);
		$sqlQuery->set($wpCommentmeta->metaKey);
		$sqlQuery->set($wpCommentmeta->metaValue);

		$id = $this->executeInsert($sqlQuery);	
		$wpCommentmeta->metaId = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param WpCommentmetaMySql wpCommentmeta
 	 */
	public function update($wpCommentmeta){
		$sql = 'UPDATE wp_commentmeta SET comment_id = ?, meta_key = ?, meta_value = ? WHERE meta_id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($wpCommentmeta->commentId);
		$sqlQuery->set($wpCommentmeta->metaKey);
		$sqlQuery->set($wpCommentmeta->metaValue);

		$sqlQuery->set($wpCommentmeta->metaId);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM wp_commentmeta';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByCommentId($value){
		$sql = 'SELECT * FROM wp_commentmeta WHERE comment_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMetaKey($value){
		$sql = 'SELECT * FROM wp_commentmeta WHERE meta_key = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMetaValue($value){
		$sql = 'SELECT * FROM wp_commentmeta WHERE meta_value = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByCommentId($value){
		$sql = 'DELETE FROM wp_commentmeta WHERE comment_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMetaKey($value){
		$sql = 'DELETE FROM wp_commentmeta WHERE meta_key = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMetaValue($value){
		$sql = 'DELETE FROM wp_commentmeta WHERE meta_value = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return WpCommentmetaMySql 
	 */
	protected function readRow($row){
		$wpCommentmeta = new WpCommentmeta();
		
		$wpCommentmeta->metaId = $row['meta_id'];
		$wpCommentmeta->commentId = $row['comment_id'];
		$wpCommentmeta->metaKey = $row['meta_key'];
		$wpCommentmeta->metaValue = $row['meta_value'];

		return $wpCommentmeta;
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
	 * @return WpCommentmetaMySql 
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