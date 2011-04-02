<?php
/**
 * Class that operate on table 'wp_usermeta'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 09:44
 */
class WpUsermetaMySqlDAO implements WpUsermetaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return WpUsermetaMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM wp_usermeta WHERE umeta_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM wp_usermeta';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM wp_usermeta ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param wpUsermeta primary key
 	 */
	public function delete($umeta_id){
		$sql = 'DELETE FROM wp_usermeta WHERE umeta_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($umeta_id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param WpUsermetaMySql wpUsermeta
 	 */
	public function insert($wpUsermeta){
		$sql = 'INSERT INTO wp_usermeta (user_id, meta_key, meta_value) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($wpUsermeta->userId);
		$sqlQuery->set($wpUsermeta->metaKey);
		$sqlQuery->set($wpUsermeta->metaValue);

		$id = $this->executeInsert($sqlQuery);	
		$wpUsermeta->umetaId = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param WpUsermetaMySql wpUsermeta
 	 */
	public function update($wpUsermeta){
		$sql = 'UPDATE wp_usermeta SET user_id = ?, meta_key = ?, meta_value = ? WHERE umeta_id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($wpUsermeta->userId);
		$sqlQuery->set($wpUsermeta->metaKey);
		$sqlQuery->set($wpUsermeta->metaValue);

		$sqlQuery->set($wpUsermeta->umetaId);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM wp_usermeta';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByUserId($value){
		$sql = 'SELECT * FROM wp_usermeta WHERE user_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMetaKey($value){
		$sql = 'SELECT * FROM wp_usermeta WHERE meta_key = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMetaValue($value){
		$sql = 'SELECT * FROM wp_usermeta WHERE meta_value = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByUserId($value){
		$sql = 'DELETE FROM wp_usermeta WHERE user_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMetaKey($value){
		$sql = 'DELETE FROM wp_usermeta WHERE meta_key = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMetaValue($value){
		$sql = 'DELETE FROM wp_usermeta WHERE meta_value = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return WpUsermetaMySql 
	 */
	protected function readRow($row){
		$wpUsermeta = new WpUsermeta();
		
		$wpUsermeta->umetaId = $row['umeta_id'];
		$wpUsermeta->userId = $row['user_id'];
		$wpUsermeta->metaKey = $row['meta_key'];
		$wpUsermeta->metaValue = $row['meta_value'];

		return $wpUsermeta;
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
	 * @return WpUsermetaMySql 
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