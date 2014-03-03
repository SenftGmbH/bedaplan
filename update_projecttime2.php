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
// This PHP stop the projecttime and close the project

// connect to the database
$db = mysqli_connect("localhost", "dbuser", "dbpassword", "dbname");

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




if ($status_login==2)
 {
 // user is logged out, so show error message
 echo "<b>Mitarbeiter hat sich bereits bei einem Projekt abgemeldet !!!</b>";
 }
else
 {
  // set the project stop time to the current time
  $bedaplan_query = "UPDATE projecttime SET pt_stop= NOW() WHERE pt_nr = '$project_nr'"; 
  $bedaplan_result = mysqli_query($db, $bedaplan_query);


  echo "<b>Mitarbeiter wurde am Projekt abgemeldet</b>";


  $bedaplan_query = "UPDATE projectuser Set project_users = project_users-1 WHERE project_id = '$project_nr'";
  $bedaplan_result = mysqli_query($db, $bedaplan_query);

  // here must look if it is the last user on the project, so that we can close it

  $bedaplan_query = "SELECT * FROM projectuser WHERE project_id = '$project_nr'";
  $bedaplan_result = mysqli_query($db, $bedaplan_query);
  $status_raw = $bedaplan_result->fetch_assoc();
  $nutzerzahl = $status_raw["project_users"];
  if ($nutzerzahl==0)
  
  // set the project to closed
  $bedaplan_query = "UPDATE project SET project_done='2' WHERE project_nr = '$project_nr' AND project_employee = '$project_employee'"; 
  $bedaplan_result = mysqli_query($db, $bedaplan_query);
 


 

 // set the employee status to 2
  $bedaplan_query = "UPDATE status SET status_pt = '2' WHERE  status_employee = '$project_employee'";
  $bedaplan_result = mysqli_query($db, $bedaplan_query);


}
?>
<script type="text/javascript">
     window.setTimeout("this.close()",4000);
        </script>
</html>
