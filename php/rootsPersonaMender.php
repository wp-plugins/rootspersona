<?php
require_once(WP_PLUGIN_DIR  . '/rootspersona/php/personUtility.php');
require_once(WP_PLUGIN_DIR  . '/rootspersona/php/include.dao.php');

class rootsPersonaMender {
	var $credentials;

	/**
	 * Constructor
	 */
	function __construct() {
		$this->credentials = array( 'hostname' => DB_HOST,
							  'dbuser' => DB_USER,
							  'dbpassword' => DB_PASSWORD,
							  'dbname' =>DB_NAME);
	}

	function validatePages ($isRepair=false) {
		$args = array( 'numberposts' => -1, 'post_type'=>'page', 'post_status'=>'any');
		$pages = get_posts($args);
		$isFirst = true;
		$isEmpty = false;
		$transaction = new Transaction($this->credentials, true);

		foreach($pages as $page) {
			$isEmpty = false;
			$output = array();

			if(preg_match("/rootsPersona /i", $page->post_content)) {
				$pid = @preg_replace( '/.*?personId=[\'|"](.*)[\'|"].*?/US'
				, '$1'
				, $page->post_content);

				$wp_page_id = DAOFactory::getRpIndiDAO()->getPageId($pid, 1);

				if(!isset($wp_page_id) || $wp_page_id == null) {
					if($isRepair) {
						$output[] = __("Deleted orphaned page with no reference in rp_indi.", 'rootspersona');
						wp_delete_post($page->ID);
					} else {
						$output[] = __("No reference in rp_indi.", 'rootspersona');
					}
				} else if($page->post_parent != $parent) {
					if($isRepair) {
						$output[] = sprintf(__("Updated parent page to %s.", 'rootspersona'),$parent);
						$my_post = array();
						$my_post['ID'] = $page->ID;
						$my_post['post_parent'] = $parent;
						wp_update_post( $my_post );
					} else {
						$output[] = sprintf(__("Parent page out of synch %s", 'rootspersona')," (" . $parent . ").");
					}
				}
			} else if(preg_match("/rootsPersonaIndexPage/i", $page->post_content)) {
				$pageId = get_option('rootsPersonaIndexPage');
				if($pageId != $page->ID) {
					if($isRepair) {
						$output[] = sprintf(__("Deleted orphaned %s page.", 'rootspersona'),"rootsPersonaIndexPage");
						wp_delete_post($page->ID);
					} else {
						$output[] = __("Orphaned", 'rootspersona') . " rootsPersonaIndexPage.";
					}
				}
			} else if(preg_match("/rootsEditPersonaForm/i", $page->post_content)) {
				$pageId = get_option('rootsEditPage');
				if($pageId != $page->ID) {
					if($isRepair) {
						$output[] = sprintf(__("Deleted orphaned %s page.", 'rootspersona'),"rootsEditPersonaForm");
						wp_delete_post($page->ID);
					} else {
						$output[] = __("Orphaned", 'rootspersona')." rootsEditPersonaForm.";
					}
				}
			} else if(preg_match("/rootsAddPageForm/i", $page->post_content)) {
				$pageId = get_option('rootsCreatePage');
				if($pageId != $page->ID) {
					if($isRepair) {
						$output[] = sprintf(__("Deleted orphaned %s page.", 'rootspersona'),"rootsAddPageForm");
						wp_delete_post($page->ID);
					} else {
						$output[] = __("Orphaned", 'rootspersona') ." rootsAddPageForm.";
					}
				}
			} else if(preg_match("/rootsUploadGedcomForm/i", $page->post_content)) {
				$pageId = get_option('rootsUploadGedcomPage');
				if($pageId != $page->ID) {
					if($isRepair) {
						$output[] = sprintf(__("Deleted orphaned %s page.", 'rootspersona'),"rootsUploadGedcomForm");
						wp_delete_post($page->ID);
					} else {
						$output[] = __("Orphaned.", 'rootspersona') . " rootsUploadGedcomForm.";
					}
				}
			} else if(preg_match("/rootsIncludePageForm/i", $page->post_content)) {
				$pageId = get_option('rootsIncludePage');
				if($pageId != $page->ID) {
					if($isRepair) {
						$output[] = sprintf(__("Deleted orphaned %s page.", 'rootspersona'),"rootsIncludePage");
						wp_delete_post($page->ID);
					} else {
						$output[] = __("Orphaned", 'rootspersona') ." rootsIncludePage.";
					}
				}
			} else if(preg_match("/rootsUtilityPage/i", $page->post_content)) {
				$pageId = get_option('rootsUtilityPage');
				if($pageId != $page->ID) {
					if($isRepair) {
						$output[] = sprintf(__("Deleted orphaned %s page.", 'rootspersona'),"rootsUtilityPage");
						wp_delete_post($page->ID);
					} else {
						$output[] = __("Orphaned", 'rootspersona')." rootsUtilityPage.";
					}
				}
			} else if(preg_match("/rootsEvidencePage *sourceId=.*/i", $page->post_content)) {
				$sid = @preg_replace( '/.*?sourceId=[\'|"](.*)[\'|"].*?/US'
				, '$1'
				, $page->post_content);

				$wp_page_id = DAOFactory::getRpSourceDAO()->getPageId($sid, 1);

				if(!isset($wp_page_id) || $wp_page_id == null) {
					if($isRepair) {
						$output[] = __("Deleted orphaned page with no reference in rp_source.", 'rootspersona');
						wp_delete_post($page->ID);
					} else {
						$output[] = __("No reference in rp_source.", 'rootspersona');
					}
				} else if($page->post_parent != $parent) {
					if($isRepair) {
						$output[] = sprintf(__("Updated parent page to %s.", 'rootspersona'),$parent);
						$my_post = array();
						$my_post['ID'] = $page->ID;
						$my_post['post_parent'] = $parent;
						wp_update_post( $my_post );
					} else {
						$output[] = sprintf(__("Parent page out of synch %s", 'rootspersona')," (" . $parent . ").");
					}
				}
			}

			foreach ($output as $line) {
				if($isFirst) {
					echo "<p style='padding: .5em; background-color: yellow; color: black; font-weight: bold;'>"
					. sprintf(__('Issues found with your %s pages.', 'rootspersona'),"rootsPersona")."</p>";
					$isFirst = false;
				}
				echo __("Page", 'rootspersona')." ". $page->ID . ": " .$line . "<br/>";
			}
		}

		$transaction->close();

		$footer =  "<div style='text-align:center;padding:.5em;margin-top:.5em;'>";
		if($isEmpty) {
			$footer .=  "<p style='padding: .5em;margin-top:.5em; background-color: green; color: white; font-weight: bold;'>"
			. __('No persona pages found.', 'rootspersona')."</p>"
			. "<span>&#160;&#160;</span>";
		} else if($isFirst) {
			$footer .=  "<p style='padding: .5em;margin-top:.5em; background-color: green; color: white; font-weight: bold;'>"
			. sprintf(__('Your %s setup is VALID.', 'rootspersona'),"rootsPersona")."</p>"
			. "<span>&#160;&#160;</span>";
		} else if(!$isRepair) {
			$footer .= "<span class='rp_linkbutton' style='border:2px outset orange;padding:5px'><a href=' "
			. site_url() . "?page_id=" . get_option('rootsUtilityPage')
			. "&utilityAction=repair'>" . __('Repair Inconsistencies?', 'rootspersona') . "</a></span>"
			. "<span>&#160;&#160;</span>";
		}
		$footer .=  "<span class='rp_linkbutton' style='border:2px outset orange;padding:5px;'><a href=' "
		. admin_url() . "tools.php?page=rootsPersona'>" . __('Return', 'rootspersona') . "</a></span>"
		.  "</div>";
		echo $footer;
	}

