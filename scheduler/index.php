<?php 

function getmicrotime(){ 
    list($usec, $sec) = explode(" ",microtime()); 
    return ((float)$usec + (float)$sec); 
} 

$time_start = getmicrotime();

IF(!isset($_GET['year'])){
    $_GET['year'] = date("Y");
}
IF(!isset($_GET['month'])){
    $_GET['month'] = date("n")+1;
}

$month = addslashes($_GET['month'] - 1);
$year = addslashes($_GET['year']);

require_once '../inc/db.php';  
$query = "SELECT event_id,event_title,event_day,event_time 
FROM cgevents 
WHERE event_month='$month' AND event_year='$year' ORDER BY event_time";

foreach ($dbh->query($query) as $info) {  

	$day = $info['event_day'];
    $event_id = $info['event_id'];
    $events[$day][] = $info['event_id'];
    $event_info[$event_id]['0'] = substr($info['event_title'], 0, 15);
    $event_info[$event_id]['1'] = $info['event_time'];
}

$todays_date = date("j");
$todays_month = date("n");

$days_in_month = date ("t", mktime(0,0,0,$_GET['month'],0,$_GET['year']));
$first_day_of_month = date ("w", mktime(0,0,0,$_GET['month']-1,1,$_GET['year']));
$first_day_of_month = $first_day_of_month + 1;
$count_boxes = 0;
$days_so_far = 0;

IF($_GET['month'] == 13){
    $next_month = 2;
    $next_year = $_GET['year'] + 1;
} ELSE {
    $next_month = $_GET['month'] + 1;
    $next_year = $_GET['year'];
}

IF($_GET['month'] == 2){
    $prev_month = 13;
    $prev_year = $_GET['year'] - 1;
} ELSE {
    $prev_month = $_GET['month'] - 1;
    $prev_year = $_GET['year'];
}



?>
<!DOCTYPE>
<html>
<head>
<title>Scheduler | Calendar</title>
<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="css/cal.css" rel="stylesheet" type="text/css">
<script>

function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}

</script>
</head>

<body class="easein">
<div class="wrapper">
<a href="../index.php" title="back to invoicing" class="inlink">Invoicing Home</a>
<div class="centered">
<h1><? echo date ("F Y", mktime(0,0,0,$_GET['month']-1,1,$_GET['year'])); ?></h1>
  <div class="centered"><table class="monthyear">
    <tr> 
      <td><div align="right"><a href="<? echo "index.php?month=$prev_month&amp;year=$prev_year"; ?>">&lt;&lt;</a></div></td>
      <td width="200"><div class="centered">
            
          <select name="month" id="month" onChange="MM_jumpMenu('parent',this,0)">
            <?
			for ($i = 1; $i <= 12; $i++) {
				$link = $i+1;
				IF($_GET['month'] == $link){
					$selected = "selected";
				} ELSE {
					$selected = "";
				}
				echo "<option value=\"index.php?month=$link&amp;year=$_GET[year]\" $selected>" . date ("F", mktime(0,0,0,$i,1,$_GET['year'])) . "</option>\n";
			}
			?>
          </select>
          <select name="year" id="year" onChange="MM_jumpMenu('parent',this,0)">
		  <?
		  for ($i = date('Y'); $i <= 2049; $i++) {
		  	IF($i == $_GET['year']){
				$selected = "selected";
			} ELSE {
				$selected = "";
			}
		  	echo "<option value=\"index.php?month=$_GET[month]&amp;year=$i\" $selected>$i</option>\n";
		  }
		  ?>
          </select>
        </div></td>
      <td><div align="left"><a href="<? echo "index.php?month=$next_month&amp;year=$next_year"; ?>">&gt;&gt;</a></div></td>
    </tr>
  </table>
  <br>
</div>
<table class="mainbox">
  <tr>
    <td><table class="monthview">
        <tr> 
          <th>Sunday</th>
          <th>Monday</th>
          <th>Tuesday</th>
          <th>Wednesday</th>
          <th>Thursday</th>
          <th>Friday</th>
          <th>Saturday</th>
        </tr>
		<tr valign="top" bgcolor="#FFFFFF"> 
		<?
		for ($i = 1; $i <= $first_day_of_month-1; $i++) {
			$days_so_far = $days_so_far + 1;
			$count_boxes = $count_boxes + 1;
			echo "<td width=\"14.2858%\" height=\"120\" class=\"beforedayboxes\"></td>\n";
		}
		for ($i = 1; $i <= $days_in_month; $i++) {
   			$days_so_far = $days_so_far + 1;
    			$count_boxes = $count_boxes + 1;
			IF($_GET['month'] == $todays_month+1){
				IF($i == $todays_date){
					$class = "highlighteddayboxes";
				} ELSE {
					$class = "dayboxes";
				}
			} ELSE {
				IF($i == 1){
					$class = "highlighteddayboxes";
				} ELSE {
					$class = "dayboxes";
				}
			}
			echo "<td width=\"14.2858%\" height=\"120\" class=\"$class\">\n";
			$link_month = $_GET['month'] - 1;
			echo "<div align=\"right\"><span class=\"toprightnumber\">\n<a href=\"javascript:MM_openBrWindow('event_add.php?day=$i&amp;month=$link_month&amp;year=$_GET[year]','','width=500,height=300');\">$i</a>&nbsp;</span></div>\n";
			IF(isset($events[$i])){
				echo "<div class=\"left\"><span class=\"eventinbox\">\n";
				while (list($key, $value) = each ($events[$i])) {
					echo "&nbsp;<a href=\"javascript:MM_openBrWindow('event.php?id=$value','','width=500,height=250');\" title=\"open\">"
 . $event_info[$value]['1'] . "> " . $event_info[$value]['0']  . "</a>\n<br>\n";
				}
				echo "</span></div>\n";
			}
			echo "</td>\n";
			IF(($count_boxes == 7) AND ($days_so_far != (($first_day_of_month-1) + $days_in_month))){
				$count_boxes = 0;
				echo "</TR><TR valign=\"top\">\n";
			}
		}
		$extra_boxes = 7 - $count_boxes;
		for ($i = 1; $i <= $extra_boxes; $i++) {
		echo "<td width=\"14.2858%\" height=\"120\" class=\"afterdayboxes\"></td>\n";
		}
		$time_end = getmicrotime();
		$time = round($time_end - $time_start, 3);
		?>
        </tr>
      </table></td>
  </tr>
</table>
<p<span class="footer">Have A Wonderful Time and Be Happy
</p>
</div><div class="clearme"></div></div>
</body>
</html>
