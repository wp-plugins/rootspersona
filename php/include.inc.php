<?php
require_once(ABSPATH . 'wp-content/plugins/rootspersona/php/Genealogy/Gedcom/Structures/EntityAbstract.php');
require_once(ABSPATH . 'wp-content/plugins/rootspersona/php/Genealogy/Gedcom/rpParser.php');
require_once(ABSPATH . 'wp-content/plugins/rootspersona/php/Genealogy/Gedcom/Exceptions/FileException.php');
require_once(ABSPATH . 'wp-content/plugins/rootspersona/php/Genealogy/Gedcom/Exceptions/InvalidFieldException.php');
require_once(ABSPATH . 'wp-content/plugins/rootspersona/php/Genealogy/Gedcom/GedcomManager.php');
require_once(ABSPATH . 'wp-content/plugins/rootspersona/php/Genealogy/Gedcom/Structures/FactDetail.php');
require_once(ABSPATH . 'wp-content/plugins/rootspersona/php/Genealogy/Gedcom/Records/FamilyRecord.php');
require_once(ABSPATH . 'wp-content/plugins/rootspersona/php/Genealogy/Gedcom/Records/HeaderRecord.php');
require_once(ABSPATH . 'wp-content/plugins/rootspersona/php/Genealogy/Gedcom/Records/IndividualRecord.php');
require_once(ABSPATH . 'wp-content/plugins/rootspersona/php/Genealogy/Gedcom/Records/MediaRecord.php');
require_once(ABSPATH . 'wp-content/plugins/rootspersona/php/Genealogy/Gedcom/Records/NoteRecord.php');
require_once(ABSPATH . 'wp-content/plugins/rootspersona/php/Genealogy/Gedcom/Records/RepositoryRecord.php');
require_once(ABSPATH . 'wp-content/plugins/rootspersona/php/Genealogy/Gedcom/Records/SourceRecord.php');
require_once(ABSPATH . 'wp-content/plugins/rootspersona/php/Genealogy/Gedcom/Records/SubmissionRecord.php');
require_once(ABSPATH . 'wp-content/plugins/rootspersona/php/Genealogy/Gedcom/Records/SubmitterRecord.php');
require_once(ABSPATH . 'wp-content/plugins/rootspersona/php/Genealogy/Gedcom/Structures/rpAddress.php');
require_once(ABSPATH . 'wp-content/plugins/rootspersona/php/Genealogy/Gedcom/Structures/Association.php');
require_once(ABSPATH . 'wp-content/plugins/rootspersona/php/Genealogy/Gedcom/Structures/ChangeDate.php');
require_once(ABSPATH . 'wp-content/plugins/rootspersona/php/Genealogy/Gedcom/Structures/CharacterSet.php');
require_once(ABSPATH . 'wp-content/plugins/rootspersona/php/Genealogy/Gedcom/Structures/Citation.php');
require_once(ABSPATH . 'wp-content/plugins/rootspersona/php/Genealogy/Gedcom/Structures/Corporation.php');
require_once(ABSPATH . 'wp-content/plugins/rootspersona/php/Genealogy/Gedcom/Structures/rpData.php');
require_once(ABSPATH . 'wp-content/plugins/rootspersona/php/Genealogy/Gedcom/Structures/rpEvent.php');
require_once(ABSPATH . 'wp-content/plugins/rootspersona/php/Genealogy/Gedcom/Structures/rpFact.php');
require_once(ABSPATH . 'wp-content/plugins/rootspersona/php/Genealogy/Gedcom/Structures/FamilyLink.php');
require_once(ABSPATH . 'wp-content/plugins/rootspersona/php/Genealogy/Gedcom/Structures/GedC.php');
require_once(ABSPATH . 'wp-content/plugins/rootspersona/php/Genealogy/Gedcom/Structures/LdsOrdinance.php');
require_once(ABSPATH . 'wp-content/plugins/rootspersona/php/Genealogy/Gedcom/Structures/LdsSealing.php');
require_once(ABSPATH . 'wp-content/plugins/rootspersona/php/Genealogy/Gedcom/Structures/MediaFile.php');
require_once(ABSPATH . 'wp-content/plugins/rootspersona/php/Genealogy/Gedcom/Structures/MediaLink.php');
require_once(ABSPATH . 'wp-content/plugins/rootspersona/php/Genealogy/Gedcom/Structures/rpName.php');
require_once(ABSPATH . 'wp-content/plugins/rootspersona/php/Genealogy/Gedcom/Structures/rpNamePieces.php');
require_once(ABSPATH . 'wp-content/plugins/rootspersona/php/Genealogy/Gedcom/Structures/Note.php');
require_once(ABSPATH . 'wp-content/plugins/rootspersona/php/Genealogy/Gedcom/Structures/PersonalName.php');
require_once(ABSPATH . 'wp-content/plugins/rootspersona/php/Genealogy/Gedcom/Structures/Place.php');
require_once(ABSPATH . 'wp-content/plugins/rootspersona/php/Genealogy/Gedcom/Structures/RepositoryCitation.php');
require_once(ABSPATH . 'wp-content/plugins/rootspersona/php/Genealogy/Gedcom/Structures/SourceData.php');
require_once(ABSPATH . 'wp-content/plugins/rootspersona/php/Genealogy/Gedcom/Structures/SourceSystem.php');
require_once(ABSPATH . 'wp-content/plugins/rootspersona/php/Genealogy/Gedcom/rpTags.php');
