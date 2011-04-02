<?php
/**
 * Class that operate on table 'wp_terms'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 09:44
 */
class WpTermsMySqlDAO implements WpTermsDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return WpTermsMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM wp_terms WHERE term_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM wp_terms';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM wp_terms ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param wpTerm primary key
 	 */
	public function delete($term_id){
		$sql = 'DELETE FROM wp_terms WHERE term_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($term_id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param WpTermsMySql wpTerm
 	 */
	public function insert($wpTerm){
		$sql = 'INSERT INTO wp_terms (name, slug, term_group) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($wpTerm->name);
		$sqlQuery->set($wpTerm->slug);
		$sqlQuery->set($wpTerm->termGroup);

		$id = $this->executeInsert($sqlQuery);	
		$wpTerm->termId = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param WpTermsMySql wpTerm
 	 */
	public function update($wpTerm){
		$sql = 'UPDATE wp_terms SET name = ?, slug = ?, term_group = ? WHERE term_id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($wpTerm->name);
		$sqlQuery->set($wpTerm->slug);
		$sqlQuery->set($wpTerm->termGroup);

		$sqlQuery->set($wpTerm->termId);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM wp_terms';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByName($value){
		$sql = 'SELECT * FROM wp_terms WHERE name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySlug($value){
		$sql = 'SELECT * FROM wp_terms WHERE slug = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTermGroup($value){
		$sql = 'SELECT * FROM wp_terms WHERE term_group = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByName($value){
		$sql = 'DELETE FROM wp_terms WHERE name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySlug($value){
		$sql = 'DELETE FROM wp_terms WHERE slug = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTermGroup($value){
		$sql = 'DELETE FROM wp_terms WHERE term_group = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return WpTermsMySql 
	 */
	protected function readRow($row){
		$wpTerm = new WpTerm();
		
		$wpTerm->termId = $row['term_id'];
		$wpTerm->name = $row['name'];
		$wpTerm->slug = $row['slug'];
		$wpTerm->termGroup = $row['term_group'];

		return $wpTerm;
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
	 * @return WpTermsMySql 
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