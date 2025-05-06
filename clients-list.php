<?php 
include('restrict.php');
include('header.php');
$header_name="";
?>
    <h1 class="page-header"><?php echo esc( $header_name ); ?></h1>
    <h2 class="sub-header">Clients/Assets</h2>   
        <div class="col-lg-6">
            <p><em><u> Use Ctrl F to search by name </u> </em></p>
            <div class="table-responsive">           
            <table id="listall_short"><tbody><tr><th>Show </th><th> Item</th><th> Code</th><th> Value</th><th> Date In</th></tr>

            <?php
            //show history 
            include_once('inc/db.php');
                $query = 'SELECT * FROM cgclients ORDER BY `id` ASC LIMIT 8';
                    foreach ($dbh->query($query) as $row) {  
            ?>

            <tr>
            <td><form action="clients-list.php" method="POST">
                <input type="hidden" value="<?php echo $row['id']; ?>" name="contact" />
                <input type="submit" class="tdswide" name="showcontact" value=" + " /></form></td>
            <td><?php echo esc( $row['item'] ); ?></td>
            <td><?php echo esc( $row['code'] ); ?></td>
            <td><?php echo esc( $row['value'] ); ?></td>
            <td><?php echo esc( $row['din'] ); ?></td>
            </tr>

            <?php } ?>
            
            </tbody></table>
            </div>

        </div>

        <div class="col-lg-6" style="background: #fcfcfc;">
            <h4>Client</h4>
              <hr>
            <?php  
            if( isset( $_POST['showcontact']) ) {

            $id = $_POST['contact'];
            include_once('inc/db.php');
                $sql = 'SELECT * FROM cgclients WHERE id = :id';
                $stmt = $dbh->prepare($sql);
                $stmt->bindValue(':id', $id);
                $stmt->execute();
                $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach($rows as $row){
            ?>
<p class="text"><b>Item</b> <?php echo esc( $row['item'] ); ?></p>
<p class="text"><b>Man. Num.</b> <?php echo esc( $row['code'] ); ?></p>
<p class="text"><b>Value</b> <?php echo esc( $row['value'] ); ?></p>
<p class="text"><b>UPC</b> <?php echo esc( $row['upc'] ); ?></p>
<p class="text"><b>Date In</b> <?php echo esc( $row['din'] ); ?></a></p>
<p class="text"><b>Date Out</b> <?php echo esc( $row['dout'] ); ?></p>
<p><a href="clients-edit.php?id=<?php echo esc( $row['id'] ); ?>" title="edit"><span class="tdwide"> Edit</span></a> <?php echo esc( $row['id'] ); ?></p>
              <?php
              }
          } 
          ?>

        </div><!-- ends 6 left -->

            <div class="col-lg-12 col-md-12">
                <br><hr><br>
                <ul id="myTab" class="nav nav-tabs nav-justified">
                    <li class="active"><a href="#vone" data-toggle="tab"><i class="fa fa-phone"></i> A-F</a>
                    </li>
                    <li class=""><a href="#vtwo" data-toggle="tab"><i class="fa fa-phone"></i> G-L</a>
                    </li>
                    <li class=""><a href="#vthree" data-toggle="tab"><i class="fa fa-phone"></i> M-R</a>
                    </li>
                    <li class=""><a href="#vfour" data-toggle="tab"><i class="fa fa-phone"></i> S-Z</a>
                    </li>
                </ul>

                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane fade active in" id="vone">
                    <table id="listall"><tbody><tr><th>Show</th><th> Item</th><th> Code</th><th> Value</th><th> Date In</th></tr>
                <?php
                //show history 
                include_once('inc/db.php');
                    $query = ("SELECT * FROM cgclients WHERE lower(item) REGEXP '^[a-f]' ORDER BY item");
                    foreach ($dbh->query($query) as $row) {  
                ?>

<tr>
<td><form action="clients-list.php" method="POST">
<input type="hidden" value="<?php echo esc( $row['id'] ); ?>" name="contact" />
<input type="submit" class="tdswide" name="showcontact" value="+" />
</form></td>

<td><?php echo esc( $row['item'] ); ?></td>
<td><?php echo esc( $row['code'] ); ?></td>
<td><?php echo esc( $row['value'] ); ?></td>
<td><?php echo esc( $row['din'] ); ?></td>
</tr>

<?php
        } 
?>
</tbody></table>
                    </div>
                    <div class="tab-pane fade" id="vtwo">
<table id="listall"><tbody>
<tr><th>Show</th><th> Item</th><th> Code</th><th> Value</th><th> Date In</th></tr>
<?php
 //show history 
include_once('inc/db.php');
    $query = ("SELECT * FROM cgclients WHERE lower(item) REGEXP '^[g-l]' ORDER BY item");
        foreach ($dbh->query($query) as $row) {  
?>

<tr>
<td><form action="clients-list.php" method="POST">
<input type="hidden" value="<?php echo esc( $row['id'] ); ?>" name="contact" />
<input type="submit" class="tdswide" name="showcontact" value="+" />
</form></td>

<td><?php echo esc( $row['item'] ); ?></td>
<td><?php echo esc( $row['code'] ); ?></td>
<td><?php echo esc( $row['value'] ); ?></td>
<td><?php echo esc( $row['din'] ); ?></td>
</tr>

<?php
        } 
?>
</tbody></table>
                    </div>
                    <div class="tab-pane fade" id="vthree">
<table id="listall"><tbody>
<tr><th>Show</th><th> Item</th><th> Code</th><th> Value</th><th> Date In</th></tr>
<?php
 //show history 
include_once('inc/db.php');
    $query = ("SELECT * FROM cgclients WHERE lower(item) REGEXP '^[m-r]' ORDER BY item");
        foreach ($dbh->query($query) as $row) {  
?>

<tr>
<td><form action="clients-list.php" method="POST">
<input type="hidden" value="<?php echo esc( $row['id'] ); ?>" name="contact" />
<input type="submit" class="tdswide" name="showcontact" value="+" />
</form></td>

<td><?php echo esc( $row['item'] ); ?></td>
<td><?php echo esc( $row['code'] ); ?></td>
<td><?php echo esc( $row['value'] ); ?></td>
<td><?php echo esc( $row['din'] ); ?></td>
</tr>

<?php
        } 
?>
</tbody></table>
                    </div>
                    <div class="tab-pane fade" id="vfour">
<table id="listall"><tbody>
<tr><th>Show</th><th> Item</th><th> Code</th><th> Value</th><th> Date In</th></tr>
<?php
 //show history 
include_once('inc/db.php');
    $query = ("SELECT * FROM cgclients WHERE lower(item) REGEXP '^[s-z]' ORDER BY item");
        foreach ($dbh->query($query) as $row) {  
?>

<tr>
<td><form action="clients-list.php" method="POST">
<input type="hidden" value="<?php echo esc( $row['id'] ); ?>" name="contact" />
<input type="submit" class="tdswide" name="showcontact" value="+" />
</form></td>

<td><?php echo esc( $row['item'] ); ?></td>
<td><?php echo esc( $row['code'] ); ?></td>
<td><?php echo esc( $row['value'] ); ?></td>
<td><?php echo esc( $row['din'] ); ?></td>
</tr>

<?php
        } 
?>
</tbody></table>
                    </div>
               </div>
            </div><!-ends col-12 tabs -->

<?php include('footer.php'); ?>
