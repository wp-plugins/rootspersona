<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 09:44
 */
interface WpTermsDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return WpTerms 
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
 	 * @param wpTerm primary key
 	 */
	public function delete($term_id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param WpTerms wpTerm
 	 */
	public function insert($wpTerm);
	
	/**
 	 * Update record in table
 	 *
 	 * @param WpTerms wpTerm
 	 */
	public function update($wpTerm);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByName($value);

	public function queryBySlug($value);

	public function queryByTermGroup($value);


	public function deleteByName($value);

	public function deleteBySlug($value);

	public function deleteByTermGroup($value);


}
?>