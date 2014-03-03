


<?php
$sort_date = $_POST["worktime_date"];
$current_employee = $_POST["current_user"];
$host = 'localhost';
$user = 'dbuser';
$pass = 'dbpassword';
$db = 'tbname';
$table = 'worktime';
$file = 'export';
 
$link = mysql_connect($host, $user, $pass) or die("Can not connect." . mysql_error());
mysql_select_db($db) or die("Can not connect.");
 
$result = mysql_query("SHOW COLUMNS FROM ".$table."");
if (mysql_num_rows($result) > 0) {
 while ($row = mysql_fetch_assoc($result)) {
  $csv_output .= $row['Field'].", ";
  $i++;
 }
}
$csv_output .= "\n";
 
$values = mysql_query("SELECT * FROM ".$table." WHERE wt_employee = '".$current_employee."' AND wt_sort = '".$sort_date."' ");
while ($rowr = mysql_fetch_row($values)) {
 for ($j=0;$j<$i;$j++) {
  $csv_output .= $rowr[$j].", ";
 }
 $csv_output .= "\n";
}
 
$filename = $file."_".date("Y-m-d_H-i",time());
header("Content-type: application/vnd.ms-excel");
header("Content-disposition: csv" . date("Y-m-d") . ".csv");
header("Content-disposition: filename=".$filename.".csv");
print $csv_output;
exit;
?>
