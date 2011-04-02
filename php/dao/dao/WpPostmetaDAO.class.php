<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 09:44
 */
interface WpPostmetaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return WpPostmeta 
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
 	 * @param wpPostmeta primary key
 	 */
	public function delete($meta_id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param WpPostmeta wpPostmeta
 	 */
	public function insert($wpPostmeta);
	
	/**
 	 * Update record in table
 	 *
 	 * @param WpPostmeta wpPostmeta
 	 */
	public function update($wpPostmeta);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByPostId($value);

	public function queryByMetaKey($value);

	public function queryByMetaValue($value);


	public function deleteByPostId($value);

	public function deleteByMetaKey($value);

	public function deleteByMetaValue($value);


}
?>