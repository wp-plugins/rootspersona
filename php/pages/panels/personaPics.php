<?php

function getPersonaPics($options) {
	$block = '<div class="rp_truncate">'
	. '<div class="rp_pictures"><table class="personGallery" cellspacing="5px"><tbody>'
	. '<tr>';

	$cnt = 6;
	for($idx = 1; $idx <= $cnt; $idx++) {
		if(isset($links) && !empty($links)) {
			$block .= '<td class="rp_picture"><a href="' . $links[$idx]
			. '<img src="' . $links[$idx] . '/></a></td>';
		}
		else {
			$block .= '<td/>';
		}
	}
	$block .= '</tr><tr>';

	for($idx = 1; $idx <= $cnt; $idx++) {
		$block .= '<td class="rp_caption">' . (isset($captions[$idx])?$captions[$idx]:'')
		. '</td>';
	}

	$block .= '</tr></tbody></table></div></div>';

	return $block;
}

?>