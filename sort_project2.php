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

// get the data from the form
$project_nr = $_POST["project_nr"];
$project_employee = $_POST["project_user"];



echo $project_nr;
echo $project_employee;
// get the old line from the database
$bedaplan_query = "SELECT * FROM project WHERE project_done = '0' AND project_employee = '$project_employee' AND project_nr = '$project_nr'"; 

$bedaplan_result = mysqli_query($db, $bedaplan_query);

echo $bedaplan_query;
$row1 = $bedaplan_result->fetch_assoc();
$p1 = $row1["project_date"];
$p2 = $row1["project_nr"];
$p3 = $row1["project_description"];
$p4 = $row1["project_employee"];
$p5 = $row1["project_done"];

  $bedaplan_query = "UPDATE project SET project_done='2' WHERE project_nr = '$project_nr' AND project_employee = '$project_employee'"; 
  $bedaplan_result = mysqli_query($db, $bedaplan_query);

$bedaplan_query = "SELECT * FROM project WHERE project_done = '0' AND project_employee = '$project_employee' AND project_nr = '$project_nr'"; 
$bedaplan_result = mysqli_query($db, $bedaplan_query);


$bedaplan_2 = "INSERT INTO project (project_date, project_nr, project_description, project_employee, project_users, project_done) VALUES ('$p1', '$p2', '$p3', '$p4', '1', '$p5')";
$bedaplanresult_2 = mysqli_query($db, $bedaplan_2);
echo $bedaplan_2;



?>
<p align="right">  
<a href="javascript:window.close()"><img src="close.gif" alt="Fenster schliessen" border=0></a>
</p>
</html>
