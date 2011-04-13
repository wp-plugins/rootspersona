<?php
require_once ('../../temp.inc.php');
require_once ('../../temp.dao.php');

function getPersonaHeader($persona, $options, $pics) {
	$block = '<div class="rp_truncate">';
	$block .= '<div class="rp_header">';

	$block .= '<a href="' . $pics[0] .'">';
	$block .= '<img class="rp_headerbox" src="' . $pics[0]. '"/></a>';

	$block .= '<div class="rp_headerbox">';
	$block .= '<span class="rp_headerbox">' . $persona->fullName . '</span>';
	$block .= '<span class="rp_headerbox" style="align:right;color:#EBDDE2">' . $persona->id . '</span>';

	if(!$options['hideDates']) {
		$block .= '<br/>b: ' . $persona->birthDate . '<br/>d: ' . $persona->deathDate;
	}

	$block .= '</div>';

	$block .= '</div>';
	$block .= '</div>';
	return $block;
}

$credentials = array( 'hostname' => 'localhost',
				'dbuser' => 'wpuser1',
				'dbpassword' => 'wpuser1',
				'dbname' =>'wpuser1');
$time_start = microtime(true);
$transaction = new Transaction($credentials, true);
$persona = DAOFactory::getRpPersonaDAO()->getPersona('i141',1);
$transaction->close();
getPersonaHeader($persona, array("hideDates" => false), array("XXX"));
$time = microtime(true) - $time_start;
echo "Done in $time seconds using " . memory_get_peak_usage (true)/1024/1024 . "MB." ;
?>