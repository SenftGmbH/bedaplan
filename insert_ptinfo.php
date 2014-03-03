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
$info_content = $_POST["info_content"];




$bedaplan_query = "UPDATE projecttime Set pt_infotext='$info_content' WHERE pt_nr = '$project_nr' AND pt_employee = '$project_employee'";
  $bedaplan_result = mysqli_query($db, $bedaplan_query);

echo "Mal sehen was wir bekommen:";
echo "<br>";
echo "Projektnummer:";
echo $project_nr;
echo "<br>";
echo "Projektmitarbeiter:";
echo $project_employee;
echo "<br>";
echo "Infotext:";
echo $info_content;
echo "<br><br>";
echo "Und die SQL Abfrage auch noch mal:";
echo $bedaplan_query;


?>
<script type="text/javascript">
     window.setTimeout("this.close()",14000);
        </script>
</html>
