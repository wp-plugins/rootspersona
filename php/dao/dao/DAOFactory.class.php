<?php

/**
 * DAOFactory
 * @author: http://phpdao.com
 * @date: ${date}
 */
class DAOFactory{
	
	/**
	 * @return RpAddressDAO
	 */
	public static function getRpAddressDAO(){
		return new RpAddressMySqlExtDAO();
	}

	/**
	 * @return RpEventCiteDAO
	 */
	public static function getRpEventCiteDAO(){
		return new RpEventCiteMySqlExtDAO();
	}

	/**
	 * @return RpEventDetailDAO
	 */
	public static function getRpEventDetailDAO(){
		return new RpEventDetailMySqlExtDAO();
	}

	/**
	 * @return RpEventNoteDAO
	 */
	public static function getRpEventNoteDAO(){
		return new RpEventNoteMySqlExtDAO();
	}

	/**
	 * @return RpFamDAO
	 */
	public static function getRpFamDAO(){
		return new RpFamMySqlExtDAO();
	}

	/**
	 * @return RpFamChildDAO
	 */
	public static function getRpFamChildDAO(){
		return new RpFamChildMySqlExtDAO();
	}

	/**
	 * @return RpFamCiteDAO
	 */
	public static function getRpFamCiteDAO(){
		return new RpFamCiteMySqlExtDAO();
	}

	/**
	 * @return RpFamEventDAO
	 */
	public static function getRpFamEventDAO(){
		return new RpFamEventMySqlExtDAO();
	}

	/**
	 * @return RpFamNoteDAO
	 */
	public static function getRpFamNoteDAO(){
		return new RpFamNoteMySqlExtDAO();
	}

	/**
	 * @return RpHeaderDAO
	 */
	public static function getRpHeaderDAO(){
		return new RpHeaderMySqlExtDAO();
	}

	/**
	 * @return RpIndiDAO
	 */
	public static function getRpIndiDAO(){
		return new RpIndiMySqlExtDAO();
	}

	/**
	 * @return RpIndiCiteDAO
	 */
	public static function getRpIndiCiteDAO(){
		return new RpIndiCiteMySqlExtDAO();
	}

	/**
	 * @return RpIndiEventDAO
	 */
	public static function getRpIndiEventDAO(){
		return new RpIndiEventMySqlExtDAO();
	}

	/**
	 * @return RpIndiFamDAO
	 */
	public static function getRpIndiFamDAO(){
		return new RpIndiFamMySqlExtDAO();
	}

	/**
	 * @return RpIndiNameDAO
	 */
	public static function getRpIndiNameDAO(){
		return new RpIndiNameMySqlExtDAO();
	}

	/**
	 * @return RpIndiNoteDAO
	 */
	public static function getRpIndiNoteDAO(){
		return new RpIndiNoteMySqlExtDAO();
	}

	/**
	 * @return RpNameCiteDAO
	 */
	public static function getRpNameCiteDAO(){
		return new RpNameCiteMySqlExtDAO();
	}

	/**
	 * @return RpNameNameDAO
	 */
	public static function getRpNameNameDAO(){
		return new RpNameNameMySqlExtDAO();
	}

	/**
	 * @return RpNameNoteDAO
	 */
	public static function getRpNameNoteDAO(){
		return new RpNameNoteMySqlExtDAO();
	}

	/**
	 * @return RpNamePersonalDAO
	 */
	public static function getRpNamePersonalDAO(){
		return new RpNamePersonalMySqlExtDAO();
	}

	/**
	 * @return RpNoteDAO
	 */
	public static function getRpNoteDAO(){
		return new RpNoteMySqlExtDAO();
	}

	/**
	 * @return RpRepoNoteDAO
	 */
	public static function getRpRepoNoteDAO(){
		return new RpRepoNoteMySqlExtDAO();
	}

	/**
	 * @return RpSourceDAO
	 */
	public static function getRpSourceDAO(){
		return new RpSourceMySqlExtDAO();
	}

	/**
	 * @return RpSourceCiteDAO
	 */
	public static function getRpSourceCiteDAO(){
		return new RpSourceCiteMySqlExtDAO();
	}

	/**
	 * @return RpSourceNoteDAO
	 */
	public static function getRpSourceNoteDAO(){
		return new RpSourceNoteMySqlExtDAO();
	}

	/**
	 * @return RpSubmitterDAO
	 */
	public static function getRpSubmitterDAO(){
		return new RpSubmitterMySqlExtDAO();
	}

	/**
	 * @return RpSubmitterNoteDAO
	 */
	public static function getRpSubmitterNoteDAO(){
		return new RpSubmitterNoteMySqlExtDAO();
	}

	/**
	 * @return WpCommentmetaDAO
	 */
	public static function getWpCommentmetaDAO(){
		return new WpCommentmetaMySqlExtDAO();
	}

	/**
	 * @return WpCommentsDAO
	 */
	public static function getWpCommentsDAO(){
		return new WpCommentsMySqlExtDAO();
	}

	/**
	 * @return WpLinksDAO
	 */
	public static function getWpLinksDAO(){
		return new WpLinksMySqlExtDAO();
	}

	/**
	 * @return WpOptionsDAO
	 */
	public static function getWpOptionsDAO(){
		return new WpOptionsMySqlExtDAO();
	}

	/**
	 * @return WpPostmetaDAO
	 */
	public static function getWpPostmetaDAO(){
		return new WpPostmetaMySqlExtDAO();
	}

	/**
	 * @return WpPostsDAO
	 */
	public static function getWpPostsDAO(){
		return new WpPostsMySqlExtDAO();
	}

	/**
	 * @return WpTermRelationshipsDAO
	 */
	public static function getWpTermRelationshipsDAO(){
		return new WpTermRelationshipsMySqlExtDAO();
	}

	/**
	 * @return WpTermTaxonomyDAO
	 */
	public static function getWpTermTaxonomyDAO(){
		return new WpTermTaxonomyMySqlExtDAO();
	}

	/**
	 * @return WpTermsDAO
	 */
	public static function getWpTermsDAO(){
		return new WpTermsMySqlExtDAO();
	}

	/**
	 * @return WpUsermetaDAO
	 */
	public static function getWpUsermetaDAO(){
		return new WpUsermetaMySqlExtDAO();
	}

	/**
	 * @return WpUsersDAO
	 */
	public static function getWpUsersDAO(){
		return new WpUsersMySqlExtDAO();
	}


}
?>