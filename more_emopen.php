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
// connect to the database
$db = mysqli_connect("localhost", "dbuser", "dbpassword", "dbname");

// and show if there any errors
if(!$db)
{
  exit("Verbindungsfehler: ".mysqli_connect_error());
}


// get the variables from the mainsite

$current_employee = $_GET["current_employee"];

$timeget = time(); 
$uhrzeit = date("H:i",$timeget); 
$leerzeit = date_create('1971-01-01 0:0:0');
$leer=  date_format($leerzeit, 'Y-m-d H:i:s');






 // set the status of worktime = 2
 $bedaplan_query = "UPDATE worktime SET wt_stop= '1971-01-01 0:0:1' WHERE  wt_employee = '$current_employee' AND wt_stop='$leer'"; 
 $bedaplan_result = mysqli_query($db, $bedaplan_query);
 $bedaplan_query = "UPDATE status SET status_wt = '2' WHERE  status_employee = '$current_employee'";
 $bedaplan_result = mysqli_query($db, $bedaplan_query);
 echo "Mitarbeiter: <br>";
 echo $current_employee;
 echo "<br><br>Status auf <b>abgemeldet</b> gesetzt<br>";
echo $bedaplan_query;


?>
<script type="text/javascript">
     window.setTimeout("this.close()",14000);
        </script>
</html>
