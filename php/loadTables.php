<?php
require_once ('temp.inc.php');
require_once ('include_dao.php');

function loadTables($credentials, $ged) {
	$link = mysql_connect($credentials['hostname'], $credentials['dbuser'], $credentials['dbpassword']);
	if (!$link) {
		echo "MySQL Connection error";
		die ("MySQL Connection error");
	}

	mysql_select_db($credentials['dbname'], $link) or die ("Wrong MySQL Database");

}

$gedcomFile = "C:\\Users\\ed\\Desktop\\20110208.ged"; 
$credentials = array( 'hostname' => 'localhost',
	'dbuser' => 'wpuser1',
	'dbpassword' => 'wpuser1',
	'dbname' =>'wpuser1');

$ged = new GedcomManager();
$ged->parse($gedcomFile);
echo $ged->getNumberOfIndividuals();
loadTables($credentials, $ged);

?>