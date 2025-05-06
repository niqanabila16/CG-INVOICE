<?php 
include('restrict.php');
include('header.php');
?>

    <h1 class="page-header">Invoicing and Quotes</h1>
    <h2 class="sub-heading">New Invoice</h2>
        <div class="table-responsive">
<?php

if( isset( $_POST['submit']) ) {

// Get values from form
$name    = $_POST['name'];
$phone   = $_POST['phone'];
$address = $_POST['address'];
$date    = $_POST['date'];
$invnum  = $_POST['invnum'];
$cust    = $_POST['cust'];
$model   = $_POST['model'];
$work    = $_POST['work'];
$sub     = $_POST['sub'];
$tax     = $_POST['tax'];
$total   = $_POST['total'];
$paid    = $_POST['paid'];


// Insert data into mysql
include_once('inc/db.php');
$sql = "INSERT INTO cginvoice (`name`, `phone`, `address`, `date`, `invnum`, `cust`, `model`, `work`, `sub`, `tax`, `total`, `paid`) 
VALUES(:name, :phone, :address, :date, :invnum, :cust, :model, :work, :sub, :tax, :total, :paid)";

$stmt = $dbh->prepare($sql);

$stmt->execute(array(
':name'    => $name,
':phone'   => $phone,
':address' => $address,
':date'    => $date,
':invnum'  => $invnum,
':cust'    => $cust,
':model'   => $model,
':work'    => $work,
':sub'     => $sub,
':tax'     => $tax,
':total'   => $total,
':paid'    => $paid
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
echo "<hr><p><a class='btn btn-primary' href='list-template.php'>BACK To Invoice List</a></p>
<p>You may write another invoice now or return to admin with link above.</p>"; 
    
        // throw errors if not success
        } else {
            print "oops This card did not process correctly, please try again.";
            echo $sql . "<br>" . $dbh->error;
            }
}
?>
        </div>
<?php include('footer.php'); ?>
