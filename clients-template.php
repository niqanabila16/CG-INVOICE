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

$item  = escmim($_POST['item']);
$code  = escmim($_POST['code']);
$value = escmim($_POST['value']);
$upc   = escmim($_POST['upc']);
$din   = escmim($_POST['din']);
$dout  = escmim($_POST['dout']);

// Insert data into mysql
$sql = "INSERT INTO cgclients ( item, code, value, upc, din, dout ) 
VALUES( :item, :code, :value, :upc, :din, :dout )";

    //Execute the statement and insert the new info
    $stmt = $dbh->prepare($sql);

$stmt->execute(array(
':item'  => $item,
':code'  => $code,
':value' => $value,
':upc'   => $upc,
':din'   => $din,
':dout'  => $dout
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
<p><a class='btn btn-primary' href='clients-template.php'>ADD CLIENT</a></p>"; 
    
        // throw errors if not success
        } else {
            print "oops This item did not process correctly, please try again.";
            echo $sql . "<br>" . $dbh->error;
            }
}
?>

<form name="form1" action="clients-template.php" method="post">
<table id="contact_form"><tbody>
<tr valign="bottom">
<td><label>Name: </label></td><td><input   name="item" class="form-control" type="text" /></td><td> 1</td></tr>
<tr valign="bottom">
<td><label>Number: </label></td><td><input name="code" class="form-control" type="text" /></td><td> 2</td></tr>
<tr valign="middle">
<td><label>Value: </label></td><td><input  name="value" class="form-control" type="text" /></td><td> 3</td></tr>
<tr valign="bottom">
<td><label>UPC: </label></td><td><input    name="upc" class="form-control" type="text" /></td><td> 4</td></tr>
<tr valign="bottom">
<td><label>Date In: </label></td><td><input name="din" class="form-control" type="date" /></td><td> 5</td></tr>
<tr valign="bottom">
<td><label>Date Out: </label></td><td><input name="dout" class="form-control" type="date" /></td><td> 6</td></tr>

<td><input type="submit" name="submit" class="btn btn-primary" value="Submit" /></td>
<td><p>&nbsp; Entry will be automatically processed</p></td><td> 7</td></tr>
</tbody></table></form>

            </div>
<?php include('footer.php'); ?>
