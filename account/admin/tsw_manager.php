<div class="det-list-container">
  <div class="col-md-8"> 
    <div class="row">
 <?php if( isset( $_POST['success'])) : ?> <br>
        <div id="trans_fade" class='panel panel-success'>Information UPDATED to system Successfully!</div> 
<?php endif; ?>
           
<?php
if( isset( $_POST['submit_pref'] ))
{ 
$ids           = escmim( $_POST['id'] );  
$theme_url     = escmim($_POST['theme_url']);              
$server_email  = escmim($_POST['server_email']);     
$comp_name     = escmim($_POST['det_name']);                        
$comp_moniker  = escmim($_POST['det_moniker']);               
$comp_addr     = escmim($_POST['comp_addr']);                      
$comp_city     = escmim($_POST['comp_city']);                                  
$comp_phone    = escmim($_POST['comp_phone']);                                   
$comp_slogan   = escmim($_POST['comp_slogan']);   
$comp_payUrl   = escmim($_POST['comp_payUrl']);   
$comp_payquest = escmim($_POST['comp_payquest']);                                 
$comp_email    = escmim($_POST['comp_email']);                  
$disclaimer    = escmim($_POST['disclaimer']);                 
$mytime_zone   = escmim($_POST['mytime_zone']);            


include_once '../../inc/db.php';
 $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

/* `id`, `theme_url`, `server_email`, `det_name`, `det_moniker`, `comp_addr`, `comp_city`, `comp_phone`, `comp_slogan`, `comp_payUrl`, `comp_payquest`, `comp_email`, `disclaimer`, `mytime_zone` */
$table = 'tsw_settings';
// Insert Updated data into mysql
$sql = ("UPDATE $table SET 
    `theme_url`     = :theme_url, 
    `server_email`  = :server_email, 
    `det_name`      = :det_name, 
    `det_moniker`   = :det_moniker, 
    `comp_addr`     = :comp_addr, 
    `comp_city`     = :comp_city, 
    `comp_phone`    = :comp_phone, 
    `comp_slogan`   = :comp_slogan, 
    `comp_payUrl`   = :comp_payUrl, 
    `comp_payquest` = :comp_payquest,
    `comp_email`    = :comp_email, 
    `disclaimer`    = :disclaimer, 
    `mytime_zone`   = :mytime_zone 
    WHERE `id` = :id");

//Prepare UPDATE SQL statement.
$stmt = $dbh->prepare($sql); 
//Bind value to the parameter :id.
$stmt->bindValue(':id',           $ids);
$stmt->bindValue(':theme_url',     $theme_url);
$stmt->bindValue(':server_email',  $server_email);
$stmt->bindValue(':det_name',      $comp_name);
$stmt->bindValue(':det_moniker',   $comp_moniker);
$stmt->bindValue(':comp_addr',     $comp_addr);
$stmt->bindValue(':comp_city',     $comp_city);
$stmt->bindValue(':comp_phone',    $comp_phone);
$stmt->bindValue(':comp_slogan',   $comp_slogan);
$stmt->bindValue(':comp_payUrl',   $comp_payUrl);
$stmt->bindValue(':comp_payquest', $comp_payquest);
$stmt->bindValue(':comp_email',    $comp_email);
$stmt->bindValue(':disclaimer',    $disclaimer);
$stmt->bindValue(':mytime_zone',   $mytime_zone);

$update = $stmt->execute();
    
    //If the process is successful.
    if($update)
    {
    echo "<br>Information UPDATED to system Successfully!";
        echo "<BR>";
        echo "Data entered - "; 
        $source = $dateformat;
        $date = new DateTime($source);
        echo escvar( $date->format('m-d-Y H:m' ));
    echo "<hr>"; ?>
    <br>
    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="panel-title">Data entered</h3>
        </div>    
        <div class="panel-body">
            Site preferences updated Successfully! <?php echo esc( $prv_idd ); ?><br>
            <?php echo escvar( date('m-d-Y H:m') ); ?>
        </div>
    </div>            
    <br>
        <hr><p><form action="manage.php" method="POST"><input type="button" class="btn btn-success" onclick="submit()" name="success" value="BACK to Preference List"></form></p> 

<?php
        // throw errors if not success
    } else {
            print "oops This entry did not process correctly, please try again.";
            echo $sql . "<br>" . $dbh->error;
            }
}
?>

<?php 
require_once '../../inc/db.php';
$sql = ("SELECT * FROM  tsw_settings ORDER BY `id` DESC LIMIT 1");
   
      foreach ($dbh->query($sql) as $row) {    

?>
<form name="editform" class="editForm" method="POST" action="manage.php">
        <div class="form-group">
            <label for="">company name</label>
            <input class="form-control" name="det_name" type="text" value="<?php echo esc( $row['det_name'] ); ?>"/>
        </div>
        <div class="form-group">
            <label for="">by line</label>
            <input class="form-control" name="det_moniker" type="text" value="<?php echo esc( $row['det_moniker'] ); ?>"/>
        </div>
        <div class="form-group">
            <label for="">address </label>
            <input class="form-control" name="comp_addr" type="text" value="<?php echo esc( $row['comp_addr'] ); ?>"/>
        </div>
        <div class="form-group">
            <label for="">main phone</label>
            <input class="form-control" name="comp_phone" type="text" value="<?php echo esc( $row['comp_phone'] ); ?>"/>
        </div>
        <div class="form-group">
            <label for="">comp slogan (top of invoice below by line)</label>
            <input class="form-control" name="comp_slogan" value="<?php echo esc( $row['comp_slogan'] ); ?>" type="text"/
        </div>
        <div class="form-group">
            <label for="">payment url - full address</label>
            <input class="form-control" name="comp_payUrl" value="<?php echo esc( $row['comp_payUrl'] ); ?>" type="text"/>
        </div>
        <div class="form-group">
            <label for="admin_email">payment questions phone number</label>
            <input class="form-control" name="comp_payquest" type="text" value="<?php echo esc( $row['comp_payquest'] ); ?>"/>
        </div>
        <div class="form-group">
            <label for="">company email on invoice</label>
            <input class="form-control" name="comp_email" type="text" value="<?php echo esc( $row['comp_email'] ); ?>"/>
        </div>
        <div class="form-group">
            <label for="disclaimer">disclaimer or thank you message</label>
            <input class="form-control" name="disclaimer" type="text" value="<?php echo esc( $row['disclaimer'] ); ?>"/>
        </div>
        <div class="form-group">
            <label for="mytime_zone">time zone (3 letter type <em>MST, EDT...</em>)</label>
            <input class="form-control" name="mytime_zone" type="text" value="<?php echo esc( $row['mytime_zone'] ); ?>"/>
        </div>
        <div class="form-group">
            <label for="theme_url">website address </label>
            <input class="form-control" name="theme_url" type="text" value="<?php echo esc( $row['theme_url'] ); ?>"/>
        </div>
        <div class="form-group">
            <label for="server_email">main send-out email address (server send mail)</label>
            <input class="form-control" name="server_email" type="text" value="<?php echo esc( $row['server_email'] ); ?>">
        </div>
        <div class="form-group">
        <p></p>
        </div>
         <div class="form-group">
            <label for="submit_pref">Update <input name="id" type="hidden" value="<?php echo esc( $row['id'] ); ?>" />
            <input class="btn btn-success btn-lg" name="submit_pref" type="submit" value="Update"></label>
        </div>
     </form>
 <?php } ?>      
    </div>
      
           


    </div>   
</div><!-- ends container -->

