<?php 
include('restrict.php');
include('header.php');
?>

    <h2 class="sub-header">Vendors</h2>
        <div class="col-lg-6">
            <p><em><u> Use Ctrl F to search by name </u> </em> click inv. # to print</p>
            <div class="table-responsive">        
            <table id="listall_short"><tbody><tr><th>Show </th><th> Business</th><th> Phone</th><th> Address </th><th> Hours</th></tr>

            <?php
            //show history 
            include_once('inc/db.php');
                $query = 'SELECT * FROM cgvendors ORDER BY id ASC LIMIT 8';
                    foreach ($dbh->query($query) as $row) {  
            ?>

            <tr>
            <td><form action="vendors-list.php" method="POST">
                <input type="hidden" value="<?php echo $row['id']; ?>" name="id" />
                <input type="submit" class="tdswide" name="showvendor" value="+" /></form></td>
            <td><?php echo $row['business'] . " " . $row['last']; ?></td>
            <td><?php echo $row['phone']; ?></td>
            <td><?php echo $row['address']; ?></td>
            <td><?php echo $row['hours']; ?></td>
            </tr>

            <?php } ?>
            
            </tbody></table>
            </div>

        </div>

        <div class="col-lg-6" style="background: #fcfcfc;">
            <h4>Vendor</h4>
              <hr>

<?php  
/**
 * show vendor selected from tabs
 * @uses $id
 */

if( isset( $_POST['showvendor']) ) {
$id = $_POST['id'];
include_once('inc/db.php');
    $sql = 'SELECT * FROM cgvendors WHERE id = :id';
    $stmt = $dbh->prepare($sql);
$stmt->bindValue(':id', $id);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach($rows as $row){
?>
<p class="text"><b>Bus: </b> <?php echo $row['business']; ?></p>
<p class="text"><abbr title="Auto Dial link">Phn: </abbr><a href="tel:<?php echo $row['phone']; ?>"><?php echo $row['phone']; ?></a></p>
<p class="text"><b>Adr:</b> <?php echo $row['address']; ?></p>
<p class="text"><b>Hrs:</b><span id="text_wrap"><?php $hours = str_replace("\n", '<br />', $row['hours']); echo $hours; ?></span></p>
<p class="text"><b>?</b> <?php echo $row['note']; ?></p>
<p><a href="vendors-edit.php?id=<?php echo $row['id']; ?>" title="edit"><span class="tdwide"> Edit</span></a> <?php echo $row['id']; ?></p>
<?php
    }
} 
?>
<div class="clearme"></div>
            </div><!-- ends 6 right -->

            <div class="col-lg-12 col-md-12">
               <br>
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
<table id="listall"><tbody>
<tr><th>Show</th><th>Business</th><th>Phone</th></tr>
<?php
 //show history 
include_once('inc/db.php');
    $query = ("SELECT * FROM cgvendors WHERE lower(business) REGEXP '^[a-f]' ORDER BY business");
        foreach ($dbh->query($query) as $row) {  
?>

<tr>
<td><form action="vendors-list.php" method="POST">
<input type="hidden" value="<?php echo $row['id']; ?>" name="id">
<input type="submit" class="tdswide" value="+" name="showvendor">
</form></td>
<td><?php echo $row['business']; ?></td>
<td><?php echo $row['phone']; ?></td>
</tr>

<?php
        } 
?>

</tbody></table>
                    </div>
                    <div class="tab-pane fade" id="vtwo">
<table id="listall"><tbody>
<tr><th>Show</th><th>Business</th><th>Phone</th></tr>
<?php
 //show history 
include_once('inc/db.php');
    $query = ("SELECT * FROM cgvendors WHERE lower(business) REGEXP '^[g-l]' ORDER BY business");
        foreach ($dbh->query($query) as $row) {  
?>

<tr>
<td><form action="vendors-list.php" method="POST">
<input type="hidden" value="<?php echo $row['id']; ?>" name="id" />
<input type="submit" class="tdswide" name="showvendor" value="+" />
</form></td>
<td><?php echo $row['business']; ?></td>
<td><?php echo $row['phone']; ?></td>
</tr>

<?php
        } 
?>
</tbody></table>
                    </div>
                    <div class="tab-pane fade" id="vthree">
<table id="listall"><tbody>
<tr><th>Show</th><th>Business</th><th>Phone</th></tr>
<?php
 //show history 
include_once('inc/db.php');
    $query = ("SELECT * FROM cgvendors WHERE lower(business) REGEXP '^[m-r]' ORDER BY business");
        foreach ($dbh->query($query) as $row) {  
?>

<tr>
<td><form action="vendors-list.php" method="POST">
<input type="hidden" value="<?php echo $row['id']; ?>" name="id" />
<input type="submit" class="tdswide" name="showvendor" value="+" />
</form></td>
<td><?php echo $row['business']; ?></td>
<td><?php echo $row['phone']; ?></td>
</tr>

<?php
        } 
?>
</tbody></table>
                    </div>
                    <div class="tab-pane fade" id="vfour">
<table id="listall"><tbody>
<tr><th>Show</th><th>Business</th><th>Phone</th></tr>
<?php
 //show history 
include_once('inc/db.php');
    $query = ("SELECT * FROM cgvendors WHERE lower(business) REGEXP '^[s-z]' ORDER BY business");
        foreach ($dbh->query($query) as $row) {  
?>

<tr>
<td><form action="vendors-list.php" method="POST">
<input type="hidden" value="<?php echo $row['id']; ?>" name="id" />
<input type="submit" class="tdswide" name="showvendor" value="+" />
</form></td>
<td><?php echo $row['business']; ?></td>
<td><?php echo $row['phone']; ?></td>
</tr>

<?php
        } 
?>
</tbody></table>
                    </div>
               </div>
            </div><!-ends col-12 tabs -->

</div><!-- ends 9 col -->
      </div><!-- ends row -->
    </div><!-- ends container -->
<?php include('footer.php'); ?>