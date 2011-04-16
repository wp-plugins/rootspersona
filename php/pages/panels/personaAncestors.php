<?php
require_once ('../../temp.inc.php');
require_once ('../../temp.dao.php');

function getPersonaAncestors ($ancestors, $options) {
	$block = '<div class="rp_truncate">'
	. '<div class="rp_ancestors">'
	. '<table cellpadding="0" cellspacing="0" class="ancestors"><tbody>'

	. '<tr><td colspan="2" rowspan="6"> </td>'
	. '<td colspan="3" rowspan="2"> </td><td> </td>'
    . '<td rowspan="2" class="rp_nameBox">'
    . '<a href="' . $options['site_url'] . '?page_id='
    		. $ancestors[4]->page . '">' . $ancestors[4]->fullName . '</a><br/>';
	if(!$options['hideDates']) {
		$block .= $ancestors[4]->birthDate . ' - ' . $ancestors[4]->deathDate;
	}
	$block .= '</td></tr>'
	. '<tr><td class="rp_topleft"> </td></tr>'
	. '<tr><td> </td>'
	. '<td rowspan="2" class="rp_nameBox">'
	. '<a href="' . $options['site_url'] . '?page_id='
    		. $ancestors[2]->page . '">' . $ancestors[2]->fullName . '</a><br/>';
	if(!$options['hideDates']) {
		$block .= $ancestors[2]->birthDate . ' - ' . $ancestors[2]->deathDate;
	}
	$block .= '</td><td class="rp_bottom"> </td><td colspan="2" rowspan="2" class="rp_left"> </td></tr>';

	$block .= '<tr><td class="rp_topleft"> </td><td> </td></tr>'
	. '<tr><td colspan="3" rowspan="6" class="rp_left"> </td><td class="rp_leftbottom"> </td>'
	. '<td rowspan="2" class="rp_nameBox">'
	. '<a href="' . $options['site_url'] . '?page_id='
    		. $ancestors[5]->page . '">' . $ancestors[5]->fullName . '</a><br/>';
	if(!$options['hideDates']) {
		$block .= $ancestors[5]->birthDate . ' - ' . $ancestors[5]->deathDate;
	}
	$block .= '</td></tr>'
	.  '<tr><td> </td></tr><tr><td rowspan="2" class="rp_nameBox">'
	. '<span style="color:blue">' . $ancestors[1]->fullName . '</span></td>'
	. '<td class="rp_bottom"> </td><td colspan="2" rowspan="2"> </td></tr>'
	. '<tr><td> </td></tr>';

	$block = '<tr><td colspan="2" rowspan="6"> </td><td> </td><td rowspan="2" class="rp_nameBox">'
	. '<a href="' . $options['site_url'] . '?page_id='
    		. $ancestors[6]->page . '">' . $ancestors[6]->fullName . '</a><br/>';
	if(!$options['hideDates']) {
		$block .= $ancestors[6]->birthDate . ' - ' . $ancestors[6]->deathDate;
	}
	$block .= '</td></tr><tr><td class="rp_topleft"> </td></tr>'
	. '<tr><td class="rp_leftbottom"> </td><td rowspan="2" class="rp_nameBox">'
	. '<a href="' . $options['site_url'] . '?page_id='
    		. $ancestors[3]->page . '">' . $ancestors[3]->fullName . '</a><br/>';
	if(!$options['hideDates']) {
		$block .= $ancestors[3]->birthDate . ' - ' . $ancestors[3]->deathDate;
	}
	$block .= '</td><td class="rp_bottom"> </td><td colspan="2" rowspan="2" class="rp_left"> </td></tr>'
	. '<tr><td> </td><td> </td></tr><tr><td colspan="3" rowspan="2"> </td>'
	. '<td class="rp_leftbottom"> </td><td rowspan="2" class="rp_nameBox">'
	. '<a href="' . $options['site_url'] . '?page_id='
    		. $ancestors[7]->page . '">' . $ancestors[7]->fullName . '</a><br/>';
	if(!$options['hideDates']) {
		$block .= $ancestors[7]->birthDate . ' - ' . $ancestors[7]->deathDate;
	}

	$block .= '</td></tr><tr><td> </td></tr>';

    $block .= '</tbody></table>';
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
$persona->ancestors = DAOFactory::getRpAncestorsDAO()->getAncestors($persona, array("site_url"=>"XXX"));
$transaction->close();
echo getPersonaAncestors($persona->ancestors,  array("hideDates"=>false, "hidePlaces"=>false, "site_url"=>"XXX"));
$time = microtime(true) - $time_start;
echo "Done in $time seconds using " . memory_get_peak_usage (true)/1024/1024 . "MB." ;
?>