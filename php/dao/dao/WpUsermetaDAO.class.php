<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 09:44
 */
interface WpUsermetaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return WpUsermeta 
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
 	 * @param wpUsermeta primary key
 	 */
	public function delete($umeta_id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param WpUsermeta wpUsermeta
 	 */
	public function insert($wpUsermeta);
	
	/**
 	 * Update record in table
 	 *
 	 * @param WpUsermeta wpUsermeta
 	 */
	public function update($wpUsermeta);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByUserId($value);

	public function queryByMetaKey($value);

	public function queryByMetaValue($value);


	public function deleteByUserId($value);

	public function deleteByMetaKey($value);

	public function deleteByMetaValue($value);


}
?>