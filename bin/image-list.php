<?php
session_start();
if (!isset($_SESSION['user_session']))
{
header('Location: ../login.php');
}
?>
<?php 
/**
 * TSW Listing Nano Directory
 * Author: Larry Judd Oliver @tradesouthwest | http://tradesouthwest.com
 * Contributors in readme.md file
 * License in LICENSE.md file
 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="stylesheet" href="../inc/css/bootstrap.min.css">
  <link rel="stylesheet" href="../printstyles.css">
<style>

body{
    font-family: 'Lato', sans-serif;
    background-color: rgb(255, 255, 255);
    margin: 0;
    font-size: inherit;
    font-size: 1em;
    font-size: 14px;
    
}
span.textcenter {
    margin: 0 auto;
    position: relative;
    left: 41.5%;
    text-align: center;
}
/* Admin styles
======================================== */
.table.table-condensed tr { 
padding-top: 2px;
padding-bottom: 2px;
}
#admin-nav-top {
    margin-top: .812em;
}
.det-list-anchor {
    min-width: 42px; height: 1.67em; padding: 1px 5px; background-image: linear-gradient(#efefef, #fcfcfc, #e4e4e4);
    margin:0; border: thin solid #ddd; border-radius:4px;
}
.det-list-container table { 
    width: 100%;
}
.det-list-container thead tr th { 
    border-right: 1px dotted white; padding-left: 3px; color: #000;
}
 
.det-list-container table td {
    max-width: 200px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    padding: 0 10px;
}
.editForm .form-group {
    max-width: 98%;
    min-height: 82px;
    margin: 10px auto;
    box-shadow:  0 1px 1px rgba(0,0,0,.15);
    border-radius: 4px; 
    border: 1px solid #ddd;
}
.editForm#editTheme .form-group {
min-height: 132px;
}
.det-list-container .cat-list-container .form-context {
max-width: 95%;
margin-bottom: 5px;
min-height:30px;
}
#submit_newcat {
position: relative;
top: 28px;
}
.help-block{
    padding-left: 8px;
}
input[type="text"]:focus {
    outline: none;
} 
.editForm div.form-group input[type=""],  
.editForm div.form-group input[type=text],
.editForm div.form-group input[type=url],
.editForm div.form-group input[type=email],
.editForm div.form-group input[type=number],
.editForm div.form-group radio {
    max-width: 91.67%;
    margin: 0 auto;
    padding: 3px;
    border-color: #aaa;
    background-color: #ffe;
    color: #111;
    font-size: 1.5rem;
}
.editForm .form-group#curr {
    min-height: 82px;
    margin: 10px auto;
    box-shadow:  0 1px 1px rgba(0,0,0,.15);
    border-radius: 4px; 
    border: 1px solid #ddd;
    padding-left: 20px;
}
.editForm .form-group#curr input{
    text-align: right;
    letter-spacing: 1.72px;
    border-radius: 4px;
 max-width: 132px;
}
.editForm div.form-group span { padding-left: 12px; background: transparent; }
.editForm .bg-j {background-color: #ebeeef; }
.editForm input[readonly] { background: #fafafa !important; }
.editForm .form-group label.control-label{
padding-left: 30px;
}

#myFile {
margin-left: 20px;
}
#mySubmit{
padding-left: 30px;
}
.editForm .form-group#private {
min-height: 48px;
height: auto;
max-height: 48px;
padding-left: 20px;
background: #fcf3f3;
}

#det-panels label {
    height: 28px;
    width: 100%; 
    padding: 3px 0 5px 0; 
    margin-bottom: 10px;
    position: relative; 
    top: 0;
    background:#fafafa;
    color: #678 !important;
    padding-left: 1em;
}
#det-panels #righthalf .form-group {
    min-height: 82px !important;
    margin: 10px auto;
} 
#det-panels .form-group .col-sm-6 input { 
    width: 98%;
}
#det-panels .form-group label .col-det-panel-6,
#det-panels #righthalf .form-group label .col-det-panel-6 {
    position: relative; 
    left: 24%; 
}
.marg-l1{margin-left: 1em;}
.sm-header{ text-shadow: 0 1px 1px #555; text-align: center;color: white;position: relative; top: -10px; 
    background: #608f99; height: auto;padding: 0 8px 8px 8px; margin: 0 auto; box-shadow: 0 1px 1px #999; }
.no-well-top{ padding-top:0 !important;margin-top:0 !important;position: relative; top:-1px; }
.no-well-bottom{padding-bottom:0 !important;margin-bottom:0 !important; }
i.fa { color: #739993;background-color: #fafafa; padding: 2px; border-radius: 3px;box-shadow: 0 0 2px #888;margin-right: 5px; }
#noreply_radio .help-block i.fa { text-decoration: line-through !important; /* fa icons this not working */ }
.compress { max-width: 100px !important; text-align: right; }
.text-j { color: #777; }
.text-d { color: #000; }
.text-r { color: #900; }
.marg-r2 { position: relative; margin-left: 20%; text-decoration: underline; font-style: italic; }

.text-right { text-align: right !important; }
.text-center { text-align: center !important; }
.text-left { text-align: left !important; }
form#editPub select {background: none; background: transparent;}
form#editPub select option.bkg-success {background: green; color: white;}
form#editPub select option.bkg-danger{background: red; color: white;}
form#editPub select option.bkg-primary{background: blue; color: white;}

@media all and (max-width: 980px){
.editForm div.form-group input[type=""],  
.editForm div.form-group input[type=text],
.editForm div.form-group input[type=url],
.editForm div.form-group input[type=email],
.editForm div.form-group input[type=number],
.editForm div.form-group radio {
    font-size: 1.67rem;
    padding: 2px 5px;
    }
}
#manage img.img-thumbnail {
max-height: 150px;
}
.table.table-condensed{font-size: 87.5%;}.table.table-condensed tbody > tr td{padding: 2px 2px; vertical-align: bottom;}
</style>
     <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../inc/js/jquery.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="../inc/js/bootstrap.min.js"></script>

<title>Listing Nano Directory Admin Page</title>
<SCRIPT language="JavaScript" type="text/javascript">

var newwindow = ''
function popitup(url) {
if (newwindow.location && !newwindow.closed) {
    newwindow.location.href = url;
    newwindow.focus(); }
else {
    newwindow=window.open(url,'htmlname','width=404,height=316,resizable=1');}
}

function tidy() {
if (newwindow.location && !newwindow.closed) {
   newwindow.close(); }
}

// Based on JavaScript provided by Peter Curtis at www.pcurtis.com

</SCRIPT>

</head>
<body>
<div class="container">
    <div class="row">
<a href="../">BACK to INVOICING</a>
        <header class="text-center">
        <h4 class="header">Viewable Documents</h4>
        </header>

    </div>
</div>

<div class="container">
    <div class="row">
            
        <div class="col-md-12 col-sm-12">

           <div class="det-list-container">



<?php include 'list-images.php'; ?>
           </div><!-- ends det-list-container -->

        </div>       

    </div>
</div>
<footer class="col-lg-12 col-md-12" id="footer">
    <hr>           
<p>* <em>See <a href="docs.html" title="read instructions">Instructions</a></em></p>
<p><a href="../account/admin/">Admin</a> <?php //display_sessions(); ?></p>
</footer>
</body>
</html>
