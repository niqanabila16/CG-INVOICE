<?php 
include('restrict.php');
include('header.php');
?>

    <h1 class="page-header">Invoicing and Quotes</h1>
    <h2 class="sub-heading">Update a Quote</h2>
        <div class="table-responsive">

<?php
if(isset($_POST['submit'])) {

include_once('inc/db.php');
$name    = $_POST['name'];
$phone   = $_POST['phone'];
$address = $_POST['address'];
$date    = $_POST['date'];
$invnum  = $_POST['invnum'];
$work    = $_POST['work'];
$sub     = $_POST['sub'];
$tax     = $_POST['tax'];
$total   = $_POST['total'];
$paid    = $_POST['paid'];
$status  = $_POST['status'];

// Insert data into mysql
$sql = "INSERT INTO cgquote (name, phone, address, date, invnum, work, sub, tax, total, paid, status) 
VALUES(:name, :phone, :address, :date, :invnum, :work, :sub, :tax, :total, :paid, :status)";

//Execute the statement and insert the new account.
$stmt = $dbh->prepare($sql);

$stmt->execute(array(
':name'    => $name,
':phone'   => $phone,
':address' => $address,
':date'    => $date,
':invnum'  => $invnum,
':work'    => $work,
':sub'     => $sub,
':tax'     => $tax,
':total'   => $total,
':paid'    => $paid,
':status'  => $status ));

    //If the process is successful.
    if($stmt){

        echo "<br>Information UPDATED to system Successfully!";
        echo "<BR>";
        echo "Data entered - "; 
        $source = $dateformat;
        $date = new DateTime($source);
        echo $date->format('m-d-Y H:m');
echo "<hr><p><a class='btn btn-primary' href='quote-list.php'>BACK</a></p>"; 
?>

          </div>
        </div><!-- ends 9 col -->

<?php include('footer.php'); exit; ?>
    
<?php   // throw errors if not success
        } else {
            print "oops This data did not process correctly, please try again.";
            echo $sql . "<br>" . $dbh->error;
            }
}
?>

          </div>

<?php include('footer.php'); ?>