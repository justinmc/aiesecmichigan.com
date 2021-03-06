<?php 

/******************************************************************************
 *
 *  This file talks directly with the sql database
 *
 *****************************************************************************/


require ($_SERVER["DOCUMENT_ROOT"] . '/private/config.php');

// Accesses the database, returns an array of a given row
function getDB ($table, $row)
{  global $server, $username, $password, $db;
   $con = mysql_connect($server, $username, $password);
   if (!$con)
      die('getDB could not connect: ' . mysql_error());

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
	  $result = mysql_query("UPDATE `$table` SET `$col` = '$string' WHERE `index` = $row LIMIT 1");

    if (!$result)
        die("MYSQL ERROR: " . mysql_error());

      mysql_close($con);
}


// Inserts a new row given the index and an array of strings for column values
function insertLine($index, $string, $table)
{	global $server, $username, $password, $db;

	$con = mysql_connect($server, $username, $password);
    if (!$con)
    	die('Could not connect: ' . mysql_error());

	mysql_select_db($db);

	$query = "INSERT INTO `$table` VALUES ('$index";
	for ($i = 0; $i < sizeof($string); $i++)
    {   $string[$i] = str_replace("\'", "''", $string[$i]);            // PHP to SQL apostrophe escape (\' to '')
		$query = $query . "', '" . $string[$i];
    }
	$query = $query . "')";

	$result = mysql_query($query);

    if (!$result)
        die("MYSQL ERROR: " . mysql_error());

    mysql_close($con);
}

// Executes a SQL query and returns the result
function query ($queryString)
{	global $server, $username, $password, $db;

	$con = mysql_connect($server, $username, $password);
    if (!$con)
    	die('Could not connect: ' . mysql_error());

	mysql_select_db($db);
    
	$result = mysql_query($queryString);

    mysql_close($con);

    return ($result);
}

?>
