<?php
// connect to the database
$db = mysqli_connect("localhost", "username", "password", "database");

// and show if there any errors
if(!$db)
{
  exit("Verbindungsfehler: ".mysqli_connect_error());
}


// $bedaplan_query = "SELECT url FROM links";

// get the information from the admin page
$project_nr = $_POST["project_nr"];
$project_employee = $_POST["project_employee"];




// take a look at the data
echo "Schauen wir was wir haben:<br><br>";

echo "<br><br>Projektnummer:<br>";
echo $project_nr;
echo "<br><br>von wem:";
echo $project_employee;
// get the description and date from the database
$bedaplan_query = "SELECT * FROM project WHERE project_nr = '$project_nr' AND project_done = '0'";
$bedaplan_result = mysqli_query($db, $bedaplan_query);
$row = $bedaplan_result->fetch_assoc();
$project_description =  $row["project_description"];
$project_date = $row["project_date"];
echo "<br>Zur Kontrolle:<br>";
echo $project_date;
echo $project_description;


// lets insert the data with a sql query
// first query insert the data into the project table and i set the number of users to 1 because the project is new
$bedaplan_query = "INSERT INTO project (project_date, project_nr, project_description, project_employee, project_users, project_done) VALUES ('$project_date', '$project_nr', '$project_description', '$project_employee', '1', '$project_done')";
$bedaplan_result = mysqli_query($db, $bedaplan_query);

// secound query insert the data into the project_time table so that we can work with update in the frontent and must not create a entry
$bedaplan_query = "INSERT INTO projecttime (pt_nr, pt_employee, pt_sort) VALUES ('$project_nr', '$project_employee', '$project_date')";
$bedaplan_result = mysqli_query($db, $bedaplan_query);



?>
