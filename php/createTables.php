<?php
class TableCreator {
	function createTables($credentials, $sqlFileToExecute) {
		try {
			$link = mysql_connect($credentials['hostname'], $credentials['dbuser'], $credentials['dbpassword']);
		} catch (Exception $e) {
			echo $e;
			throw $e;
		}

		if (!$link) {
			echo "MySQL Connection error";
			die ("MySQL Connection error");
		}

		mysql_select_db($credentials['dbname'], $link) or die ("Wrong MySQL Database");

		// read the sql file
		$f = fopen($sqlFileToExecute,"r+");
		$sqlFile = fread($f, filesize($sqlFileToExecute));
		$sqlArray = explode(';',$sqlFile);
		foreach ($sqlArray as $stmt) {
			if (strlen($stmt)>3 && substr(ltrim($stmt),0,2)!='/*') {
				$result = mysql_query($stmt);
				if (!$result) {
					$sqlErrorCode = mysql_errno();
					$sqlErrorText = mysql_error();
					$sqlStmt = $stmt;
					break;
				}
			}
		}
		if ($sqlErrorCode == 0) {
			echo "Script is executed succesfully!";
		} else {
			echo "An error occured during installation!<br/>";
			echo "Error code: $sqlErrorCode<br/>";
			echo "Error text: $sqlErrorText<br/>";
			echo "Statement:<br/> $sqlStmt<br/>";
		}
	}
}
$sqlFileToExecute = '../sql/create_tables.sql';
$credentials = array( 'hostname' => 'localhost',
	'dbuser' => 'wpuser1',
	'dbpassword' => 'wpuser1',
	'dbname' =>'wpuser1');
createTables($credentials, $sqlFileToExecute);

?>