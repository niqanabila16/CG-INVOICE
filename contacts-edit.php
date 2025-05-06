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
    $sql = ("SELECT * FROM cgcontacts WHERE id = :id");
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($rows as $row){
?>

<form name="form1" action="contacts-edit.php" method="post">
<table id="contact_form"><tbody>
<tr valign="bottom"><td><label>First Name: </label></td>
<td><input name="first" class="form-control" type="text" value="<?php echo esc( $row['first'] ); ?>" /></td><td> 1</td></tr>

<tr valign="bottom"><td><label>Last Name: </label></td>
<td><input name="last" class="form-control" type="text" value="<?php echo esc( $row['last'] ); ?>" /></td><td> 2</td></tr>

<tr valign="middle"><td><label>Address: </label></td>
<td><textarea name="address" class="form-control" value="<?php echo esc( $row['address'] ); ?>" rows=3 cols=35><?php echo esc( $row['address'] ); ?></textarea></td><td>3</td></tr>

<tr valign="bottom"><td><label>Phone: </label></td>
<td><input name="phone" class="form-control" type="text" value="<?php echo esc( $row['phone'] ); ?>" /></td><td>4</td></tr>

<tr valign="bottom"><td><label>Mobile: </label></td>
<td><input name="mobile" class="form-control" type="text" value="<?php echo esc( $row['mobile'] ); ?>" /></td><td>5</td></tr>

<tr valign="bottom"><td><label>E-mail: </label></td>
<td><input name="email" class="form-control" type="text" value="<?php echo esc( $row['email'] ); ?>" /></td><td>6</td></tr>

<tr valign="bottom"><td><label>Website: </label></td>
<td><input name="website" class="form-control" type="text" value="<?php echo esc( $row['website'] ); ?>" /></td><td>7</td></tr>

<tr valign="bottom"><td><label>Comments: </label></td>
<td><input name="comment" class="form-control" type="text" value="<?php echo esc( $row['comment'] ); ?>" /></td><td>8</td></tr>

<tr valign="bottom"><td>Date: </td>
<td><input name="date_in" type="date" value="<?php echo esc( $row['date'] ); ?>" /></td><td>9</td><tr>

<tr><td colspan=3><input name="category" type="hidden" value=0 />
<input name="id" type="hidden" value="<?php echo esc( $row['id'] ); ?>" /></td></tr>

<td><input type="submit" name="submit_edit" class="btn btn-primary" value="Submit" /></td>
<td><p>&nbsp; Entry may need new date if you modify.</p></td><td>10</td></tr>
</tbody></table></form>
<?php } 
    } 
    ?>
<hr>
<?php if( isset( $_POST['submit_edit']) ) {
include_once('inc/db.php');
$id      = $_POST['id'];
$first   = $_POST['first'];
$last    = $_POST['last'];
$address = $_POST['address'];
$phone   = $_POST['phone'];
$mobile  = $_POST['mobile'];
$email   = $_POST['email'];
$website = $_POST['website'];
$comment = $_POST['comment'];
$date_in  = $_POST['date_in'];
$category = $_POST['category'];

// Insert data into mysql
$sql = ("UPDATE cgcontacts SET 
`id`       = :id,
`first`    = :first,
`last`     = :last,
`address`  = :address,
`phone`    = :phone,
`mobile`   = :mobile,
`email`    = :email,
`website`  = :website,
`comment`  = :comment,
`date`     = :date_in,
`category` = :category

WHERE `id` = :id");

//Prepare our UPDATE SQL statement.
$statement = $dbh->prepare($sql);
//Bind our value to the parameter :id.
$statement->bindValue(':id', $id);

$statement->bindValue(':first', $first);
$statement->bindValue(':last', $last);
$statement->bindValue(':address', $address);
$statement->bindValue(':phone', $phone);
$statement->bindValue(':mobile', $mobile);
$statement->bindValue(':email', $email);
$statement->bindValue(':website', $website);
$statement->bindValue(':comment', $comment);
$statement->bindValue(':date_in', $date_in);
$statement->bindValue(':category', $category);

$update = $statement->execute();
    
    //If the process is successful.
    if($update){

        echo "<br>Information UPDATED to system Successfully!";
        echo "<BR>";
        echo "Data entered - "; 
        $source = $dateformat;
        $date = new DateTime($source);
        echo $date->format('m-d-Y H:m');
echo "<hr><p><a class='btn btn-primary' href='contacts-list.php'>BACK</a></p>"; 
    
        // throw errors if not success
        } else {
            print "oops This entry did not process correctly, please try again.";
            echo $sql . "<br>" . $dbh->error;
            }
}
?>

            </div>
<?php include('footer.php'); ?>
