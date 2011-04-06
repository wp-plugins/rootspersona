<?php
/**
 * Class that operate on table 'rp_header'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 09:44
 */
class RpHeaderMySqlExtDAO extends RpHeaderMySqlDAO{
	public function deleteByBatchId($batchId){
		$sql = 'DELETE FROM rp_header WHERE batch_id = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($batchId);

		return $this->executeUpdate($sqlQuery);
	}

}
?>