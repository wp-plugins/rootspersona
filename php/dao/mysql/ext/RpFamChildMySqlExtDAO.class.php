<?php
/**
 * Class that operate on table 'rp_fam_child'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 09:44
 */
class RpFamChildMySqlExtDAO extends RpFamChildMySqlDAO{

	public function loadChildren($famId, $famBatchId){
		$sql = 'SELECT * FROM rp_fam_child WHERE fam_id = ?  AND fam_batch_id = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($famId);
		$sqlQuery->setNumber($famBatchId);

		return $this->getList($sqlQuery);
	}
	public function deleteChildren($famId, $famBatchId){
		$sql = 'DELETE FROM rp_fam_child WHERE fam_id = ?  AND fam_batch_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($famId);
		$sqlQuery->setNumber($famBatchId);

		return $this->executeUpdate($sqlQuery);
	}
}
?>