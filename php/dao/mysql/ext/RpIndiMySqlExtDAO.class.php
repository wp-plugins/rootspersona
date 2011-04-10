<?php
/**
 * Class that operate on table 'rp_indi'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 09:44
 */
class RpIndiMySqlExtDAO extends RpIndiMySqlDAO{
	public function updatePage($id,$batchId,$pageId){
		$sql = 'UPDATE rp_indi SET wp_page_id = ?, update_datetime = now() WHERE id = ?  AND batch_id = ? ';
		$sqlQuery = new SqlQuery($sql);

		$sqlQuery->setNumber($pageId);
		$sqlQuery->set($id);
		$sqlQuery->setNumber($batchId);

		return $this->executeUpdate($sqlQuery);
	}

}
?>