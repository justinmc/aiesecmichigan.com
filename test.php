<?php 

setcookie("foo", "Cookie successfully set", time() +108000);
echo $_COOKIE["foo"];

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">

<html>

<head>



<meta http-equiv="Content-Type" content="text/html;charset=utf-8">


</head>

<body>

<h1>Test Page</h1>

<p>Before PHP code</p>
<br>



<br>
<p>After PHP code</p>


</body>

</html>