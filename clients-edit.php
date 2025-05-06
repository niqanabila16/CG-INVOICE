<?php 
include('restrict.php');
include('header.php');
$header_name = "";
?>
    <h1 class="page-header"><?php echo $header_name; ?></h1>
    <h2 class="sub-header">Client</h2>   
        
            <div class="table-responsive">
           <?php
if( isset( $_GET['id']) ) {
include_once('inc/db.php');

    // Get values from form
    $id = (int)$_GET['id'];

    // Retrieve data from database
    $sql = ("SELECT * FROM cgclients WHERE id = :id");
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($rows as $row){
?>

<form name="form1" action="clients-edit.php" method="post">
<table id="contact_form"><tbody>
<tr valign="bottom"><td><label>item: </label></td>
<td><input class="form-control" type="text" name="item" value="<?php echo esc( $row['item'] ); ?>" /></td><td>1</td></tr>

<tr valign="bottom"><td><label>code: </label></td>
<td><input class="form-control" type="text" name="code" value="<?php echo esc( $row['code'] ); ?>" /></td><td>2</td></tr>

<tr valign="middle"><td><label>value: </label></td>
<td><input class="form-control" type="text" name="value" value="<?php echo esc( $row['value'] ); ?>" /></td><td>3</td></tr>

<tr valign="bottom"><td><label>upc: </label></td>
<td><input class="form-control" type="text" name="upc" value="<?php echo esc( $row['upc'] ); ?>" /></td><td>4</td></tr>

<tr valign="bottom"><td><label>Last Date In </label></td>
<td><input class="form-control" type="date" name="din" value="<?php echo esc( $row['din'] ); ?>" /></td><td>5</td><tr>

<tr valign="bottom"><td><label>Last Date Out </label></td>
<td><input class="form-control" type="date" name="dout"  value="<?php echo esc( $row['dout'] ); ?>" /></td><td>6</td><tr>

<td colspan=3><input type="hidden"         name="id" value="<?php echo esc( $row['id'] ); ?>" /></td></tr>

<td><input type="submit" class="btn btn-success" name="submit" value="Submit" /></td>
<td> </td><td>7</td></tr>
</tbody></table></form>
<?php } 
    } 
    ?>
<hr>

<?php if( isset( $_POST['submit']) ) {
include_once('inc/db.php');
$id    = escmim($_POST['id']);
$item  = escmim($_POST['item']);
$code  = escmim($_POST['code']);
$value = escmim($_POST['value']);
$upc   = escmim($_POST['upc']);
$din   = escmim($_POST['din']);
$dout  = escmim($_POST['dout']);

// Insert data into mysql
$sql = ("UPDATE cgclients SET 
`item` = :item, `code` = :code, `value` = :value, `upc` = :upc, `din` = :din, `dout` = :dout 

WHERE `id` = :id");

//Prepare UPDATE SQL statement.
$statement = $dbh->prepare($sql);
//Bind value to the parameter :id.
$statement->bindValue(':id', $id);

$statement->bindValue(':item', $item);
$statement->bindValue(':code', $code);
$statement->bindValue(':value', $value);
$statement->bindValue(':upc', $upc);
$statement->bindValue(':din', $din);
$statement->bindValue(':dout', $dout);

$update = $statement->execute();
    
    //If the process is successful.
    if($update){

        echo "<br>Information UPDATED to system Successfully!";
        echo "<BR>";
        echo "Data entered - "; 
        $source = $dateformat;
        $date = new DateTime($source);
        echo $date->format('m-d-Y H:m');
echo "<hr><p><a class='btn btn-primary' href='clients-list.php' title='back'>BACK</a></p>"; 
    
        // throw errors if not success
        } else {
            print "oops This entry did not process correctly, please try again.";
            echo $sql . "<br>" . $dbh->error;
            }
}
?>

            </div>
<?php include('footer.php'); ?>
