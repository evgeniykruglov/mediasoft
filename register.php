<?php 

require_once("functions.php"); 

connect_db();

register($link);

get_message($report);

include_once("includes/header.php"); 

include_once("forms/register_form.html"); 

include_once("includes/footer.php"); 

?>