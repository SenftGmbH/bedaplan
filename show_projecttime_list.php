<html>
 <head>
  <title>bedaplan</title>
 </head>
 <body>
 <img src="http://213.23.35.50/bedaplan/bedaplanlogo.jpg">
  <p align="right"><font size="5">Admin - Projektzeitauswertung nach Mitarbeiter</font></p>
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
$sort_date = $_POST["worktime_date"];
$current_employee = $_POST["current_user"];




// create the quere for the worktime of the user
$bedaplan_query = "SELECT * FROM projecttime WHERE pt_employee = '$current_employee'"; 

$bedaplan_result = mysqli_query($db, $bedaplan_query);


// show employee name
echo "Mitarbeiter: <br>";
echo $current_employee;
echo "<br><br>";

// set the total time to 0
$total = 0;

//create the table with the worktime
echo "<table border=1>";

// table headers are here
echo "<tr>";
echo "<td>Projektnummer</td>";
echo "<td>Startzeit</td>";
echo "<td>Endzeit</td>";
echo "<td>Stunden</td>";
echo "</tr>";

while($row = $bedaplan_result->fetch_assoc()) 
    { 
	echo "<tr>";
	echo "<td>";
	echo $row["pt_nr"];
	echo "</td>";

	echo "<td>";
	echo $row["pt_start"];
	echo "</td>";
 	echo "<td>";
	echo $row["pt_stop"];
	echo "</td>";
	echo "<td>";
	$time_difference = strtotime($row["pt_stop"]) - strtotime($row["pt_start"]);
	$total = $total + $time_difference;
	echo round ($time_difference/60/60,2);
	echo "</td>";
	echo "</tr>";
    } 

echo "</table>";
echo "<br><br>";
echo "Totale Arbeitszeit: ";
echo "<b>";
echo round($total/60/60,2);
echo "</b>";



?>
</html>