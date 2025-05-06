<!DOCTYPE>
<html>
<head>
<title>Scheduler | Calendar</title>
<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="css/cal.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php
 if( isset( $_GET['id'] ) ) {
  $rmv_id = $_GET['id'];
  $month = $_GET['month'];
  $year = $_GET['year'];

  require_once '../inc/db.php';

  $sql = "DELETE from cgevents WHERE event_id = ?";
  $delete = $dbh->prepare($sql);
  $delete->execute( array($rmv_id) );
      if($delete) {
?>
<script type="text/javascript">
function redirect_to(where, closewin)
{ 
 	opener.location = 'index.php?' + where; 	
 	if (closewin == 1)
 	{
 		self.close();
 	}
}
</script>
<script type="text/javascript"> 
redirect_to( 'month=<?php echo ($month + 1); ?>&year=<?php echo $year; ?>', 1 );
  </script>
<?php 
} else { print( 'Please close this window and try again.' ); } 
}
?>
</body>
</html>
