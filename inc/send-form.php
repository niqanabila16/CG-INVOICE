<?php 
include('functions.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--<META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<META HTTP-EQUIV="Expires" CONTENT="-1">-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="private restricted no follow">
    <title>Invoicing | Invoice</title>
     <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="../printstyles.css" rel="stylesheet">

    <style type="text/css">  body { margin: .6cm; background: #77dfef; }
    .print-noprint{background: #fafafa;width: 90%;margin: 0 auto; padding: 60px 100px;}</style>
    </head>
<body>
    <div class="print-noprint">
    <h1 class="page-header">Send Invoicing and Quotes</h1>
    <h2 class="sub-heading">Email Invoice</h2>
    
<?php 
 
if (isset( $_POST['send_tomail'] )) {
$id = $_POST['id'];

include('db.php');

    // Retrieve data from database
    $sql = ("SELECT * FROM cginvoice WHERE id = :id");
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach($rows as $row) {
            $name   = $row['name'];
            $phone  = $row['phone'];
            $datex  = $row['date'];
            $invnum = $row['invnum'];
            $cust   = $row['cust'];
            $model  = $row['model'];
            $work   = $row['work']; 
            $sub    = $row['sub'];
            $tax    = $row['tax']; 
            $total  = $row['total'];
        } 
?>

<h2>Enter email and Subject then Submit</h2>
<form name="sendform" action="" method="POST">
<p><label>To</label><br><input type="email" name="emailto" class="form-control" size="25" /></p>
<p><label>Subject</label><br><input type="text" name="subject" class="form-control" size="25" /></p>
<input type="text" name="name" value="<?php   echo escvar($name); ?>">
<input type="text" name="phone" value="<?php  echo escvar($phone); ?>">
<input type="text" name="datex" value="<?php  echo $datex; ?>">
<input type="text" name="invnum" value="<?php echo escvar($invnum); ?>">
<input type="text" name="cust" value="<?php   echo escvar($cust); ?>">
<input type="text" name="model" value="<?php  echo escvar($model); ?>">
<textarea name="work"><?php echo $work; ?></textarea>
<input type="text" name="sub" value="<?php    echo escvar($sub); ?>">
<input type="text" name="tax" value="<?php    echo escvar($tax); ?>">
<input type="text" name="total" value="<?php  echo escvar($total); ?>"><br>
<p><input type="submit" class="btn btn-success" name="sendmail" value="Send as Email"></p>
</form>


<br><hr><br>

<?php
echo $id;
}
?>
<hr>
<?php
if (isset( $_POST['sendmail'] )) {

//define the receiver of the email  
$to      = escmim($_POST['emailto']);
$subject = escmim($_POST['subject']);
$name   = escmim($_POST['name']);
$phone  = escmim($_POST['phone']);
$datex  = escmim($_POST['datex']);
$invnum = escmim($_POST['invnum']);
$cust   = escmim($_POST['cust']);
$model  = escmim($_POST['model']);
$work   = $_POST['work']; 
$sub    = escmim($_POST['sub']);
$tax    = escmim($_POST['tax']); 
$total  = escmim($_POST['total']);

$a = array( '\n', '<span>', '<b>', '<em>' );
$b = array('<br/><div style="clear:both"></div>', '<span style="margin-left:.5em">',  
'<b style="float:right; width:110px;text-align: right; overflow:hidden;">',
'<em style="min-width:40px;font-weight:300;font-style:normal;float:left;text-align:right">' );
$works = str_replace($a, $b, $work ); 

$items = '<div style="word-wrap:break-word;font-size:12px">' . $works . '</div>';
        
include_once '../print-settings.php';


$content = '';
$content .= '<html><head><title>HTML email</title></head><body><div style="background-color: #f6f6f6; font-family: sans-serif; -webkit-font-smoothing: antialiased; font-size: 14px; line-height: 1.4; margin: 0 auto; padding: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;border: 1px solid #ccc;display:block;width: 100%;max-width:680px;background:#fafafa"><table border="0" cellspacing="0" cellpadding="0" style="border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;border-color:#eee; width: 90%;max-width:640px;margin: 20px auto;background: #fafafa;"><tr style="border: 1px solid #ccc;">';
$content .='<td style="font-family: sans-serif; vertical-align:bottom;padding: 20px 20px 0 20px;background: #f8f8f8">From: <h4>' . strip_tags($comp_name) . '</h4> 
<p style="font-family: sans-serif; font-size: 13px; vertical-align: middle;padding: 40px 20px;background: #f4f4f4"><em>' . strip_tags($comp_slogan) . '</em></p></td>';
$content .= '<td style="font-family: sans-serif; font-size: 17px; vertical-align: top;padding: 20px 10px 0 20px;background: #f4f4f4"><p>Invoice# ' . strip_tags($invnum) . '</p></td></tr><tr><td style="font-family: sans-serif; font-size: 17px; vertical-align: middle;padding: 20px;border-left: 1px solid #ccc;">';
$content .= '<h4>' . strip_tags($comp_moniker) . '</h4>';
$content .= '<p style="font-size:14px">' . strip_tags($comp_addr) . '</p>';
$content .= '<p style="font-size:14px">' . strip_tags($comp_city) . '</p>';
$content .= '<p style="font-size:14px">' . strip_tags($comp_phone) . '</p>';
$content .= '</td><td style="border-left: 0px solid #ccc;border-right: 1px solid #ccc;font-family: sans-serif; font-size: 17px; vertical-align: middle;padding: 40px;">';
$content .= '<p>To: </p><p style="font-size:14px">' . strip_tags($name) . '</p>';
$content .= '<p style="font-size:14px">' . strip_tags($address) . '</p>';
$content .= '<p style="font-size:14px"' . strip_tags($phone) . '</p>';
$content .= '<p style="font-size:14px">Date: ' . strip_tags($datex) . '</p>';
$content .= '</td></tr><tr style="border: 1px solid #ccc;"><td style="font-family: sans-serif; font-size: 17px; vertical-align: middle;padding: 20px;">';
$content .= '<p>Invoice# ' . strip_tags($invnum) . '</p>';
$content .= '<p>ID# ' . strip_tags($cust) . '</p>';
$content .= '<p>Invoice Type ' . strip_tags($model) . '</p>';
$content .= '<div style="display:block;border:1px solid #eee;padding:8px;">' . $items . '</div></td><td style="font-family: sans-serif; font-size: 17px; vertical-align: middle;padding: 40px;"><p>&nbsp;</p>';
$content .= '<p>Sub Total: $ ' . strip_tags($sub) . '</p>';
$content .= '<p>Tax: $ ' . strip_tags($tax) . '</p>';
$content .= '<p>Total: $ ' . strip_tags($total) . '</p></td></tr>';
$content .= '<tr style="border-left: 1px solid #ccc;border-right:1px solid #ccc;border-bottom: 1px solid #ccc;"><td colspan="2" style="font-family: sans-serif; font-size: 17px; vertical-align: middle;padding: 40px 20px;background: #f4f4f4">';
$content .= '<p style="font-size:12px">Pay Online:  <a href="'.$comp_payUrl.'" target="_blank">'.$comp_payUrl.'</a></p><p style="font-size:12px">For questions about this invoice, please contact: '. $comp_payquest .'</p><p style="font-size:12px">Or '. $comp_email .'</p></td>';
$content .= '</tr></table></div></body></html>'; 



$from = $server_email;
 $encoding = "utf-8";
 // Preferences for Subject field
    $subject_preferences = array(
        "input-charset" => $encoding,
        "output-charset" => $encoding,
        "line-length" => 76,
        "line-break-chars" => "\r\n"
        );
// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= "Content-type: text/html; charset=".$encoding." \r\n";
$headers .= "From: ".$from." <".$from."> \r\n";
$headers .= "Content-Transfer-Encoding: 8bit \r\n";
$headers .= "Date: ".date("r (T)")." \r\n";   
$headers .= iconv_mime_encode("Subject", $subject, $subject_preferences);

    // Sending email
    if(mail($to, $subject, $content, $headers)){
    echo '<p>Your mail has been sent successfully.</p>';
    } else {
    echo 'Unable to send email. Please try again.';
    }
}
?>
    <p><a style="width:45px;height: 26px; padding: 5px 12px; margin: 5px;background:#f9f9f9;" 
href="../index.php">Dashboard</a></p>

    </div>

<?php include('../footer-print.php'); ?>
