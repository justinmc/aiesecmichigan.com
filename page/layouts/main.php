<!-- AIESEC Michigan, Version 2 -->

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">

<html>

<head>

<meta http-equiv="Content-Type" content="text/html;charset=utf-8">

<!-- CSS link -->
<link rel = stylesheet type = "text/css" href = "public/stylesheets/main.css">
<!--[if IE]>
<link rel = stylesheet type = "text/css" href = "public/stylesheets/mainie.css">
<![EndIf]-->


<!-- JavaScript link -->
<script type="text/javascript" src="public/javascripts/sideScroller.js"></script>
<script type="text/javascript" src="public/javascripts/navMenu.js"></script>

<title> AIESEC Michigan </title>

<!-- Favicon link -->
<link REL="SHORTCUT ICON" HREF="public/images/favicon.ico">

<?php

include $_SERVER["DOCUMENT_ROOT"] . '/app/authentication.php';
include $_SERVER["DOCUMENT_ROOT"] . '/app/io.php';
include $_SERVER["DOCUMENT_ROOT"] . '/app/ssi.php';

$identifier = $_REQUEST["identifier"];
if ($identifier)
  setcookie("identifier", $_REQUEST["identifier"], time()+108000 , '/');
else
  $identifier = $_COOKIE["identifier"];

$authenticated = authenticate($identifier);

?>

<!-- Google Analytics Stuff -->
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-10096632-3']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

</head>

<body onload = "autoScroll()">

<div class = "bannerTop">
   <div class = "bannerTopRight"></div>
   <div class = "bannerContent">
<?php

   if ($authenticated)
   {  echo '
   <a class = "darkBG" href = "app/logout.php?return=' . $filename . '">Logout</a>
   &nbsp;&nbsp;&nbsp;&nbsp;Welcome ' . getName($identifier) . '!';
   }
   else
   {  echo '
   <a class="rpxnow" id = "darkBG" onclick="return false;" href="https://aiesecmichigan.rpxnow.com/openid/v2/signin?token_url=http%3A%2F%2Faiesecmichigan.com%2Fapp%2Frpx.php?return=' . $filename . '"> Sign In </a>';
   }
   
?>
<!--
      <form>
   	  <input type = "text" name = "username" value = "Username">&nbsp;&nbsp;
	  <input type = "password" name = "password" value = "password">
	  <input type = "submit" value = "Login">
      </form>
-->
   </div>
</div>
<div class = "background"></div>
<div class = "wrapper">
   <div class = "all">
      <div class = "titlebar">
      <a href = "index.php"><img class = "title" border = "0" src = "public/images/title4.png"></a>
      </div>
      <div class = "navbar">
         <ul class = "nav">
         <li onmouseover = "expandMenu('subMenu1')" onmouseout = "expandMenu('subMenu1')"><a href = "index.php">Home</a></li>
         <li onmouseover = "expandMenu('subMenu2')" onmouseout = "expandMenu('subMenu2')"><a href = "join.php">Join</a></li>
         <li onmouseover = "expandMenu('subMenu3')" onmouseout = "expandMenu('subMenu3')"><a href = "intern.php">Interns</a></li>
         <li onmouseover = "expandMenu('subMenu4')" onmouseout = "expandMenu('subMenu4')"><a href = "businesses.php">Businesses</a></li>
         <li onmouseover = "expandMenu('subMenu5')" onmouseout = "expandMenu('subMenu5')"><a href = "alumni.php">Alumni</a></li>
         <li onmouseover = "expandMenu('subMenu6')" onmouseout = "expandMenu('subMenu6')"><a href = "about.php">About</a></li>
         <li onmouseover = "expandMenu('subMenu7')" onmouseout = "expandMenu('subMenu7')"><a href = "contact.php">Contact</a></li>
         <?php 
         
         if ($authenticated)
            echo '<li onmouseover = "expandMenu(\'subMenu8\')" onmouseout = "expandMenu(\'subMenu8\')"><a href = "members.php">Members</a></li>';
         else
            echo '<li><a class="rpxnow" onclick="return false;" href="https://aiesecmichigan.rpxnow.com/openid/v2/signin?token_url=http%3A%2F%2Faiesecmichigan.com%2Fapp%2Frpx.php?return=' . $filename . '"> Members </a></li>';
         
         ?>
         </ul>
      </div>
      <div class = "navMenu">
