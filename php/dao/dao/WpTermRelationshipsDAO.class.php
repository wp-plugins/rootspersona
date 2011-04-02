<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 09:44
 */
interface WpTermRelationshipsDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return WpTermRelationships 
	 */
	public function load($objectId, $termTaxonomyId);

	/**
	 * Get all records from table
	 */
	public function queryAll();
	
	/**
	 * Get all records from table ordered by field
	 * @Param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn);
	
	/**
 	 * Delete record from table
 	 * @param wpTermRelationship primary key
 	 */
	public function delete($objectId, $termTaxonomyId);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param WpTermRelationships wpTermRelationship
 	 */
	public function insert($wpTermRelationship);
	
	/**
 	 * Update record in table
 	 *
 	 * @param WpTermRelationships wpTermRelationship
 	 */
	public function update($wpTermRelationship);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByTermOrder($value);


	public function deleteByTermOrder($value);


}
?>