<?php 
// invoice reprint last
// TSW =|=
include('restrict.php');
 
include('header-print.php'); 
?>
<div id="print-noprint">
    <h1 class="page-header">Invoicing and Quotes</h1>
    <h2 class="sub-heading">Replay Last Invoice</h2>


<br /><!--pixels at 300dpi is 612 by 792 which equals 8.5" by 11" -->
<SCRIPT LANGUAGE="JavaScript"> 
if (window.print) {
document.write('<form><input type="button" class="btn btn-success" value="Print or Save" onClick="window.print()"></form>');
}
</script>
</div>
            <?php 
// invoice reprint last
// TSW =|=
include('print-settings.php');

include_once('inc/db.php');

    // Retrieve data from database
    $query = ("SELECT * FROM cginvoice ORDER BY id DESC LIMIT 1");
        foreach ($dbh->query($query) as $row) {    
?>
<div class="table-responsive">

    <div id="printbody">
        <table class="printable"><tbody>
        <tr>
        <td><h4><?php echo $comp_name; ?></h4>
            <h4><?php echo $comp_moniker; ?></h4>
            <h4><?php echo $comp_addr; ?></h4>
            <h4><?php echo $comp_city; ?></h4>
            <p><php echo $comp_phone; ?></p>
        </td>
        <td><figure><img alt="AZFB" src="img/logo.png" border="0" height="62" /></figure>
            <small><em><?php echo $comp_slogan; ?></em></small>
        </td>
        </tr>

        <tr class="marg-tm1 boxed">
        <td><h5><?php echo $row['name']; ?></h5>
            <h5 id="text_wrap"><?php $address = str_replace("\n", '<br />', 
                                     $row['address']); echo $address; ?></h5>
            <p><?php echo $row['phone']; ?></p>
            
        </td>
        <td><p><?php echo $row['date']; ?></p>
            <p>Invoice#: <?php echo $row['invnum']; ?></p>
            <p>Customer ID: <?php echo $row['cust']; ?></p>
            <p>Type: <?php echo $row['model']; ?></p>
        </td>
        </tr>
        
        <tr id="mid-text">
        <td colspan=2><label>QNTY </label> &nbsp; &nbsp; <label> DESCRIPTION</label>
        
        <div id="text_wrap">
        <div class="twrow">
        <?php $work = $row['work']; 
              $a = array( '\n', '<b>', );
              $b = array('<br/>', '<b class="float-right">' );
              $works = str_replace($a, $b, $work ); 
        echo $works; ?>
        </div>
        </div> <br>
        </td>
        </tr>
        <tr>
        <td colspan="2" class="td2"><table class="subtable">
            <tr><td>Sub Total: </td>
                <td>$ <?php echo $row['sub']; ?></td></tr>
            <tr><td>Tax: </td>
                <td>$ <?php echo $row['tax']; ?></td></tr>
            <tr><td>Total: </td>
                <td>$ <?php echo $row['total']; ?></td></tr>
            </table>
        </td>
        </tr>
        
        <tr><td colspan="2" class="td2"><hr></td></tr>
        <tr>
        <td><small>Pay online:<br><a target="_blank" title="opens in new window" href="<?php echo $comp_payUrl; ?>">
        <?php echo $comp_payUrl; ?></a></small></td>
        <td><p><?php echo $row['paid']; ?></p></td>
        </tr>
        
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
        </tbody></table><!-- ends table -->  
    </div>
<br>
        <div id="print-noprint">
        <?php } ?>
        <SCRIPT LANGUAGE="JavaScript"> 
        if (window.print) {
        document.write('<form><input type="button" class="btn btn-success" value="Print or Save" onClick="window.print()"></form>');}
        </script>
        <p>&nbsp;</p>
        </div>   
</div><!-- ends table resp -->
<?php include('footer-print.php'); ?>