	function deletePages () {
		$args = array( 'numberposts' => -1, 'post_type'=>'page','post_status'=>'any');
		$pages = get_posts($args);
		$cnt = 0;
		foreach($pages as $page) {
			if(preg_match("/rootsPersona |rootsEvidencePage /", $page->post_content)) {
				wp_delete_post($page->ID);
				$cnt++;
				set_time_limit(60);
			}
		}
		$transaction = new Transaction($this->credentials, false);
		DAOFactory::getRpIndiDAO()->unlinkAllPages();
		DAOFactory::getRpSourceDAO()->unlinkAllPages();
		$transaction->commit();
		echo $cnt  ." ". __('pages deleted.', 'rootspersona')."<br/>";
		echo   "<div style='text-align:center;padding:.5em;margin-top:.5em;'>"
		.  "<span class='rp_linkbutton' style='border:2px outset orange;padding:5px;'><a href=' "
		. admin_url() . "tools.php?page=rootsPersona'>" . __('Return', 'rootspersona') . "</a></span>"
		.  "</div>";
	}

	function addEvidencePages () {
		$transaction = new Transaction($this->credentials, false);
		$sources = DAOFactory::getRpSourceDAO()->getSourceNoPage(1);
		$cnt = count($sources);
		for($idx=0;$idx<$cnt;$idx++) {
			$utility = new PersonUtility();
			$content =  sprintf("[rootsEvidencePage sourceId='%s'/]", $sources['id']);
			$pageId = $utility->createEvidencePage($sources['id'], $content);
			DAOFactory::getRpSourceDAO()->updatePage($sources['id'],1,$pageId);
		}
		$transaction->commit();
	}
}
?>
