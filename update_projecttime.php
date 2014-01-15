<html>
 <head>
  <title>bedaplan</title>
<meta name="viewport" content="width=500" />
 </head>
 <body background="background.jpg">
 <img src="http://213.23.35.50/bedaplan/bedaplanlogo.jpg">
<hr>
<br>
<?php
// This PHP start the time monitoring for the project

// connect to the database
$db = mysqli_connect("localhost", "user", "password", "database");

// and show if there any errors
if(!$db)
{
  exit("Verbindungsfehler: ".mysqli_connect_error());
}


// get the variables from the mainsite
$project_nr = $_GET["current_nr"];
$project_employee = $_GET["current_user"];

$timeget = time(); 
$uhrzeit = date("H:i",$timeget); 

// here we query the status of status_wt to look if the employee has logged in yet
$bedaplan_query = "SELECT * FROM status WHERE status_employee = '$project_employee'";
	$bedaplan_result = mysqli_query($db, $bedaplan_query);
	$status_raw = $bedaplan_result->fetch_assoc();
	$status_login = $status_raw["status_pt"];




if ($status_login==1)
 {
 // user is logged in, so show error message
 echo "<b>Mitarbeiter hat sich bereits bei einem Projekt angemeldet !!!</b>";
 }
else
 {
  // here we have a change. now we create the entry and not update it anymore.
  // set the project start time to the current time
  // $bedaplan_query = "UPDATE projecttime SET pt_start= NOW() WHERE pt_nr = '$project_nr'"; 
$bedaplan_query = "INSERT INTO projecttime (pt_nr, pt_employee, pt_start) VALUES ('$project_nr', '$project_employee', NOW())";
  $bedaplan_result = mysqli_query($db, $bedaplan_query);

  // set the project status to working
  $bedaplan_query = "UPDATE project SET project_done='1' WHERE project_nr = '$project_nr'"; 
  $bedaplan_result = mysqli_query($db, $bedaplan_query);
  // set the employee status to 1
  $bedaplan_query = "UPDATE status SET status_pt = '1' WHERE  status_employee = '$project_employee'";
  $bedaplan_result = mysqli_query($db, $bedaplan_query);
  // set the number of persons who work on the projekt higher
  $bedaplan_query = "UPDATE projectuser Set project_users = project_users+1 WHERE project_id = '$project_nr'";
  echo $bedaplan_query;
  $bedaplan_result = mysqli_query($db, $bedaplan_query);


  echo "Projektnummer: <br>";
  echo $project_nr;
  echo "<br><br>Startzeit:<br>";
  echo $uhrzeit;
}

?>
<script type="text/javascript">
     window.setTimeout("this.close()",4000);
        </script>
</body>
