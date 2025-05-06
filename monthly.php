<?php 
include('restrict.php');
include('header.php');
?>

    <h1 class="page-header">Analytical Overview</h1>
        <h2 class="sub-header"></h2>
            <div class="table-responsive">
                <h3>Quotes</h3>

<?php
 //show history 
include_once('inc/db.php');
    $query = 'SELECT * FROM cgquote';
        foreach ($dbh->query($query) as $row) {    
?>

<tr>
<td><?php echo $row['id']; ?> | <?php } ?></td></tr>

          </div>
<hr>

          <div class="table-responsive">
<h3>Invoices pending or unpaid</h3>
<?php
 //show history 
include_once('inc/db.php');
    $query = 'SELECT * FROM cginvoice WHERE `status` = 0 OR 1';
        foreach ($dbh->query($query) as $row) {    
?>

<tr>
<td><?php echo $row['id']; ?>  $<?php echo $row['total']; ?> | <?php } ?></td></tr>

          </div>
<hr>

          <div class="table-responsive">
<h3>Invoices Paid</h3>
<?php
 //show history 
include_once('inc/db.php');
    $query = 'SELECT * FROM cginvoice WHERE `status` = 2';
        foreach ($dbh->query($query) as $row) {    
?>

<tr>
<td><?php echo $row['id']; ?>  $<?php echo $row['total']; ?> | <?php } ?></td></tr>

          </div>
<hr>

<?php include('footer.php'); ?>

