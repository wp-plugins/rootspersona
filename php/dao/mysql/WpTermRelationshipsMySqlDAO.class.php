<?php
/**
 * Class that operate on table 'wp_term_relationships'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 09:44
 */
class WpTermRelationshipsMySqlDAO implements WpTermRelationshipsDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return WpTermRelationshipsMySql 
	 */
	public function load($objectId, $termTaxonomyId){
		$sql = 'SELECT * FROM wp_term_relationships WHERE object_id = ?  AND term_taxonomy_id = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($objectId);
		$sqlQuery->setNumber($termTaxonomyId);

		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM wp_term_relationships';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM wp_term_relationships ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param wpTermRelationship primary key
 	 */
	public function delete($objectId, $termTaxonomyId){
		$sql = 'DELETE FROM wp_term_relationships WHERE object_id = ?  AND term_taxonomy_id = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($objectId);
		$sqlQuery->setNumber($termTaxonomyId);

		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param WpTermRelationshipsMySql wpTermRelationship
 	 */
	public function insert($wpTermRelationship){
		$sql = 'INSERT INTO wp_term_relationships (term_order, object_id, term_taxonomy_id) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($wpTermRelationship->termOrder);

		
		$sqlQuery->setNumber($wpTermRelationship->objectId);

		$sqlQuery->setNumber($wpTermRelationship->termTaxonomyId);

		$this->executeInsert($sqlQuery);	
		//$wpTermRelationship->id = $id;
		//return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param WpTermRelationshipsMySql wpTermRelationship
 	 */
	public function update($wpTermRelationship){
		$sql = 'UPDATE wp_term_relationships SET term_order = ? WHERE object_id = ?  AND term_taxonomy_id = ? ';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($wpTermRelationship->termOrder);

		
		$sqlQuery->setNumber($wpTermRelationship->objectId);

		$sqlQuery->setNumber($wpTermRelationship->termTaxonomyId);

		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM wp_term_relationships';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByTermOrder($value){
		$sql = 'SELECT * FROM wp_term_relationships WHERE term_order = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByTermOrder($value){
		$sql = 'DELETE FROM wp_term_relationships WHERE term_order = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return WpTermRelationshipsMySql 
	 */
	protected function readRow($row){
		$wpTermRelationship = new WpTermRelationship();
		
		$wpTermRelationship->objectId = $row['object_id'];
		$wpTermRelationship->termTaxonomyId = $row['term_taxonomy_id'];
		$wpTermRelationship->termOrder = $row['term_order'];

		return $wpTermRelationship;
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
	 * @return WpTermRelationshipsMySql 
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