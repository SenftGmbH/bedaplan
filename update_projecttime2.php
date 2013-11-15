<html>
 <head>
  <title>bedaplan</title>
 </head>
 <body background="background.jpg">
 <img src="http://213.23.35.50/bedaplan/bedaplanlogo.jpg">
<hr>
<br>
<?php
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
// set the project start time to the current time
$bedaplan_query = "UPDATE projecttime SET pt_stop= NOW() WHERE pt_nr = '$project_nr'"; 
$bedaplan_result = mysqli_query($db, $bedaplan_query);

// set the project to closed
$bedaplan_query = "UPDATE project SET project_done='1' WHERE project_nr = '$project_nr'"; 
$bedaplan_result = mysqli_query($db, $bedaplan_query);

echo "Projektnummer: <br>";
echo $project_nr;
echo "<br><br>Endzeitzeit:<br>";
echo $uhrzeit;

?>
<script type="text/javascript">
     window.setTimeout("this.close()",3000);
        </script>
</html>
