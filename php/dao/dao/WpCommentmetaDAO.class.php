<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 09:44
 */
interface WpCommentmetaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return WpCommentmeta 
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
 	 * @param wpCommentmeta primary key
 	 */
	public function delete($meta_id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param WpCommentmeta wpCommentmeta
 	 */
	public function insert($wpCommentmeta);
	
	/**
 	 * Update record in table
 	 *
 	 * @param WpCommentmeta wpCommentmeta
 	 */
	public function update($wpCommentmeta);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByCommentId($value);

	public function queryByMetaKey($value);

	public function queryByMetaValue($value);


	public function deleteByCommentId($value);

	public function deleteByMetaKey($value);

	public function deleteByMetaValue($value);


}
?>