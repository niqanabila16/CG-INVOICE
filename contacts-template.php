<?php 
include('restrict.php');
include('header.php');
$header_name = "";
?>
    <h1 class="page-header"><?php echo esc( $header_name ); ?></h1>
    <h2 class="sub-header">Contacts</h2>   
        
            <div class="table-responsive">
           <?php
if( isset( $_POST['submit']) ) {
include_once('inc/db.php');
// Get values from form

$first   = $_POST['first'];
$last    = $_POST['last'];
$address = $_POST['address'];
$phone   = $_POST['phone'];
$mobile  = $_POST['mobile'];
$email   = $_POST['email'];
$website = $_POST['website'];
$comment = $_POST['comment'];
$date    = date('m/d/Y');

// Insert data into mysql
$sql = "INSERT INTO cgcontacts ( first, last, address, phone, mobile, email, website, comment, date ) 
VALUES( :first, :last, :address, :phone, :mobile, :email, :website, :comment, :date )";

$stmt = $dbh->prepare($sql);

$stmt->execute(array(
':first'   => $first,
':last'    => $last,
':address' => $address,
':phone'   => $phone,
':mobile'  => $mobile,
':email'   => $email,
':website' => $website,
':comment' => $comment,
':date'    => $date
));

 //Execute the statement and insert the new account.
    
    
    //If the process is successful.
    if($stmt){

        echo "<br>Information UPDATED to system Successfully!";
        echo "<BR>";
        echo "Data entered - "; 
        $source = $dateformat;
        $date = new DateTime($source);
        echo $date->format('m-d-Y H:m');
?><hr><p><a class='btn btn-primary' href='index.php'>BACK TO ADMIN</a></p>
<p>You add another contact now or return to admin with link above.</p>
<p><a class='btn btn-primary' href='contacts-template.php'>ADD CONTACT</a></p>
<?php  
    
        // throw errors if not success
        } else {
            print "oops This card did not process correctly, please try again.";
            echo $sql . "<br>" . $dbh->error;
            }
}
?>

<form name="form1" action="contacts-template.php" method="post">
<table id="contact_form"><tbody>
<tr valign="bottom">
<td><label>First Name: </label></td><td><input name="first" class="form-control" type="text" /></td><td>1</td></tr>
<tr valign="bottom">
<td><label>Last Name: </label></td><td><input name="last" class="form-control" type="text" /></td><td>2</td></tr>
<tr valign="middle">
<td><label>Address: </label></td><td><textarea name="address" class="form-control" rows="3" cols="50"></textarea></td><td>3</td></tr>
<tr valign="bottom">
<td><label>Phone: </label></td><td><input name="phone" class="form-control" type="text" /></td><td>4</td></tr>
<tr valign="bottom">
<td><label>Mobile: </label></td><td><input name="mobile" class="form-control" type="text" /></td><td>5</td></tr>
<tr valign="bottom">
<td><label>E-mail: </label></td><td><input name="email" class="form-control" type="text" /></td><td>6</td></tr>
<tr valign="bottom">
<td><label>Website: </label></td><td><input name="website" class="form-control" type="text" /></td><td>7</td></tr>
<tr valign="bottom">
<td><label>Comments: </label></td><td><input name="comment" class="form-control" type="text" /></td><td>8</td></tr>

<tr valign="bottom">
<td colspan=3><input name="date" class="form-control" type="hidden" value="<?php date('m-d-Y'); ?>" />
<input name="category" class="form-control" type="hidden" value=0 /></td></tr>

<td><input type="submit" name="submit" class="btn btn-primary" value="Submit" /></td>
<td><p>&nbsp; Entry will be automatically processed with date stamp.<br>&nbsp; This entry will be processed as a CONTACT Category</p></td><td>9</td></tr>
</tbody></table></form>

            </div>
<?php include('footer.php'); ?>
