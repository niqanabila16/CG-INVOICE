<?php 
include('restrict.php');
include('header.php');
            // for displaying name
    $user_id = $_SESSION['user_id'];
    $default = (int)1;

    require_once '../../inc/db.php';

    $stmt = $dbh->prepare("SELECT level, active FROM tsw_members 
    WHERE `idm` = :idm AND `active` = :default ");

    $stmt->bindValue(':idm', $user_id);
    $stmt->bindValue(':default', $default);
    $stmt->execute();
        if ($stmt->rowCount() > 0){
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $level = $row['level'];
        if ( $level >= 1 ) redirect("../../login.html");
        }
?>
       
<h1 class="page-header">Dashboard for Configuration and Accounts</h1>
<h2 class="sub-header">Administrative Portal | Welcome <?php echo $_SESSION['firstname']; ?></h2>
				<p><a href='../../inc/logout.php'>Logout</a>
			 &nbsp; | &nbsp;  <?php if( isset( $_SESSION['user_session']) ) { 
				echo esc("You are safely logged in "); } ?></p>
          <div class="table-responsive">
     

<em><u> Use Ctrl F to search by name </u> For security, no invoice can be deleted. You may however clone* an invoice by using the Edit button.</em><p>click inv. # to print</p>

<table id="listall"><thead>
<tr><th>PRINT</th>
    <th>EDIT</th>
    <th>DEL!</th>
        <th>name</th>
            <th>phone</th>
                <th>address</th>
                    <th>date</th>
                        <th>invnum</th>
                                <th>type</th>
                                        <th>total</th></tr></thead><tbody>
<?php
 //show history 
include_once('../../inc/db.php');
    $query = 'SELECT * FROM cginvoice';
        foreach ($dbh->query($query) as $row) {    
?>

<tr>
<td><a href="../../print-template.php?id=<?php echo esc($row['id']); ?>" 
title="print"><span class="tdwide"><?php echo esc($row['id']); ?></span></a></td>
<td><a href="../../edit-template.php?id=<?php echo esc($row['id']); ?>" 
title="edit"><span class="tdwide"><?php echo esc($row['id']); ?></span></a></td>
<td><form action="det-crud.php" method="POST">
<input type="hidden" name="rmv_inv" value="<?php echo esc($row['id']); ?>"/>
<input type="submit" class="tdwide" name="remove_inv" title="delete" 
onClick="return confirm('Are you sure you want to delete item&#63;')" 
value="<?php echo esc($row['id']); ?> !" width="14"/></form></td>
<td><?php echo esc( $row['name'] ); ?>  </td>
<td><?php echo esc( $row['phone'] ); ?></td>
<td><?php echo esc( $row['address']); ?></td>
<td><?php echo esc( $row['date'] ); ?></td>
<td><?php echo esc( $row['invnum'] ); ?></td>
<td><?php echo esc( $row['model']); ?></td>

<td><?php echo $row['total']; ?>
</tr>

     <?php
        }  $dbh = null;
?>
</tbody></table>
 </div>

              <?php include('footer.php'); ?>


