<?php
// connect to the database
$db = mysqli_connect("localhost", "dbuser", "dbpassword", "dbname");

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
$project_done = '0';
$map = $_POST["map"];

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
// first query insert the data into the project table and i set the number of users to 1 because the project is new
$bedaplan_query = "INSERT INTO project (project_date, project_nr, project_description, project_employee, project_users, project_done, map) VALUES ('$project_date', '$project_nr', '$project_description', '$project_employee', '1', '$project_done', '$map')";
$bedaplan_result = mysqli_query($db, $bedaplan_query);


// this function i plan not to use anymore. the timetable should pe creates with each time-update. 29.11.2013 a.nitschke
// secound query insert the data into the project_time table so that we can work with update in the frontent and must not create a entry
// $bedaplan_query = "INSERT INTO projecttime (pt_nr, pt_employee, pt_sort) VALUES ('$project_nr', '$project_employee', '$project_date')";
// $bedaplan_result = mysqli_query($db, $bedaplan_query);



// now we add the project to the project_users so we can see how much people work on the project
$bedaplan_query = "INSERT INTO projectuser (project_id, project_users) VALUES ('$project_nr', '0')";
$bedaplan_result = mysqli_query($db, $bedaplan_query);



?>
<p align="right">  
<a href="javascript:window.close()"><img src="close.gif" alt="Fenster schliessen" border=0></a>
</p>
