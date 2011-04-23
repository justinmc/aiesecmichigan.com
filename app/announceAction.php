<?php

/******************************************************************************
 *
 * This page is called by the announcement form and writes a new entry
 *
******************************************************************************/


include $_SERVER["DOCUMENT_ROOT"] . '/app/announce.php';
include $_SERVER["DOCUMENT_ROOT"] . '/app/sql.php';

$announcement = $_REQUEST["announcement"];
$by = $_REQUEST["by"];

announceWrite($announcement, $by);

header('Location: http://www.aiesecmichigan.com/admin.php?written=1'); // . $_REQUEST["return"]);

?>
