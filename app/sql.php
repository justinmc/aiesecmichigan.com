<?php 

/******************************************************************************
 *
 *  This file talks directly with the sql database
 *
 *****************************************************************************/


require ($_SERVER["DOCUMENT_ROOT"] . '/app/config.php');

/*$server = 'localhost'; // 'aiesecmi.ipowermysql.com';
$username = 'aiesecmi';
$password = 'wolverine.2';
$db = "justin";
 */



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

// Returns the number of rows in table
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
function colCont ($col, $string, $table)
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

// Writes a string to a cell given by its row and column
function writeDB($row, $col, $string, $table)
{     global $server, $username, $password, $db;

	  $con = mysql_connect($server, $username, $password);
      if (!$con)
         die('Could not connect: ' . mysql_error());

      mysql_select_db($db);
	  mysql_query("UPDATE `$table` SET `$col` = '$string' WHERE `index` = $row LIMIT 1");

      mysql_close($con);
}


// Inserts a new row given the index and an array of strings for column values
function insertLine($index, $string, $table)
{	global $server, $username, $password, $db;

	$con = mysql_connect($server, $username, $password);
    if (!$con)
    	die('Could not connect: ' . mysql_error());

	mysql_select_db($db);

	$query = "INSERT INTO `$table` VALUES (`$index";
	for ($i = 0; $i < sizeof($string); $i++)
		$query = $query . "`, `" . $string[$i];
	$query = $query . "`);";

	echo "insertline working: " . $query . "\n";

	$queryFake = "INSERT INTO `announcements` ( `index` , `date` , `by` , `text` ) VALUES ('5', '2011-04-23 00:07:59', 'Justin on phpmyadmin', 'Recruitment is closed for this summer. We'll be recruiting new members again in the fall.');";

//	mysql_query($queryFake);
	mysql_query("INSERT INTO `announcements` ( `index` , `date` , `by` , `text` ) VALUES ('5', '2011-04-23 00:07:59', 'Justin from code', 'Recruitment is closed for this summer. We'll be recruiting new members again in the fall.');");

    mysql_close($con);
}

?>
