<?php
require_once 'GEDTransformer.php';


class PersonUtility {
	function addPage($fileName, $dataDir) {
		$name = $this->getName($fileName, $dataDir);
		$pid = substr($fileName,0,-4);
		// Create post object
		$my_post = array();
		$my_post['post_title'] = $name;
		$my_post['post_content'] = "[rootsPersona personId='$pid'/]";
		$my_post['post_status'] = 'publish';
		$my_post['post_author'] = 0;
		$my_post['post_type'] = 'page';
		$my_post['ping_status'] = get_option('default_ping_status');
		$my_post['post_parent'] = get_option('rootsPersonaParentPage');

		// Insert the post into the database
		$pageID = wp_insert_post( $my_post );
		if($pageID != false)
		{
			$surname = $this->getSurname($fileName, $dataDir);
			$this->createMapEntry($pid,$pageID, $name, $surname, $dataDir);
		}
		return $pageID;
	}

	function returnDefaultEmpty($input, $mysite, $pluginUrl) {
		$block = "<div class='truncate'><img src='" . $pluginUrl ."rootspersona/images/boy-silhouette.gif' class='headerBox' />";
		$block = $block . "<div class='headerBox'><span class='headerBox'>" . $input . "</span></div></div>";
		$block = $block . "<br/><div class='personBanner'><br/></div>";
		return $block;
	}
}
