<?php

function showUploadGedcomForm($action,$msg='') {

	$block = "<br/><div class='personBanner'><br/></div>"
			. "<form enctype='multipart/form-data' action='$action' method='POST'>"
			. "<br/>&#160;&#160;<input type='file' name='gedcomFile' size='70'/>"
			. "<br/>&#160;&#160;<input type='submit' class='button' name='submitUploadGedcomForm' value='"
			. __('Upload', 'rootspersona')."'/>"
			. "&#160;&#160;<input type='reset' name='reset' value='"
			. __('Reset', 'rootspersona')."'/>"
			. "<div style='text-align:center;color:red;font-weight:bold'>$msg</div>"
			. "<br/><div class='personBanner'><br/></div>"
			. "</form>";
	return $block;
}
?>