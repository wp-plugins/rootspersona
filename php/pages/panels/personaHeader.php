<?php
require_once ('../../temp.inc.php');
require_once ('../../temp.dao.php');

function getPersonaHeader($persona, $pic1=null) {
	$block = '<div class="rp_truncate">';
	$block .= '<div class="rp_header">';

	$block .= '<a href="' . $pic1 .'">';
	$block .= '<img class="rp_headerbox" src="' . $pic1 . '"/></a>';

	$block .= '<div class="rp_headerbox">';
	$block .= '<span class="rp_headerbox">' . $persona->fullName . '</span>';
	$block .= '<span class="rp_headerbox" style="align:right;color:#EBDDE2">' . $persona->id . '</span>';
	$block .= '<br/>b: ' . $persona->birthDate . '<br/>d: ' . $persona->deathDate;
	$block .= '</div>';

	$block .= '</div>';
	$block .= '</div>';
	return $block;
}

//$credentials = array( 'hostname' => 'localhost',
//				'dbuser' => 'wpuser1',
//				'dbpassword' => 'wpuser1',
//				'dbname' =>'wpuser1');
//
//$time_start = microtime(true);
//$transaction = new Transaction($credentials);
//$persona = DAOFactory::getRpPersonaDAO()->getPersona('i141',1);
//$transaction->rollback();
//echo getPersonaHeader($persona);
//
//
//$time = microtime(true) - $time_start;
//echo "Done in $time seconds using " . memory_get_peak_usage (true)/1024/1024 . "MB." ;
?>