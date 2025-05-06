<?php 
session_start([
    'cookie_lifetime' => 86400,
    ]); 
    //3600 = 1 hour
    //86400 = 1 day
include('header.php');
?>    
          <h1 class="page-header">Dashboard Invoicing and Quotes</h1>
          <h2 class="sub-header">Administrative Portal</h2>
 <h2>Welcome <?php echo $_SESSION['firstname']; ?></h2>
				<p><a href='inc/logout.php'>Logout</a> &nbsp; | &nbsp;  
				<?php if( isset( $_SESSION['user_session']) ) { 
				print("You are safely logged in "); } ?></p>
          <div class="table-responsive">
              <img src="img/logo.png" alt="open source logo"/>
              
<?php 
//process login form if submitted
if(isset($_POST['submit']))
{
require_once 'inc/db.php';
$username = $_POST['username'];
$password = md5($_POST['password']);
$active = (int)1;

$stmt = $dbh->prepare('SELECT * FROM tsw_members WHERE username = :username 
AND password = :password AND active = :active');
 
$stmt->execute(array(
':username' => $username,
':password' => $password,
':active'   => $active
));
  if ($stmt->rowCount() > 0)
  {
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $firstname = $row['firstname'];
    $idm       = $row['idm'];
    $email     = $row['email'];
        $email_stripped = alpha_only($email);
        $date_session   = date('mdY-Hi');  
        $user_session   = $email_stripped;

            $_SESSION['user_session'] = "$user_session$date_session";  // used for access identifier 
            $_SESSION['firstname'] = $firstname;                       // for displaying name
            $_SESSION['user_id'] = $idm;  // for user id fetching if needed
                                         
    redirect('index.php');  
    
    } else {
    
    redirect('login.html');   //display_sessions(); 
  }
}
?>
<?php include 'footer.php'; ?>
