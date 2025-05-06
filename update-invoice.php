<?php 
include('restrict.php');
include('header.php');
?>

    <h1 class="page-header">Invoicing and Quotes</h1>
    <h2 class="sub-heading">Update an Invoice</h2>
        <div class="table-responsive">

<?php
if(isset($_POST['submit'])) {

$id      = $_POST['id'];
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
$status  = $_POST['status'];

include_once('inc/db.php');
// Insert data into mysql
$sql = ("UPDATE cginvoice SET 
`name` = :name, `phone` = :phone, `address` = :address, `date` = :date, `invnum` = :invnum, `cust` = :cust, `model` = :model, `work` = :work, `sub` = :sub, `tax` = :tax, `total` = :total, `paid` = :paid, `status` = :status 
WHERE `id` = :id");

//Prepare UPDATE SQL statement.
$statement = $dbh->prepare($sql);
//Bind value to the parameter :id.
$statement->bindValue(':id', $id);

$statement->bindValue(':name', $name);
$statement->bindValue(':phone', $phone);
$statement->bindValue(':address', $address);
$statement->bindValue(':date', $date);
$statement->bindValue(':invnum', $invnum);
$statement->bindValue(':cust', $cust);
$statement->bindValue(':model', $model);
$statement->bindValue(':work', $work);
$statement->bindValue(':sub', $sub);
$statement->bindValue(':tax', $tax);
$statement->bindValue(':total', $total);
$statement->bindValue(':paid', $paid);
$statement->bindValue(':status', $status);

$update = $statement->execute();
    
    //If the process is successful.
    if($update){

        echo "<br>Information UPDATED to system Successfully!";
        echo "<BR>";
        echo "Data entered - "; 
        $source = $dateformat;
        $date = new DateTime($source);
        echo $date->format('m-d-Y H:m');
echo "<hr><p><a class='btn btn-primary' href='list-template.php' title='back'>BACK to Invoices</a></p>"; 
    
        // throw errors if not success
        } else {
            print "oops This entry did not process correctly, please try again.";
            echo $sql . "<br>" . $dbh->error;
            }
}
?>

            </div>
<?php include('footer.php'); ?>
