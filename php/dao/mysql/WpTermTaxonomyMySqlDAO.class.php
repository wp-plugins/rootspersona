<?php
/**
 * Class that operate on table 'wp_term_taxonomy'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 09:44
 */
class WpTermTaxonomyMySqlDAO implements WpTermTaxonomyDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return WpTermTaxonomyMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM wp_term_taxonomy WHERE term_taxonomy_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM wp_term_taxonomy';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM wp_term_taxonomy ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param wpTermTaxonomy primary key
 	 */
	public function delete($term_taxonomy_id){
		$sql = 'DELETE FROM wp_term_taxonomy WHERE term_taxonomy_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($term_taxonomy_id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param WpTermTaxonomyMySql wpTermTaxonomy
 	 */
	public function insert($wpTermTaxonomy){
		$sql = 'INSERT INTO wp_term_taxonomy (term_id, taxonomy, description, parent, count) VALUES (?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($wpTermTaxonomy->termId);
		$sqlQuery->set($wpTermTaxonomy->taxonomy);
		$sqlQuery->set($wpTermTaxonomy->description);
		$sqlQuery->set($wpTermTaxonomy->parent);
		$sqlQuery->set($wpTermTaxonomy->count);

		$id = $this->executeInsert($sqlQuery);	
		$wpTermTaxonomy->termTaxonomyId = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param WpTermTaxonomyMySql wpTermTaxonomy
 	 */
	public function update($wpTermTaxonomy){
		$sql = 'UPDATE wp_term_taxonomy SET term_id = ?, taxonomy = ?, description = ?, parent = ?, count = ? WHERE term_taxonomy_id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($wpTermTaxonomy->termId);
		$sqlQuery->set($wpTermTaxonomy->taxonomy);
		$sqlQuery->set($wpTermTaxonomy->description);
		$sqlQuery->set($wpTermTaxonomy->parent);
		$sqlQuery->set($wpTermTaxonomy->count);

		$sqlQuery->set($wpTermTaxonomy->termTaxonomyId);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM wp_term_taxonomy';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByTermId($value){
		$sql = 'SELECT * FROM wp_term_taxonomy WHERE term_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTaxonomy($value){
		$sql = 'SELECT * FROM wp_term_taxonomy WHERE taxonomy = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDescription($value){
		$sql = 'SELECT * FROM wp_term_taxonomy WHERE description = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByParent($value){
		$sql = 'SELECT * FROM wp_term_taxonomy WHERE parent = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCount($value){
		$sql = 'SELECT * FROM wp_term_taxonomy WHERE count = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByTermId($value){
		$sql = 'DELETE FROM wp_term_taxonomy WHERE term_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTaxonomy($value){
		$sql = 'DELETE FROM wp_term_taxonomy WHERE taxonomy = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDescription($value){
		$sql = 'DELETE FROM wp_term_taxonomy WHERE description = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByParent($value){
		$sql = 'DELETE FROM wp_term_taxonomy WHERE parent = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCount($value){
		$sql = 'DELETE FROM wp_term_taxonomy WHERE count = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return WpTermTaxonomyMySql 
	 */
	protected function readRow($row){
		$wpTermTaxonomy = new WpTermTaxonomy();
		
		$wpTermTaxonomy->termTaxonomyId = $row['term_taxonomy_id'];
		$wpTermTaxonomy->termId = $row['term_id'];
		$wpTermTaxonomy->taxonomy = $row['taxonomy'];
		$wpTermTaxonomy->description = $row['description'];
		$wpTermTaxonomy->parent = $row['parent'];
		$wpTermTaxonomy->count = $row['count'];

		return $wpTermTaxonomy;
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
	 * @return WpTermTaxonomyMySql 
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