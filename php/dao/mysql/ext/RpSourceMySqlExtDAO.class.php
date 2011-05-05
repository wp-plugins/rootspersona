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

	public function unlinkAllPages(){
		$sql = 'UPDATE rp_source SET wp_page_id = null, update_datetime = now()';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function getPageId($id, $batchId){
		$sql = 'SELECT wp_page_id FROM rp_source WHERE id = ?  AND batch_id = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($id);
		$sqlQuery->setNumber($batchId);

		return $this->getRow($sqlQuery);
	}

	public function getSourceNoPage($batchId){
		$sql = "SELECT rs.id AS id"
		. " FROM rp_source rs"
		. " WHERE rs.wp_page_id IS NULL AND rs.batch_id = ?";

		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($batchId);
		$rows = $this->getRows($sqlQuery);

		$sources = array();
		if($rows > 0) {
			$cnt = count($rows);
			for($idx = 0; $idx <$cnt;$idx++ ) {
				$src = array();
				$src['id'] = $rows[$idx]['id'];
				$sources[$idx] = $src;

			}
		}
		return $sources;
	}
}
?>