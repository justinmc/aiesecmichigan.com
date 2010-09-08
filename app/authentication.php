<?php

/* 
 * This file just does some basic authentication stuff
 * Check rpx.php for the actual authentication code, which I got from janrain */

include $_SERVER["DOCUMENT_ROOT"] . '/app/sql.php'; 


// Checks database for given email address to see if you're allowed in, on initial login
function allowed($email)
{
	if (colCont('googleAccount', $email) != -1)
	   return 1;
	else
	   return 0;
}

// AFTER you've already logged in, and your identifier should be in the database, this checks for a match
function authenticate ($identifier)
{ 
	if ((colCont('identifier', $identifier) != -1) && ($identifier))
	   return 1;
	else
	   return 0;
}

// returns the user's name given his identifier.  Should it use his email instead?
function getName($identifier)
{
    $row = colCont('identifier', $identifier);
    if (($row != -1) && ($identifier))
    {  $DATA = getDB($row);
       return ($DATA['name']);
    }
    else
       return "";
}

// Makes sure that the identifier is saved for the email address.  If not, writes it to the db.
function updateID($email, $id)
{
	$row = colCont('googleAccount', $email);
	$DATA = getdb($row);

	if (!$DATA['identifier'])
		writeDB($row, 'identifier', $id);
		
	return 1;
}


?>