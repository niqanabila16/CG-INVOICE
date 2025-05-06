<div class="det-list-container">
 <?php if( isset( $_POST['success'])) : ?> <br>
        <div id="trans_fade" class='panel panel-success'>Information UPDATED to system Successfully!</div> 
<?php endif; ?>
            <table class="table table-striped table-condensed"> <thead>
            <tr><th><span>remove temporary access</span></th>
            <th><span>username</span></th>
            <th><span>email</span></th>
            </tr> </thead><tbody>
<?php

    require_once '../../inc/db.php';

    $sql = "SELECT * FROM cgadmins";
    $result = $dbh->query($sql);
        // Parse returned data, and displays them
        while($row = $result->fetch(PDO::FETCH_ASSOC)) { 

        $admin_id       = $row['admin_id']; 
        $admin_username = $row['admin_username']; 
        $admin_password = $row['admin_password']; 
    ?>
<tr>
<td>
    <form action="det-crud.php" method="POST" id="rmv_access">
    <input type="hidden" name="access" value="access">
    <input type="text" name="rmv_access" size="3" 
           value="<?php echo escint( $row['admin_id'] ); ?>" id="0" disabled>
    <input type="submit" class="btn btn-danger" name="submit_rmv_temp" value=" [ - ] ">
</form></td> 
<td>
    <?php echo escvar( $row['admin_username'] ); ?></td>
<td>
    <?php echo escvar( $row['admin_password'] ); ?></td>
</tr>
<?php } 

?>       
    </tbody></table>
       <hr>
        <table class="table table-striped table-condensed"> <thead>
        <caption>You only need one or the other to give access to new users. (email or username.) Both is just more secure. </caption>
        <tr><th><span>user name</span></th>
        <th><span>user email</span></th>
        <th><span>create access</span></th>
        </tr> </thead><tbody>
    <tr>
    <td>
    <form action="det-edit.php" method="POST" id="add_access">
    <input type="hidden" name="access" value="access">
    <input type="text" name="add_username" size="18" value="" id="addusername"></td> 
    
    <td><input type="text" name="add_email" size="18" value="" id="addemail"></td>
    
    <td><input type="submit" class="btn btn-success" name="submit_username" value="Submit Temp User">
</form></td></tr></tbody></table>

           </div><!-- ends det-list-container -->

