<?php
/**
 * Class that operate on table 'wp_postmeta'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 09:44
 */
class WpPostmetaMySqlDAO implements WpPostmetaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return WpPostmetaMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM wp_postmeta WHERE meta_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM wp_postmeta';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM wp_postmeta ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param wpPostmeta primary key
 	 */
	public function delete($meta_id){
		$sql = 'DELETE FROM wp_postmeta WHERE meta_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($meta_id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param WpPostmetaMySql wpPostmeta
 	 */
	public function insert($wpPostmeta){
		$sql = 'INSERT INTO wp_postmeta (post_id, meta_key, meta_value) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($wpPostmeta->postId);
		$sqlQuery->set($wpPostmeta->metaKey);
		$sqlQuery->set($wpPostmeta->metaValue);

		$id = $this->executeInsert($sqlQuery);	
		$wpPostmeta->metaId = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param WpPostmetaMySql wpPostmeta
 	 */
	public function update($wpPostmeta){
		$sql = 'UPDATE wp_postmeta SET post_id = ?, meta_key = ?, meta_value = ? WHERE meta_id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($wpPostmeta->postId);
		$sqlQuery->set($wpPostmeta->metaKey);
		$sqlQuery->set($wpPostmeta->metaValue);

		$sqlQuery->set($wpPostmeta->metaId);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM wp_postmeta';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByPostId($value){
		$sql = 'SELECT * FROM wp_postmeta WHERE post_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMetaKey($value){
		$sql = 'SELECT * FROM wp_postmeta WHERE meta_key = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMetaValue($value){
		$sql = 'SELECT * FROM wp_postmeta WHERE meta_value = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByPostId($value){
		$sql = 'DELETE FROM wp_postmeta WHERE post_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMetaKey($value){
		$sql = 'DELETE FROM wp_postmeta WHERE meta_key = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMetaValue($value){
		$sql = 'DELETE FROM wp_postmeta WHERE meta_value = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return WpPostmetaMySql 
	 */
	protected function readRow($row){
		$wpPostmeta = new WpPostmeta();
		
		$wpPostmeta->metaId = $row['meta_id'];
		$wpPostmeta->postId = $row['post_id'];
		$wpPostmeta->metaKey = $row['meta_key'];
		$wpPostmeta->metaValue = $row['meta_value'];

		return $wpPostmeta;
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
	 * @return WpPostmetaMySql 
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