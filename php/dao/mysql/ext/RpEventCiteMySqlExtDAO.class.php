<?php
/**
 * Class that operate on table 'rp_event_cite'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 09:44
 */
class RpEventCiteMySqlExtDAO extends RpEventCiteMySqlDAO{
	public function deleteByEventId($eventId){
		$sql = 'DELETE FROM rp_event_cite WHERE event_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($eventId);

		return $this->executeUpdate($sqlQuery);
	}

}
?>