<?php

function buildPersonaIndexPage($batchId, $pageNbr, $perPage, $credentials) {
	$transaction = new Transaction($credentials, true);
	$cnt = DAOFactory::getRpPersonaDAO()->getIndexedPageCnt($batchId);
	$rows = DAOFactory::getRpPersonaDAO()->getIndexedPage($batchId, $pageNbr, $perPage);
	$transaction->close();

	$targetUrl = site_url() . "?page_id=" . get_option('rootsPersonaIndexPage');
	$pagination = buildPagination($pageNbr, $perPage, $cnt, $targetUrl);
	$xofyStart = (($pageNbr * $perPage)- $perPage +1);
	$xofyEnd = $xofyStart + count($rows) -1;
	$xofy = "<div class='xofy'>Displaying "
			. $xofyStart . ' - '
			. $xofyEnd
			. ' of ' . $cnt . "</div>";

	$block = $pagination . $xofy;

	$block .= '<table id="personaIndexTable" cellpadding="0" cellspacing="0">'
	. "<tr><th class='surname'>Surname</th><th class='given'>Name</th><th class='dates'>Dates</th><th class='page'>Link</th></tr>";

	$evenodd = 'even';
	foreach ($rows AS $row) {
		$block .= "<tr class='" . $evenodd . "'><td class='surname'>" . $row['surname']
		. "</td><td class='given'>" . $row['given']
		. "</td><td class='dates'>" . $row['dates']
		. "</td><td class='page'><a href='" . site_url() . "?page_id=" . $row['page'] . "'>" . $row['page'] . "</a>"
		. "</td></tr>";
		if($evenodd == 'even') $evenodd = 'odd';
		else $evenodd = 'even';
	}

	$block .= '</table>' . $xofy . $pagination;

	return $block;
}

function buildPagination($currPage, $perPage, $rowCnt, $targetpage) {
	$maxlinks = 9;	// number of index links
	$adjacent = 4;	// we center current page, how many links on each side

	$prev = $currPage - 1;						//previous page is page - 1
	$next = $currPage + 1;						//next page is page + 1
	$lastpage = ceil($rowCnt/$perPage);		//lastpage is = total pages / items per page, rounded up.

	$start = $currPage - $adjacent;
	while($start + $maxlinks > $lastpage +1) $start--;
	if($start < 1) $start = 1;

	$finish = $start + $maxlinks -1;
	if($finish > $lastpage) $finish = $lastpage;

	$pagination = "<div class='pagination'>";
	if($currPage != 1)
	$pagination.= "<a href='$targetpage?page=1'>&lt;&lt; first</a>";
	else
	$pagination.= "<span class='disabled'>&lt;&lt; first</span>";
	if ($currPage > 1)
	$pagination.= "<a href='$targetpage&rootsvar=$prev'>&lt; prev</a>";
	else
	$pagination.= "<span class='disabled'>&lt; prev</span>";

	for($p=$start;$p<=$finish;$p++) {
		if($p == $currPage) {
			$pagination.= "<span class='current'>$p</span>";
		}
		else {
			$pagination.= "<a href='$targetpage&rootsvar=$p'>$p</a>";
		}
	}

	if ($currPage != $finish)
	$pagination .= "<a href='$targetpage?&rootsvar=$next'>next &gt;</a>";
	else
	$pagination .= "<span class='disabled'>next &gt;</span>";

	if($currPage != $lastpage)
	$pagination .= "<a href='$targetpage?&rootsvar=$lastpage'>last &gt;&gt;</a>";
	else
	$pagination .= "<span class='disabled'>last &gt;&gt;</span>";

	$pagination .= "</div>";
	return $pagination;
}

?>