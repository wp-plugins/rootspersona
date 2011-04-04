<?php
/**
 * Class that operate on table 'rp_indi_name'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 09:44
 */
class RpIndiNameMySqlExtDAO extends RpIndiNameMySqlDAO{
	public function deleteByIndi($indiId, $indiBatchId){
		$sql = 'DELETE FROM rp_indi_name WHERE indi_id = ?  AND indi_batch_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($indiId);
		$sqlQuery->setNumber($indiBatchId);

		return $this->executeUpdate($sqlQuery);
	}

	public function loadList($indiId, $indiBatchId){
		$sql = 'SELECT * FROM rp_indi_name WHERE indi_id = ?  AND indi_batch_id = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($indiId);
		$sqlQuery->setNumber($indiBatchId);

		return $this->getRow($sqlQuery);
	}

}
?>