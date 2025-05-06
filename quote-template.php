<?php 
include('restrict.php');
include('header.php');
?>
<div class="row">
    <header class="col-sm-12">
        <h2 class="sub-heading">New Quote</h2>
        <hr>
    </header>
<br><!--pixels at 300dpi is 612 by 792 which equals 8.5" by 11" -->
</div>

<div id="new_invoice">
<div class="row">
    <form action="quote.php" name="new_quote" method="POST"> 

    <div class="col-sm-6">

    <?php include_once('print-settings.php'); ?>

        <h4><?php echo $comp_name; ?></h4>
        <h4><?php echo $comp_addr; ?></h4>
        <h4><?php echo $comp_city; ?></h4>
        <h4><?php echo $comp_phone; ?></h4>
    </div>
    <div class="col-sm-6">
        <p><img alt="logo only shows on print" src="images/nologo.svg" border="0" /></p>
        <p><?php echo $comp_moniker; ?></p>
        <p><?php echo $comp_slogan; ?></p>
    </div>
</div>


<div class="row">
    <div class="col-sm-6">
        <p><label>Name:</label><br>
            <input class="form-control"  name="name" type="text" /></p>
        <p><label>Phone:</label><br>
            <input class="form-control"  name="phone" type="text" /></p>
        <p><label>Address:</label><br>
            <textarea class="form-control" rows="4" name="address"></textarea></p>
    </div>
    <div class="col-sm-6">
        <p><label>Date:</label><br>
        <div class="input-group date" id="datetimepicker1">
            <input class="form-control" name="date" type="text" />
            <span class="input-group-addon mlm5">
            <span class="glyphicon glyphicon-calendar"></span>
            </span>
        </div></p>
        <p><label>Quote Ref. Num.:</label><br>
            <input class="form-control" name="invnum" type="text" /></p>
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
        <p><label>Estimate</label><br>
            <textarea class="form-control" rows="11" name="work" /></textarea></p>
    </div>
    <div class="col-sm-6">     
        <p><label>Sub Total:</label><br>
            <input class="form-control" name="sub" type="text" /></p>
        <p><label>Tax</label><br>
            <input class="form-control" name="tax" type="text" /></p>
        <p><label>Total: </label><br>
            <input class="form-control" name="total" type="text" /></p>
        <p><label>Payment Notes: </label><br>
            <input class="form-control" name="paid" type="text" /></p>
     </div>
</div>

<div class="row">
     <div class="col-sm-6">
         <input name="status" type="hidden" value="0" />
         <input type="submit" class="btn btn-success" name="submit" value="Submit" />
     </form>        
     </div>
     <div class="col-sm-6">
   <p class="tiny"><hr><?php /* additional disclaimer can go here */ ?></p>
         <p>Contact: <?php echo $comp_payquest; ?> <?php echo $comp_email; ?></p>          

     </div>
</div>

<br><hr><br>

</div><!-- ends new invoice -->
<?php include('footer-scripts.php'); ?>
