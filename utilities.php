<?php



 /*
 * Utility functions
 * get() - gets a variable from  POST, GET, or COOKIE in that order
 * loadController() - loads a controller and returns the new controller
 */
 
 function get($varname) {
   //echo $varname;
   if(isset($_POST[$varname])) {
     return $_POST[$varname];
   } elseif (isset($_GET[$varname])) {
     return $_GET[$varname];
   } elseif (isset($_COOKIE[$varname])) {
     return $_COOKIE[$varname];
   } else {
     return false;
   }		
 }
