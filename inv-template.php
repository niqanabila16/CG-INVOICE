<?php 
include('restrict.php');
include('header.php');
?>

    <h4 class="sub-heading">New Invoice</h4>
        <div class="table-responsive" id="new_invoice">
<?php
// invoice
// TSW =|=

include('print-settings.php');
?>
<br /><!--pixels at 300dpi is 612 by 792 which equals 8.5" by 11" -->

<form action="invoice.php" name="new_invoice" method="POST">
    <table id="table"><tbody>
    <tr>
    <td><h5><?php print( $comp_name ); ?><br>
    <?php print( $comp_moniker ); ?><br>
    <?php  print( $comp_addr ); ?><br>
    <?php  print( $comp_city ); ?><br>
    <?php print( $comp_phone ); ?></h5></td>
    <td><img alt="logo only shows on print" src="images/nologo.svg" border="0" />
    <p><?php print( $comp_slogan ); ?></p></td>
    </tr>

    <tr class="marg-tm1"><td>&nbsp;</td></tr>
    <tr>
    <td>
    <p><label>Name:</label><br>
        <input class="form-control"  name="name" type="text" /></p>
    <p><label>Phone:</label><br>
        <input class="form-control"  name="phone" type="text" /><br>
    <p><label>Address:</label><br>
        <textarea rows="4" cols="32" name="address"></textarea>
    </td>
    <td>
    <label>Date:</label><br>
         <div class="input-group date" id="datetimepicker1">
            <p><input class="form-control" name="date" type="text" />
            <span class="input-group-addon mlm5">
            <span class="glyphicon glyphicon-calendar"></span>
            </span></p>
        </div> 
    <p><label>Invoice Num.:</label><br>
        <input class="form-control" name="invnum" type="text" /></p>
    <p><label>Customer ID:</label><br>
        <input class="form-control" name="cust" type="text" /></p>
    <p><label>Invoice Type:</label><br>
        <input class="form-control" name="model" type="text" /></p></td>
    </tr>
    <tr>
      
      <td colspan="2" style="padding-top:7px;border-top: 1px solid #ccc;"> 
        <tr style="max-height:50px"><td style="background:#f8f8f8">
<!-- SEND TOTAL BUTTONS -->        
        <span class="align-left"><span style="width: 100%;">
        <label>&nbsp;Quantity <small class="text-muted" style="color:transparent"> ---&nbsp; &nbsp; </small>
        Description/Item</label><span class="text-muted" style="color:transparent"> 
        --------------------------------------------- </span></td><td style="background:#eee">
        <span class="ninv_si">4. <input class="btn btn-info btn-sm" type="button" value="Sum First" onClick="addSumVal();" />&nbsp;&nbsp;&nbsp;&nbsp;</span> 
        <span class="ninv_sii"> 5. <input class="btn btn-primary btn-sm" type="button" value="Add to Invoice" onClick="addTextArea();" /></span> 
        </span></span></td>
        </tr>
        
      <table id="dataTable"><tbody>
        <tr>
            <td style="width:100%;max-width:640px">
<!-- FIXED INPUT FIELD QT, DESCR, RATE, AMT --> 
            <i>1.</i><input id="qt" name="quantitys" type="text" class="form-inline-a quantities" />
            <i>2.</i><input id="descr" name="description" type="text" placeholder="item" class="form-inline-b" />
            <i>3.</i><input id="rate" name="price" type="text" placeholder="$per item" class="form-inline-f prices"/>
            <i></i><input id="amt" name="totalzz" type="text" class="form-inline-c totalzz"/>
            
            
            </td>
        </tr>
            <tr><td><small class="text-muted">Enter 1. Quantity, 2. Item, 3. Price/per, 4. Sum First (lite-blue) 5. Add to Inv'(dark-blue) | Ignore format tags in texarea is. </small></td></tr>
        </tbody></table>
        
      </td>
    </tr>
        
        <tr style="border: thin solid #ddd;max-width: 100%;">
            <td colspan="2">  
             
<!-- TEXTAREA BOX -->         
            <table><tbody><tr>
            <td class="textdata">
            <textarea id="textArea" class="work-textarea" rows="8" name="work"></textarea> 
            </td>
        
            <td class="sumsfieldset">
        
<!-- SUM SUBTOTAL AND TOTAL INPUTS -->   
            <p><label>Sub Total:</label><br>
                <input id="sumValue" class="form-control sumvalue" type="hidden"
                       name="sumtotal_one" value=""/>
                
                <input id="sumTotal" class="form-control sumtotal" 
                       name="sub" type="text" style="background: #eff" 
                       value="" /></p>
                
            <p><label>Tax <small class="text-muted"> &nbsp; &nbsp; total 
            &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; rate</small></label><br>
                <input id="rollTax" class="form-control rolltax" 
                       name="rolltax" type="text" value="" style="max-width:99px"/>
            <!-- tax rate box --> 
                <input id="tax" class="form-control tax" 
                       name="tax" type="text" value="" placeholder="0.785"
                       style="position:relative;left: 101px;top:-2.15em;max-width:67px" /></p>
                       
                <div class="clearfix"></div>
            <p style="margin-top:-2em"><label>Total: </label><br>
            
                <input id="invTotal" class="form-control xtotal" type="text" 
                       name="total" value="" placeholder="click to sum" 
                       style="max-width:125px"/>
                       
                <input id="sumz" type="button" class="btn btn-sm" 
                       value=" + " style="position:relative;top:-2.62em;left:-5px;"
                       onclick="sendSumVal();" /></p>
                     </tr></tbody></table>
        </td>
        </tr>
        
        <tr>
            <td colspan=2><p><label>Payment Notes: </label><br>
                <input class="form-control" type="text" name="paid" /></p>
            <div class="tiny"><small><hr></small></div></td>
        </tr>
        
        <tr>
            <td><p><label>Save Invoice</label>
                <span style="width: 100px"> &nbsp; <input type="hidden" 
                      name="comment" value=0 />
                <input class="btn btn-primary btn-lg" type="submit" 
                       name="submit" value="Submit" /></span></p></td>
        </tr></tbody></table><!-- ends table div --></form><br><hr><br>
              
        </div>
<script>

 </script>

<?php include('footer-scripts.php'); ?>
