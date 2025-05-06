<?php 
include('restrict.php');
include('header.php');
?>
       
          <h1 class="page-header">My Account Invoicing and Quotes</h1>
          <h2 class="sub-header">Administrative Portal</h2>
 <h2>Welcome <?php echo $_SESSION['firstname']; ?></h2>
				<p><a href='../inc/logout.php'>Logout</a> &nbsp; | &nbsp;  
				<?php if( isset( $_SESSION['user_session']) ) { print("You are safely logged in "); } ?></p>
          <div class="table-responsive">
              <img src="../img/logo.png" alt="open source logo"/>
              

<?php include 'tsw_myaccount.php'; ?>

<?php include 'tsw_resetPassword.php'; ?>
  </div>
<?php include 'footer.php'; ?>


