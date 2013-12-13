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
$db = mysqli_connect("localhost", "username", "password", "database");

// and show if there any errors
if(!$db)
{
  exit("Verbindungsfehler: ".mysqli_connect_error());
}

// lets get the date
	$timestamp = time();
	$datum = date("m.Y",$timestamp);

// get the variables from the mainsite
$current_user = $_GET["current_user"];


$timeget = time(); 
$uhrzeit = date("H:i",$timeget); 
// set the worktime start time to the current time


// here we query the status of status_wt to look if the employee has logged in yet
$bedaplan_query = "SELECT * FROM status WHERE status_employee = '$current_user'";
	$bedaplan_result = mysqli_query($db, $bedaplan_query);
	$status_raw = $bedaplan_result->fetch_assoc();
	$status_login = $status_raw["status_wt"];


if ($status_login==1)
 {
 // user is logged in, so show error message
 echo "<b>Mitarbeiter ist bereits eingeloggt !!!</b>";
 }
else
 {
 //user is not logged in so start the login process
  $bedaplan_query = "INSERT INTO worktime (wt_employee, wt_start, wt_sort) VALUES ('$current_user',NOW() ,'$datum')";
  $bedaplan_result = mysqli_query($db, $bedaplan_query);
  // set the status of worktime to 1 
  $bedaplan_query = "UPDATE status SET status_wt = '1' WHERE  status_employee = '$current_user'";
  $bedaplan_result = mysqli_query($db, $bedaplan_query);
  echo "Mitarbeiter: <br>";
  echo $current_user;
  echo "<br><br>Arbeitsbeginn:<br>";
  echo $uhrzeit;

 }




?>
<script type="text/javascript">
     window.setTimeout("this.close()",4000);
        </script>
</body>
