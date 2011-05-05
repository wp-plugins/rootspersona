<?php

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

?>