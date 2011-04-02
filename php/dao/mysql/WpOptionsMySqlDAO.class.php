<?php
/**
 * Class that operate on table 'wp_options'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 09:44
 */
class WpOptionsMySqlDAO implements WpOptionsDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return WpOptionsMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM wp_options WHERE option_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM wp_options';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM wp_options ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param wpOption primary key
 	 */
	public function delete($option_id){
		$sql = 'DELETE FROM wp_options WHERE option_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($option_id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param WpOptionsMySql wpOption
 	 */
	public function insert($wpOption){
		$sql = 'INSERT INTO wp_options (blog_id, option_name, option_value, autoload) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($wpOption->blogId);
		$sqlQuery->set($wpOption->optionName);
		$sqlQuery->set($wpOption->optionValue);
		$sqlQuery->set($wpOption->autoload);

		$id = $this->executeInsert($sqlQuery);	
		$wpOption->optionId = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param WpOptionsMySql wpOption
 	 */
	public function update($wpOption){
		$sql = 'UPDATE wp_options SET blog_id = ?, option_name = ?, option_value = ?, autoload = ? WHERE option_id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($wpOption->blogId);
		$sqlQuery->set($wpOption->optionName);
		$sqlQuery->set($wpOption->optionValue);
		$sqlQuery->set($wpOption->autoload);

		$sqlQuery->set($wpOption->optionId);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM wp_options';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByBlogId($value){
		$sql = 'SELECT * FROM wp_options WHERE blog_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByOptionName($value){
		$sql = 'SELECT * FROM wp_options WHERE option_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByOptionValue($value){
		$sql = 'SELECT * FROM wp_options WHERE option_value = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAutoload($value){
		$sql = 'SELECT * FROM wp_options WHERE autoload = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByBlogId($value){
		$sql = 'DELETE FROM wp_options WHERE blog_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByOptionName($value){
		$sql = 'DELETE FROM wp_options WHERE option_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByOptionValue($value){
		$sql = 'DELETE FROM wp_options WHERE option_value = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAutoload($value){
		$sql = 'DELETE FROM wp_options WHERE autoload = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return WpOptionsMySql 
	 */
	protected function readRow($row){
		$wpOption = new WpOption();
		
		$wpOption->optionId = $row['option_id'];
		$wpOption->blogId = $row['blog_id'];
		$wpOption->optionName = $row['option_name'];
		$wpOption->optionValue = $row['option_value'];
		$wpOption->autoload = $row['autoload'];

		return $wpOption;
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
	 * @return WpOptionsMySql 
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