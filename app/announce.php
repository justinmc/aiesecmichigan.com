<?php

/******************************************************************************
 *
 * This file contains everything to do with the announcement system
 * Reading and writing
 *
******************************************************************************/


// writes the given string to the database as the most recent announcement
function announceWrite($announcement, $by)
{
	$index = getrows('announcements') + 1;

	$string[0] = date('y-m-d H:i:s');
	$string[1] = $by;
	$string[2] = $announcement;

	insertLine($index, $string, 'announcements');

	return;
}

// Returns the (which) most recent announcement
function announceRead($which)
{
	$index = getrows("announcements") - $which;
	$DATA = getDB("announcements", $index);

	return $DATA['text'];
}
							
?>
