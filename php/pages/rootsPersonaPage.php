<?php
require_once(WP_PLUGIN_DIR  . '/rootspersona/php/pages/panels/personaHeader.php');
require_once(WP_PLUGIN_DIR  . '/rootspersona/php/pages/panels/personaFacts.php');
require_once(WP_PLUGIN_DIR  . '/rootspersona/php/pages/panels/personaAncestors.php');
require_once(WP_PLUGIN_DIR  . '/rootspersona/php/pages/panels/personaPics.php');
require_once(WP_PLUGIN_DIR  . '/rootspersona/php/pages/panels/personaEvidence.php');
require_once(WP_PLUGIN_DIR  . '/rootspersona/php/pages/panels/personaGroupSheet.php');

function buildPersonaPage($atts,  $callback, $pageId) {
	$rootsPersonId = $atts["personid"];
	$block = "";
	$options = getPersonaOptions($atts, $callback);
	$persona = getPersona($rootsPersonId, $options);

	if($options['hideHdr'] == 0) {
		$block .= getPersonaHeader($persona, $options);
	}
	if($options['hideFac'] == 0) {
		if($options['hideBanner'] == 0) {
			$block .= '<div class="rp_banner">Facts</div>';
		}
		$block .= getPersonaFacts($persona->facts, $options);
	}
	if($options['hideAnc'] == 0) {
		if($options['hideBanner'] == 0) {
			$block .= '<div class="rp_banner">Ancestors</div>';
		}
		$block .= getPersonaAncestors($persona->ancestors, $options);
	}
	if($options['hideFamC'] == 0) {
		if($options['hideBanner'] == 0) {
			$block .= '<div class="rp_banner">Family Group Sheet - Child</div>';
		}
	}
	if($options['hideFamS'] == 0) {
		if($options['hideBanner'] == 0) {
			$block .= '<div class="rp_banner">Family Group Sheet - Spouse</div>';
		}
	}
	if($options['hidePic'] == 0) {
		if($options['hideBanner'] == 0) {
			$block .= '<div class="rp_banner">Picture Gallery</div>';
		}
		$block .= getPersonaPics($options);
	}
	if($options['hideEvi'] == 0) {
		if($options['hideBanner'] == 0) {
			$block .= '<div class="rp_banner">Evidence</div>';
		}
		$block .= getPersonaEvidence($persona, $options);
	}
	if($options['hideBanner'] == 0) {
		$block .= '<div class="rp_banner"></div>';
	}
	$block .= getEndOfPage($rootsPersonId, $pageId);
	return $block;
}

function getPersona($id, $options) {
	$credentials = array( 'hostname' => DB_HOST,
				'dbuser' => DB_USER,
				'dbpassword' => DB_PASSWORD,
				'dbname' =>DB_NAME);
	$persona = null;
	$transaction = new Transaction($credentials, true);
	if($options['hideHdr'] == 0) {
		$persona = DAOFactory::getRpPersonaDAO()->getPersona($id,1);
	}
	if($options['hideFac'] == 0) {
		if($persona == null) {
			$persona = new RpPersona();
		}
		$persona->facts = DAOFactory::getRpPersonaDAO()->getPersonaEvents($id,1);
	}
	if($options['hideAnc'] == 0) {
		if($persona == null) {
			$persona = new RpPersona();
		}
		$persona->ancestors = DAOFactory::getRpAncestorsDAO()->getAncestors($persona);
	}
	if($options['hideEvi'] == 0) {
		if($persona == null) {
			$persona = new RpPersona();
		}
		$persona->sources = DAOFactory::getRpPersonaDAO()->getPersonaSources($id,1);
	}
	$transaction->close();
	return $persona;
}

