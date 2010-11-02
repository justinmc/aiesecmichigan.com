<?php 

function navBar() // unused now right?  and unnecessary?
{   
     echo '
	  <ul class = "nav">
      <li><a href = "index.php">Home</a></li>
      <li><a href = "join.php">Join</a></li>
      <li><a href = "index.php">Go_Abroad</a></li>
      <li><a href = "index.php">Intern</a></li>
      <li><a href = "index.php">Businesses</a></li>
      <li><a href = "index.php">Alumni</a></li>
      <li><a href = "index.php">Members</a></li>
      <li><a href = "about.php">About</a></li>
      <li><a href = "index.php">Contact</a></li>
      </ul>' . "\n";
	return;
}

function announcement()
{
           $con = mysql_connect("aiesecmi.ipowermysql.com", "aiesecmi", "wolverine.2");

           if (!$con)
           {
              die('Could not connect: ' . mysql_error());
           }
           mysql_select_db("justin");
           $QUERY = mysql_query("SELECT * FROM announcements WHERE id = 1");
           $DATA = mysql_fetch_array($QUERY);

           mysql_close($con);

           echo $DATA['text'];
           
           return;
}

function content($filename, $authenticated)
{
	if ($filename == "http://www.aiesecmichigan.com/index.php")
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
		include ($_SERVER["DOCUMENT_ROOT"] . '/page/content/joincosts.html');
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
	elseif ($filename == "http://www.aiesecmichigan.com/alnewsletter.php")
		include ($_SERVER["DOCUMENT_ROOT"] . '/page/content/alnewsletter.html');
	elseif ($filename == "http://www.aiesecmichigan.com/alevents.php")
		include ($_SERVER["DOCUMENT_ROOT"] . '/page/content/alevents.html');
    elseif ($filename == "http://www.aiesecmichigan.com/mdirectory.php")
    {
    	if ($authenticated)
		   include ($_SERVER["DOCUMENT_ROOT"] . '/page/content/mdirectory.html');
		else
		   include ($_SERVER["DOCUMENT_ROOT"] . '/page/content/accessdenied.html');
    }
	else
	{
		echo 'Sorry!  The page you\'re trying to access does not exist.' . "<br>\n";
		echo '|' . $filename . "|<br>\n";
		echo '<a href = "' . $_SERVER["DOCUMENT_ROOT"] . '/index.php">Return Home</a>';
	}
	
	return;
}

// Echoes the first description (shortened) of the given xml feed
// Used for the first blog post from AIESEC Michigan Abroad
function xmlFirstDesc($url)
{
	
   $curl_handle=curl_init();
   curl_setopt($curl_handle,CURLOPT_URL,$url);
   curl_setopt($curl_handle,CURLOPT_CONNECTTIMEOUT,2);
   curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,1);
   $data = curl_exec($curl_handle);
   curl_close($curl_handle);
         
   $xml = new SimpleXmlElement($data, LIBXML_NOCDATA);


   echo "<h2>".$xml->channel->title."</h2>";
   $cnt = count($xml->channel->item);
   $url 	= $xml->channel->item[0]->link;
   $title 	= $xml->channel->item[0]->title;
   $desc = $xml->channel->item[0]->description->asXML();
 
   echo '<b><a target = "_blank" href="' . $url . '">' . $title . '</a></b><br>';
   echo '<p>' . abbreviate(removehtml($desc)) . '</p>';



// Adapted from http://ditio.net/2008/06/19/using-php-curl-to-read-rss-feed-xml/
	
}

?>