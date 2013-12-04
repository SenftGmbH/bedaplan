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

echo "Schauen wir mal wie viele Zeilen es gibt... <br>";

$bedaplan_query = "SELECT COUNT(*) FROM project WHERE project_nr = 1";
$bedaplan_result = mysqli_query($db, $bedaplan_query);
$result = mysql_fetch_row($bedaplan_result);
echo $result['0'];
echo "<br>Zeilen";

// delete the project from the projectlist
// $bedaplan_query = "DELETE FROM project WHERE project_date = '$project_date' AND project_nr = '$project_nr' AND project_employee = '$project_user'";
// $bedaplan_result = mysqli_query($db, $bedaplan_query);

// here must look if it is the last user so we can delete the project from the userlist or are still someone working on it

  $bedaplan_query = "SELECT * FROM projectuser WHERE project_id = '$project_nr'";
  $bedaplan_result = mysqli_query($db, $bedaplan_query);
  $status_raw = $bedaplan_result->fetch_assoc();
  $nutzerzahl = $status_raw["project_users"];





//  if ($nutzerzahl<=1)
//  {
//   // now delete all rows from projectusers because they are obsolete
//   $bedaplan_query = "DELETE FROM projectuser WHERE project_id = '$project_nr'";
//   $bedaplan_result = mysqli_query($db, $bedaplan_query);
//  }
//  else
//  {
//  // still people working, so decreade the user 
//  $bedaplan_query = "UPDATE projectuser Set project_users = project_users-1 WHERE project_id = '$project_nr'";
//  $bedaplan_result = mysqli_query($db, $bedaplan_query);
//  }




?>
