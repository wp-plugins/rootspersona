<?php
/**
 * Class that operate on table 'rp_header'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 09:44
 */
class RpHeaderMySqlDAO implements RpHeaderDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return RpHeaderMySql 
	 */
	public function load($id, $batchId){
		$sql = 'SELECT * FROM rp_header WHERE id = ?  AND batch_id = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		$sqlQuery->setNumber($batchId);

		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM rp_header';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM rp_header ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param rpHeader primary key
 	 */
	public function delete($id, $batchId){
		$sql = 'DELETE FROM rp_header WHERE id = ?  AND batch_id = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		$sqlQuery->setNumber($batchId);

		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RpHeaderMySql rpHeader
 	 */
	public function insert($rpHeader){
		$sql = 'INSERT INTO rp_header (src_system_id, src_system_version, product_name, corp_name, corp_addr_id, src_data_name, publication_date, copyright_src_data, receiving_sys_name, transmission_date, transmission_time, submitter_id, submitter_batch_id, submission_id, submission_batch_id, file_name, copyright_ged_file, lang, gedc_version, gedc_form, char_set, char_set_version, place_hierarchy, ged_content_description, update_datetime, id, batch_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($rpHeader->srcSystemId);
		$sqlQuery->set($rpHeader->srcSystemVersion);
		$sqlQuery->set($rpHeader->productName);
		$sqlQuery->set($rpHeader->corpName);
		$sqlQuery->setNumber($rpHeader->corpAddrId);
		$sqlQuery->set($rpHeader->srcDataName);
		$sqlQuery->set($rpHeader->publicationDate);
		$sqlQuery->set($rpHeader->copyrightSrcData);
		$sqlQuery->set($rpHeader->receivingSysName);
		$sqlQuery->set($rpHeader->transmissionDate);
		$sqlQuery->set($rpHeader->transmissionTime);
		$sqlQuery->set($rpHeader->submitterId);
		$sqlQuery->setNumber($rpHeader->submitterBatchId);
		$sqlQuery->set($rpHeader->submissionId);
		$sqlQuery->setNumber($rpHeader->submissionBatchId);
		$sqlQuery->set($rpHeader->fileName);
		$sqlQuery->set($rpHeader->copyrightGedFile);
		$sqlQuery->set($rpHeader->lang);
		$sqlQuery->set($rpHeader->gedcVersion);
		$sqlQuery->set($rpHeader->gedcForm);
		$sqlQuery->set($rpHeader->charSet);
		$sqlQuery->set($rpHeader->charSetVersion);
		$sqlQuery->set($rpHeader->placeHierarchy);
		$sqlQuery->set($rpHeader->gedContentDescription);
		$sqlQuery->set($rpHeader->updateDatetime);

		
		$sqlQuery->setNumber($rpHeader->id);

		$sqlQuery->setNumber($rpHeader->batchId);

		$this->executeInsert($sqlQuery);	
		//$rpHeader->id = $id;
		//return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param RpHeaderMySql rpHeader
 	 */
	public function update($rpHeader){
		$sql = 'UPDATE rp_header SET src_system_id = ?, src_system_version = ?, product_name = ?, corp_name = ?, corp_addr_id = ?, src_data_name = ?, publication_date = ?, copyright_src_data = ?, receiving_sys_name = ?, transmission_date = ?, transmission_time = ?, submitter_id = ?, submitter_batch_id = ?, submission_id = ?, submission_batch_id = ?, file_name = ?, copyright_ged_file = ?, lang = ?, gedc_version = ?, gedc_form = ?, char_set = ?, char_set_version = ?, place_hierarchy = ?, ged_content_description = ?, update_datetime = ? WHERE id = ?  AND batch_id = ? ';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($rpHeader->srcSystemId);
		$sqlQuery->set($rpHeader->srcSystemVersion);
		$sqlQuery->set($rpHeader->productName);
		$sqlQuery->set($rpHeader->corpName);
		$sqlQuery->setNumber($rpHeader->corpAddrId);
		$sqlQuery->set($rpHeader->srcDataName);
		$sqlQuery->set($rpHeader->publicationDate);
		$sqlQuery->set($rpHeader->copyrightSrcData);
		$sqlQuery->set($rpHeader->receivingSysName);
		$sqlQuery->set($rpHeader->transmissionDate);
		$sqlQuery->set($rpHeader->transmissionTime);
		$sqlQuery->set($rpHeader->submitterId);
		$sqlQuery->setNumber($rpHeader->submitterBatchId);
		$sqlQuery->set($rpHeader->submissionId);
		$sqlQuery->setNumber($rpHeader->submissionBatchId);
		$sqlQuery->set($rpHeader->fileName);
		$sqlQuery->set($rpHeader->copyrightGedFile);
		$sqlQuery->set($rpHeader->lang);
		$sqlQuery->set($rpHeader->gedcVersion);
		$sqlQuery->set($rpHeader->gedcForm);
		$sqlQuery->set($rpHeader->charSet);
		$sqlQuery->set($rpHeader->charSetVersion);
		$sqlQuery->set($rpHeader->placeHierarchy);
		$sqlQuery->set($rpHeader->gedContentDescription);
		$sqlQuery->set($rpHeader->updateDatetime);

		
		$sqlQuery->setNumber($rpHeader->id);

		$sqlQuery->setNumber($rpHeader->batchId);

		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM rp_header';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryBySrcSystemId($value){
		$sql = 'SELECT * FROM rp_header WHERE src_system_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySrcSystemVersion($value){
		$sql = 'SELECT * FROM rp_header WHERE src_system_version = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByProductName($value){
		$sql = 'SELECT * FROM rp_header WHERE product_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCorpName($value){
		$sql = 'SELECT * FROM rp_header WHERE corp_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCorpAddrId($value){
		$sql = 'SELECT * FROM rp_header WHERE corp_addr_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySrcDataName($value){
		$sql = 'SELECT * FROM rp_header WHERE src_data_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPublicationDate($value){
		$sql = 'SELECT * FROM rp_header WHERE publication_date = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCopyrightSrcData($value){
		$sql = 'SELECT * FROM rp_header WHERE copyright_src_data = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByReceivingSysName($value){
		$sql = 'SELECT * FROM rp_header WHERE receiving_sys_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTransmissionDate($value){
		$sql = 'SELECT * FROM rp_header WHERE transmission_date = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTransmissionTime($value){
		$sql = 'SELECT * FROM rp_header WHERE transmission_time = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySubmitterId($value){
		$sql = 'SELECT * FROM rp_header WHERE submitter_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySubmitterBatchId($value){
		$sql = 'SELECT * FROM rp_header WHERE submitter_batch_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySubmissionId($value){
		$sql = 'SELECT * FROM rp_header WHERE submission_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySubmissionBatchId($value){
		$sql = 'SELECT * FROM rp_header WHERE submission_batch_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFileName($value){
		$sql = 'SELECT * FROM rp_header WHERE file_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCopyrightGedFile($value){
		$sql = 'SELECT * FROM rp_header WHERE copyright_ged_file = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLang($value){
		$sql = 'SELECT * FROM rp_header WHERE lang = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByGedcVersion($value){
		$sql = 'SELECT * FROM rp_header WHERE gedc_version = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByGedcForm($value){
		$sql = 'SELECT * FROM rp_header WHERE gedc_form = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCharSet($value){
		$sql = 'SELECT * FROM rp_header WHERE char_set = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCharSetVersion($value){
		$sql = 'SELECT * FROM rp_header WHERE char_set_version = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPlaceHierarchy($value){
		$sql = 'SELECT * FROM rp_header WHERE place_hierarchy = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByGedContentDescription($value){
		$sql = 'SELECT * FROM rp_header WHERE ged_content_description = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUpdateDatetime($value){
		$sql = 'SELECT * FROM rp_header WHERE update_datetime = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteBySrcSystemId($value){
		$sql = 'DELETE FROM rp_header WHERE src_system_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySrcSystemVersion($value){
		$sql = 'DELETE FROM rp_header WHERE src_system_version = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByProductName($value){
		$sql = 'DELETE FROM rp_header WHERE product_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCorpName($value){
		$sql = 'DELETE FROM rp_header WHERE corp_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCorpAddrId($value){
		$sql = 'DELETE FROM rp_header WHERE corp_addr_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySrcDataName($value){
		$sql = 'DELETE FROM rp_header WHERE src_data_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPublicationDate($value){
		$sql = 'DELETE FROM rp_header WHERE publication_date = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCopyrightSrcData($value){
		$sql = 'DELETE FROM rp_header WHERE copyright_src_data = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByReceivingSysName($value){
		$sql = 'DELETE FROM rp_header WHERE receiving_sys_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTransmissionDate($value){
		$sql = 'DELETE FROM rp_header WHERE transmission_date = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTransmissionTime($value){
		$sql = 'DELETE FROM rp_header WHERE transmission_time = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySubmitterId($value){
		$sql = 'DELETE FROM rp_header WHERE submitter_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySubmitterBatchId($value){
		$sql = 'DELETE FROM rp_header WHERE submitter_batch_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySubmissionId($value){
		$sql = 'DELETE FROM rp_header WHERE submission_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySubmissionBatchId($value){
		$sql = 'DELETE FROM rp_header WHERE submission_batch_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFileName($value){
		$sql = 'DELETE FROM rp_header WHERE file_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCopyrightGedFile($value){
		$sql = 'DELETE FROM rp_header WHERE copyright_ged_file = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLang($value){
		$sql = 'DELETE FROM rp_header WHERE lang = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByGedcVersion($value){
		$sql = 'DELETE FROM rp_header WHERE gedc_version = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByGedcForm($value){
		$sql = 'DELETE FROM rp_header WHERE gedc_form = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCharSet($value){
		$sql = 'DELETE FROM rp_header WHERE char_set = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCharSetVersion($value){
		$sql = 'DELETE FROM rp_header WHERE char_set_version = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPlaceHierarchy($value){
		$sql = 'DELETE FROM rp_header WHERE place_hierarchy = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByGedContentDescription($value){
		$sql = 'DELETE FROM rp_header WHERE ged_content_description = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUpdateDatetime($value){
		$sql = 'DELETE FROM rp_header WHERE update_datetime = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return RpHeaderMySql 
	 */
	protected function readRow($row){
		$rpHeader = new RpHeader();
		
		$rpHeader->id = $row['id'];
		$rpHeader->batchId = $row['batch_id'];
		$rpHeader->srcSystemId = $row['src_system_id'];
		$rpHeader->srcSystemVersion = $row['src_system_version'];
		$rpHeader->productName = $row['product_name'];
		$rpHeader->corpName = $row['corp_name'];
		$rpHeader->corpAddrId = $row['corp_addr_id'];
		$rpHeader->srcDataName = $row['src_data_name'];
		$rpHeader->publicationDate = $row['publication_date'];
		$rpHeader->copyrightSrcData = $row['copyright_src_data'];
		$rpHeader->receivingSysName = $row['receiving_sys_name'];
		$rpHeader->transmissionDate = $row['transmission_date'];
		$rpHeader->transmissionTime = $row['transmission_time'];
		$rpHeader->submitterId = $row['submitter_id'];
		$rpHeader->submitterBatchId = $row['submitter_batch_id'];
		$rpHeader->submissionId = $row['submission_id'];
		$rpHeader->submissionBatchId = $row['submission_batch_id'];
		$rpHeader->fileName = $row['file_name'];
		$rpHeader->copyrightGedFile = $row['copyright_ged_file'];
		$rpHeader->lang = $row['lang'];
		$rpHeader->gedcVersion = $row['gedc_version'];
		$rpHeader->gedcForm = $row['gedc_form'];
		$rpHeader->charSet = $row['char_set'];
		$rpHeader->charSetVersion = $row['char_set_version'];
		$rpHeader->placeHierarchy = $row['place_hierarchy'];
		$rpHeader->gedContentDescription = $row['ged_content_description'];
		$rpHeader->updateDatetime = $row['update_datetime'];

		return $rpHeader;
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
	 * @return RpHeaderMySql 
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