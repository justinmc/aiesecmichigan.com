<?php 

/* This file talks directly with the sql database */


$server = 'localhost'; // 'aiesecmi.ipowermysql.com';
$username = 'aiesecmi';
$password = 'wolverine.2';
$db = "justin";

// Accesses the database, returns an array of a given row
function getDB ($table, $row)
{  global $server, $username, $password, $db;
   $con = mysql_connect($server, $username, $password);
   if (!$con)
      die('getdb could not connect: ' . mysql_error());

   mysql_select_db($db);
   
   $QUERY = mysql_query("SELECT * FROM `$table` WHERE `index` = $row");
   $DATA = mysql_fetch_array($QUERY);

   mysql_close($con);

   return ($DATA);
}

// Returns the number of rows in users
function getrows ($table)
{  global $server, $username, $password, $db;

   $con = mysql_connect($server, $username, $password);
   if (!$con)
      die('getrows could not connect: ' . mysql_error());
      
   mysql_select_db($db);
   
   $QUERY = mysql_query("SELECT * FROM $table");   
   $rows = 0;
   $rows = mysql_num_rows($QUERY);

   return ($rows);
}

// Returns index of row with field that matches string in the column, -1 otherwise
function colCont($col, $string, $table)
{ 
	$rows = getrows($table);
	$i = 0;
	
	while ($i < $rows)
	{
		$DATA = getDB($table, $i);
		
		if ($DATA[$col] == $string)
		   return $i;
		$i++;
	}
	return -1;
}

// Writes a srting to a cell given by its row and column
function writeDB($row, $col, $string, $table)
{     global $server, $username, $password, $db;

	  $con = mysql_connect($server, $username, $password);
      if (!$con)
         die('Could not connect: ' . mysql_error());

      mysql_select_db($db);
	  mysql_query("UPDATE `$table` SET `$col` = '$string' WHERE `index` = $row LIMIT 1");

      mysql_close($con);
}

?>