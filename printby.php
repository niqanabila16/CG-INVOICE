<?php 
// invoice
// TSW =|=
if( isset( $_GET['id']) ) { 

include('print-settings.php');
$id = $_GET['id']; 
include_once('inc/db.php');

  // Retrieve data from database
  $sql = ("SELECT * FROM cginvoice WHERE id = :id");
$stmt = $dbh->prepare($sql);
$stmt->bindValue(':id', $id);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach($rows as $row) {

?>

<form id="frmPrint">
<div id="print-noprint"><p>&nbsp;</p>
<p><input type="button" class="btn btn-success" value="Print Invoice" onClick="printout();" /> </p>
</div>
<style type="text/css">

@media print {
 body {
font: fit-to-print;
font-family: sans-serif;
      color: #000;
      background: #fff;
   }
    .print-noprint { display: none; }
    @page {  margin: 2cm }
    #printbody input[type='text'],
    #printbody input[type='number'],
    #printbody input[type='tel'],
    #printbody textarea {
        background: #fff;
        font-family: sans-serif;
        font-size: inherit;
        color: #111111 !important;
        border: 0 !important;
        border-style: none !important;
    }
    #printbody label {
        font-weight: 700;
        border-bottom: none;
        font-family: sans-serif;
        margin-left: -1em;
        color: #4c4c4c;
    }
tr.nb, td.nb, .nb {border: none !important; border-bottom: 0px solid transparent;border-top: 0px solid transparent;}
    th{padding-left: 1em;}
 input, textarea, .cleanprt {
background: transparent;
box-shadow: none !important;
font-family: sans-serif;
border-color: #fff !important;
        border: 0 !important;
        border-style: none !important;
    }

#printbody {
margin-top: 20px;
max-width: 640px;

border: 1px solid #bbb;
padding: 20px;
}
#printbody td {
min-width: 48%;

margin: 10px 0;
padding: 10px 1%;
}
#printbody textarea {
border: none;
background: transparent; 
font-size: 1em !important;
font-weight: normal;
line-height: 1;
margin: 3px 0;
}
#printbody label {
width: 140px;
background: #efefef;
}
.invoice-upper-section figure {
position: relative;
top: 0;
margin-bottom: .25em;
}
#printbody .invoice-upper-section td p {
line-height: 1;
margin: 3px 0;
}
.td2 {
width: auto;
width: 100%;
}
.boxed {
border: thin solid #ddd;
}
small{font-size: 12px; margin-right: 1em;}
}
</style>

   <div id="printbody" class="pre-print">
    <table class="printable" id="invoice"><tbody>
        <table class="invoice-upper-section"><tbody>
            <tr>
            <td><p><?php echo $comp_name; ?></p>
                <p><?php echo $comp_moniker; ?></p>
                <p><?php echo $comp_addr; ?></p>
                <p><?php echo $comp_city; ?></p>
                <p><php echo $comp_phone; ?></p>
            </td>
            <td><figure><img alt="AZFB" src="img/logo.png" border="0" height="62" /></figure>
                <p><?php echo $comp_slogan; ?></p>
            </td>
            </tr>

            <tr class="marg-tm1 boxed">
            <td><p><?php echo $row['name']; ?></p>
                <p><?php echo $row['phone']; ?></p>
                <p><textarea style="background-color: #fff;"><?php echo $row['address']; ?></textarea></p>
            </td>
            <td><p><?php echo $row['date']; ?></p>
                    <p>Invoice#: <?php echo $row['invnum']; ?></p>
                    <p>Customer ID: <?php echo $row['cust']; ?></p>
                    <p>Job Site: <?php echo $row['model']; ?></p>
                </td>
                </tr>
            </tbody></table>

            <table class="invoice-middle-section"><tbody>
                <tr id="midtext">
                <td>DESCRIPTION </td><td>AMOUNT</td>
                </tr>

                <tr>
                <td><textarea style="border: 0; background-color: #fff;" /><?php echo $row['work']; ?></textarea> <br>
                    <small>Pay online:<br><a href="<?php echo $comp_payUrl; ?>" target="_blank" title="opens in new window"><?php echo $comp_payUrl; ?></a></small>
                </td>
                <td><table>
                    <tr><td><label>Sub Total: </label></td><td>$ <?php echo $row['sub']; ?></td></tr>
                    <tr><td><label>Tax: </label></td><td>$ <?php echo $row['tax']; ?></td></tr>
                    <tr><td><label>Total: </label></td><td>$ <?php echo $row['total']; ?></td></tr>
                    </table>
                </td>
                </tr>
            </tbody></table>

            <table class="invoice-bottom-section"><tbody>
                <tr>
                <td><p><?php echo $row['paid']; ?></p>
                <td><p>&nbsp;</p></td>
                </tr>
            </tbody></table>

            <table class="invoice-footer-section"><tbody>
                <tr>
                <td colspan="2" class="td2"><small><?php echo $disclaimer; ?></small></td>
                </tr>
                <tr>
                <td colspan="2" class="td2">
                <table><tr><td>For questions about this invoice, please contact: <?php echo $comp_payquest; ?></td></tr>
                       <tr><td>Or email to: <?php echo $comp_email; ?></td></tr>
                </table>
                </td>
                </tr>
            </tbody></table>
</tbody></table><!-- ends table -->

<?php } ?>

</div>
<script>
function printout() {

    var newWindow = window.open();
    newWindow.document.write(document.getElementById("frmPrint").innerHTML);
    newWindow.print();
}
</script>
<div id="print-noprint"><p>&nbsp;</p>
<p><input type="button" class="btn btn-success" value="Print Invoice" onClick="printout();" /> </p>
</div>
</form>


<?php } ?>