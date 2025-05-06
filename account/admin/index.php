<?php 
include('restrict.php');
include('header.php');
            // for displaying name
    $user_id = $_SESSION['user_id'];
    $default = (int)1;

    require_once '../../inc/db.php';

    $stmt = $dbh->prepare("SELECT level, active FROM tsw_members 
    WHERE `idm` = :idm AND `active` = :default ");

    $stmt->bindValue(':idm', $user_id);
    $stmt->bindValue(':default', $default);
    $stmt->execute();
        if ($stmt->rowCount() > 0){
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $level = $row['level'];
        if ( $level >= 1 ) redirect("../../login.html");
        }
        

    
?>
       
<h1 class="page-header">Dashboard for Configuration and Accounts</h1>
<h2 class="sub-header">Administrative Portal | Welcome <?php echo $_SESSION['firstname']; ?></h2>
				<p><a href='../../inc/logout.php'>Logout</a>
			 &nbsp; | &nbsp;  <?php if( isset( $_SESSION['user_session']) ) { 
				echo esc("You are safely logged in "); } ?></p>
          <div class="table-responsive">
            
           <?php
            include 'tsw_administration.php';
           ?>
          </div>

              <?php include('footer.php'); ?>

