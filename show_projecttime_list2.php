<html>
 <head>
  <title>bedaplan</title>
 </head>
 <body>
 <img src="http://213.23.35.50/bedaplan/bedaplanlogo.jpg">
  <p align="right"><font size="5">Admin - Projektzeitauswertung nach Projektnummer</font></p>
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
$project_nr = $_POST["project_nr"];





// create the quere for the list of employees of the project
$bedaplan_query = "SELECT * FROM projecttime WHERE pt_nr = '$project_nr'"; 

$bedaplan_result = mysqli_query($db, $bedaplan_query);




// set the total time to 0
$total = 0;

//create the table with the worktime
echo "<table border=1>";

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
	echo $row["pt_employee"];
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
