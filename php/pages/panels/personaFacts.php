<?php
require_once ('../../temp.inc.php');
require_once ('../../temp.dao.php');

function getPersonaFacts($persona, $options) {
	$block = '<div class="rp_truncate">';
	$block .= '<div class="rp_facts">';
	$block .= '<ul>';

	$cnt = count($persona->facts);
	for($idx=0;$idx<$cnt;$idx++) {
		$block .= '<li>';

		if(!$options['hideDates']) {
			$block .= $persona->facts[$idx]['date'] . ' - ';
		}
		$block .= $persona->facts[$idx]['type'];
		if(!$options['hidePlaces']) {
			$block .= '; <span class="rp_place">' . $persona->facts[$idx]['place'] . '</span>';
		}
		$p = $persona->facts[$idx]['associatedPerson'];
		if(isset($p) && !empty($p) && !$p['isPrivate']) {
			$block .= ' to ' . $p['name'];
		}
		$block .= '</li>';
	}

	$block .= '</ul>';
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
$persona->facts = DAOFactory::getRpPersonaDAO()->getPersonaEvents('i141',1);
$transaction->close();
echo getPersonaFacts($persona,  array("hideDates"=>false, "hidePlaces"=>false));
$time = microtime(true) - $time_start;
echo "Done in $time seconds using " . memory_get_peak_usage (true)/1024/1024 . "MB." ;
?>