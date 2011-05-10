<?php

// This file contains all input/output stuff


function removehtml($text)									// Removes all html tags from the input, as well as &nbsp;, and replaces accented characters
{
   $text = " " . $text;										// Prevents the whole html at first character returning a 0 problem.   
   $text = str_replace("&lt;", "<", $text);							// Work around to fix some html tags hard written in with &lt; &gt;
   $text = str_replace("&gt;", ">", $text);

   $gow = 1;
   while ($gow)
   {
      $gof = 1;
      $here = strpos($text, "<");

      if ($here === FALSE)
      {  $gow = 0;
         $gof = 0;
      }
      for ($i = $here; (($gof) && ($i < strlen($text))); $i++)
      {
         if (substr($text, $i, 1) == '>')
         {
            $text = substr($text, 0, $here) . substr($text, ($i + 1), strlen($text));
            $gof = 0;
         }
         else
         {  $gof = 1;
         }
      }
   }
   $text = str_replace("&lt;div&gt;", " ", $text);						// And remove div tags cause they're still there...
   $text = str_replace("&nbsp;", "", $text);							// And gets rid of &nbsp;
   $text = str_replace("&aacute;", "á", $text);							// And fixes characters
   $text = str_replace("&Aacute;", "Á", $text);							// And fixes characters...
   $text = str_replace("&eacute;", "é", $text);
   $text = str_replace("&Eacute;", "É", $text);	
   $text = str_replace("&iacute;", "í", $text);	
   $text = str_replace("&Iacute;", "Í", $text);	
   $text = str_replace("&oacute;", "ó", $text);	
   $text = str_replace("&Oacute;", "Ó", $text);		
   $text = str_replace("&uacute;", "ú", $text);		
   $text = str_replace("&Uacute;", "Ú", $text);	
   $text = str_replace("&ntilde;", "ñ", $text);		
   $text = str_replace("&Ntilde;", "Ñ", $text);		
   $text = str_replace("&uuml;", "ü", $text);	
   $text = str_replace("&Uuml;", "Ü", $text);		
   $text = str_replace("&iexcl;", "¡", $text);	
   $text = str_replace("&iquest;", "¿", $text);	
   $text = str_replace("&ldquo;", "\"", $text);	
   $text = str_replace("&rdquo;", "\"", $text);	
   $text = str_replace("&ndash;", "-", $text);
   $text = str_replace("Ã", "í", $text); 

   return($text);
}
	

function abbreviate($text)
{
   if (strlen($text) > 297)
   {
      $text = substr($text, 0, 294);								// Chops it to the min number of characters.
      $letter =  substr($text, 293, 1);
      for ($i = 294; $letter != ' '; $i--)							// Chops it to the last full word
      {
         $text = substr($text, 0, $i);
         $letter =  substr($text, ($i - 1), 1);
      }
      $text = substr($text, 0, -1);  
      $text = $text . "...";										// And adds on an elipses or however you spell that (...)
   }

   return $text;
}

?>
