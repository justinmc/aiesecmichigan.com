<?php

/******************************************************************************
 *
 * This page is called by the Logins form and writes or removes an entry
 *
******************************************************************************/


include $_SERVER["DOCUMENT_ROOT"] . '/app/sql.php';

$action = $_REQUEST["action"];
$index = $_REQUEST["index"];
$name = $_REQUEST["name"];
$account = $_REQUEST["account"];
//$account = query("SELECT googleAccount FROM 'users' WHERE index = $index;");

//announceWrite($announcement, $by);

if ($action == "add")
{
	$id = getrows("users");
	query("INSERT INTO users VALUES ($id, '$name', 1, '$account', '');");
}
else if ($action == "remove")
	writeDB($index, "allowed", "0", "users");
else
	header('Location: http://www.aiesecmichigan.com/admin.php?written=-1');	

header('Location: http://www.aiesecmichigan.com/admin.php?written=1');

?>
