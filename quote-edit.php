<?php 
include('restrict.php');
include('header.php');
    include('print-settings.php');
?>

    <h1 class="page-header">Invoicing and Quotes</h1>
    <h2 class="sub-heading">Update a Quote</h2>
        <div class="table-responsive">
       <?php 
// invoice edit record
// TSW =|=

if( isset ($_GET['id']) ) { 
    include_once('inc/db.php');

    $id = $_GET['id'];

    // Retrieve data from database
    $sql = ("SELECT * FROM cgquote WHERE `id` = :id");
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($rows as $row){
?>
<br />
<form action="quote-append.php" name="edit_quote" method="POST">
<table id="invoice"><tbody>
    <tr><td><p><label>Name:</label><br>
        <input class="form-control"  name="name" type="text" value="<?php echo $row['name']; ?>" readonly /></p></td></tr>

    <tr><td><p><label>Phone:</label><br>
        <input class="form-control"  name="phone" type="text" value="<?php echo $row['phone']; ?>" readonly /></p></td></tr>

    <tr><td><label>Address:</label><br>
        <textarea rows="4" cols="30" name="address" readonly><?php echo $row['address']; ?></textarea></td></tr>

    <tr><td><p><label>Date: </label> <small>Last Invoice Date <?php print date('m/d/Y', strtotime($row['date'])); ?></small></br>
        <input class="form-control"  name="date" type="date" value="<?php echo $row['date']; ?>" /></td></tr></p>

    <tr><td class="append"><p><label>Quote Ref. Num.:</label><br>
        <input class="form-control"  name="invnum" type="text" value="<?php echo $row['invnum']; ?>" /></p></td></tr>

    <tr><td> &nbsp; </td></tr>

    <tr><td class="append"><label>Estimate</label><br>
        <textarea name="work" rows="4" cols="50"><?php echo $row['work']; ?></textarea></td></tr>

    <tr><td class="append"><p><label>Sub Total:</label><br>
        <input    name="sub" class="form-control" type="text" value="<?php echo $row['sub']; ?>" /></p></td></tr>

    <tr><td class="append"><p><label>Tax: </label><br>
        <input    name="tax" class="form-control tax" type="text" value="<?php echo $row['tax']; ?>" /></p></td></tr>

    <tr><td class="append"><p><label>Total: </label><br>
        <input    name="total" class="form-control" type="text" value="<?php echo $row['total']; ?>" /></p></td></tr>

    <tr><td class="append"><p><label>Payment Notes: </label><br>
        <input    name="paid" class="form-control" type="text" value="<?php echo $row['paid']; ?>" /></p></td></tr>

    <tr><td><hr></td></tr>

    <tr><td><table>
                <tr><td><label>Status </label> <small> If marked "PAID" - insert new date above.</small><br>
                    <p><select name="status">
                    <option value="0">Mark on Record</option>
                    <option value="1">Mark Sent-Pending</option>
                    <option value="2">Mark as PAID</option>
                    </select></p></td>
                    <td><p style="min-width: 120px"> &nbsp; </p></td>
                    <td><label>Save Invoice </label> &nbsp; <input class="btn btn-success" type="submit" name="submit" value="Submit" onclick='return window.confirm("Did you remember to add a NEW DATE to this invoice?");' /></td></tr></table>
    </td></tr>

<?php } ?>

</tbody></table><!-- ends table --></form>
<hr><p><a class='btn btn-danger' href='quote-list.php'>BACK/CANCEL</a></p>
<?php 
}
?>

          </div>

<?php include('footer.php'); ?>
