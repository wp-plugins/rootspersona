<?php
require_once ('../../temp.inc.php');
require_once ('../../temp.dao.php');

function getPersonaEvidence($persona, $options) {
	$block = '<div class="rp_truncate">';
	$block .= '<div class="rp_evidence">';
	$block .= '<table class="rp_evi">';

	$cnt = count($persona->sources);
	for($idx=0;$idx<$cnt;$idx++) {
		$block .= '<tr><td><sup>';
		$block .= '<a href="' . $options['site_url'] . "?page_id=" . $persona->sources[$idx]['pageId'] .'">';
		$block .= '[' .  $persona->sources[$idx]['srcId']. ']</a>';
		$block .= '</sup></td><td>' . $persona->sources[$idx]['srcTitle'];

		$block .= '</td></tr>';
	}

	$block .= '</table>';
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
$persona->sources = DAOFactory::getRpPersonaDAO()->getPersonaSources('i141',1);
$transaction->close();
echo getPersonaEvidence($persona,  array("hideDates"=>false, "hidePlaces"=>false, 'site_url'=>'XXX'));
$time = microtime(true) - $time_start;
echo "Done in $time seconds using " . memory_get_peak_usage (true)/1024/1024 . "MB." ;
?>