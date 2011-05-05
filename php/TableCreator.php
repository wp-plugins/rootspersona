<?php
class TableCreator {
	static function updateTables($credentials, $sqlFileToExecute) {
		try {
			$link = mysql_connect($credentials['hostname'], $credentials['dbuser'], $credentials['dbpassword']);
		} catch (Exception $e) {
			echo $e;
			throw $e;
		}

		if (!$link) {
			throw new Exception("MySQL Connection error");
		}

		mysql_select_db($credentials['dbname'], $link) or die ("Wrong MySQL Database");

		// read the sql file
		$f = fopen($sqlFileToExecute,"r+");
		$sqlFile = fread($f, filesize($sqlFileToExecute));
		$sqlArray = explode(';',$sqlFile);
		$sqlErrorCode = 0;
		$sqlErrorText = null;
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
		if ($sqlErrorCode != 0) {
			throw new Exception($sqlErrorText);
		}
	}
}
?>