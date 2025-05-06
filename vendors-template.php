<?php 
include('restrict.php');
include('header.php');
$header_name = "";
?>
    <h4 class="page-header"><?php echo esc( $header_name ); ?></h4>
    <h2 class="sub-header">Clients</h2>   
        <div class="table-responsive">
           <?php
if( isset( $_POST['submit']) ) {
include_once('inc/db.php');
// Get values from form
$business = $_POST['business'];
$phone    = $_POST['phone'];
$address  = $_POST['address'];
$hours    = $_POST['hours'];
$note     = $_POST['note'];

$sql = "INSERT INTO cgvendors ( business, phone, address, hours, note ) 
VALUES( :business, :phone, :address, :hours, :note )";

    //Execute the statement and insert the new info
    $stmt = $dbh->prepare($sql);

$stmt->execute(array(
':business' => $business,
':phone'    => $phone,
':address'  => $address,
':hours'    => $hours,
':note'     => $note
));


    //If the process is successful
    if($stmt){

        echo "<br>Information UPDATED to system Successfully!";
        echo "<BR>";
        echo "Data entered - "; 
        $source = $dateformat;
        $date = new DateTime($source);
        echo $date->format('m-d-Y H:m');
echo "<hr><p><a class='btn btn-primary' href='index.php'>BACK TO ADMIN</a></p>
<p>You add another contact now or return to admin with link above.</p>
<p><a class='btn btn-primary' href='vendors-template.php'>ADD NEW VENDOR</a></p>"; 
    
        // throw errors if not success
        } else {
            print "oops This item did not process correctly, please try again.";
            echo $sql . "<br>" . $dbh->error;
            }
}
?>


<form name="form1" action="vendors-template.php" method="post">
<table id="contact_form"><tbody>
<tr valign="bottom">
<td><label>Business: </label></td>
<td><input class="form-control" type="text" name="business" /></td><td>1</td></tr>
<tr valign="bottom">
<td><label>Phone: </label></td>
<td><input class="form-control" type="text" name="phone" /></td><td>2</td></tr>
<tr valign="middle">
<td><label>Address: </label></td>
<td><input class="form-control" type="text" name="address" /></td><td>3</td></tr>
<tr valign="bottom">
<td><label>Hours: </label></td>
<td><textarea class="form-control" name="hours" rows=7 cols=50></textarea></td><td>4</td></tr>
<tr valign="bottom">
<td><label>Notes </label></td>
<td><input class="form-control" type="text" name="note" value="" /></td><td>5</td><tr>

<td><input type="submit" class="btn btn-success" name="submit" value="Submit" /></td>
<td> Entry will be automatically processed. </td><td>6</td></tr>
</tbody></table></form>

            </div>
<?php include('footer.php'); ?>
