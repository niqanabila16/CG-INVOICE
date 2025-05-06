<div class="det-list-container">
 <?php if( isset( $_POST['success'])) : ?> <br>
        <div id="trans_fade" class='panel panel-success'>Information UPDATED to system Successfully!</div> 
<?php endif; ?>
            <table class="table table-striped table-condensed"> 
            <caption>level 1 = normal login | level 0 = adminstrative login Access Level | To change an entry, type new username or new password and hit [@]</caption>
            <thead>
            <tr><th><span>id#</span></th>
            <th><span>username</span></th>
            <th><span>email</span></th>
            <th><span>password</span></th>
            <th><span>access level</span></th>
            <th><span>1=active</span></th>
            <th><span>remove</span></th>
            </tr> </thead><tbody>
<?php

    require_once '../../inc/db.php';

    $sql = "SELECT * FROM tsw_members";
    $result = $dbh->query($sql);
        // Parse returned data, and displays them
        while($row = $result->fetch(PDO::FETCH_ASSOC)) { 

        $idd_int = $row['idm']; 
    ?>
<tr>
    <td>
    <?php echo escint( $idd_int ); ?><br>
    <?php echo alpha_only( $row['lastname'] ); ?> | <?php print( $row['dateregistered'] ); ?></td> 
<td>
    <form action="det-edit.php" method="POST" id="edit_username">
    <input type="hidden" name="idm" value="<?php echo escint( $idd_int ); ?>">
    <input type="text" name="edit_username" size="15" 
           value="<?php echo escvar( $row['username'] ); ?>" id="username">
    <input type="submit" class="det-list-anchor" name="submit_username" value=" [ @ ] ">
</form></td> 
       
<td><p><?php print( $row['email'] ); ?></p></td> 
       
<td>
    <form action="det-edit.php" method="POST" id="edit_password">
    <input type="hidden" name="idm" value="<?php echo escint( $idd_int ); ?>">
    <input type="text" name="edit_password" value="" size="15" id="password">
    <input type="submit" class="det-list-anchor" name="submit_password" value=" [ @ ] ">
</form></td> 

<td>
    <form action="det-edit.php" method="POST" id="edit_level">
    <input type="hidden" name="idm" value="<?php echo escint( $idd_int ); ?>">
    <input type="number" name="edit_level" style="max-width:68px;" 
     min="0" max="9" value="<?php echo escint( $row['level'] ); ?>" id="level">
    <input type="submit" class="det-list-anchor" name="submit_level" value=" [ @ ] ">
</form></td> 

<td>
    <form action="det-edit.php" method="POST" id="edit_active">
    <input type="hidden" name="idm" value="<?php echo escint( $idd_int ); ?>">
    <input type="number" name="edit_active" style="max-width:68px;" 
     min="0" max="9" value="<?php echo escint( $row['active'] ); ?>" id="level">
    <input type="submit" class="det-list-anchor" name="submit_active" value=" [ @ ] ">
</form></td> 

<td>
    <form action="det-crud.php" method="POST" id="rmv_idd">
    <input type="hidden" name="rmv_idd" value="<?php echo escint( $idd_int ); ?>">
    <input type="submit" class="det-list-anchor text-r" 
    name="submit_rmv_idd" value=" [ - ] <?php echo escint( $idd_int ); ?>" 
    onClick="return confirm('Are you sure you want to delete item&#63;')">
</form></td> 
</tr>
<?php } 

?>       
       </tbody></table>

           </div><!-- ends det-list-container -->

