<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 09:44
 */
interface RpNamePersonalDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return RpNamePersonal 
	 */
	public function loadList($id);
	
	/**
 	 * Delete record from table
 	 * @param rpNamePersonal primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RpNamePersonal rpNamePersonal
 	 */
	public function insert($rpNamePersonal);
	
	/**
 	 * Update record in table
 	 *
 	 * @param RpNamePersonal rpNamePersonal
 	 */
	public function update($rpNamePersonal);	

}
?>