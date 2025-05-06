<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Contact AZFB for current pricing and selection">
    <meta name="author" content="Larry Judd">

    <title>CG Invoice | Administrative Portal</title>

    <!-- Bootstrap Core CSS -->
    <link href="../inc/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../inc/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

     <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <span class="navbar-brand"><a href="../index.php">Invoicing </a></span>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right" id="tdw">
                   <li><a href="tel: " title="call for free fence quote">  </a> </li>
                    <li><a href="login.php">Contractor-Register</a></li>

                
                 
                    <li><a class="btn btn-primary" href="../inc/logout.php">Log Out</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
    </nav>
<hr>
 <div style="margin-top: 2em;"></div>
<div class="container">
   <div class="row">
        <div class="col-lg-12 col-md-12">
            <img src="" alt="logo"/>
            <h1>Invoice My Account</h1>
        </div>
            <div class="col-lg-8 col-md-8">
            <hr>
            <form role="form" id="submitform" action="../validlogin.php" method="post" >
                <fieldset class="marg-w8"><legend>Please sign in</legend>

          <p><label>Username:</label> <br>
              <input class="form-control" type="text" name="username" required /> </p>
     
          <p><label>Password:</label> <br>
              <input class="form-control" type="password" name="password" required /> </p>

          <p><input type="submit" name="submit" class="btn btn-success" value="Log In"/></p>

                </fieldset>
            </form>
            <hr>
      <p> Access to and use of password protected and/or secure areas of the Web site is restricted to authorized users only. Unauthorized individuals attempting to access these areas of the Web site may be subject to prosecution. By Proceeding, you agree to notify owner immediately of any unauthorized use of your password or other breach of security. </p>

            </div>
                <div class="col-lg-4 col-md-4">
<p>If you have been given permission to create an account, enter your code below. You may only need one of the two: username or email.</p>
    <form action="" method="POST" id="add_access">
    <input type="hidden" name="access" value="access">
    <p><input type="text" name="temp_username" size="18" id="addusername" placeholder="username"></p> 
    <p><input type="text" name="temp_email" size="18" id="addemail" placeholder="email"></p>
    <p><input class="btn btn-default" name="submit_temp" type="submit" value="Register"></p>

<div class="well">   
<div id="reset">
<?php //if(isset( $_GET['reset']) ){ ?>
    
        <h2>Forgot Password</h2>
            <form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                
                    <div class="form-group">
                        <input type="email" name="email" id="email" class="form-control input-lg" placeholder="Enter Email of Account" tabindex="1" size=20>
                    </div>
               
            
                <hr>
              <div class="form-group">
                    <input type="submit" name="submit-new" value="Reset Password" class="btn btn-primary btn-block btn-lg" tabindex="3">
                    </div>
                 
    </form>
<?php // } ?> 
<?php include 'tsw_reset.php'; ?>
</div>    
    <?php 
if( isset( $_POST['submit_temp'] ) ) 
{
include_once '../inc/functions.php';
    $username = $_POST['temp_username'];
    $email = $_POST['temp_email'];
    include_once('../inc/db.php');
    $query = 'SELECT * FROM cgadmins';
    foreach ($dbh->query($query) as $row) 
    { 
        
        if( $row['admin_username'] == $username  
        || $row['admin_password'] == $email )  
        {
        
        redirect( "register.php" ); }
        else { print( "Please try again or contact the person whom gave you this access key.
        There seems to be no match. Or you can try again if you like." ); 
        }    
    }
}    
?>
               
                
                </div>

                    <footer class="col-lg12 col-md-12">

                        <small>Website by <a href="http://tradesouthwest.com" title="websites by tradesouthwest">TSW =|=</a></small>
                    </footer>


    <script src="../inc/js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../inc/js/bootstrap.min.js"></script>
             </div><!-- ends row -->
</div>    <!-- /.container -->    

</body>
</html>
