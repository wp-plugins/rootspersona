<?php
/**
 * Class that operate on table 'rp_fam_event'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-04-03 21:19
 */
class RpFamEventMySqlExtDAO extends RpFamEventMySqlDAO{
	public function loadList($famId, $famBatchId){
		$sql = 'SELECT * FROM rp_fam_event WHERE fam_id = ?  AND fam_batch_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($famId);
		$sqlQuery->setNumber($famBatchId);

		return $this->getList($sqlQuery);
	}
	public function deleteByFam($famId, $famBatchId){
		$sql = 'DELETE FROM rp_fam_event WHERE fam_id = ?  AND fam_batch_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($famId);
		$sqlQuery->setNumber($famBatchId);

		return $this->executeUpdate($sqlQuery);
	}
}
?>