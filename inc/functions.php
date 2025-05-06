<?php
// standardize date inputs
$date_entered = date('m-d-Y H:i:s');
/**
 * mimics the original mysql_real_escape_string but which doesn't need an active mysql connection.
 * @is_arry
 * @is_string
 */
function escmim($inp) { 
    if(is_array($inp)) 
        return array_map(__METHOD__, $inp); 

    if(!empty($inp) && is_string($inp)) { 
        return str_replace(array('\\', "\0", "\n", "\r", "'", '"', "\x1a"), array('\\\\', '\\0', '\\n', '\\r', "\\'", '\\"', '\\Z'), $inp); 
    } 

    return $inp; 
} 
// simple but effective for string outputting to html page
function esc($s){
    return htmlentities(trim($s), ENT_QUOTES, 'UTF-8');
}
//sanitize and validate and data coming from user input.
function escvar($str) {
$str = filter_var($str, FILTER_SANITIZE_STRING);
return $str;
}
//filter integer
function escint($int) {
$int = filter_var($int, FILTER_VALIDATE_INT);
return $int;
} 

function alpha_only( $string )
    {
        return preg_replace('/[^a-zA-Z0-9\s]/', '', $string);
    }
// safe redirect
function redirect($url)
{
    if (!headers_sent())
    {    
        header('Location: '.$url);
        exit;
        }
    else
        {  
        echo '<script type="text/javascript">';
        echo 'window.location.href="'.$url.'";';
        echo '</script>';
        echo '<noscript>';
        echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
        echo '</noscript>'; exit;
    }
}

function get_company_datainfo() 
{
include 'db.php';

$sql = ("SELECT * FROM  tsw_settings ORDER BY `ids` DESC LIMIT 1");
   
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
    $mytime_zone   = $row['mytime_zone'];    // php.net/manual/en/timezones.php for ref.
    $theme_url     = $row['theme_url'];     // can be any name the register email is from
    $server_email  = $row['server_email']; // your send mail email
    }
}

// display sessions (for debug)
function display_sessions() {
$html=
$html .= '<pre>';
$html = print_r($_SESSION);
$html .= '<pre>';
return $html;
}

