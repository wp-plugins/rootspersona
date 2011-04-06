<?php
/**
 * Class that operate on table 'rp_source_cite'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 09:44
 */
class RpSourceCiteMySqlExtDAO extends RpSourceCiteMySqlDAO{

	public function deleteOrphans(){
		$sql = 'DELETE FROM rp_source_cite WHERE id NOT IN (SELECT cite_id from rp_event_cite)';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

}
?>