<!-- 
         <ul id = "subMenu1" class = "navSub" onmouseover = "expandMenu('subMenu1')" onmouseout = "expandMenu('subMenu1')">
         <li><a href = "index.php">Option1</a></li>
         <li><a href = "index.php">Option2</a></li>
         </ul>
 -->
         <ul id = "subMenu2" class = "navSub" onmouseover = "expandMenu('subMenu2')" onmouseout = "expandMenu('subMenu2')">
         <li><a href = "joinlc.php">Joining as a Member</a></li>
         <li><a href = "joinep.php">Joining as an Exchange Participant</a></li>
         <li><a href = "joingoabroad.php">Going Abroad</a></li>
         </ul>
<!-- 
         <ul id = "subMenu3" class = "navSub" onmouseover = "expandMenu('subMenu3')" onmouseout = "expandMenu('subMenu3')">
         <li><a href = "index.php">Option1</a></li>
         <li><a href = "index.php">Option2</a></li>
         </ul>
         <ul id = "subMenu4" class = "navSub" onmouseover = "expandMenu('subMenu4')" onmouseout = "expandMenu('subMenu4')">
         <li><a href = "index.php">Option1</a></li>
         <li><a href = "index.php">Option2</a></li>
         </ul>
-->
         <ul id = "subMenu5" class = "navSub" onmouseover = "expandMenu('subMenu5')" onmouseout = "expandMenu('subMenu5')">
         <li><a href = "alevents.php">Events</a></li>
         <li><a href = "alnewsletter.php">Newsletter</a></li>
         </ul>
<!--
         <ul id = "subMenu6" class = "navSub" onmouseover = "expandMenu('subMenu6')" onmouseout = "expandMenu('subMenu6')">
         <li><a href = "index.php">Option1</a></li>
         <li><a href = "index.php">Option2</a></li>
         </ul>
         <ul id = "subMenu7" class = "navSub" onmouseover = "expandMenu('subMenu7')" onmouseout = "expandMenu('subMenu7')">
         <li><a href = "index.php">Option1</a></li>
         <li><a href = "index.php">Option2</a></li>
         </ul>
-->
         <ul id = "subMenu8" class = "navSub" onmouseover = "expandMenu('subMenu8')" onmouseout = "expandMenu('subMenu8')">
         <li><a href = "mdirectory.php">Directory</a></li>
         </ul>
      </div>
      <div class = "scrollerButtonL">
         <a href = "#" onclick = "pageScrollBack()"><img src = "public/images/arrowLeft.png" border = "0"></a>
      </div>
      <div class = "scrollerButtonR">
         <a href = "#" onclick = "pageScroll()"><img src = "public/images/arrowRight.png" border = "0"></a>
      </div>
      <div class = "scroller" id = "scrollMe"><!--  <img src = "public/images/banner0.jpg"><img src = "public/images/banner1.jpg"> --> <img src = "public/images/banner4.jpg"><img src = "public/images/banner2.jpg"><img src = "public/images/banner3.jpg"></div>
      <div class = "topBar"></div>
      <div class = "leftbar">
         <h2>Announcements</h2>
         <?php 
                  
         //announcement();
           
         ?>
         <p>
         Our fall recruitment is now closed, thank you to everyone who submitted an application!  We'll
         be holding interviews this Sunday, so stay tuned.  To anyone who missed the deadline, we'll
         be recruiting again in October, check the  
         <a href = "calendar.php">calendar</a>
         for more info.
         </p>
         <div class = "hr"></div>
         <br>
         <a href = "calendar.php" style = "float: right;">View Calendar</a>
         <iframe src="http://www.google.com/calendar/embed?title=Events&amp;showDate=0&amp;showPrint=0&amp;showTabs=0&amp;showCalendars=0&amp;mode=AGENDA&amp;height=400&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=obmgqmj8k4kqfenkv7enp0vln4%40group.calendar.google.com&amp;color=%23A32929&amp;ctz=America%2FNew_York" style=" border-width:0 " width="240" height="400" frameborder="0" scrolling="no"></iframe>
         <br>
         <div class = "hr"></div>
         <h2>Blog</h2>
         Hello!<br>
         <p>
         Hey guys Stephanie here, waiting in Minneapolis airport for my flight to Tokyo! It's going to be a 
         long 48 hours. My flight schedule goes like this... Detroit--&gt; Minneapolis--&gt; Tokyo--&gt; Shanghai--&gt; Changchun. 
         It's a blessing that I have a friend in Shanghai who will let me stay there for a night, or else I wouldn't be 
         able to make it!...
         </p>
         <a href = "http://aiesecmichigan.blogspot.com" target = "_blank">Read more at the AIESEC Michigan Abroad blog</a>
         <br><br>
         <div class = "hr"></div>

