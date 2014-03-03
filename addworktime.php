<html>
 <head>
  <title>bedaplan</title>
  <meta name="viewport" content="width=500" />
 </head>
 <body>
 <img src="http://213.23.35.50/bedaplan/bedaplanlogo.jpg">
  <p align="right"><font size="5">Admin - Arbeitszeit hinzuf&uuml;gen</font></p>
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

// lets get the date
	$timestamp = time();
	$datum = date("m.Y",$timestamp);

// get the variables from the mainsite
$current_user = $_POST["current_user"];
$wt_start = $_POST["wt_start"];
$wt_stop = $_POST["wt_stop"];
$wt_sort = $_POST["wt_sort"];


$timeget = time(); 
$uhrzeit = date("H:i",$timeget); 

// Without any securty-check we insert the time into the database.


  $bedaplan_query = "INSERT INTO worktime (wt_employee, wt_start, wt_stop, wt_sort) VALUES ('$current_user', '$wt_start' ,'$wt_stop', '$wt_sort')";
  $bedaplan_result = mysqli_query($db, $bedaplan_query);
  // set the status of worktime to 1 
  $bedaplan_query = "UPDATE status SET status_wt = '2' WHERE  status_employee = '$current_user'";
  $bedaplan_result = mysqli_query($db, $bedaplan_query);
  echo "Mitarbeiter: <br>";
  echo $current_user;
  echo "<br><br>Arbeitsbeginn:<br>";
  echo $wt_start;
  echo "<br>Arbeitsende:<br>";
  echo $wt_stop;




?>
<script type="text/javascript">
     window.setTimeout("this.close()",4000);
        </script>
</body>
