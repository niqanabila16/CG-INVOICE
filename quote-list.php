<?php 
include('restrict.php');
include('header.php');
?>
       
      <h1 class="page-header">Invoicing and Quotes</h1>
      <h2 class="sub-heading">List Invoices to Print of View</h2>
          <div class="table-responsive">

<em><u> Use Ctrl F to search by name </u> For security, no quote can be deleted. You may however append* quotes using the Edit button.</em><p>click inv. # to print</p>

<table id="listall"><tbody>
<tr><th>PRINT</th><th>EDIT</th><th>name</th><th>phone</th><th>address</th><th>date</th><th>qutnum</th><th>work</th><th>total</th></tr>
<?php
 //show history 
include_once('inc/db.php');
    $query = 'SELECT * FROM cgquote';
        foreach ($dbh->query($query) as $row) {    
?>

<tr>
<td><a href="quote-print.php?id=<?php echo $row['id']; ?>" title="print"><span class="tdwide"><?php echo $row['id']; ?></span></a></td>
<td><a href="quote-edit.php?id=<?php echo $row['id']; ?>" title="edit"><span class="tdwide"><?php echo $row['id']; ?></span></a></td>
<td><?php echo $row['name']; ?>  </td><td> <?php echo $row['phone']; ?></td><td><?php echo $row['address']; ?></td><td><?php echo $row['date']; ?></td>
<td><?php echo $row['invnum']; ?></td> <td><?php echo $row['work']; ?></td> <td><?php echo $row['total']; ?>  </td>
</tr>

     <?php
        }  $dbh = null;
?>
</tbody></table>

          </div>
      
<?php include('footer.php'); ?>