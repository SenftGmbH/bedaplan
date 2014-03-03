<html>
 <head>
  <title>bedaplan</title>
 </head>
 <body>
 <img src="http://213.23.35.50/bedaplan/bedaplanlogo.jpg">
  <p align="right"><font size="5">Admin - Arbeitszeitauswertung</font></p>
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
$sort_date = $_POST["worktime_date"];
$current_employee = $_POST["current_user"];




// create the quere for the worktime of the user
$bedaplan_query = "SELECT * FROM worktime WHERE wt_employee = '$current_employee' AND wt_sort = '$sort_date'"; 

$bedaplan_result = mysqli_query($db, $bedaplan_query);


// show employee name
echo "Mitarbeiter: <br>";
echo $current_employee;
echo "<br><br>";

// set the total time to 0
$total = 0;

//create the table with the worktime
echo "<table border=1>";

// table headers are here
echo "<tr>";
echo "<td>Arbeitsbeginn</td>";
echo "<td>Arbeitsende</td>";
echo "<td>Stunden</td>";
echo "</tr>";




while($row = $bedaplan_result->fetch_assoc()) 
    { 
	echo "<tr>";
	echo "<td>";
	echo $row["wt_start"];
	echo "</td>";
 	echo "<td>";
	// looking if the employee logged out or it is a running day
	if ($row["wt_stop"] == '1971-01-01 00:00:00')
 	 {
 	  echo "laufend";
         }
	 else
	 {
	  echo $row["wt_stop"];
	 }
	echo "</td>";
	echo "<td>";
	if ($row["wt_stop"] == '1971-01-01 00:00:00')
         {
	  echo "-";
 	 }
	else
 	 {
	  if ($row["wt_stop"] == '1971-01-01 00:00:01')
	   {
	    echo "<font color='red'>Zeitkorrektur erforderlich!!!</font>";
	   }
	   else
	   {
	    $time_difference = strtotime($row["wt_stop"]) - strtotime($row["wt_start"]);
	    // echo gmdate("H:i", $time_difference);
	    $time_difference = $time_difference - 2700;

            if ($time_difference > 28800)
               {
		// echo "Mehr als 8 Stunden";
               }
               else
               {
		// echo "Weniger als 8 Stunden";
               }

	   
	    $total = $total + $time_difference;
	    echo gmdate("H:i", $time_difference);
	    echo "<br>";
	   }	
	 }
	// echo round ($time_difference/60/60,2);
	echo "</td>";
	echo "</tr>";
    } 

echo "</table>";
echo "<br><br>";
echo "Totale Arbeitszeit: ";
echo "<b>";

echo "</b>";
///Old output format, i think invalid
echo "<br> Neues Format:<br>";
$diff = $total;
$factor = intval( $diff/3600 );
$hours = $factor;
$diff  = $diff - $factor*3600;
$factor = intval( $diff/60 );
$minutes = $factor;
$seconds = $diff - ( $factor * 60 );
echo "$hours:$minutes:$seconds \n";



?>
<p align="right">  
<a href="javascript:window.close()"><img src="close.gif" alt="Fenster schliessen" border=0></a>
</p>
</html>
