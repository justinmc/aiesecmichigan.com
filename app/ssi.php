<?php 

/****************************************************************************
 *
 * This file contains all server side includes used by the layouts
 *
****************************************************************************/


// Echoes the most recent announcement
function ssiAnnouncement()
{
	echo announceRead(0);

}

function ssiContent($filename, $authenticated)
{
	if ($filename == "http://www.aiesecmichigan.com/index.php")
		include ($_SERVER["DOCUMENT_ROOT"] . '/page/content/home.html');
	elseif ($filename == "http://www.aiesecmichigan.com/legacylinks.php")
		include ($_SERVER["DOCUMENT_ROOT"] . '/page/content/home.html');
	elseif ($filename == "http://www.aiesecmichigan.com/calendar.php")
		include ($_SERVER["DOCUMENT_ROOT"] . '/page/content/calendar.html');
    elseif ($filename == "http://www.aiesecmichigan.com/join.php")
		include ($_SERVER["DOCUMENT_ROOT"] . '/page/content/join.html');
	elseif ($filename == "http://www.aiesecmichigan.com/joinlc.php")
		include ($_SERVER["DOCUMENT_ROOT"] . '/page/content/joinlc.html');
	elseif ($filename == "http://www.aiesecmichigan.com/joinep.php")
		include ($_SERVER["DOCUMENT_ROOT"] . '/page/content/joinep.html');
	elseif ($filename == "http://www.aiesecmichigan.com/costs.php")
		include ($_SERVER["DOCUMENT_ROOT"] . '/page/content/aboutcosts.html');
	elseif ($filename == "http://www.aiesecmichigan.com/funding.php")
		include ($_SERVER["DOCUMENT_ROOT"] . '/page/content/joinfunding.html');
	elseif ($filename == "http://www.aiesecmichigan.com/contact.php")
		include ($_SERVER["DOCUMENT_ROOT"] . '/page/content/contact.html');
	elseif ($filename == "http://www.aiesecmichigan.com/businesses.php")
		include ($_SERVER["DOCUMENT_ROOT"] . '/page/content/businesses.html');
    elseif ($filename == "http://www.aiesecmichigan.com/about.php")
		include ($_SERVER["DOCUMENT_ROOT"] . '/page/content/about.html');
	elseif ($filename == "http://www.aiesecmichigan.com/abgoabroad.php")
		include ($_SERVER["DOCUMENT_ROOT"] . '/page/content/abgoabroad.html');
    elseif ($filename == "http://www.aiesecmichigan.com/abfaq.php")
		include ($_SERVER["DOCUMENT_ROOT"] . '/page/content/abfaq.html');
	elseif ($filename == "http://www.aiesecmichigan.com/interns.php")
		include ($_SERVER["DOCUMENT_ROOT"] . '/page/content/interns.html');
	elseif ($filename == "http://www.aiesecmichigan.com/alumni.php")
		include ($_SERVER["DOCUMENT_ROOT"] . '/page/content/alumni.html');
	elseif ($filename == "http://www.aiesecmichigan.com/members.php")
    {
    	if ($authenticated)
		   include ($_SERVER["DOCUMENT_ROOT"] . '/page/content/members.html');
		else
		   include ($_SERVER["DOCUMENT_ROOT"] . '/page/content/accessdenied.html');
    }
	elseif ($filename == "http://www.aiesecmichigan.com/admin.php")
    {
    	if ($authenticated)
		   include ($_SERVER["DOCUMENT_ROOT"] . '/page/content/madmin.html');
		else
		   include ($_SERVER["DOCUMENT_ROOT"] . '/page/content/accessdenied.html');
    }
    elseif ($filename == "http://www.aiesecmichigan.com/mdirectory.php")
    {
    	if ($authenticated)
		   include ($_SERVER["DOCUMENT_ROOT"] . '/page/content/mdirectory.html');
		else
		   include ($_SERVER["DOCUMENT_ROOT"] . '/page/content/accessdenied.html');
    }
    elseif ($filename == "http://www.aiesecmichigan.com/er.php")
    {
    	if ($authenticated)
		   include ($_SERVER["DOCUMENT_ROOT"] . '/page/content/er.html');
		else
		   include ($_SERVER["DOCUMENT_ROOT"] . '/page/content/accessdenied.html');
    }
	elseif ($filename == "http://www.aiesecmichigan.com/alnewsletter.php")
		include ($_SERVER["DOCUMENT_ROOT"] . '/page/content/alnewsletter.html');
	elseif ($filename == "http://www.aiesecmichigan.com/alevents.php")
		include ($_SERVER["DOCUMENT_ROOT"] . '/page/content/alevents.html');
	else
	{
		echo 'Sorry!  The page you\'re trying to access does not exist.' . "<br>\n";
		echo '|' . $filename . "|<br>\n";
		echo '<a href = "' . $_SERVER["DOCUMENT_ROOT"] . '/index.php">Return Home</a>';
	}
	
	return;
}

// Returns the given xml feed
// Used for the first blog post from AIESEC Michigan Abroad
function ssiXML($url)
{
   $curl_handle=curl_init();
   curl_setopt($curl_handle,CURLOPT_URL,$url);
   curl_setopt($curl_handle,CURLOPT_CONNECTTIMEOUT,2);
   curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,1);
   $data = curl_exec($curl_handle);
   curl_close($curl_handle);
         
   $xml = new SimpleXmlElement($data, LIBXML_NOCDATA);

   return $xml;

// Adapted from http://ditio.net/2008/06/19/using-php-curl-to-read-rss-feed-xml/
}

?>
