<?php
	//include all DAO files
	require_once('wp-content/plugins/rootspersona/php/dao/sql/Connection.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/sql/ConnectionFactory.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/sql/QueryExecutor.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/sql/Transaction.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/sql/SqlQuery.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/core/ArrayList.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/dao/DAOFactory.class.php');

	require_once('wp-content/plugins/rootspersona/php/dao/dao/RpAddressDAO.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/dto/RpAddres.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/mysql/RpAddressMySqlDAO.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/mysql/ext/RpAddressMySqlExtDAO.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/dao/RpEventCiteDAO.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/dto/RpEventCite.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/mysql/RpEventCiteMySqlDAO.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/mysql/ext/RpEventCiteMySqlExtDAO.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/dao/RpEventDetailDAO.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/dto/RpEventDetail.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/mysql/RpEventDetailMySqlDAO.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/mysql/ext/RpEventDetailMySqlExtDAO.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/dao/RpEventNoteDAO.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/dto/RpEventNote.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/mysql/RpEventNoteMySqlDAO.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/mysql/ext/RpEventNoteMySqlExtDAO.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/dao/RpFamDAO.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/dto/RpFam.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/mysql/RpFamMySqlDAO.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/mysql/ext/RpFamMySqlExtDAO.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/dao/RpFamChildDAO.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/dto/RpFamChild.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/mysql/RpFamChildMySqlDAO.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/mysql/ext/RpFamChildMySqlExtDAO.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/dao/RpFamCiteDAO.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/dto/RpFamCite.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/mysql/RpFamCiteMySqlDAO.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/mysql/ext/RpFamCiteMySqlExtDAO.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/dao/RpFamEventDAO.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/dto/RpFamEvent.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/mysql/RpFamEventMySqlDAO.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/mysql/ext/RpFamEventMySqlExtDAO.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/dao/RpFamNoteDAO.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/dto/RpFamNote.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/mysql/RpFamNoteMySqlDAO.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/mysql/ext/RpFamNoteMySqlExtDAO.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/dao/RpHeaderDAO.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/dto/RpHeader.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/mysql/RpHeaderMySqlDAO.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/mysql/ext/RpHeaderMySqlExtDAO.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/dao/RpIndiDAO.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/dto/RpIndi.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/mysql/RpIndiMySqlDAO.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/mysql/ext/RpIndiMySqlExtDAO.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/dao/RpIndiCiteDAO.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/dto/RpIndiCite.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/mysql/RpIndiCiteMySqlDAO.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/mysql/ext/RpIndiCiteMySqlExtDAO.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/dao/RpIndiEventDAO.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/dto/RpIndiEvent.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/mysql/RpIndiEventMySqlDAO.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/mysql/ext/RpIndiEventMySqlExtDAO.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/dao/RpIndiFamDAO.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/dto/RpIndiFam.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/mysql/RpIndiFamMySqlDAO.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/mysql/ext/RpIndiFamMySqlExtDAO.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/dao/RpIndiNameDAO.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/dto/RpIndiName.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/mysql/RpIndiNameMySqlDAO.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/mysql/ext/RpIndiNameMySqlExtDAO.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/dao/RpIndiNoteDAO.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/dto/RpIndiNote.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/mysql/RpIndiNoteMySqlDAO.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/mysql/ext/RpIndiNoteMySqlExtDAO.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/dao/RpNameCiteDAO.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/dto/RpNameCite.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/mysql/RpNameCiteMySqlDAO.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/mysql/ext/RpNameCiteMySqlExtDAO.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/dao/RpNameNameDAO.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/dto/RpNameName.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/mysql/RpNameNameMySqlDAO.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/mysql/ext/RpNameNameMySqlExtDAO.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/dao/RpNameNoteDAO.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/dto/RpNameNote.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/mysql/RpNameNoteMySqlDAO.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/mysql/ext/RpNameNoteMySqlExtDAO.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/dao/RpNamePersonalDAO.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/dto/RpNamePersonal.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/mysql/RpNamePersonalMySqlDAO.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/mysql/ext/RpNamePersonalMySqlExtDAO.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/dao/RpNoteDAO.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/dto/RpNote.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/mysql/RpNoteMySqlDAO.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/mysql/ext/RpNoteMySqlExtDAO.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/dao/RpRepoNoteDAO.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/dto/RpRepoNote.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/mysql/RpRepoNoteMySqlDAO.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/mysql/ext/RpRepoNoteMySqlExtDAO.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/dao/RpSourceDAO.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/dto/RpSource.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/mysql/RpSourceMySqlDAO.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/mysql/ext/RpSourceMySqlExtDAO.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/dao/RpSourceCiteDAO.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/dto/RpSourceCite.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/mysql/RpSourceCiteMySqlDAO.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/mysql/ext/RpSourceCiteMySqlExtDAO.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/dao/RpSourceNoteDAO.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/dto/RpSourceNote.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/mysql/RpSourceNoteMySqlDAO.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/mysql/ext/RpSourceNoteMySqlExtDAO.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/dao/RpSubmitterDAO.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/dto/RpSubmitter.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/mysql/RpSubmitterMySqlDAO.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/mysql/ext/RpSubmitterMySqlExtDAO.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/dao/RpSubmitterNoteDAO.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/dto/RpSubmitterNote.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/mysql/RpSubmitterNoteMySqlDAO.class.php');
	require_once('wp-content/plugins/rootspersona/php/dao/mysql/ext/RpSubmitterNoteMySqlExtDAO.class.php');

?>