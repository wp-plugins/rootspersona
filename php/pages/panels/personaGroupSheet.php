<?php

function getPersonaGroupSheet($ancestors, $children, $options) {
	$block = '<div class="rp_truncate">'
	. '<div class="rp_family"><table class="familygroup"><tbody>'

 	. '<tr><td class="full" colspan="4">PARENT(' . $ancestors[2]->gender . ')'
 	. '<a href="' . $options['site_url'] . '?page_id=' . $ancestors[2]->page . '">'
 	. $ancestors[2]->fullName . '</a></td></tr>'
 	. '<tr><td class="inset" rowspan="4"/><td class="label">' . __('Birth', 'rootspersona') . '</td>'
 	. '<td class="date">' . $ancestors[2]->birthDate . '</td>'
 	. '<td class="notes">' . $ancestors[2]->birthPlace . '</td></tr>'
	. '<tr><td class="label">' . __('Death', 'rootspersona')
	. '</td><td class="date">' . $ancestors[2]->deathDate
	. ' </td><td class="notes">' . $ancestors[2]->deathPlace . '</td></tr>'
	. '<tr><td class="label">' . __('Father', 'rootspersona') . '</td><td class="parent" colspan="2">'
	. '<a href="' . $options['site_url'] . '?page_id=' . $ancestors[4]->page . '">'
	. $ancestors[4]->fullName . '</a></td></tr>'
	. '<tr><td class="label">' . __('Mother', 'rootspersona') . '</td><td class="parent" colspan="2">'
	. '<a href="' . $options['site_url'] . '?page_id=' . $ancestors[5]->page . '">'
	. $ancestors[5]->fullName . '</a></td></tr>'

 	. '<tr><td class="full" colspan="4">PARENT(' . $ancestors[3]->gender . ')'
 	. '<a href="' . $options['site_url'] . '?page_id=' . $ancestors[3]->page . '">'
 	. $ancestors[2]->fullName . '</a></td></tr>'
 	. '<tr><td class="inset" rowspan="4"/><td class="label">' . __('Birth', 'rootspersona') . '</td>'
 	. '<td class="date">' . $ancestors[3]->birthDate . '</td>'
 	. '<td class="notes">' . $ancestors[3]->birthPlace . '</td></tr>'
	. '<tr><td class="label">' . __('Death', 'rootspersona')
	. '</td><td class="date">' . $ancestors[3]->deathDate
	. ' </td><td class="notes">' . $ancestors[3]->deathPlace . '</td></tr>'
	. '<tr><td class="label">' . __('Father', 'rootspersona') . '</td><td class="parent" colspan="2">'
	. '<a href="' . $options['site_url'] . '?page_id=' . $ancestors[6]->page . '">'
	. $ancestors[6]->fullName . '</a></td></tr>'
	. '<tr><td class="label">' . __('Mother', 'rootspersona') . '</td><td class="parent" colspan="2">'
	. '<a href="' . $options['site_url'] . '?page_id=' . $ancestors[7]->page . '">'
	. $ancestors[7]->fullName . '</a></td></tr>'
	. '<tr><td class="full" colspan="4">CHILDREN</td></tr>';

	$cnt = count($children);
	for($idx = 0; $idx < $cnt; $idx++) {
 		$block = '<tr><td class="gender">M</td><td class="child" colspan="3">'
		. '<a href="' . $options['site_url'] . '?page_id=' . $children[$idx]->page . '">'
		. $children[$idx]->fullName . '</a></td></tr>'
 		. '<tr><td class="inset" rowspan="3"/><td class="label">' . __('Birth','rootspersona')
 		. '</td><td class="date">' . $children[$idx]->birthDate . '</td><td class="notes">' . $children[$idx]->birthPlace . '</td></tr>'
  		. '<tr><td class="label">' . __('Death', 'rootspersona')
 		. '</td><td class="date">' . $children[$idx]->deathDate . '</td><td class="notes">' . $children[$idx]->deathPlace . '</td></tr>'
  		//. '<tr><td class="label">Marriage</td><td class="date">25 MAR 1929</td>
  		//. '<td class="notes">to <a href="http://thompson-hayward-snypes-moore.net/?page_id=2257">Ellen Elizabeth Charles</a>in Newport News, VA</td></tr>
		;
	}

	$block .= '</tbody></table></div></div>';
	return $block;
}

?>