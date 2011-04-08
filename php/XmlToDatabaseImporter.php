<?php
require_once ('temp.inc.php');
require_once ('tmp.dao.php');
//require_once ('include.inc.php');
//require_once ('include.dao.php');

class XmlToDatabaseImporter {
	var $credentials;

	function loadTables($credentials, $dataDir) {
		$this->credentials = $credentials;
		$dh  = opendir($dataDir);
		$files = null;
		while (false !== ($filename = readdir($dh))) {
			if(in_array(substr($filename,0,-4), $ids)) continue;
			if(strpos($filename,"xml") <= 0
			|| $filename == "p000.xml"
			|| $filename == "templatePerson.xml"
			|| $filename == "f000.xml") continue;

			$dom = DOMDocument::load($dataDir . "/" . $filename);
			$root = $dom->documentElement;
			if(isset($root)) {
				if($root->tagName == "persona:person") {
					$this->addPerson($dom);
				} elseif ($root->tagName == "persona:familyGroup") {
					$this->addFamily($dom);
				} elseif ($root->tagName == "cite:evidence") {
					$evidenceDoc = $dom;
				} elseif ($root->tagName == "map:idMap") {
					$mapDoc = $dom;
				}
			}
		}
		if ($evidenceDoc != null) {
			$this->addEvidence($evidenceDoc);
		}
		if ($evidenceDoc != null) {
			$this->addMappingData($evidenceDoc);
		}
		//then archive(?) and delete the files and data dir
	}

	function addPerson($dom){

	}

	function addFamily($dom) {

	}

	function addEvidence($dom) {

	}

	function addMappingData($dom) {

	}
}

$dataDir = 'C:\development\XAMPP\htdocs\wpuser1\wp-content\rootsPersonaData';
$credentials = array( 'hostname' => 'localhost',
				'dbuser' => 'wpuser1',
				'dbpassword' => 'wpuser1',
				'dbname' =>'wpuser1');
$g = new XmlToDatabaseImporter();
$time_start = microtime(true);

$g->loadTables($credentials, $dataDir);

$time = microtime(true) - $time_start;
echo "Done in $time seconds using " . memory_get_peak_usage (true)/1024/1024 . "MB." ;

?>