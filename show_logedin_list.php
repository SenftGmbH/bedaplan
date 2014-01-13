<html>
 <head>
  <title>bedaplan</title>
 </head>
 <body>
 <img src="http://213.23.35.50/bedaplan/bedaplanlogo.jpg">
  <p align="right"><font size="5">Admin - Angemeldete Mitarbeiter</font></p>
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


$bedaplan_query = "SELECT * FROM status WHERE status_wt = '1'"; 

$bedaplan_result = mysqli_query($db, $bedaplan_query);
echo "Anzeige der aktuell eingestempelten Mitarbeiter: <br><br><br>";
echo "<table border=1>";

// table headers are here
echo "<tr>";
echo "<td>Startzeit</td>";
echo "<td>Mitarbeiter</td>";
echo "</tr>";

// lets show the data for the logged in employees
while($row = $bedaplan_result->fetch_assoc()) 
   {
	$suche = $row["status_employee"];
	$bedaplan_query2 = "SELECT * FROM worktime WHERE wt_employee = '$suche' AND wt_stop = '1971-01-01 00:00:00'"; 
	$bedaplan_result2 = mysqli_query($db, $bedaplan_query2);
	$row2 = $bedaplan_result2->fetch_assoc();
	$starttime = $row2["wt_start"];
	echo "<tr>";
	echo "<td>";
	echo $starttime;
	echo "</td>";
 	echo "<td>";
	echo $row["status_employee"];

	echo "</td>";
	echo "</tr>";

    } 

echo "</table>";
?>
<p align="right">  
<a href="javascript:window.close()"><img src="close.gif" alt="Fenster schliessen" border=0></a>
</p>
</html>
