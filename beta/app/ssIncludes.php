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

function content($filename)
{
	if ($filename == "http://www.aiesecmichigan.com/beta/index.php")
		include ($_SERVER["DOCUMENT_ROOT"] . '/beta/page/content/home.html');
	elseif ($filename == "http://www.aiesecmichigan.com/beta/calendar.php")
		include ($_SERVER["DOCUMENT_ROOT"] . '/beta/page/content/calendar.html');
    elseif ($filename == "http://www.aiesecmichigan.com/beta/join.php")
		include ($_SERVER["DOCUMENT_ROOT"] . '/beta/page/content/join.html');
	elseif ($filename == "http://www.aiesecmichigan.com/beta/joinlc.php")
		include ($_SERVER["DOCUMENT_ROOT"] . '/beta/page/content/joinlc.html');
	elseif ($filename == "http://www.aiesecmichigan.com/beta/joinep.php")
		include ($_SERVER["DOCUMENT_ROOT"] . '/beta/page/content/joinep.html');
	elseif ($filename == "http://www.aiesecmichigan.com/beta/joingoabroad.php")
		include ($_SERVER["DOCUMENT_ROOT"] . '/beta/page/content/joingoabroad.html');
	elseif ($filename == "http://www.aiesecmichigan.com/beta/contact.php")
		include ($_SERVER["DOCUMENT_ROOT"] . '/beta/page/content/contact.html');
	elseif ($filename == "http://www.aiesecmichigan.com/beta/businesses.php")
		include ($_SERVER["DOCUMENT_ROOT"] . '/beta/page/content/comingsoon.html');
    elseif ($filename == "http://www.aiesecmichigan.com/beta/about.php")
		include ($_SERVER["DOCUMENT_ROOT"] . '/beta/page/content/about.html');
	elseif ($filename == "http://www.aiesecmichigan.com/beta/intern.php")
		include ($_SERVER["DOCUMENT_ROOT"] . '/beta/page/content/comingsoon.html');
	elseif ($filename == "http://www.aiesecmichigan.com/beta/alumni.php")
		include ($_SERVER["DOCUMENT_ROOT"] . '/beta/page/content/comingsoon.html');
	elseif ($filename == "http://www.aiesecmichigan.com/beta/members.php")
		include ($_SERVER["DOCUMENT_ROOT"] . '/beta/page/content/comingsoon.html');
	else
	{
		echo 'Sorry!  The page you\'re trying to access does not exist.' . "<br>\n";
		echo '|' . $filename . "|<br>\n";
		echo '<a href = "' . $_SERVER["DOCUMENT_ROOT"] . '/beta/index.php">Return Home</a>';
	}
	
	return;
}

function bottomInfo($filename)
{
	if ($filename == 'http://www.aiesecmichigan.com/beta/index.php')
	{
		echo '
	  <div class = "bottomInfo">
         <div class = "colLeft">
      	    <a href = "joinlc.php"><img class = "colHead" src = "public/images/students.jpg" border = "0"></a>
			<p class = "colContent">
			Want to see how you might fit in with one of the most fun and ambitious groups on the Michigan campus?  If you\'re
			looking to get involved with a passionate organization, network with people all over the world, and (of course) go 
			abroad, you might fit in with our network of more than 30,000 students worldwide.  And as one of the leading 
			chapters in the US, AIESEC Michigan is not a bad place to start.
			</p>
			<br><br><br>
		    <div class = "colLeftBot"><a class = "darkBG" href = "joinlc.php"><br>> Find out more</a></div>
         </div>
	     <div class = "colMid">
      	    <a href = "joinep.php"><img class = "colHead" src = "public/images/eps.jpg" border = "0"></a>
			<p class = "colContent">
			Want to go abroad, but don\'t have the time to join our organization?  Not a problem, just sign up as an Exchange Participant.
			AIESEC Michigan can send you on one of the hundreds of internships on the AIESEC database to any
			part of the world you want.  We offer developmental, educational, technical, and management internships, many of
			which are paid.  Somewhere in the world, an amazing AIESEC chapter just like us is waiting to welcome you to your
	   		new home away from home.  Apply now!  
   			</p>
			   <br><br><br>
		    <div class = "colMidBot"><a class = "darkBG" href = "joinep.php"><br>> Find out more</a></div>
         </div>
	     <div class = "colRight">
            <a href = "businesses.php"><img class = "colHead" src = "public/images/partners.jpg" border = "0"></a>
			<p class = "colContent">
			Looking to expand into the international market place?  AIESEC Michigan can provide you with the best and brightest
   			interns from anywhere in our network of over 100 countries.
   			</p>
			   <br><br><br>
		    <div class = "colRightBot"><a class = "darkBG" href = "businesses.php"><br>> Find out more</a></div>
         </div>
      </div>';
	}
	
	return;
}

?>