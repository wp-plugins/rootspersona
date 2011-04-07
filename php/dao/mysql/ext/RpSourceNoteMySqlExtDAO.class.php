<?php
/**
 * Class that operate on table 'rp_source_note'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 09:44
 */
class RpSourceNoteMySqlExtDAO extends RpSourceNoteMySqlDAO{
	public function deleteBySrc($sourceId, $sourceBatchId){
		$sql = 'DELETE FROM rp_source_note WHERE source_id = ?  AND source_batch_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($sourceId);
		$sqlQuery->setNumber($sourceBatchId);

		return $this->executeUpdate($sqlQuery);
	}
	public function loadList($sourceId, $sourceBatchId){
		$sql = 'SELECT * FROM rp_source_note WHERE source_id = ?  AND source_batch_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($sourceId);
		$sqlQuery->setNumber($sourceBatchId);

		return $this->getList($sqlQuery);
	}

}
?>