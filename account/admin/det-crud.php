<?php 
/**
 * TSW Details CGInvoice
 * Author: Larry Judd @tradesouthwest | http://tradesouthwest.com/
 * Contributors in readme.md file
 * License in LICENSE.md file
 */
include 'restrict.php';
include 'header.php'; 
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
          <h2 class="sub-header">Administrative Portal</h2>
 <h2>Welcome <?php echo $_SESSION['firstname']; ?></h2>
				<p><a href='../../inc/logout.php'>Logout</a>
			 &nbsp; | &nbsp;  <?php if( isset( $_SESSION['user_session']) ) { 
				echo esc("You are safely logged in "); } ?></p>
          <div class="table-responsive">
<?php
/**
 * ********** process delete invoice **********
 *
 */

if( isset( $_POST['remove_inv'] ) ) {
    $rmv_inv = escint( $_POST['rmv_inv'] );
    require_once '../../inc/db.php';

    $sql = "DELETE from cginvoice
            WHERE id=?";
    $delete = $dbh->prepare($sql);
    $delete->execute(array($rmv_inv));
        if($delete){
?> 

     <br>
    <div class="panel panel-danger">
        <div class="panel-heading">
            <h3 class="panel-title">Invoice Deleted from Database</h3>
        </div>    
        <div class="panel-body">
            Invoice DELETED Successfully! <br>
            <?php echo escvar( date('m-d-Y H:m' )); ?>
        </div>
    </div>    
    <br>

<hr><p><form action="manageinvoices.php" method="POST"><input type="button" class='btn btn-success' onclick="submit()" name="success" value="BACK to Admin List"></form></p>

<?php 
        // redirect('index.php');
        // throw errors if not success
        } else {
            print "oops This entry did not process correctly, please try again.";
            echo $sql . "<br>" . $dbh->error;
            }
$dbh = null; 
}
?>

<?php
/**
 * ********** process delete member **********
 *
 */

if( isset( $_POST['submit_rmv_idd'] ) ){
    $rmv_idd = escint( $_POST['rmv_idd'] );
    require_once '../../inc/db.php';

    $sql = "DELETE from tsw_members 
            WHERE idm=?";
    $delete = $dbh->prepare($sql);
    $delete->execute(array($rmv_idd));
        if($delete){
?> 

     <br>
    <div class="panel panel-danger">
        <div class="panel-heading">
            <h3 class="panel-title">Member Deleted from Database</h3>
        </div>    
        <div class="panel-body">
            Information DELETED Successfully! <br>
            <?php echo escvar( date('m-d-Y H:m' )); ?>
        </div>
    </div>    
    <br>

<hr><p><form action="admin.php" method="POST"><input type="button" class='btn btn-success' onclick="submit()" name="success" value="BACK to Admin List"></form></p>

<?php 
        // redirect('index.php');
        // throw errors if not success
        } else {
            print "oops This entry did not process correctly, please try again.";
            echo $sql . "<br>" . $dbh->error;
            }
$dbh = null; 
}
?>

<?php
/**
 * ********** process delete temp login credentials **********
 *
 */

if( isset( $_POST['submit_rmv_temp'] ) && "access" == $_POST['access'] ){
    $rmv_access = escint( $_POST['rmv_access'] );
   
    require_once '../../inc/db.php';

    $sql = "DELETE from cgadmins  
            WHERE admin_id=?";
    $delete = $dbh->prepare($sql);
    $delete->execute(array($rmv_access));
        if($delete){
?> 

     <br>
    <div class="panel panel-danger">
        <div class="panel-heading">
            <h3 class="panel-title">Temporary Login Credentials Deleted</h3>
        </div>    
        <div class="panel-body">
            Information DELETED Successfully! <br>
            <?php echo escvar( date('m-d-Y H:m' )); ?>
        </div>
    </div>    
    <br>

<hr><p><form action="admin.php" method="POST"><input type="button" class='btn btn-success' onclick="submit()" name="success" value="BACK to Details List"></form></p>

<?php 
        // redirect('index.php');
        // throw errors if not success
        } else {
            print "oops This entry did not process correctly, please try again.";
            echo $sql . "<br>" . $dbh->error;
            }
$dbh = null; 
}
?>
</div>
<?php include 'footer.php'; ?>
