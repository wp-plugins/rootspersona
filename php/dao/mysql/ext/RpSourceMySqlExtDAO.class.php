<?php
/**
 * Class that operate on table 'rp_source'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 09:44
 */
class RpSourceMySqlExtDAO extends RpSourceMySqlDAO{
	public function updatePage($id,$batchId,$pageId){
		$sql = 'UPDATE rp_source SET wp_page_id = ? update_datetime = now() WHERE id = ?  AND batch_id = ? ';
		$sqlQuery = new SqlQuery($sql);

		$sqlQuery->setNumber($pageId);
		$sqlQuery->set($id);
		$sqlQuery->set($batchId);

		$sqlQuery->set($rpIndi->id);

		$sqlQuery->setNumber($rpIndi->batchId);

		return $this->executeUpdate($sqlQuery);
	}
}
?>