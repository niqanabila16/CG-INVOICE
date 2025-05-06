<?php include('restrict.php');
include('header.php'); ?>
<h1 class="page-header">Dashboard for Configuration and Accounts</h1>
          <h2 class="sub-header">Administrative Portal</h2>
 <h2>Welcome <?php echo $_SESSION['firstname']; ?></h2>
				<p><a href='inc/logout.php'>Logout</a>
			 &nbsp; | &nbsp;  <?php if( isset( $_SESSION['user_session']) ) { 
				esc("You are safely logged in "); } ?></p>
          <div class="table-responsive">
<?php 
if( isset( $_POST['csv']) ) { 
$limits = (int)$_POST['limits'];
$filename     = 'invoice-export-'.date('Y-m-d-H-i-s').'.csv';
/*     header( 'Content-Type: text/csv; charset=utf-8; encoding=UTF-8' );
header("Cache-Control: cache, must-revalidate");
header("Pragma: public"); */
//header( 'Content-Disposition: attachment;filename='.$filename.'' );
require_once 'inc/db.php';
 $stmt = $dbh->prepare("SELECT * FROM `cginvoice` ORDER BY id ASC LIMIT $limits");
$stmt->execute();

$filelocation = 'bin/';

$file_export  =  $filelocation . $filename;

$data = fopen($file_export, 'w+');

$csv_fields = array();

$csv_fields[] = 'id';
$csv_fields[] = 'name';
$csv_fields[] = 'phone';
$csv_fields[] = 'address';
$csv_fields[] = 'date';
$csv_fields[] = 'invnum';
$csv_fields[] = 'cust';
$csv_fields[] = 'model';
$csv_fields[] = 'work';
$csv_fields[] = 'sub';
$csv_fields[] = 'tax';
$csv_fields[] = 'total';
$csv_fields[] = 'paid';

fputcsv($data, $csv_fields);

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    fputcsv($data, $row);
}
if($stmt) {]
?>  <br>
    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="panel-title">Generated Entry</h3>
        </div>    
        <div class="panel-body">
           <?php echo date('m-d-Y H:m'); ?>
           <h2>Select "view files" below to download or view new file</h2>
        </div>
    </div>    
<?php } 
 
}
?>

       <!--   <h1>Export Invoicing Records </h1>
          <h2>Export XLS File</h2>
          <form id="xls" action="" method="POST" type="MULTIPART/ENCRYPTED">
          <input type="submit" name="xls" value="Export XLS">
          </form> -->
          <h2>Export CSV File</h2>
          <form id="csv" action="" method="POST">
          <label>Export the Last x Number of reports</label>
          <input type="number" name="limits" value="10" min="0" max="999999">
          <input type="submit" name="csv" value="Generate CSV">
          </form>
          <hr>
          
          <p><a class="btn btn-default" href="bin/image-list.php">view files</a></p>


  </div>

              <?php include('footer.php'); ?>
