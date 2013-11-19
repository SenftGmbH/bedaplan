<html>
 <head>
  <title>bedaplan</title>
 </head>
 <body background="background.jpg">
 <img src="http://213.23.35.50/bedaplan/bedaplanlogo.jpg">
<hr>
<br>
<?php
// connect to the database
$db = mysqli_connect("localhost", "username", "userpassword", "database");

// and show if there any errors
if(!$db)
{
  exit("Verbindungsfehler: ".mysqli_connect_error());
}

// lets get the date
	$timestamp = time();
	$datum = date("d.m.Y",$timestamp);

// get the variables from the mainsite
$current_user = $_GET["current_user"];
$vehicle = $_GET["vehicle"];

$timeget = time(); 
$uhrzeit = date("H:i",$timeget); 
// set the project start time to the current time


$bedaplan_query = "INSERT INTO vehicle (vehicle_employee, vehicle_date, vehicle_free) VALUES ('$current_user', '$datum', '$vehicle')";
$bedaplan_result = mysqli_query($db, $bedaplan_query);

echo "Mitarbeiter: <br>";
echo $current_user;
echo "<br><br>Benutzt Auto:<br>";
echo $vehicle;

?>
<script type="text/javascript">
     window.setTimeout("this.close()",5000);
        </script>
</body>
