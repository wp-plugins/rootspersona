<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 09:44
 */
interface RpIndiNameDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return RpIndiName 
	 */
	public function loadList($indiId, $indiBatchId);

	/**
 	 * Delete record from table
 	 * @param rpIndiName primary key
 	 */
	public function delete($indiId, $indiBatchId);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RpIndiName rpIndiName
 	 */
	public function insert($rpIndiName);
}
?>