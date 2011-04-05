<?php
/**
 * Class that operate on table 'rp_indi_event'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-04-03 21:19
 */
class RpIndiEventMySqlExtDAO extends RpIndiEventMySqlDAO{
	public function loadList($indiId, $indiBatchId){
		$sql = 'SELECT * FROM rp_indi_event WHERE indi_id = ?  AND indi_batch_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($indiId);
		$sqlQuery->setNumber($indiBatchId);

		return $this->getList($sqlQuery);
	}

	public function deleteByIndi($indiId, $indiBatchId){
		$sql = 'DELETE FROM rp_indi_event WHERE indi_id = ?  AND indi_batch_id = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($indiId);
		$sqlQuery->setNumber($indiBatchId);

		return $this->executeUpdate($sqlQuery);
	}

}
?>