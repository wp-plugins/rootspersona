<?php
function getPersonaHeader($persona, $options) {
	$block = '<div class="rp_truncate">';
	$block .= '<div class="rp_header">';

	$block .= '<a href="' . $options['pic1'] . '">';
	$block .= '<img class="rp_headerbox" src="' . $options['pic1'] . '"/></a>';

	$block .= '<div class="rp_headerbox">';
	$block .= '<span class="rp_headerbox">' . $persona->fullName . '</span>';
	$block .= '<span class="rp_headerbox" style="padding-left:15px;align:right;color:#EBDDE2">' . $persona->id . '</span>';

	if(!$options['hideDates']) {
		$block .= '<br/>b: ' . $persona->birthDate . '<br/>d: ' . $persona->deathDate;
	}

	$block .= '</div>';

	$block .= '</div>';
	$block .= '</div>';
	return $block;
}
?>