<?php
/*
This script sends an email to the email address shown notifying them 
that a new person has signed up for the alumni newsletter.  The signup
form is on alumni.php and alnewsletter.php

Courtesy of: http://www.buildwebsite4u.com/advanced/php.shtml
*/

$sendto = "sfadel@umich.edu";

/* All form fields are automatically passed to the PHP script through the array $HTTP_POST_VARS. */
$email = $HTTP_POST_VARS['email'];
$name = $HTTP_POST_VARS['name'];
$position = $HTTP_POST_VARS['position'];
$years = $HTTP_POST_VARS['years'];

$subject = "[AIESEC] Alumni Newsletter Request";
$message = "Hey Alumni Relations,

    This is an automated message sent by aiesecmichigan.com.
    
    The following alumnus has requested to be put on the newsletter email list: $email
    
Name: $name
Position: $position
Years: $years


	Thank you!";

/* PHP form validation: the script checks that the Email field contains a valid email address. preg_match performs a regular expression match. It's a very powerful PHP function to validate form fields and other strings - see PHP manual for details. */
if (ereg("^[a-zA-Z0-9_]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$]", $email))
  header ("Location: ../alnewsletter.php?submit=-1"); 
  
/* Sends the mail and outputs the "Thank you" string if the mail is successfully sent, or the error string otherwise. */
elseif (mail($email,$subject,$message))
    header ("Location: ../alnewsletter.php?submitted=1");
else
  header ("Location: ../alnewsletter.php?submitted=-2");

?>