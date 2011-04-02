<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 09:44
 */
interface WpTermTaxonomyDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return WpTermTaxonomy 
	 */
	public function load($id);

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
 	 * @param wpTermTaxonomy primary key
 	 */
	public function delete($term_taxonomy_id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param WpTermTaxonomy wpTermTaxonomy
 	 */
	public function insert($wpTermTaxonomy);
	
	/**
 	 * Update record in table
 	 *
 	 * @param WpTermTaxonomy wpTermTaxonomy
 	 */
	public function update($wpTermTaxonomy);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByTermId($value);

	public function queryByTaxonomy($value);

	public function queryByDescription($value);

	public function queryByParent($value);

	public function queryByCount($value);


	public function deleteByTermId($value);

	public function deleteByTaxonomy($value);

	public function deleteByDescription($value);

	public function deleteByParent($value);

	public function deleteByCount($value);


}
?>