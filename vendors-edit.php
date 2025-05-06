<?php 
include('restrict.php');
include('header.php');
$header_name = "";
?>
    <h1 class="page-header"><?php echo $header_name; ?></h1>
    <h2 class="sub-header">Contacts</h2>   
        
            <div class="table-responsive">
           <?php
if( isset( $_GET['id']) ) {
include_once('inc/db.php');

    // Get values from form
    $id = $_GET['id'];

    // Retrieve data from database
    $sql = ("SELECT * FROM cgvendors WHERE id = :id");
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($rows as $row){
?>

<form name="form1" action="vendors-edit.php" method="post">
<table id="contact_form"><tbody>
<tr valign="bottom">
<td><label>Business: </label></td>
<td><input class="form-control" type="text" name="business" value="<?php echo $row['business']; ?>" /></td><td>1</td></tr>
<tr valign="bottom">
<td><label>Phone: </label></td>
<td><input class="form-control" type="text" name="phone" value="<?php echo $row['phone']; ?>" /></td><td>2</td></tr>
<tr valign="middle">
<td><label>Address: </label></td>
<td><input class="form-control" type="text" name="address" value="<?php echo $row['address']; ?>" /></td><td>3</td></tr>
<tr valign="bottom">
<td><label>Hours: </label></td>
<td><textarea class="form-control" name="hours" value="<?php echo $row['hours']; ?>" rows=7 cols=50><?php echo $row['hours']; ?></textarea></td><td>4</td></tr>
<tr valign="bottom">
<td><label>Notes </label></td>
<td><input class="form-control" type="text" name="note" value="<?php echo $row['note']; ?>" /></td><td>5</td><tr>

<td colspan=3><input type="hidden"         name="id" value="<?php echo $row['id']; ?>" /></td></tr>

<td><input type="submit" class="btn btn-success" name="submit" value="Submit" /></td>
<td> </td><td>6</td></tr>
</tbody></table></form>
<?php } 
    } 
    ?>
<hr>

<?php if( isset( $_POST['submit']) ) {
include_once('inc/db.php');
$id       = $_POST['id'];
$business = $_POST['business'];
$phone    = $_POST['phone'];
$address  = $_POST['address'];
$hours    = $_POST['hours'];
$note     = $_POST['note'];

// Insert data into mysql
$sql = ("UPDATE cgvendors SET 
`business` = :business, `phone` = :phone, `hours` = :hours, `address` = :address, `note` = :note 

WHERE `id` = :id");

//Prepare UPDATE SQL statement.
$statement = $dbh->prepare($sql);
//Bind value to the parameter :id.
$statement->bindValue(':id', $id);

$statement->bindValue(':business', $business);
$statement->bindValue(':phone', $phone);
$statement->bindValue(':address', $address);
$statement->bindValue(':hours', $hours);
$statement->bindValue(':note', $note);

$update = $statement->execute();
    
    //If the process is successful.
    if($update){

        echo "<br>Information UPDATED to system Successfully!";
        echo "<BR>";
        echo "Data entered - "; 
        $source = $dateformat;
        $date = new DateTime($source);
        echo $date->format('m-d-Y H:m');
echo "<hr><p><a class='btn btn-primary' href='vendors-list.php' title='back'>BACK</a></p>"; 
    
        // throw errors if not success
        } else {
            print "oops This entry did not process correctly, please try again.";
            echo $sql . "<br>" . $dbh->error;
            }
}
?>

            </div>
<?php include('footer.php'); ?>