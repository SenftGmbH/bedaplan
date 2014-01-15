<html>
 <head>
  <title>bedaplan</title>
<meta name="viewport" content="width=500" />
 </head>
 <body background="background.jpg">
 <img src="http://213.23.35.50/bedaplan/bedaplanlogo.jpg">
<hr>
<br>
<?php
// connect to the database
$db = mysqli_connect("localhost", "user", "password", "database");

// and show if there any errors
if(!$db)
{
  exit("Verbindungsfehler: ".mysqli_connect_error());
}


// get the variables from the mainsite

$current_employee = $_GET["current_user"];

$timeget = time(); 
$uhrzeit = date("H:i",$timeget); 
$leerzeit = date_create('1971-01-01 0:0:0');
$leer=  date_format($leerzeit, 'Y-m-d H:i:s');


// here we query the status of status_wt to look if the employee has logged in yet
$bedaplan_query = "SELECT * FROM status WHERE status_employee = '$current_employee'";
	$bedaplan_result = mysqli_query($db, $bedaplan_query);
	$status_raw = $bedaplan_result->fetch_assoc();
	$status_login = $status_raw["status_wt"];


if ($status_login==2)
 {
 // user is logged in, so show error message
 echo "<b>Mitarbeiter hat sich bereits abgemeldet !!!</b>";
 }
else
 {
 //user is logged in so start the logout process
 // look for an empty time of the employee and write the current time as endtime
 $bedaplan_query = "UPDATE worktime SET wt_stop= NOW() WHERE  wt_employee = '$current_employee' AND wt_stop='$leer'"; 
 $bedaplan_result = mysqli_query($db, $bedaplan_query);
 // set the status of worktime = 2
 $bedaplan_query = "UPDATE status SET status_wt = '2' WHERE  status_employee = '$current_employee'";
 $bedaplan_result = mysqli_query($db, $bedaplan_query);
 echo "Mitarbeiter: <br>";
 echo $current_employee;
 echo "<br><br>Endzeitzeit:<br>";
 echo $uhrzeit;
 }

?>
<script type="text/javascript">
     window.setTimeout("this.close()",4000);
        </script>
</html>
