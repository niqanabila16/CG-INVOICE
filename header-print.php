<?php
//print template
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="private restricted no follow">
    <meta name="author" content="Larry Judd Oliver">
    <title>Admin Invoicing | Invoice</title>
    <!-- Bootstrap Core CSS -->
    <link href="inc/css/bootstrap.min.css" rel="stylesheet">
    <link href="printstyles.css" rel="stylesheet">
    <style type="text/css">
    @media print {
body{font:fit-to-print;font-size:100%;font-family:sans-serif;color:#000;background:#fff;margin:.6cm;}
@page{margin:0;}
#printbody input[type='text'],#printbody input[type='number'],#printbody input[type='tel'],#printbody textarea{background:#fff;font-family:sans-serif;font-size:inherit;color:#111!important;border:0!important;border-style:none!important;}
tr.nb,td.nb,.nb{border:none!important;border-bottom:0 solid transparent;border-top:0 solid transparent;}
th{padding-left:1em;}
input,textarea,.cleanprt{background:transparent;font-family:sans-serif;border:0!important;border-color:#fff!important;border-style:none!important;}
#printbody td{min-width:48%;margin:1px 0;padding:1px 1%;}
#printbody textarea{border:none;background:transparent;font-size:1em!important;font-weight:400;line-height:1;margin:3px 0;}
.invoice-upper-section figure{position:relative;top:0;margin-bottom:.25em;}
.boxed{border:thin solid #ddd;}
small{font-size:12px;margin-right:1em;}
.printable{width:100%;margin:0;}
.table-responsive{margin-top:-22px;}
#text_wrap{max-width:98.8992%;}
.quote-print label{text-align:left;font-weight:700;margin-right:10px;width:120px;}
.quote-print p{width:100%;clear:both;margin-bottom:1em;}
.end{text-align:left;border:thin solid #ddd;margin:-10px 20px 10px 0;}
.printable-header{position:relative;top:0;width:100%;height:130px;border-bottom:thin solid #ddd;display:inline-block;padding:1em;}
.print-right{max-width:45%;position:relative;top:-3em;}
h4{font-size:19px;}
.subtable tr > td{text-align:right;}
.print-noprint,#print-noprint{display:none;}
#printbody,.quote-print{border:1px solid #bbb;margin:0 auto;padding:20px;}
}
#printbody input[type='text'],#printbody input[type='number'],#printbody input[type='tel'],#printbody textarea{background:#fff;font-family:sans-serif;font-size:inherit;color:#111!important;border:0!important;border-style:none!important;}
#printbody{border:1px solid #bbb;margin:20px auto 0;padding:20px;}
#printbody td{margin:10px 0;padding:5px;}
#printbody textarea{border:none;background:transparent;font-size:1em!important;font-weight:400;line-height:1;width:100%;height:100%;overflow:visible;margin:3px 0;}
#printbody figure{position:relative;top:0;margin-bottom:.25em;}
#printbody .twrow p span,#printbody .twrow p b{margin:0 5px;}
.boxed{border:thin solid #ddd;}
small{font-size:12px;margin-right:1em;}
table.subtable{width:100%;border:thin solid #ddd;}
table.subtable tr{border-bottom:thin dashed #bbb;}
table.subtable tr td:first-child{text-align:left;font-weight:700;}
.quote-print p{width:100%;clear:both;margin-bottom:1em;}
.end{float:right;text-align:left;border:thin solid #ddd;}
.quote-print{border:1px solid #bbb;margin:0 auto;padding:20px;}
h4{font-size:19px;}
table.subtable tr td:last-child,.subtable tr > td{text-align:right;}
</style>

    <!-- Custom Fonts 
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"> -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<div class="container-fluid">
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
            <a class="navbar-brand" href="index.php">Invoice Admin Home</a>
    </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="index.php">Dashboard</a></li>
            <li><a href="">Settings</a></li>
            <li><a href="#">Profile</a></li>
            <li><a class="btn btn-info" href="inc/logout.php">Log Out</a></li>
          <li>
              <form class="navbar-form">
                  <input type="text" class="form-control" placeholder="Search...">
              </form>
          </li>
          </ul>
        </div>
</nav>
</div>

<div class="page-container">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3">
        
                <?php include('side-menu.php'); ?>

            </div>
        
                <div class="col-sm-9">
