<?php
/**
 * Class that operate on table 'rp_indi_fam'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-04-06 07:37
 */
class RpIndiFamMySqlExtDAO extends RpIndiFamMySqlDAO{
	public function deleteByIndi($indiId, $indiBatchId){
		$sql = 'DELETE FROM rp_indi_fam WHERE indi_id = ?  AND indi_batch_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($indiId);
		$sqlQuery->setNumber($indiBatchId);

		return $this->executeUpdate($sqlQuery);
	}

}
?>