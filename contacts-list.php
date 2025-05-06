<?php 
include('restrict.php');
include('header.php');
?>
    <h1 class="page-header"></h1>
    <h2 class="sub-header">Contacts</h2>   
        <div class="col-lg-7">
            <p><em><u> Use Ctrl F to search by name </u> </em> click inv. # to print</p>
            <div class="table-responsive">           
            <table id="listall_short">
            <thead><tr><th>Show </th>
            <th> Name</th>
            <th> Phone</th>
            <th> Address </th>
            <th> Email</th></tr></thead><tbody>

            <?php
            //show history 
            include_once('inc/db.php');
                $query = 'SELECT * FROM cgcontacts ORDER BY `date` ASC LIMIT 8';
                    foreach ($dbh->query($query) as $row) {  
            ?>

            <tr>
            <td><form action="contacts-list.php" method="POST">
                <input type="hidden" value="<?php echo esc( $row['id'] ); ?>" name="contact" />
                <input type="submit" class="tdswide" name="showcontact" value="+" /></form></td>
            <td><?php echo esc( $row['first'] . " " . $row['last'] ); ?></td>
            <td><?php echo esc( $row['phone'] ); ?></td>
            <td><?php echo esc( $row['address'] ); ?></td>
            <td><?php echo esc( $row['email'] ); ?></td>
            </tr>

            <?php } ?>
            
            </tbody></table>
            </div>

        </div>

        <div class="col-lg-5" style="background: #fcfcfc;">
            <h4>Contact</h4>
              <hr>
            <?php  
            if( isset( $_POST['showcontact']) ) {

            $id = $_POST['contact'];
            include_once('inc/db.php');
                $sql = 'SELECT * FROM cgcontacts WHERE id = :id';
                $stmt = $dbh->prepare($sql);
                $stmt->bindValue(':id', $id);
                $stmt->execute();
                $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach($rows as $row){
            ?>
<p class="text"><?php echo esc( $row['first'] . " " . $row['last'] ); ?></p>
<p class="text"><abbr title="Auto Dial link">Work: </abbr><a href="tel:<?php echo esc( $row['phone'] ); ?>"><?php echo esc( $row['phone'] ); ?></a></p>
<p class="text"><?php echo esc( $row['address'] ); ?></p>
<p class="text"><abbr title="Mail link"><span class="fa fa-envelope"></span> </abbr> <a href="mailto:<?php echo esc( $row['email'] ); ?>" title="eMail to"><?php echo esc( $row['email'] ); ?></a></p>
<p class="text"><abbr title="Auto Dial link">Mobile: </abbr><a href="tel:<?php echo esc( $row['mobile'] ); ?>"><?php echo esc( $row['mobile'] ); ?></a></p>
<p class="text"><?php echo esc( $row['website'] ); ?></p>
<p class="text"><?php echo esc( $row['comment'] ); ?></p>
<p class="text"><?php echo esc( $row['date'] ); ?></p>
<p><a href="contacts-edit.php?id=<?php echo esc( $row['id'] ); ?>" title="edit"><span class="tdwide"> Edit</span></a> <?php echo esc( $row['id'] ); ?></p>

 
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
                    <table id="listall">
                    <thead><tr>
                    <th>Show</th>
                    <th>name</th>
                    <th>phone</th>
                    <th>email</th></tr></thead><tbody>
                <?php
                //show history 
                //include_once('inc/db.php');
                    $query = ("SELECT * FROM cgcontacts WHERE lower(last) REGEXP '^[a-f]' ORDER BY last");
                    foreach ($dbh->query($query) as $row) {  
                ?>

<tr>
<td><form action="contacts-list.php" method="POST">
<input type="hidden" value="<?php echo esc( $row['id'] ); ?>" name="contact" />
<input type="submit" class="tdswide" name="showcontact" value="+" />
</form></td>

<td><?php echo esc( $row['first'] . " " . $row['last'] ); ?></td>
<td><?php echo esc( $row['phone'] ); ?></td>
<td><?php echo esc( $row['email'] ); ?></td>
</tr>

<?php
        } 
?>
</tbody></table>
                    </div>
                    <div class="tab-pane fade" id="vtwo">
<table id="listall"><thead><tr>
                    <th>Show</th>
                    <th>name</th>
                    <th>phone</th>
                    <th>email</th></tr></thead><tbody>
<?php
 //show history 
//include_once('inc/db.php');
    $query = ("SELECT * FROM cgcontacts WHERE lower(last) REGEXP '^[g-l]' ORDER BY last");
        foreach ($dbh->query($query) as $row) {  
?>

<tr>
<td><form action="contacts-list.php" method="POST">
<input type="hidden" value="<?php echo esc( $row['id'] ); ?>" name="contact" />
<input type="submit" class="tdswide" name="showcontact" value="+" />
</form></td>

<td><?php echo esc( $row['first'] . " " . $row['last'] ); ?></td>
<td><?php echo esc( $row['phone'] ); ?></td>
<td><?php echo esc( $row['email'] ); ?></td>
</tr>

<?php
        } 
?>
</tbody></table>
                    </div>
                    <div class="tab-pane fade" id="vthree">
<table id="listall"><thead><tr>
                    <th>Show</th>
                    <th>name</th>
                    <th>phone</th>
                    <th>email</th></tr></thead><tbody>
<?php
 //show history 
//include_once('inc/db.php');
    $query = ("SELECT * FROM cgcontacts WHERE lower(last) REGEXP '^[m-r]' ORDER BY last");
        foreach ($dbh->query($query) as $row) {  
?>

<tr>
<td><form action="contacts-list.php" method="POST">
<input type="hidden" value="<?php echo esc( $row['id'] ); ?>" name="contact" />
<input type="submit" class="tdswide" name="showcontact" value="+" />
</form></td>

<td><?php echo esc( $row['first'] . " " . $row['last'] ); ?></td>
<td><?php echo esc( $row['phone'] ); ?></td>
<td><?php echo esc( $row['email'] ); ?></td>
</tr>

<?php
        } 
?>
</tbody></table>
                    </div>
                    <div class="tab-pane fade" id="vfour">
<table id="listall"><thead><tr>
                    <th>Show</th>
                    <th>name</th>
                    <th>phone</th>
                    <th>email</th></tr></thead><tbody>
<?php
 //show history 
//include_once('inc/db.php');
    $query = ("SELECT * FROM cgcontacts WHERE lower(last) REGEXP '^[s-z]' ORDER BY last");
        foreach ($dbh->query($query) as $row) {  
?>

<tr>
<td><form action="contacts-list.php" method="POST">
<input type="hidden" value="<?php echo esc( $row['id'] ); ?>" name="contact" />
<input type="submit" class="tdswide" name="showcontact" value="+" />
</form></td>

<td><?php echo esc( $row['first'] . " " . $row['last'] ); ?></td>
<td><?php echo esc( $row['phone'] ); ?></td>
<td><?php echo esc( $row['email'] ); ?></td>
</tr>

<?php
        } 
?>
</tbody></table>
                    </div>
               </div>
            </div><!-ends col-12 tabs -->

<?php include('footer.php'); ?>
