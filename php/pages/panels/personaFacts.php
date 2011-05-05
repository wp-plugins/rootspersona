<?php

function getPersonaFacts($facts, $options) {
	$block = '<div class="rp_truncate">';
	$block .= '<div class="rp_facts">';
	$block .= '<ul>';

	$cnt = count($facts);
	for($idx=0;$idx<$cnt;$idx++) {
		$block .= '<li>';

		if(!$options['hideDates']) {
			$block .= $facts[$idx]['date'] . ' - ';
		}
		$block .= $facts[$idx]['type'];
		if(!$options['hidePlaces']) {
			$block .= '; <span class="rp_place">' . $facts[$idx]['place'] . '</span>';
		}
		$p = $facts[$idx]['associatedPerson'];
		if(isset($p) && !empty($p) && !$p['isPrivate']) {
			$block .= ' to ' . $p['name'];
		}
		$block .= '</li>';
	}

	$block .= '</ul></div></div>';
	return $block;
}
?>