function getPersonaOptions($atts, $callback) {

	$callback = strtolower ($callback);
	$options = array();
	$options['site_url'] = site_url();

	if(empty($callback) || $callback == 'rootspersona') {
		$options['hideHdr'] = get_option('rootsHideHeader');
		$options['hideFac'] = get_option('rootsHideFacts');
		$options['hideAnc'] = get_option('rootsHideAncestors');
		$options['hideFamC'] = get_option('rootsHideFamilyC');
		$options['hideFamS'] = get_option('rootsHideFamilyS');
		$options['hidePic'] = get_option('rootsHidePictures');
		$options['hideEvi'] = get_option('rootsHideEvidence');
		$options['hideBanner'] = 0;
	} else {
		$options['hideHdr'] = 1;
		$options['hideFac'] = 1;
		$options['hideAnc'] = 1;
		$options['hideFamC'] = 1;
		$options['hideFamS'] = 1;
		$options['hidePic'] = 1;
		$options['hideEvi'] = 1;
		$options['hideBanner'] = 1;
		if($callback == 'rootspersonaheader') {
			$options['hideHdr'] = 0;
		} else if($callback == 'rootspersonafacts') {
			$options['hideFac'] = 0;
		} else if($callback == 'rootspersonaancestors') {
			$options['hideAnc'] = 0;
		} else if($callback == 'rootspersonafamilyc') {
			$options['hideFamC'] = 0;
		} else if($callback == 'rootspersonafamilys') {
			$options['hideFamS'] = 0;
		} else if($callback == 'rootspersonapictures') {
			$options['hidePic'] = 0;
		} else if($callback == 'rootspersonaevidence') {
			$options['hideEvi'] = 0;
		}
	}
	$options['hideDates'] = get_option('rootsPersonaHideDates');
	$options['hidePlaces'] = get_option('rootsPersonaHidePlaces');

	if(isset($atts['picfile1'])) {
		$options['pic1'] = $atts['picfile1'];
	} else {
		$options['pic1'] = site_url() . '/wp-content/plugins/rootspersona/images/boy-silhouette.gif';
	}

	for ($idx=1; $idx<7;$idx++) {
		$pic = 'picfile' . ($idx+1);
		if(isset($atts[$pic])) {
			$options['pic'.$idx] = $atts[$pic];
			$cap = 'piccap' . ($idx+1);
			if(isset($atts[$cap])) {
				$options['cap'.$idx] = $atts[$cap];
			}
		}
	}
	return $options;
}

function getEndOfPage($rootsPersonId, $pageId) {
	$block = '';
	if((get_post_type($pageId) != 'post')
	&& (current_user_can("edit_pages"))
	&& get_option('rootsHideEditLinks') != 1)
	{
		$win1 = __('Page will be removed but supporting data will not be deleted.  Proceed?', 'rootspersona');
		$win2 = __('Page will be removed and supporting data will be deleted.  Proceed?', 'rootspersona');
		$win3 = __('Page will be viewable by logged in members only.  Proceed?', 'rootspersona');
		$win4 = __('Page will be viewable by anyone.  Proceed?', 'rootspersona');
		$editPage = site_url() . '/?page_id=' . get_option("rootsEditPage")
		. "&personId=" . $rootsPersonId
		. "&srcPage=" . $pageId . "&action=";

		$block =  "<div style='margin-top:10px;text-align: center ;'><a href='".$editPage
		. "edit'>".__('Edit Person', 'rootspersona')."</a>"
		. "&#160;&#160;<a href='#'"
		. " onClick='javascript:rootsConfirm(\"" . $win1 . "\",\""
		. $editPage . "exclude\");return false;'>".__('Exclude Person', 'rootspersona')."</a>"
		. "&#160;&#160;<a href='#'"
		. " onClick='javascript:rootsConfirm(\"" . $win2 . "\",\""
		. $editPage . "delete\");return false;'>".__('Delete Person', 'rootspersona')."</a>"
		. "&#160;&#160;<a href='#'";

		$perms = get_post_meta($pageId, 'permissions', true);
		if ( empty($perms) || $perms == 'false') {
			$block = $block .  " onClick='javascript:rootsConfirm(\"" . $win3 . "\",\""
			. $editPage . "makePrivate\");return false;'>".__('Make Person Private', 'rootspersona')."</a>";
		}  else {
			$block = $block .  " onClick='javascript:rootsConfirm(\"" . $win4 . "\",\""
			. $editPage . "makePublic\");return false;'>".__('Make Person Public', 'rootspersona')."</a>" ;
		}
		$block = $block .  "</div>";
	}
	return $block;
}
?>