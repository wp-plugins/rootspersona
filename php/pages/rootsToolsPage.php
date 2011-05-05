<?php

function buildRootsToolsPage() {

echo "<div class='wrap'><h2>rootsPersona</h2>";
echo  "<table class='form-table'>";

echo  "<tr style='vertical-align: top'>";
echo  "<td style='width:200px;'><div class='rp_linkbutton'><a href=' " . site_url() . "?page_id=" . get_option('rootsUploadGedcomPage') . "'>" . __('Upload GEDCOM', 'rootspersona') . "</a></div></td>";
echo  "<td style='vertical-align:middle'>" . __('Upload (or re-upload) a GEDCOM file.', 'rootspersona') . "</td></tr>";

echo  "<tr style='vertical-align: top'>";
echo  "<td style='width:200px;'><div class='rp_linkbutton'><a href=' " . site_url() . "?page_id=" . get_option('rootsCreatePage') . "'>" . __('Add Uploaded Persons', 'rootspersona') . "</a></div></td>";
echo  "<td style='vertical-align:middle'>" . __('Review the list of people you have uploaded but not created pages for.', 'rootspersona') . "</td></tr>";

echo  "<tr style='vertical-align: top'>";
echo  "<td style='width:200px;'><div class='rp_linkbutton'><a href=' " . site_url() . "?page_id=" . get_option('rootsIncludePage') . "'>" . __('Review Excluded Persons', 'rootspersona') . "</a></div></td>";
echo  "<td style='vertical-align:middle'>" . __('Review people you have previous excluded, and include the ones you select.', 'rootspersona') . "</td></tr>";

echo  "<tr style='vertical-align: top'>";
echo  "<td style='width:200px;'><div class='rp_linkbutton'><a href=' " . site_url() . "?page_id=" . get_option('rootsPersonaIndexPage') . "'>" . __('Name Index', 'rootspersona') . "</a></div></td>";
echo  "<td style='vertical-align:middle'>" . __('View a sortable index table of all persons that you have created pages for.', 'rootspersona') . "</td></tr>";

echo  "<tr style='vertical-align: top'>";
echo  "<td style='width:200px;'><div class='rp_linkbutton'><a href=' " . site_url() . "?page_id=" . get_option('rootsUtilityPage') . "&utilityAction=validatePages'>" . __('Validate persona Pages', 'rootspersona') . "</a></div></td>";
echo  "<td style='vertical-align:middle'>" . sprintf(__('Identify orphaned %s pages. Includes all pages with %s shortcode and no reference in idMap.xml.', 'rootspersona'),"persona","[rootsPersona/]")
		. "<br/>" . __("Will also identify/sync pages with the wrong parent page assigned.") . "</td></tr>";

echo  "<tr style='vertical-align: top'>";
echo  "<td style='width:200px;'><div class='rp_linkbutton'><a href=' " . site_url() . "?page_id=" . get_option('rootsUtilityPage') . "&utilityAction=addEvidencePages'>" . __('Add Evidence Pages', 'rootspersona') . "</a></div></td>";
echo  "<td style='vertical-align:middle'>" . __('Add missing evidence pages.', 'rootspersona') . "</td></tr>";

$win1 = __('All persona pages will be deleted.  Does not include utilities.  Proceed?', 'rootspersona');
echo  "<tr style='vertical-align: top'>";
echo  "<td style='width:200px;'><div class='rp_linkbutton'>";
echo "<a href='#' onClick='javascript:rootsConfirm(\"" . $win1 . "\",\""
	. site_url() . "?page_id=" . get_option('rootsUtilityPage')
	. "&utilityAction=delete\");return false;'>" . __('Delete persona Pages', 'rootspersona') . "</a></div></td>";
echo  "<td style='vertical-align:middle'>" . sprintf(__('Perform a bulk deletion of all %s and evidence pages.', 'rootspersona'),"persona","[rootsPersona/]") . "</td></tr>";

echo  "</table>";
echo  "</div>";
}
?>
