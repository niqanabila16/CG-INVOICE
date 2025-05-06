<?php
session_start();
    if(empty($_SESSION['user_session'])) 
    {
    //header("Location: login.html");
        die("You are not authorized to be here!"); 
    }
// set the default timezone to use. Available since PHP 5.1
//date_default_timezone_set('America/Phoenix');

// format static date time to insert into database
$dateformat = (new \DateTime())->format('Y-m-d H:i:s');

?>
