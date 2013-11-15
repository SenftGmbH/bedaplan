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
$db = mysqli_connect("localhost", "user", "password", "database");

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


$timeget = time(); 
$uhrzeit = date("H:i",$timeget); 
// set the project start time to the current time


$bedaplan_query = "INSERT INTO worktime (wt_employee, wt_start, wt_sort) VALUES ('$current_user',NOW() ,'$datum')";
$bedaplan_result = mysqli_query($db, $bedaplan_query);

echo "Mitarbeiter: <br>";
echo $current_user;
echo "<br><br>Arbeitsbeginn:<br>";
echo $uhrzeit;

?>
<script type="text/javascript">
     window.setTimeout("this.close()",3000);
        </script>
</body>
