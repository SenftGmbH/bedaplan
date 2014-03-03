<html>
 <head>
  <title>bedaplan</title>
 </head>
 <body>
 <img src="http://213.23.35.50/bedaplan/bedaplanlogo.jpg">
  <p align="right"><font size="5">Admin - Laufende Projekte</font></p>
<hr>
<br>
<?php
// connect to the database
$db = mysqli_connect("localhost", "dbuser", "dbpassword", "dbname");

// and show if there any errors
if(!$db)
{
  exit("Verbindungsfehler: ".mysqli_connect_error());
}






// create the quere for the worktime of the user
$bedaplan_query = "SELECT * FROM project WHERE project_done = '0'"; 

$bedaplan_result = mysqli_query($db, $bedaplan_query);

echo "Bitte das Projekt zum l&ouml;schen angeben:<br><br>";
echo" <form action='http://213.23.35.50/bedaplan/delete_project.php' method='post'>";
echo"    <p>Projektnummer: <input name='project_nr' type='text' size='30' maxlength='30'></p>";
echo"    <p>Projektdatum:<input name='project_date' type='text' size='30' maxlength='30'></p>";
echo"    <p>Mitarbeiter:<input name='project_user' type='text' size='30' maxlength='30'></p>";
echo"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
echo"<input type='submit' value=' Projekt l&ouml;schen '>";
echo"  </form> ";
echo "<hr>";

echo "Geplante Projekte:<br><br>";
//create the table with the active projects
echo "<table border=1>";

// table headers are here
echo "<tr>";
echo "<td>Projektdatum</td>";
echo "<td>Projektnummer</td>";
echo "<td>Projektbeschreibung</td>";
echo "<td>Projektmitarbeiter</td>";
echo "</tr>";

while($row = $bedaplan_result->fetch_assoc()) 
    { 
	echo "<tr>";
	echo "<td>";
	echo $row["project_date"];
	echo "</td>";
 	echo "<td style='width:100px'>";
	echo $row["project_nr"];
	echo "</td>";
	echo "<td style='width:300px'>";
	echo $row["project_description"];
	echo "</td>";
	echo "<td style='width:200px'>";
	echo $row["project_employee"];
	echo "</td>";
	echo "</tr>";
    } 

echo "</table>";



?>
<p align="right">  
<a href="javascript:window.close()"><img src="close.gif" alt="Fenster schliessen" border=0></a>
</p>
</html>
