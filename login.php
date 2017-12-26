<?php 

session_start(); 

require_once("functions.php"); 

connect_db();

login($link); 

get_message($report); 

include_once("includes/header.php"); 

include_once("forms/login_form.html"); 

include_once("includes/footer.php"); 

?>
		