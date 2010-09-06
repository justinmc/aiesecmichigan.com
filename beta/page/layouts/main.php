<!-- AIESEC Michigan, Beta -->

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">

<html>

<head>

<meta http-equiv="Content-Type" content="text/html;charset=utf-8">

<!-- CSS link -->
<link rel = stylesheet type = "text/css" href = "public/stylesheets/main.css">
<!-- JavaScript link -->
<script type="text/javascript" src="public/javascripts/sideScroller.js"></script>
<script type="text/javascript" src="public/javascripts/navMenu.js"></script>

<title> AIESEC Michigan </title>

<!-- Favicon link -->
<link REL="SHORTCUT ICON" HREF="public/images/favicon.ico">

<?php

include $_SERVER["DOCUMENT_ROOT"] . '/beta/app/authentication.php';
include $_SERVER["DOCUMENT_ROOT"] . '/beta/app/io.php';
include $_SERVER["DOCUMENT_ROOT"] . '/beta/app/ssIncludes.php';

$identifier = $_REQUEST["identifier"];
if ($identifier)
  setcookie("identifier", $_REQUEST["identifier"], time()+108000 , '/');
else
  $identifier = $_COOKIE["identifier"];
  
$authenticated = 0; //authenticate($identifier);

?>

</head>

<body onload = "autoScroll()">

<div class = "bannerTop">
   <div class = "bannerTopRight"></div>
   <div class = "bannerContent">
<?php

   if ($authenticated)
   {  echo '
   <a class = "darkBG" href = "http://www.aiesecmichigan.com/beta/app/logout.php?return=' . $filename . '">Logout</a>
   &nbsp;&nbsp;&nbsp;&nbsp;Welcome ' . getName($identifier) . '!';
   }
   else
   {  echo '
   <a class="rpxnow" id = "darkBG" onclick="return false;" href="https://aiesecmichigan.rpxnow.com/openid/v2/signin?token_url=http%3A%2F%2Faiesecmichigan.com%2Fbeta%2Fapp%2Frpx.php?return=' . $filename . '"> Sign In </a>';
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
      <a href = "http://www.aiesecmichigan.com/beta/index.php"><img class = "title" border = "0" src = "public/images/title4.png"></a>
      </div>
      <div class = "navbar">
         <ul class = "nav">
         <li onmouseover = "expandMenu('subMenu1')" onmouseout = "expandMenu('subMenu1')"><a href = "index.php">Home</a></li>
         <li onmouseover = "expandMenu('subMenu2')" onmouseout = "expandMenu('subMenu2')"><a href = "join.php">Join</a></li>
         <li><a href = "index.php">Intern</a></li>
         <li><a href = "index.php">Businesses</a></li>
         <li><a href = "index.php">Alumni</a></li>
         <li><a href = "index.php">Members</a></li>
         <li><a href = "about.php">About</a></li>
         <li><a href = "contact.php">Contact</a></li>
         </ul>
      </div>
      <div class = "navMenu">
         <ul id = "subMenu1" class = "navSub" onmouseover = "expandMenu('subMenu1')" onmouseout = "expandMenu('subMenu1')">
         <li><a href = "index.php">hello</a></li>
         <li><a href = "index.php">goodbye</a></li>
         </ul>
         <ul id = "subMenu2" class = "navSub" onmouseover = "expandMenu('subMenu2')" onmouseout = "expandMenu('subMenu2')">
         <li><a href = "joinlc.php">Joining as a Member</a></li>
         <li><a href = "joinep.php">Joining as an Exchange Participant</a></li>
         <li><a href = "joingoabroad.php">Going Abroad</a></li>
         </ul>
      </div>
      <div class = "banner" id = "scrollMe"><img src = "public/images/banner0.jpg"><img src = "public/images/banner1.jpg"><img src = "public/images/banner2.jpg"></div>
      <div class = "topBar"></div>
      <div class = "leftbar">
         <br><br><br><br><br><br><br>
         <h2>Announcements</h2>
         <?php 
                  
         //announcement();
           
         ?>
         <p>
         AIESEC Michigan is getting ready for fall recruitment 2010!  We will be posting our application in
         September, so keep an eye on this spot for when it becomes available.
         </p>
         <div class = "hr"></div>
         <br>
         <a href = "calendar.php" style = "float: right;">View Calendar</a>
         <iframe src="http://www.google.com/calendar/embed?title=Events&amp;showDate=0&amp;showPrint=0&amp;showTabs=0&amp;showCalendars=0&amp;mode=AGENDA&amp;height=400&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=obmgqmj8k4kqfenkv7enp0vln4%40group.calendar.google.com&amp;color=%23A32929&amp;ctz=America%2FNew_York" style=" border-width:0 " width="240" height="400" frameborder="0" scrolling="no"></iframe>
         <div class = "hr"></div>
         <h2>Blog</h2>
         Hello!<br>
         <p>
         Hey guys Stephanie here, waiting in Minneapolis airport for my flight to Tokyo! It's going to be a 
         long 48 hours. My flight schedule goes like this... Detroit--&gt; Minneapolis--&gt; Tokyo--&gt; Shanghai--&gt; Changchun. 
         It's a blessing that I have a friend in Shanghai who will let me stay there for a night, or else I wouldn't be 
         able to make it!
         </p>
         <a href = "">Read more at the AIESEC Michigan Abroad blog</a>
         <br><br>
         <div class = "hr"></div>

<?php

// blog rss feed: http://aiesecmichigan.blogspot.com/feeds/posts/default?alt=rss

$feed = file_get_contents('http://aiesecmichigan.blogspot.com/feeds/posts/default?alt=rss');
echo '<br>|' . $feed . '|<br>';

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
         
         content($filename);
         
         ?>
         <br><br><br><br><br>
      </div>
      <?php 
      
      bottomInfo($filename);
      
      ?>
      <br><br><br><br>
      <div class = "bottombarContent">
         <img src = "public/images/bottom.jpg" alt = "">
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
            <a class = "darkBG" href = "">aiesecmichigan@gmail.com</a><br>
            President:<a class = "darkBG" href = "">dmouli@umich.edu</a><br>
            Webmasters:<a class = "darkBG" href = "">mcjustin@umich.edu</a><br>
            <font style = "color: #fb9411;">Webmasters:</font><a class = "darkBG" href = "">ashwinch@gmail.com</a><br>
         </div>
         <div class = "copyright">
            Copyright &copy; 2010 AIESEC at the University of Michigan
         </div>
      </div>
   </div>
   <div class = "bottombar"></div>
</div>

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