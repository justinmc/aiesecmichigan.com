<?php

/******************************************************************************
 *
 * This file just does some basic authentication stuff
 * Check rpx.php for the actual authentication code, which I got from janrain 
 *
******************************************************************************/


// Checks database for given email address to see if you're allowed in, on initial login
function allowed($email)
{
	if (colCont('googleAccount', $email, "users") != -1)
	   return 1;
	else
	   return 0;
}

// AFTER you've already logged in, and your identifier should be in the database, this checks for a match
function authenticate ($identifier)
{ 
	if ((colCont('identifier', $identifier, "users") != -1) && ($identifier))
	   return 1;
	else
	   return 0;
}

// returns the requested column for the user given their identifier
function getParam($col, $identifier)
{
    $row = colCont('identifier', $identifier, "users");
    if (($row != -1) && ($identifier))
    {  $DATA = getDB("users", $row);
       return ($DATA[$col]);
    }
    else
       return "";
}

// Makes sure that the identifier is saved for the email address.  If not, writes it to the db.
function updateID($email, $id)
{
	$row = colCont('googleAccount', $email, "users");
	$DATA = getdb("users", $row);

	if (!$DATA['identifier'])
		writeDB($row, 'identifier', $id, "users");
		
	return 1;
}


?>
