<?php

function getPersonaAncestors ($ancestors, $options) {
	$block = '<div class="rp_truncate">'
	. '<div class="rp_ancestors">'
	. '<table cellpadding="0" cellspacing="0" class="ancestors"><tbody>'

	. '<tr><td colspan="2" rowspan="6">&#160;</td>'
	. '<td colspan="3" rowspan="2">&#160;</td><td>&#160;</td>'
    . '<td rowspan="2" class="rp_nameBox">'
    . '<a href="' . $options['site_url'] . '?page_id='
    		. $ancestors[4]->page . '">' . $ancestors[4]->fullName . '</a><br/>';
	if(!$options['hideDates']) {
		$block .= $ancestors[4]->birthDate . ' - ' . $ancestors[4]->deathDate;
	}
	$block .= '</td></tr>'
	. '<tr><td class="rp_topleft">&#160;</td></tr>'
	. '<tr><td>&#160;</td>'
	. '<td rowspan="2" class="rp_nameBox">'
	. '<a href="' . $options['site_url'] . '?page_id='
    		. $ancestors[2]->page . '">' . $ancestors[2]->fullName . '</a><br/>';
	if(!$options['hideDates']) {
		$block .= $ancestors[2]->birthDate . ' - ' . $ancestors[2]->deathDate;
	}
	$block .= '</td><td class="rp_bottom">&#160;</td><td colspan="2" rowspan="2" class="rp_left">&#160;</td></tr>';

	$block .= '<tr><td class="rp_topleft">&#160;</td><td>&#160;</td></tr>'
	. '<tr><td colspan="3" rowspan="6" class="rp_left">&#160;</td><td class="rp_leftbottom">&#160;</td>'
	. '<td rowspan="2" class="rp_nameBox">'
	. '<a href="' . $options['site_url'] . '?page_id='
    		. $ancestors[5]->page . '">' . $ancestors[5]->fullName . '</a><br/>';
	if(!$options['hideDates']) {
		$block .= $ancestors[5]->birthDate . ' - ' . $ancestors[5]->deathDate;
	}
	$block .= '</td></tr>'
	.  '<tr><td>&#160;</td></tr><tr><td rowspan="2" class="rp_nameBox">'
	. '<span style="color:blue">' . $ancestors[1]->fullName . '</span></td>'
	. '<td class="rp_bottom">&#160;</td><td colspan="2" rowspan="2">&#160;</td></tr>'
	. '<tr><td>&#160;</td></tr>';

	$block .= '<tr><td colspan="2" rowspan="6">&#160;</td><td>&#160;</td><td rowspan="2" class="rp_nameBox">'
	. '<a href="' . $options['site_url'] . '?page_id='
    		. $ancestors[6]->page . '">' . $ancestors[6]->fullName . '</a><br/>';
	if(!$options['hideDates']) {
		$block .= $ancestors[6]->birthDate . ' - ' . $ancestors[6]->deathDate;
	}
	$block .= '</td></tr><tr><td class="rp_topleft">&#160;</td></tr>'
	. '<tr><td class="rp_leftbottom">&#160;</td><td rowspan="2" class="rp_nameBox">'
	. '<a href="' . $options['site_url'] . '?page_id='
    		. $ancestors[3]->page . '">' . $ancestors[3]->fullName . '</a><br/>';
	if(!$options['hideDates']) {
		$block .= $ancestors[3]->birthDate . ' - ' . $ancestors[3]->deathDate;
	}
	$block .= '</td><td class="rp_bottom">&#160;</td><td colspan="2" rowspan="2" class="rp_left">&#160;</td></tr>'
	. '<tr><td>&#160;</td><td>&#160;</td></tr><tr><td colspan="3" rowspan="2">&#160;</td>'
	. '<td class="rp_leftbottom">&#160;</td><td rowspan="2" class="rp_nameBox">'
	. '<a href="' . $options['site_url'] . '?page_id='
    		. $ancestors[7]->page . '">' . $ancestors[7]->fullName . '</a><br/>';
	if(!$options['hideDates']) {
		$block .= $ancestors[7]->birthDate . ' - ' . $ancestors[7]->deathDate;
	}

	$block .= '</td></tr><tr><td>&#160;</td></tr>';

    $block .= '</tbody></table></div></div>';
	return $block;
}

?>