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
$project_nr = $_POST["project_nr"];
$project_date = $_POST["project_date"];
$project_user = $_POST["project_user"];




// take a look at the data
echo "Schauen wir was wir haben:<br><br>";

echo "<br><br>Projektnummer:<br>";
echo $project_nr;
echo "<br><br>von wem:";
echo $project_user;


// delete the project from the projectlist
$bedaplan_query = "DELETE FROM project WHERE project_date = '$project_date' AND project_nr = '$project_nr' AND project_employee = '$project_user'";
$bedaplan_result = mysqli_query($db, $bedaplan_query);





?>
