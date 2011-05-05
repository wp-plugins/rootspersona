<?php

class PersonUtility {

	function createEvidencePage($title, $contents, $page='') {
		// Create post object
		$my_post = array();
		$my_post['post_title'] = $title;
		$my_post['post_content'] = $contents;
		$my_post['post_status'] = 'publish';
		$my_post['post_author'] = 0;
		$my_post['post_type'] = 'page';
		$my_post['ping_status'] = 'closed';
		$my_post['comment_status'] = 'closed';
		$my_post['post_parent'] = get_option('rootsEvidencePage');

		$pageID = '';
		if(empty($page)) {
			$pageID = wp_insert_post( $my_post );
		} else {
			$my_post['ID'] = $page;
			wp_update_post( $my_post );
			$pageID = $page;
		}
		return $pageID;
	}

	function addPage($person, $name) {
		// Create post object
		$my_post = array();
		$my_post['post_title'] = $name;
		$my_post['post_content'] = "[rootsPersona personId='$person'/]";
		$my_post['post_status'] = 'publish';
		$my_post['post_author'] = 0;
		$my_post['post_type'] = 'page';
		$my_post['ping_status'] = get_option('default_ping_status');
		$my_post['post_parent'] = get_option('rootsPersonaParentPage');

		// Insert the post into the database
		$pageID = wp_insert_post( $my_post );
		return $pageID;
	}

	function returnDefaultEmpty($input, $mysite, $pluginUrl) {
		$block = "<div class='truncate'><img src='" . $pluginUrl ."rootspersona/images/boy-silhouette.gif' class='headerBox' />";
		$block = $block . "<div class='headerBox'><span class='headerBox'>" . $input . "</span></div></div>";
		$block = $block . "<br/><div class='personBanner'><br/></div>";
		return $block;
	}
}
