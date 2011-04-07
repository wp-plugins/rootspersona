<?php
/**
 * Class that operate on table 'rp_note'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 09:44
 */
class RpNoteMySqlDAO implements RpNoteDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return RpNoteMySql
	 */
	public function load($id){
		$sql = 'SELECT * FROM rp_note WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM rp_note';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}

	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM rp_note ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}

	/**
 	 * Delete record from table
 	 * @param rpNote primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM rp_note WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Insert record to table
 	 *
 	 * @param RpNoteMySql rpNote
 	 */
	public function insert($rpNote){
		$sql = 'INSERT INTO rp_note (cite_id, auto_rec_id, ged_change_date, update_datetime, submitter_text) VALUES (?, ?, ?, now(), ?)';
		$sqlQuery = new SqlQuery($sql);

		$sqlQuery->setNumber($rpNote->citeId);
		$sqlQuery->set($rpNote->autoRecId);
		$sqlQuery->set($rpNote->gedChangeDate);
		$sqlQuery->set($rpNote->submitterText);

		$id = $this->executeInsert($sqlQuery);
		$rpNote->id = $id;
		return $id;
	}

	/**
 	 * Update record in table
 	 *
 	 * @param RpNoteMySql rpNote
 	 */
	public function update($rpNote){
		$sql = 'UPDATE rp_note SET cite_id = ?, auto_rec_id = ?, ged_change_date = ?, update_datetime = now(), submitter_text = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);

		$sqlQuery->setNumber($rpNote->citeId);
		$sqlQuery->set($rpNote->autoRecId);
		$sqlQuery->set($rpNote->gedChangeDate);
		$sqlQuery->set($rpNote->submitterText);

		$sqlQuery->setNumber($rpNote->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM rp_note';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByCiteId($value){
		$sql = 'SELECT * FROM rp_note WHERE cite_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAutoRecId($value){
		$sql = 'SELECT * FROM rp_note WHERE auto_rec_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByGedChangeDate($value){
		$sql = 'SELECT * FROM rp_note WHERE ged_change_date = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUpdateDatetime($value){
		$sql = 'SELECT * FROM rp_note WHERE update_datetime = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySubmitterText($value){
		$sql = 'SELECT * FROM rp_note WHERE submitter_text = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByCiteId($value){
		$sql = 'DELETE FROM rp_note WHERE cite_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAutoRecId($value){
		$sql = 'DELETE FROM rp_note WHERE auto_rec_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByGedChangeDate($value){
		$sql = 'DELETE FROM rp_note WHERE ged_change_date = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUpdateDatetime($value){
		$sql = 'DELETE FROM rp_note WHERE update_datetime = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySubmitterText($value){
		$sql = 'DELETE FROM rp_note WHERE submitter_text = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}



	/**
	 * Read row
	 *
	 * @return RpNoteMySql
	 */
	protected function readRow($row){
		$rpNote = new RpNote();

		$rpNote->id = $row['id'];
		$rpNote->citeId = $row['cite_id'];
		$rpNote->autoRecId = $row['auto_rec_id'];
		$rpNote->gedChangeDate = $row['ged_change_date'];
		$rpNote->updateDatetime = $row['update_datetime'];
		$rpNote->submitterText = $row['submitter_text'];

		return $rpNote;
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
	 * @return RpNoteMySql
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