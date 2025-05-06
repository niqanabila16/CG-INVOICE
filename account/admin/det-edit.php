<?php 
/**
 * TSW Details CGInvoice
 * Author: Larry Judd @tradesouthwest | http://tradesouthwest.com/details
 * Contributors in readme.md file
 * License in LICENSE.md file
 */
include 'restrict.php';
include 'header.php'; 
?>
      
          <h1 class="page-header">Dashboard for Configuration and Accounts</h1>
          <h2 class="sub-header">Administrative Portal | Welcome <?php echo $_SESSION['firstname']; ?></h2>
				<p><a href='../../inc/logout.php'>Logout</a>
			 &nbsp; | &nbsp;  <?php if( isset( $_SESSION['user_session']) ) { 
				echo esc("You are safely logged in "); } ?></p>
          <div class="table-responsive">
<?php
if( isset( $_POST['submit_username'] )){
    require_once '../../inc/db.php';
    $idm = escint( $_POST['idm'] );
    $username = escmim( $_POST['edit_username'] );
    
    // Insert data into mysql
    $sql = ("UPDATE tsw_members 
         SET 
         `username` = :username
        
         WHERE `idm` = :idm");
        //Prepare UPDATE SQL statement.
        $statement = $dbh->prepare($sql);
        //Bind value to the parameter :id.
        $statement->bindValue(':idm', $idm);
        $statement->bindValue(':username',   $username);
        $update = $statement->execute();
    
        //If the process is successful.
        if($update){
        echo "<br>Information UPDATED to system Successfully!";
        echo "<BR>";
        echo "Data entered - "; 
        $source = $dateformat;
        $date = new DateTime($source);
        echo escvar( $date->format('m-d-Y H:m') );
echo "<hr><p><a class='btn btn-primary' href='admin.php' title='back'>BACK to Admin List</a></p>"; 
    
        // throw errors if not success
        } else {
            print "oops This entry did not process correctly, please try again.";
            echo $sql . "<br>" . $dbh->error;
            }
            //$dbh = null; 
}
?>

<?php
if( isset( $_POST['submit_password'] )){
    require_once '../../inc/db.php';
    
    $idm = $_POST['idm'];
    $password = $_POST['edit_password'];
    
    // Insert data into mysql
    $sql = ("UPDATE tsw_members 
         SET 
         `password` = :password
        
         WHERE `idm` = :idm");
        //Prepare UPDATE SQL statement.
        $statement = $dbh->prepare($sql);
        //Bind value to the parameter :id.
        $statement->bindValue(':idm', $idm);
        $statement->bindValue(':password', md5($password));
        $update = $statement->execute();
    
        //If the process is successful.
        if($update){
        echo "<br>Information UPDATED to system Successfully!";
        echo "<BR>";
        echo "Data entered - "; 
        $source = $dateformat;
        $date = new DateTime($source);
        echo $date->format('m-d-Y H:m');
echo "<hr><p><a class='btn btn-primary' href='index.php' title='back'>BACK to Admin List</a></p>"; 
    
        // throw errors if not success
        } else {
            print "oops This entry did not process correctly, please try again.";
            echo $sql . "<br>" . $dbh->error;
            }
            //$dbh = null; 
}

?>

<?php 
if( isset( $_POST['submit_level']) ) {
    include_once('../../inc/db.php');
    $idm    = $_POST['idm'];
    $level  = $_POST['edit_level'];
    
   // Insert data into mysql
    $sql = ("UPDATE tsw_members SET 
    `level` = :level 
     WHERE `idm` = :idm");

    //Prepare UPDATE SQL statement.
    $statement = $dbh->prepare($sql);
    //Bind value to the parameter :id.
    $statement->bindValue(':idm', $idm);
    $statement->bindValue(':level', $level);
    
        $update = $statement->execute();
    
    //If the process is successful.
    if($update){
    echo "<br>Information UPDATED to system Successfully!";
        echo "<BR>";
        echo "Data entered - "; 
        $source = $dateformat;
        $date = new DateTime($source);
        echo $date->format('m-d-Y H:m');
echo "<hr><p><a class='btn btn-primary' href='index.php' title='back'>BACK to Admin List</a></p>"; 
    
        // throw errors if not success
        } else {
            print "oops This entry did not process correctly, please try again.";
            echo $sql . "<br>" . $dbh->error;
            }
            //$dbh = null; 
}
?>

<?php 
if( isset( $_POST['submit_active']) ) {
    include_once('../../inc/db.php');
    $idm    = $_POST['idm'];
    $active = $_POST['edit_active'];
    
   // Insert data into mysql
    $sql = ("UPDATE tsw_members SET 
    `active` = :active 
     WHERE `idm` = :idm");

    //Prepare UPDATE SQL statement.
    $statement = $dbh->prepare($sql);
    //Bind value to the parameter :id.
    $statement->bindValue(':idm', $idm);
    $statement->bindValue(':active', $active);
    
        $update = $statement->execute();
    
    //If the process is successful.
    if($update){
    echo "<br>Information UPDATED Successfully!";
        echo "<BR>";
        echo "Data entered - "; 
        $source = $dateformat;
        $date = new DateTime($source);
        echo $date->format('m-d-Y H:m');
echo "<hr><p><a class='btn btn-primary' href='index.php' title='back'>BACK to Admin List</a></p>"; 
    
        // throw errors if not success
        } else {
            print "oops This entry did not process correctly, please try again.";
            echo $sql . "<br>" . $dbh->error;
            }
            //$dbh = null; 
}
?>

<?php 
if( isset( $_POST['submit_username'] ) ){ 
    require_once '../../inc/db.php';
    $add_username = escmim( $_POST['add_username'] );
    $add_email = escmim( $_POST['add_email'] );
   
    // Insert data into mysql
    $sql = "INSERT INTO cgadmins (`admin_username`, `admin_password`) 
    VALUES(:admin_username, :admin_password)";

    $stmt = $dbh->prepare($sql);

    //Execute the statement
    $stmt->execute(array(
    ':admin_username'    => $add_username,
    ':admin_password'   => $add_email
    ));
    //If the process is successful.
    if($stmt){

        echo "<br>Information UPDATED to system Successfully!";
        echo "<BR>";
        echo "Data entered - "; 
        $source = $dateformat;
        $date = new DateTime($source);
        echo escvar( $date->format('m-d-Y H:m') );
echo "<hr><p><a class='btn btn-primary' href='admin.php'>BACK</a></p>"; 
    
        // throw errors if not success
        } else {
            print "oops This entry did not process correctly, please try again.";
            echo $sql . "<br>" . $dbh->error;
            }
}
?>  
  
</div>
<?php include 'footer.php'; ?>
