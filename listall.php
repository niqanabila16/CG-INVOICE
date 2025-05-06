<?php
// listall
// TSW =|=
?>

<em><u> Use Ctrl F to search by name </u> For security, no invoice can be deleted. You may however clone* an invoice by using the Edit button.</em><p>click inv. # to print</p>

<table id="listall"><thead>
<tr><th>PRINT</th>
    <th>EDIT</th>
        <th>name</th>
            <th>phone</th>
                <th>address</th>
                    <th>date</th>
                        <th>invnum</th>
                                <th>type</th>
                                        <th>total</th></tr></thead><tbody>
<?php
 //show history 
include_once('inc/db.php');
    $query = 'SELECT * FROM cginvoice';
        foreach ($dbh->query($query) as $row) {    
?>

<tr>
<td><a href="print-template.php?id=<?php echo esc($row['id']); ?>" 
title="print"><span class="tdwide"><?php echo esc($row['id']); ?></span></a></td>
<td><a href="edit-template.php?id=<?php echo esc($row['id']); ?>" 
title="edit"><span class="tdwide"><?php echo esc($row['id']); ?></span></a></td>
<td><?php echo esc( $row['name'] ); ?>  </td>
<td><?php echo esc( $row['phone'] ); ?></td>
<td><?php echo esc($row['address']); ?></td>
<td><?php echo esc( $row['date'] ); ?></td>
<td><?php echo esc( $row['invnum'] ); ?></td>
<td><?php echo esc($row['model']); ?></td>

<td><?php echo $row['total']; ?>
</tr>

     <?php
        }  $dbh = null;
?>
</tbody></table>

