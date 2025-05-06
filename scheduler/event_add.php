<?php 
if(isset($_POST['submit']))
{
require_once '../inc/db.php';
  $description   = substr($_POST['description'],0,500);
  $event_title   = substr($_POST['title'],0,30);
  $event_day = addslashes($_POST['day']);
  $event_month    = addslashes($_POST['month']);
  $event_year  = addslashes($_POST['year']);

  $event_time     = addslashes($_POST['hour'].":".$_POST['minute']);

	$sql = 'INSERT INTO cgevents
  ( `event_day`, `event_month`, `event_year`, `event_time`, 
  `event_title`, `event_desc` ) 
  VALUES ( :event_day, :event_month, :event_year, :event_time, 
  :event_title, :event_desc )';

$stmt = $dbh->prepare($sql);

$stmt->execute( array(
':event_day'   => $event_day,
':event_month' => $event_month,
':event_year'  => $event_year,
':event_time'  => $event_time,
':event_title' => $event_title,
':event_desc'  => $description ) );
if($stmt){
  $_POST['month'] = $_POST['month'] + 1;
?>
<script>
  function redirect_to(where, closewin)
 {
 	opener.location= 'index.php?' + where;
 	
 	if (closewin == 1)
 	{
 		self.close();
 	}
 }
</script>
<script> 
redirect_to('month=<?php echo $_POST['month'].'&year='.$_POST['year']; ?>',1);
  </script>
<?php 
} 
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
</head>
<body>
<form name="form1" method="post" action="">
  <table width="480" border="0" cellspacing="0" cellpadding="0">
    <tbody style="color:#000;background: #fafafa"><tr> 
      <td width="200" height="40" valign="top"><span class="addevent">Event Date</span><br> 
        <span class="addeventextrainfo">(MM/DD/YY)</span></td>
      <td height="40" valign="top"> <select name="month" id="month">
          <option value="1" <? IF($_GET['month'] == "1"){ echo "selected"; } ?>>01</option>
          <option value="2" <? IF($_GET['month'] == "2"){ echo "selected"; } ?>>02</option>
          <option value="3" <? IF($_GET['month'] == "3"){ echo "selected"; } ?>>03</option>
          <option value="4" <? IF($_GET['month'] == "4"){ echo "selected"; } ?>>04</option>
          <option value="5" <? IF($_GET['month'] == "5"){ echo "selected"; } ?>>05</option>
          <option value="6" <? IF($_GET['month'] == "6"){ echo "selected"; } ?>>06</option>
          <option value="7" <? IF($_GET['month'] == "7"){ echo "selected"; } ?>>07</option>
          <option value="8" <? IF($_GET['month'] == "8"){ echo "selected"; } ?>>08</option>
          <option value="9" <? IF($_GET['month'] == "9"){ echo "selected"; } ?>>09</option>
          <option value="10" <? IF($_GET['month'] == "10"){ echo "selected"; } ?>>10</option>
          <option value="11" <? IF($_GET['month'] == "11"){ echo "selected"; } ?>>11</option>
          <option value="12" <? IF($_GET['month'] == "12"){ echo "selected"; } ?>>12</option>
        </select> <select name="day" id="day">
          <option value="1" <? IF($_GET['day'] == "1"){ echo "selected"; } ?>>01</option>
          <option value="2" <? IF($_GET['day'] == "2"){ echo "selected"; } ?>>02</option>
          <option value="3" <? IF($_GET['day'] == "3"){ echo "selected"; } ?>>03</option>
          <option value="4" <? IF($_GET['day'] == "4"){ echo "selected"; } ?>>04</option>
          <option value="5" <? IF($_GET['day'] == "5"){ echo "selected"; } ?>>05</option>
          <option value="6" <? IF($_GET['day'] == "6"){ echo "selected"; } ?>>06</option>
          <option value="7" <? IF($_GET['day'] == "7"){ echo "selected"; } ?>>07</option>
          <option value="8" <? IF($_GET['day'] == "8"){ echo "selected"; } ?>>08</option>
          <option value="9" <? IF($_GET['day'] == "9"){ echo "selected"; } ?>>09</option>
          <option value="10" <? IF($_GET['day'] == "10"){ echo "selected"; } ?>>10</option>
          <option value="11" <? IF($_GET['day'] == "11"){ echo "selected"; } ?>>11</option>
          <option value="12" <? IF($_GET['day'] == "12"){ echo "selected"; } ?>>12</option>
          <option value="13" <? IF($_GET['day'] == "13"){ echo "selected"; } ?>>13</option>
          <option value="14" <? IF($_GET['day'] == "14"){ echo "selected"; } ?>>14</option>
          <option value="15" <? IF($_GET['day'] == "15"){ echo "selected"; } ?>>15</option>
          <option value="16" <? IF($_GET['day'] == "16"){ echo "selected"; } ?>>16</option>
          <option value="17" <? IF($_GET['day'] == "17"){ echo "selected"; } ?>>17</option>
          <option value="18" <? IF($_GET['day'] == "18"){ echo "selected"; } ?>>18</option>
          <option value="19" <? IF($_GET['day'] == "19"){ echo "selected"; } ?>>19</option>
          <option value="20" <? IF($_GET['day'] == "20"){ echo "selected"; } ?>>20</option>
          <option value="21" <? IF($_GET['day'] == "21"){ echo "selected"; } ?>>21</option>
          <option value="22" <? IF($_GET['day'] == "22"){ echo "selected"; } ?>>22</option>
          <option value="23" <? IF($_GET['day'] == "23"){ echo "selected"; } ?>>23</option>
          <option value="24" <? IF($_GET['day'] == "24"){ echo "selected"; } ?>>24</option>
          <option value="25" <? IF($_GET['day'] == "25"){ echo "selected"; } ?>>25</option>
          <option value="26" <? IF($_GET['day'] == "26"){ echo "selected"; } ?>>26</option>
          <option value="27" <? IF($_GET['day'] == "27"){ echo "selected"; } ?>>27</option>
          <option value="28" <? IF($_GET['day'] == "28"){ echo "selected"; } ?>>28</option>
          <option value="29" <? IF($_GET['day'] == "29"){ echo "selected"; } ?>>29</option>
          <option value="30" <? IF($_GET['day'] == "30"){ echo "selected"; } ?>>30</option>
          <option value="31" <? IF($_GET['day'] == "31"){ echo "selected"; } ?>>31</option>
        </select> <select name="year" id="year">
          <option value="2015" <? IF($_GET['year'] == "2015"){ echo "selected"; } ?>>2015</option>
          <option value="2016" <? IF($_GET['year'] == "2016"){ echo "selected"; } ?>>2016</option>
          <option value="2017" <? IF($_GET['year'] == "2017"){ echo "selected"; } ?>>2017</option>
          <option value="2018" <? IF($_GET['year'] == "2018"){ echo "selected"; } ?>>2018</option>
          <option value="2019" <? IF($_GET['year'] == "2019"){ echo "selected"; } ?>>2019</option>
          <option value="2020" <? IF($_GET['year'] == "2020"){ echo "selected"; } ?>>2020</option>
          <option value="2021" <? IF($_GET['year'] == "2021"){ echo "selected"; } ?>>2021</option>
          <option value="2022" <? IF($_GET['year'] == "2022"){ echo "selected"; } ?>>2022</option>
          <option value="2023" <? IF($_GET['year'] == "2023"){ echo "selected"; } ?>>2023</option>
          <option value="2024" <? IF($_GET['year'] == "2024"){ echo "selected"; } ?>>2024</option>
          <option value="2025" <? IF($_GET['year'] == "2025"){ echo "selected"; } ?>>2025</option>
          <option value="2026" <? IF($_GET['year'] == "2026"){ echo "selected"; } ?>>2026</option>
          <option value="2027" <? IF($_GET['year'] == "2027"){ echo "selected"; } ?>>2027</option>
          <option value="2028" <? IF($_GET['year'] == "2028"){ echo "selected"; } ?>>2028</option>
          <option value="2029" <? IF($_GET['year'] == "2029"){ echo "selected"; } ?>>2029</option>
          <option value="2030" <? IF($_GET['year'] == "2030"){ echo "selected"; } ?>>2030</option>
          <option value="2031" <? IF($_GET['year'] == "2031"){ echo "selected"; } ?>>2031</option>
          <option value="2032" <? IF($_GET['year'] == "2032"){ echo "selected"; } ?>>2032</option>
          <option value="2033" <? IF($_GET['year'] == "2033"){ echo "selected"; } ?>>2033</option>
          <option value="2034" <? IF($_GET['year'] == "2034"){ echo "selected"; } ?>>2034</option>
          <option value="2035" <? IF($_GET['year'] == "2035"){ echo "selected"; } ?>>2035</option>
          <option value="2036" <? IF($_GET['year'] == "2036"){ echo "selected"; } ?>>2036</option>
          <option value="2037" <? IF($_GET['year'] == "2037"){ echo "selected"; } ?>>2037</option>
          <option value="2038" <? IF($_GET['year'] == "2038"){ echo "selected"; } ?>>2038</option>
          <option value="2039" <? IF($_GET['year'] == "2039"){ echo "selected"; } ?>>2039</option>
          <option value="2040" <? IF($_GET['year'] == "2040"){ echo "selected"; } ?>>2040</option>
          <option value="2041" <? IF($_GET['year'] == "2041"){ echo "selected"; } ?>>2041</option>
          <option value="2042" <? IF($_GET['year'] == "2042"){ echo "selected"; } ?>>2042</option>
          <option value="2043" <? IF($_GET['year'] == "2043"){ echo "selected"; } ?>>2043</option>
          <option value="2044" <? IF($_GET['year'] == "2044"){ echo "selected"; } ?>>2044</option>
          <option value="2045" <? IF($_GET['year'] == "2045"){ echo "selected"; } ?>>2045</option>
          <option value="2046" <? IF($_GET['year'] == "2046"){ echo "selected"; } ?>>2046</option>
          <option value="2047" <? IF($_GET['year'] == "2047"){ echo "selected"; } ?>>2047</option>
          <option value="2048" <? IF($_GET['year'] == "2048"){ echo "selected"; } ?>>2048</option>
          <option value="2049" <? IF($_GET['year'] == "2049"){ echo "selected"; } ?>>2049</option>

        </select> </td>
    </tr>
    <tr> 
      <td width="200" height="40" valign="top"><span class="addevent">Event Time</span><br> 
        <span class="addeventextrainfo">(24hr Format)</span></td>
      <td height="40" valign="top"> <input name="hour" type="text" id="hour" value="20" size="2" maxlength="2">
        : 
        <input name="minute" type="text" id="minute" value="00" size="2" maxlength="2"> 
      </td>
    </tr>
    <tr> 
      <td width="200" height="40" valign="top"><span class="addevent">Event Title</span></td>
      <td height="40" valign="top"> <input name="title" type="text" id="title" size="20"> 
      </td>
    </tr>
    <tr> 
      <td width="200" height="40" valign="top"><span class="addevent">Event Description</span></td>
      <td height="40" valign="top"> <textarea name="description" cols="32" rows="5" id="description"></textarea> 
      </td>
    </tr>
    <tr> 
      <td width="200">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
      <td><input name="submit" type="submit" id="submit" value="Add Event"></td>
    </tr></tbody>
  </table>
</form>
</body>
</html>
