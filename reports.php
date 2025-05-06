<?php 
include('restrict.php');
include('header.php');
?>

    <h1 class="page-header">Administrative Portal</h1>
    <h2 class="sub-header">Reporting</h2>
        <div class="row">
            <h3>Open Invoices</h3>
              <ul class="list-inline">

<?php
 //show history 
include_once('inc/db.php'); $q = (int)0;
    $query = 'SELECT * FROM cginvoice WHERE status = "'.$q.'"';
        foreach ($dbh->query($query) as $row) {  
          // routine for paid or not status 
          /*
            if( $row['status'] == 0 )     { $open = "Open"; }
            elseif ( $row['status'] == 1 ){ $open = "Pending"; }
            elseif( $row['status'] == 2 ) { $open = "PAID"; }
                                   else   { $open = ""; } 
          */
?>

<li><a title="edit" href="edit-template.php?id=<?php echo $row['id']; ?>"> <?php echo $row['id']; ?> </a> $<?php echo $row['total']; ?> <span class="tdg"> | </span></li>

<?php } ?>

</ul>
          </div>
<hr>
    
        <div class="row">
            <h3 id="pending">Pending Payment</h3>
              <ul class="list-inline">

<?php
//show history
include_once('inc/db.php'); $q = (int)1;
    $query = 'SELECT * FROM cginvoice WHERE status = "'.$q.'"';
        foreach ($dbh->query($query) as $row) {  
?>


<li><a title="edit" href="edit-template.php?id=<?php echo $row['id']; ?>"> <?php echo $row['id']; ?> </a> $<?php echo $row['total']; ?> <span class="tdg"> | </span></li>

<?php } ?>

</ul>
          </div>
<hr>
    
        <div class="row">
            <h3 id="paid">Paid Invoices</h3>
              <ul class="list-inline">

<?php
//show history
include_once('inc/db.php'); $q = (int)2;
    $query = 'SELECT * FROM cginvoice WHERE status = "'.$q.'"';
        foreach ($dbh->query($query) as $row) {  
?>

<li><a title="edit" href="edit-template.php?id=<?php echo $row['id']; ?>"> <?php echo $row['id']; ?> </a> $<?php echo $row['total']; ?> <span class="tdg"> | </span></li>

<?php } ?>
</ul>
        </div>
        <hr>

        </div><!-- ends 9 col -->
      </div><!-- ends row -->
    </div><!-- ends container -->
<?php include('footer.php'); ?>

