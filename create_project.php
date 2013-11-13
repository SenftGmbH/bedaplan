<?php
// connect to the database
$db = mysqli_connect("localhost", "user", "password", "database");

// and show if there any errors
if(!$db)
{
  exit("Verbindungsfehler: ".mysqli_connect_error());
}


// $bedaplan_query = "SELECT url FROM links";

// get the information from the admin page
$project_date = $_POST["project_date"];
$project_nr = $_POST["project_nr"];
$project_description = $_POST["project_description"];
$project_employee = $_POST["project_employee"];

// take a look at the data
echo "Schauen wir was wir haben:<br><br>";
echo "Datum:<br>";
echo $project_date;
echo "<br><br>Projektnummer:<br>";
echo $project_nr;
echo "<br><br>Was ist zu tun:<br>";
echo $project_description;
echo "<br><br>von wem:";
echo $project_employee;

// lets insert the data with a sql query

$bedaplan_query = "INSERT INTO project (project_date, project_nr, project_description, project_employee) VALUES ('$project_date', '$project_nr', '$project_description', '$project_employee')";
$bedaplan_result = mysqli_query($db, $bedaplan_query);



?>
