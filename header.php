<?php 
include('inc/functions.php'); 
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="private restricted no follow">
    <meta name="author" content="Larry Judd Oliver">
    
    <title>Admin Invoicing | Invoice Contacts Quotes</title>

    <link href="inc/css/bootstrap.min.css" rel="stylesheet">

    <link href="printstyles.css" rel="stylesheet">


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
            <li><a href="account/myaccount.php">My Account</a></li>
           
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
