<?php 
include('restrict.php');
include('header.php');
?>
       
          <h1 class="page-header">Dashboard Invoicing and Quotes</h1>
          <h3 class="sub-header"><?php print( date('l F jS Y ') );
          print( " - Week " . date('W') ); ?></h3>
 <h4>Welcome <?php echo $_SESSION['firstname']; ?></h4>
				<p><a href='inc/logout.php'>Logout</a> &nbsp; | &nbsp;  
				<?php if( isset( $_SESSION['user_session']) ) { 
				esc("You are safely logged in "); } ?></p>
          <div class="table-responsive">
              <img src="img/logo.png" alt="company logo"/>
           <?php
// custom tables
           ?>
           Available from: <br>
           <a href="https://sourceforge.net/p/tradesouthwest/"><img alt="Download cg-invoice" src="https://sourceforge.net/sflogo.php?type=13&group_id=730421" ></a><br>
          
          </div>

              <?php include('footer.php'); ?>

