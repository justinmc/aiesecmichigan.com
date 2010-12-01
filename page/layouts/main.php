<?php

// Cookie must be set before any html!
$identifier = $_REQUEST["identifier"];
if ($identifier)
  setcookie("identifier", $identifier, time() +108000);
else
  $identifier = $_COOKIE["identifier"];
  
if ($_REQUEST["logout"])
{ setcookie("identifier", "", time() -108000);
  $identifier = "";
}

?>

<!-- AIESEC Michigan, Version 2 -->

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">

<html>

<head>

<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<meta name="description" content="International student organization at the University of Michigan">
<meta name="keywords" content="AIESEC, Michigan, international, internships, University of Michigan, student, organization"> 

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

$authenticated = authenticate($identifier); // identifier set at top

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
   <a class = "darkBG" href = "index.php?logout=1">Logout</a>
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
         <li onmouseover = "expandMenu('subMenu3')" onmouseout = "expandMenu('subMenu3')"><a href = "businesses.php"><font style = "position: relative; left: -5px;">Businesses</font></a></li>
         <li onmouseover = "expandMenu('subMenu4')" onmouseout = "expandMenu('subMenu4')"><a href = "alumni.php">Alumni</a></li>
         <li onmouseover = "expandMenu('subMenu5')" onmouseout = "expandMenu('subMenu5')"><a href = "interns.php">Incoming</a></li>
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
         </ul>
<!-- 
         <ul id = "subMenu3" class = "navSub" onmouseover = "expandMenu('subMenu3')" onmouseout = "expandMenu('subMenu3')">
         <li><a href = "index.php">Option1</a></li>
         <li><a href = "index.php">Option2</a></li>
         </ul>
-->
         <ul id = "subMenu4" class = "navSub" onmouseover = "expandMenu('subMenu4')" onmouseout = "expandMenu('subMenu4')">
         <li><a href = "alevents.php">Events</a></li>
         <li><a href = "alnewsletter.php">Newsletter</a></li>
         </ul>
<!-- 
         <ul id = "subMenu5" class = "navSub" onmouseover = "expandMenu('subMenu5')" onmouseout = "expandMenu('subMenu5')">
         <li><a href = "index.php">Option1</a></li>
         <li><a href = "index.php">Option2</a></li>
         </ul>
 -->
         <ul id = "subMenu6" class = "navSub" onmouseover = "expandMenu('subMenu6')" onmouseout = "expandMenu('subMenu6')">
         <li><a href = "abfaq.php">FAQ</a></li>
         <li><a href = "abgoabroad.php">Going Abroad</a></li>
         <li><a href = "costs.php">Costs</a></li>
         <li><a href = "funding.php">Funding</a></li>
         </ul>
<!--
         <ul id = "subMenu7" class = "navSub" onmouseover = "expandMenu('subMenu7')" onmouseout = "expandMenu('subMenu7')">
         <li><a href = "index.php">Option1</a></li>
         <li><a href = "index.php">Option2</a></li>
         </ul>
-->
         <ul id = "subMenu8" class = "navSub" onmouseover = "expandMenu('subMenu8')" onmouseout = "expandMenu('subMenu8')">
         <li><a href = "mdirectory.php">Directory</a></li>
         <li><a href = "yearbook/index.php">Yearbook</a></li>
         <li><a href = "snc2010/index.php">SNC</a></li>
         <li><a href = "mer.php">ER</a></li>
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
         AIESEC Michigan will start accepting applications at the beginning of the winter semester.  Apps will be due Januray 20.
         Keep an eye on these announcements for when the application is released.
         </p>
         <div class = "hr"></div>
         <br>
         <!--  Twitter Widget -->
         <script src="http://widgets.twimg.com/j/2/widget.js"></script>
		 <script>
		 new TWTR.Widget({
  		 version: 2,
  		 type: 'profile',
  		 rpp: 3,
  		 interval: 6000,
  		 width: 240,
  		 height: 300,
  		 theme: {
    		 shell: {
      		 background: '#718acd',
      		 color: '#ffffff'
    		 },
    		 tweets: {
      		 background: '#fff3ce',
      		 color: '#000000',
      		 links: '#ff8400'
     		 }
  		 },
  		 features: {
    		 scrollbar: false,
    		 loop: false,
    		 live: false,
    		 hashtags: true,
    		 timestamp: true,
    		 avatars: false,
    		 behavior: 'all'
  		 }
		 }).render().setUser('aiesecmichigan').start();
		 </script>
         <br></br>
         <a href = "calendar.php" style = "float: right;">View Calendar</a>
         <iframe src="http://www.google.com/calendar/embed?title=Events&amp;showDate=0&amp;showPrint=0&amp;showTabs=0&amp;showCalendars=0&amp;mode=AGENDA&amp;height=400&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=obmgqmj8k4kqfenkv7enp0vln4%40group.calendar.google.com&amp;color=%23A32929&amp;ctz=America%2FNew_York" style=" border-width:0 " width="240" height="400" frameborder="0" scrolling="no"></iframe>
         <br>
         <div class = "hr"></div>
         <?php

         xmlFirstDesc('http://aiesecmichigan.blogspot.com/feeds/posts/default?alt=rss');
        
         ?>
         <a href = "http://aiesecmichigan.blogspot.com" target = "_blank">Read more at the AIESEC Michigan Abroad blog</a>
         <br><br>
         <div class = "hr"></div>
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