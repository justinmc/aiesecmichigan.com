<?php

// This file unsets the user's login cookie (logging them out of
// our site, but not Google) and then returns to the previous page.

       setcookie("identifier", "", time()-108000);
       header('Location: ' . $_REQUEST["return"]);
       
?>