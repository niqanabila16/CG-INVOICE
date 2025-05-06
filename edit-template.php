<?php 
include('restrict.php');
include('header.php');
?>

    <h2 class="sub-heading">Update an Invoice</h2>
        <div class="table-responsive">
       <?php 
// invoice edit record
// TSW =|=

if( isset ($_GET['id']) ) { 
    $id = $_GET['id'];
    //include('print-settings.php');
    include_once('inc/db.php');

    // Retrieve data from database
    $sql = ("SELECT * FROM cginvoice WHERE `id` = :id");
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($rows as $row){
?>
<br>
<form action="update-invoice.php" name="edit-invoices" method="POST">
<table id="invoice"><tbody>
    <tr><td><p><label>Name:</label><br>
        <input class="form-control"  name="name" type="text" value="<?php echo esc( $row['name'] ); ?>" readonly /></p></td></tr>

    <tr><td><p><label>Phone:</label><br>
        <input class="form-control"  name="phone" type="text" value="<?php echo esc( $row['phone'] ); ?>" readonly /></p></td></tr>

    <tr><td><label>Address:</label><br>
        <textarea rows="4" cols="30" name="address" readonly><?php echo esc( $row['address'] ); ?></textarea></td></tr>

    <tr><td><p><label>Date: </label> <small>Last Invoice Date <?php print date('m/d/Y', strtotime($row['date'])); ?></small></br>
        <input class="form-control"  name="date" type="date" value="<?php echo esc( $row['date'] ); ?>" /></td></tr></p>

    <tr><td class="append"><p><label>Invoice Num.:</label><br>
        <input class="form-control"  name="invnum" type="text" value="<?php echo esc( $row['invnum'] ); ?>" /></p></td></tr>

    <tr><td><p><label>Customer ID:</label><br>
        <input class="form-control"  name="cust" type="text" value="<?php echo esc( $row['cust'] ); ?>" readonly /></p></td></tr>

    <tr><td><p><label>Job Type:</label><br>
        <input class="form-control"  name="model" type="text" value="<?php echo esc( $row['model'] ); ?>" readonly /></p>

    <tr><td> &nbsp; </td></tr>

    <tr><td class="append"><label>Description</label><br>
        <textarea name="work" rows="4" cols="50"><?php echo esc( $row['work'] ); ?></textarea></td></tr>

    <tr><td class="append"><p><label>Sub Total:</label><br>
        <input    name="sub" class="form-control" type="text" value="<?php echo esc( $row['sub'] ); ?>" /></p></td></tr>

    <tr><td class="append"><p><label>Tax: </label><br>
        <input    name="tax" class="form-control tax" type="text" value="<?php echo esc( $row['tax'] ); ?>" /></p></td></tr>

    <tr><td class="append"><p><label>Total: </label><br>
        <input    name="total" class="form-control" type="text" value="<?php echo esc( $row['total'] ); ?>" /></p></td></tr>

    <tr><td class="append"><p><label>Payment Notes: </label><br>
        <input    name="paid" class="form-control" type="text" value="<?php echo esc( $row['paid'] ); ?>" /></p></td></tr>

    <tr><td><hr></td></tr>

    <tr><td><table>
                <tr><td><label>Status </label> <small> If marked "PAID" - insert new date above.</small><br>
                   <p><select name="status"><?php $sval = $row['status']; ?>
                    <option value="0" <?php if ($sval == 0 ) echo 'selected' ; ?>>Mark as Open/New</option>
                    <option value="1" <?php if ($sval == 1 ) echo 'selected' ; ?>>Mark Sent/Pending</option>
                    <option value="2" <?php if ($sval == 2 ) echo 'selected' ; ?>>Mark as PAID</option>
                    </select></p></td>
                    <td><p style="min-width: 120px">Id: <?php echo esc( $row['id'] ); ?>
                    <input type="hidden" value="<?php echo esc( $row['id'] ); ?>" name="id"</p></td>
                    <td><label>Save Invoice </label> &nbsp; <input class="btn btn-success" type="submit" name="submit" value="Submit" onclick='return window.confirm("Did you remember to add a NEW DATE to this invoice?");' /></td></tr></table>
    </td></tr>

<?php } ?>

</tbody></table><!-- ends table --></form>
<hr><p><a class='btn btn-danger' href='list-template.php'>BACK/CANCEL</a></p>
<?php 
}
?>

          </div>

<?php include('footer.php'); ?>
