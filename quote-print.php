<?php 
// print-template
include('restrict.php');
include('header-print.php');
include('print-settings.php');
?>
<div id="print-noprint">
    
<div class="row"
    <header class="col-sm-12">
        <h2 class="sub-heading">Print New Quote</h2>
        <hr>
    </header>
<!--pixels at 300dpi is 612 by 792 which equals 8.5" by 11" -->
</div>
    
    <SCRIPT LANGUAGE="JavaScript"> 
    if (window.print) {
    document.write('<form><input type="button" class="btn btn-success" value="Print or Save" onClick="window.print()"></form>');}
    </script>
<br>
</div>

<?php 
if( isset( $_GET['id']) ) { 

$id = $_GET['id']; 

include_once('inc/db.php');
            
            // Retrieve data from database
    $sql = ("SELECT * FROM cgquote WHERE `id` = :id");
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($rows as $row){
           
        
?>

<div class="quote-print">
<div class="row">
        
    <header class="col-sm-12 printable-header">
    <div class="col-sm-6">
    
    <?php include_once('print-settings.php'); ?>
    
        <h4><?php echo $comp_name; ?></h4>
        <h4><?php echo $comp_addr; ?></h4>
        <h4><?php echo $comp_city; ?></h4>
        <h4><?php echo $comp_phone; ?></h4>
       
    </div>
    <div class="col-sm-6 print-right">
        <figure><img alt="logo" src="img/logo.png" border="0" height=48 /></figure>
        <em><?php echo $comp_moniker; ?></em>
        <small><?php echo $comp_slogan; ?></small>
    </div>
 </header>
</div>

<div class="row">
    <div class="col-sm-6">
    <p><label>Name: </label> <?php echo htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8'); ?></p>
        <p><label>Phone: </label> <?php echo $row['phone']; ?></p>
        
            <h5 id="text_wrap"><?php $address = str_replace("\n", '<br />', $row['address']); echo $address; ?></h5>
    </div>
    <div class="col-sm-6 end">
        <p><label>Date: </label> <?php echo $row['date']; ?></p>
        <p><label>Quote Ref Num: </label> <?php echo $row['invnum']; ?></p>
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
        <p><label>Estimate</label></p><br>
            <div id="text_wrap"><?php $work = str_replace("\n", '<br />', $row['work']); echo $work; ?></div>
    </div>
    <div class="col-sm-6 end">     
        <p><label>Sub Total </label> <?php echo $row['sub']; ?></p>
        <p><label>Tax </label> <?php echo $row['tax']; ?></p>
        <p><label>Total </label> <?php echo $row['total']; ?></p>
       
     </div>
<hr>
</div>


<div class="row">
     <div class="col-sm-12">
         <p><label>Payment Notes </label> <?php echo $row['paid']; ?></p>
         <p class="tiny"><small><hr><?php /* additional disclaimer can go here */ ?></small></p>
         <p>Contact: <?php echo $comp_payquest; ?> <?php echo $comp_email; ?></p>            
     </div>
</div>    

</div><!-- ends new invoice -->
<div class="clear"></div>
<?php 
    } 
}
?>

    <div id="print-noprint">
<br>
    <SCRIPT LANGUAGE="JavaScript"> 
    if (window.print) {
    document.write('<form><input type="button" class="btn btn-success" value="Print or Save" onClick="window.print()"></form>');}
    </script>
    <p>&nbsp;</p>
    </div>

<?php include('footer-print.php'); ?>
