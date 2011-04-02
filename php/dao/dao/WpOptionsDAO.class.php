<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 09:44
 */
interface WpOptionsDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return WpOptions 
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
 	 * @param wpOption primary key
 	 */
	public function delete($option_id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param WpOptions wpOption
 	 */
	public function insert($wpOption);
	
	/**
 	 * Update record in table
 	 *
 	 * @param WpOptions wpOption
 	 */
	public function update($wpOption);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByBlogId($value);

	public function queryByOptionName($value);

	public function queryByOptionValue($value);

	public function queryByAutoload($value);


	public function deleteByBlogId($value);

	public function deleteByOptionName($value);

	public function deleteByOptionValue($value);

	public function deleteByAutoload($value);


}
?>