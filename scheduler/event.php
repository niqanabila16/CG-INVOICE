<?php 
// Get values from form
if( isset( $_REQUEST['id'])) { 
  $id = $_GET['id']; 
  require_once '../inc/db.php';
}
// Retrieve data from database
$query = ("SELECT * FROM cgevents WHERE `event_id` = :event_id LIMIT 1");
$stmt = $dbh->prepare($query);
$stmt->bindValue(':event_id', $id);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach($rows as $info){
    $date = date ("l, jS F Y", mktime(0,0,0,$info['event_month'],
    $info['event_day'],$info['event_year']));
    
    $time_array = split(":", $info['event_time']);
    $time = date ("g:ia", mktime($time_array['0'],$time_array['1'],0,
    $info['event_month'],$info['event_day'],$info['event_year']));
?>
<!DOCTYPE>
<html>
<head>
<title>Scheduler | Calendar</title>
<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHPCalendar - <? echo $info['event_title']; ?></title>
<link href="css/cal.css" rel="stylesheet" type="text/css">
</head>

<body>

<table width="480" border="0" cellpadding="0" cellspacing="0">
  <tbody style="background:#fafafa">
        <tr> 
          <td><span class="eventwhen"><u><? echo $date . " at " . $time; ?></u></span><br> 
            <br> <br> </td>
        </tr>
        <tr> 
          <td><span class="event">Event Title</span></td>
        </tr>
        <tr> 
          <td><span class="eventdetail"><? echo $info['event_title']; ?></span><br> 
            <br></td>
        </tr>
        <tr> 
          <td><span class="event">Event Description</span></td>
        </tr>
        <tr> 
          <td><span class="eventdetail"><? echo $info['event_desc']; ?></span><br></td>
        </tr>

  <tr>
    <td align="right" valign="bottom"><a href="event_delete.php?<? echo "day=$info[event_day]&month=$info[event_month]&year=$info[event_year]&id=$info[event_id]"; ?>">Delete</a></td>
  </tr></tbody>
</table>
</body>
</html>
<? } ?>
