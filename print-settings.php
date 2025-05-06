<?php
 
//require 'restrict.php';
include 'inc/db.php';

 $sql = ("SELECT * FROM  tsw_settings ORDER BY `id` DESC LIMIT 1");
   
      foreach ($dbh->query($sql) as $row) {    

$comp_name     = $row['det_name'];           //company name
$comp_moniker  = $row['det_moniker'];       // moniker name
$comp_addr     = $row['comp_addr'] ;       // Address
$comp_city     = $row['comp_city'];       // City St., Zip
$comp_phone    = $row['comp_phone'];    // Phone
$comp_slogan   = $row['comp_slogan'];  // slogan
$comp_payUrl   = $row['comp_payUrl'];  // Payment portal URL
$comp_payquest = $row['comp_payquest'];     //Questions about bill info
$comp_email    = $row['comp_email'];       // Emails
$disclaimer    = $row['disclaimer'];      // disclaimer or greeting footer of invoice
$mytime_zone   = $row['mytime_zone'];    // Set default time zone 
$theme_url     = $row['theme_url'];     // can be any name the register email is from
$server_email  = $row['server_email']; // your send mail email

}


?> 
