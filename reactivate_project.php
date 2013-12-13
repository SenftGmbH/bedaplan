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
$project_date = $_POST["project_date"];
$project_user = $_POST["project_user"];




// take a look at the data
echo "Schauen wir was wir haben:<br><br>";

echo "<br><br>Projektnummer:<br>";
echo $project_nr;
echo "<br><br>von wem:";
echo $project_user;


// lets insert the data with a sql query
// first query insert the data into the project table and i set the number of users to 1 because the project is new
$bedaplan_query = "UPDATE project SET project_date = '$project_date' WHERE project_nr = '$project_nr' AND project_employee = '$project_user'";
$bedaplan_result = mysqli_query($db, $bedaplan_query);
$bedaplan_query = "UPDATE project SET project_done = '0' WHERE project_nr = '$project_nr' AND project_employee = '$project_user'";
$bedaplan_result = mysqli_query($db, $bedaplan_query);
echo "Den STring zum Update ...:<br>";
echo $bedaplan_query;
// secound query insert the data into the project_time table so that we can work with update in the frontent and must not create a entry
$bedaplan_query = "INSERT INTO projecttime (pt_nr, pt_employee, pt_sort) VALUES ('$project_nr', '$project_user', '$project_date')";
$bedaplan_result = mysqli_query($db, $bedaplan_query);



?>