<?php

// blog rss feed: http://aiesecmichigan.blogspot.com/feeds/posts/default?alt=rss

//$feed = file_get_contents('http://aiesecmichigan.blogspot.com/feeds/posts/default?alt=rss');
//echo '<br>|' . $feed . '|<br>';

/*
$ch = curl_init('http://aiesecmichigan.blogspot.com/feeds/posts/default?alt=rss');

// Execute
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_exec($ch);

// Check if any error occured
if(curl_errno($ch))
{
    echo '<span style="color:#22c922">The domain is available!</span>';
} 
else 
{
    echo '<span style="color:#c92222">The domain is not available</span>';
}

// Close handle
curl_close($ch); 
*/

?>
      </div>
      <div class = "content">
         <?php 

         if (($filename == "http://www.aiesecmichigan.com/alumni.php") || ($filename == "http://www.aiesecmichigan.com/alnewsletter.php"))
         {
         	if ($_REQUEST["submitted"] == "1")
         	   echo '<font style = "color: green">Submission successful</font>' . "\n";
         	elseif ($_REQUEST["submitted"] == "-1")
         	   echo '<font style = "color: red">Submission failed, invalid email address, please try again.</font>' . "\n";
         	elseif ($_REQUEST["submitted"] == "-2")
         	   echo '<font style = "color: red">Submission failed, please try again later.</font>' . "\n";
         }
       
         content($filename, $authenticated);

         bottomInfo($filename);
      
         ?>
         <br><br><br><br><br>
      </div>
      <br><br><br><br>
      <div class = "bottombarContent">
         <img src = "public/images/barBottom.png" alt = "">
         <div class = "bottombarColLeft">
            <b>AIESEC</b><br>
            <a class = "darkBG" target = "_blank" href = "http://www.aiesec.org">aiesec.org</a><br>
            <a class = "darkBG" target = "_blank" href = "http://www.aiesecus.org">aiesecus.org</a><br>
         </div>
         <div class = "bottombarColMid">
            <b>AIESEC Michigan</b><br>
            <a class = "darkBG" target = "_blank" href = "http://www.facebook.com/home.php?#!/pages/AIESEC-Michigan/170676578450?ref=ts">On Facebook</a><br>
            <a class = "darkBG" target = "_blank" href = "http://aiesecmichigan.blogspot.com">AIESEC Michigan Abroad</a><br>
         </div>
         <div class = "bottombarColRight">
            <b>Contact</b><br>
            President:<a class = "darkBG" href = "mailto: michigan-president@aiesecus.org">michigan-president@aiesecus.org</a><br>
            Webmasters:<a class = "darkBG" href = "mailto: mcjustin@umich.edu">mcjustin@umich.edu</a><br>
            <font style = "color: #fb9411;">Webmasters:</font><a class = "darkBG" href = "mailto: ashwinch@gmail.com">ashwinch@gmail.com</a><br>
         </div>
         <div class = "copyright">
            Copyright &copy; 2010 AIESEC at the University of Michigan
         </div>
      </div>
   </div>
   <div class = "bottombar"></div>
</div>

<!--  Janrain Login Stuff -->
 <script type="text/javascript">
  var rpxJsHost = (("https:" == document.location.protocol) ? "https://" : "http://static.");
  document.write(unescape("%3Cscript src='" + rpxJsHost +
"rpxnow.com/js/lib/rpx.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
  RPXNOW.overlay = true;
  RPXNOW.language_preference = 'en';
</script>

</body>

</html>