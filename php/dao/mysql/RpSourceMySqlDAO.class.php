<?php
/**
 * Class that operate on table 'rp_source'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 09:44
 */
class RpSourceMySqlDAO implements RpSourceDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return RpSourceMySql
	 */
	public function load($id, $batchId){
		$sql = 'SELECT * FROM rp_source WHERE id = ?  AND batch_id = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		$sqlQuery->setNumber($batchId);

		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM rp_source';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}

	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM rp_source ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}

	/**
 	 * Delete record from table
 	 * @param rpSource primary key
 	 */
	public function delete($id, $batchId){
		$sql = 'DELETE FROM rp_source WHERE id = ?  AND batch_id = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		$sqlQuery->setNumber($batchId);

		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Insert record to table
 	 *
 	 * @param RpSourceMySql rpSource
 	 */
	public function insert($rpSource){
		$sql = 'INSERT INTO rp_source (originator, source_title, abbr, publication_facts, text, auto_rec_id, ged_change_date, update_datetime, id, batch_id) VALUES (?, ?, ?, ?, ?, ?, ?, now(), ?, ?)';
		$sqlQuery = new SqlQuery($sql);

		$sqlQuery->set($rpSource->originator);
		$sqlQuery->set($rpSource->sourceTitle);
		$sqlQuery->set($rpSource->abbr);
		$sqlQuery->set($rpSource->publicationFacts);
		$sqlQuery->set($rpSource->text);
		$sqlQuery->set($rpSource->autoRecId);
		$sqlQuery->set($rpSource->gedChangeDate);

		$sqlQuery->set($rpSource->id);

		$sqlQuery->setNumber($rpSource->batchId);

		$this->executeInsert($sqlQuery);
		//$rpSource->id = $id;
		//return $id;
	}

	/**
 	 * Update record in table
 	 *
 	 * @param RpSourceMySql rpSource
 	 */
	public function update($rpSource){
		$sql = 'UPDATE rp_source SET originator = ?, source_title = ?, abbr = ?, publication_facts = ?, text = ?, auto_rec_id = ?, ged_change_date = ?, update_datetime = now() WHERE id = ?  AND batch_id = ? ';
		$sqlQuery = new SqlQuery($sql);

		$sqlQuery->set($rpSource->originator);
		$sqlQuery->set($rpSource->sourceTitle);
		$sqlQuery->set($rpSource->abbr);
		$sqlQuery->set($rpSource->publicationFacts);
		$sqlQuery->set($rpSource->text);
		$sqlQuery->set($rpSource->autoRecId);
		$sqlQuery->set($rpSource->gedChangeDate);

		$sqlQuery->set($rpSource->id);

		$sqlQuery->setNumber($rpSource->batchId);

		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM rp_source';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByOriginator($value){
		$sql = 'SELECT * FROM rp_source WHERE originator = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySourceTitle($value){
		$sql = 'SELECT * FROM rp_source WHERE source_title = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAbbr($value){
		$sql = 'SELECT * FROM rp_source WHERE abbr = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPublicationFacts($value){
		$sql = 'SELECT * FROM rp_source WHERE publication_facts = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByText($value){
		$sql = 'SELECT * FROM rp_source WHERE text = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAutoRecId($value){
		$sql = 'SELECT * FROM rp_source WHERE auto_rec_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByGedChangeDate($value){
		$sql = 'SELECT * FROM rp_source WHERE ged_change_date = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUpdateDatetime($value){
		$sql = 'SELECT * FROM rp_source WHERE update_datetime = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByOriginator($value){
		$sql = 'DELETE FROM rp_source WHERE originator = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySourceTitle($value){
		$sql = 'DELETE FROM rp_source WHERE source_title = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAbbr($value){
		$sql = 'DELETE FROM rp_source WHERE abbr = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPublicationFacts($value){
		$sql = 'DELETE FROM rp_source WHERE publication_facts = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByText($value){
		$sql = 'DELETE FROM rp_source WHERE text = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAutoRecId($value){
		$sql = 'DELETE FROM rp_source WHERE auto_rec_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByGedChangeDate($value){
		$sql = 'DELETE FROM rp_source WHERE ged_change_date = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUpdateDatetime($value){
		$sql = 'DELETE FROM rp_source WHERE update_datetime = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}



	/**
	 * Read row
	 *
	 * @return RpSourceMySql
	 */
	protected function readRow($row){
		$rpSource = new RpSource();

		$rpSource->id = $row['id'];
		$rpSource->batchId = $row['batch_id'];
		$rpSource->originator = $row['originator'];
		$rpSource->sourceTitle = $row['source_title'];
		$rpSource->abbr = $row['abbr'];
		$rpSource->publicationFacts = $row['publication_facts'];
		$rpSource->text = $row['text'];
		$rpSource->autoRecId = $row['auto_rec_id'];
		$rpSource->gedChangeDate = $row['ged_change_date'];
		$rpSource->updateDatetime = $row['update_datetime'];

		return $rpSource;
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
	 * @return RpSourceMySql
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