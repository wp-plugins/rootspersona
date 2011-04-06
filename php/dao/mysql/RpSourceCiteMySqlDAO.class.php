<?php
/**
 * Class that operate on table 'rp_source_cite'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 09:44
 */
class RpSourceCiteMySqlDAO implements RpSourceCiteDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return RpSourceCiteMySql
	 */
	public function load($id){
		$sql = 'SELECT * FROM rp_source_cite WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM rp_source_cite';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}

	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM rp_source_cite ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}

	/**
 	 * Delete record from table
 	 * @param rpSourceCite primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM rp_source_cite WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Insert record to table
 	 *
 	 * @param RpSourceCiteMySql rpSourceCite
 	 */
	public function insert($rpSourceCite){
		$sql = 'INSERT INTO rp_source_cite (source_id, source_batch_id, source_page, event_type, event_role, quay, source_description, update_datetime) VALUES (?, ?, ?, ?, ?, ?, ?, now())';
		$sqlQuery = new SqlQuery($sql);

		$sqlQuery->set($rpSourceCite->sourceId);
		$sqlQuery->setNumber($rpSourceCite->sourceBatchId);
		$sqlQuery->set($rpSourceCite->sourcePage);
		$sqlQuery->set($rpSourceCite->eventType);
		$sqlQuery->set($rpSourceCite->eventRole);
		$sqlQuery->set($rpSourceCite->quay);
		$sqlQuery->set($rpSourceCite->sourceDescription);

		$id = $this->executeInsert($sqlQuery);
		$rpSourceCite->id = $id;
		return $id;
	}

	/**
 	 * Update record in table
 	 *
 	 * @param RpSourceCiteMySql rpSourceCite
 	 */
	public function update($rpSourceCite){
		$sql = 'UPDATE rp_source_cite SET source_id = ?, source_batch_id = ?, source_page = ?, event_type = ?, event_role = ?, quay = ?, source_description = ?, update_datetime = now() WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);

		$sqlQuery->set($rpSourceCite->sourceId);
		$sqlQuery->setNumber($rpSourceCite->sourceBatchId);
		$sqlQuery->set($rpSourceCite->sourcePage);
		$sqlQuery->set($rpSourceCite->eventType);
		$sqlQuery->set($rpSourceCite->eventRole);
		$sqlQuery->set($rpSourceCite->quay);
		$sqlQuery->set($rpSourceCite->sourceDescription);

		$sqlQuery->setNumber($rpSourceCite->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM rp_source_cite';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryBySourceId($value){
		$sql = 'SELECT * FROM rp_source_cite WHERE source_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySourceBatchId($value){
		$sql = 'SELECT * FROM rp_source_cite WHERE source_batch_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySourcePage($value){
		$sql = 'SELECT * FROM rp_source_cite WHERE source_page = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEventType($value){
		$sql = 'SELECT * FROM rp_source_cite WHERE event_type = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEventRole($value){
		$sql = 'SELECT * FROM rp_source_cite WHERE event_role = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByQuay($value){
		$sql = 'SELECT * FROM rp_source_cite WHERE quay = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySourceDescription($value){
		$sql = 'SELECT * FROM rp_source_cite WHERE source_description = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUpdateDatetime($value){
		$sql = 'SELECT * FROM rp_source_cite WHERE update_datetime = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteBySourceId($value){
		$sql = 'DELETE FROM rp_source_cite WHERE source_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySourceBatchId($value){
		$sql = 'DELETE FROM rp_source_cite WHERE source_batch_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySourcePage($value){
		$sql = 'DELETE FROM rp_source_cite WHERE source_page = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEventType($value){
		$sql = 'DELETE FROM rp_source_cite WHERE event_type = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEventRole($value){
		$sql = 'DELETE FROM rp_source_cite WHERE event_role = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByQuay($value){
		$sql = 'DELETE FROM rp_source_cite WHERE quay = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySourceDescription($value){
		$sql = 'DELETE FROM rp_source_cite WHERE source_description = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUpdateDatetime($value){
		$sql = 'DELETE FROM rp_source_cite WHERE update_datetime = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}



	/**
	 * Read row
	 *
	 * @return RpSourceCiteMySql
	 */
	protected function readRow($row){
		$rpSourceCite = new RpSourceCite();

		$rpSourceCite->id = $row['id'];
		$rpSourceCite->sourceId = $row['source_id'];
		$rpSourceCite->sourceBatchId = $row['source_batch_id'];
		$rpSourceCite->sourcePage = $row['source_page'];
		$rpSourceCite->eventType = $row['event_type'];
		$rpSourceCite->eventRole = $row['event_role'];
		$rpSourceCite->quay = $row['quay'];
		$rpSourceCite->sourceDescription = $row['source_description'];
		$rpSourceCite->updateDatetime = $row['update_datetime'];

		return $rpSourceCite;
	}

	protected function getList($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		$ret = array();
		for($i=0;$i<count($tab);$i++){
			$ret[$i] = $this->readRow($tab[$i]);
		}
		return $ret;
	}

	/**
	 * Get row
	 *
	 * @return RpSourceCiteMySql
	 */
	protected function getRow($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		if(count($tab)==0){
			return null;
		}
		return $this->readRow($tab[0]);
	}

	/**
	 * Execute sql query
	 */
	protected function execute($sqlQuery){
		return QueryExecutor::execute($sqlQuery);
	}


	/**
	 * Execute sql query
	 */
	protected function executeUpdate($sqlQuery){
		return QueryExecutor::executeUpdate($sqlQuery);
	}

	/**
	 * Query for one row and one column
	 */
	protected function querySingleResult($sqlQuery){
		return QueryExecutor::queryForString($sqlQuery);
	}

	/**
	 * Insert row to table
	 */
	protected function executeInsert($sqlQuery){
		return QueryExecutor::executeInsert($sqlQuery);
	}
}
?>