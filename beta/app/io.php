<?php

// This file contains all input/output stuff, particularly regarding interfacing with the blog's rss feed

class rss
{
	
	
}

function title($feed)
{
	foreach ($feed as $line)
	{
		if (strpos('<title>', $line) != -1)
		{
			$title = substr($line, 7, strlen($line));
			$title = substr($title, 0, strpos('</title>', $title));
			return $title;
		}
	}
	   return "Error - Untitled";
}


?>