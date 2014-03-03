<html>
 <head>
  <title>bedaplan</title>
  <meta name="viewport" content="width=500" />
 </head>
 <body>
 <img src="http://213.23.35.50/bedaplan/bedaplanlogo.jpg">
  <p align="right"><font size="5">Admin - Datei einem Projekt zuordnen</font></p>
  <hr>
<br>
<?php
// connect to the database
$db = mysqli_connect("localhost", "dbuser", "dbpassword", "dblogin");

// and show if there any errors
if(!$db)
{
  exit("Verbindungsfehler: ".mysqli_connect_error());
}



// get the variables from the mainsite
$filename = $_GET["filename"];
$project_nr = $_POST["project_nr"];


// Without any securty-check we insert the time into the database.


 $bedaplan_query = "UPDATE project SET project_free1='$filename' WHERE project_nr = '$project_nr' "; 
 $bedaplan_result = mysqli_query($db, $bedaplan_query);
  echo "Dateiname: <br>";
  echo $filename;
  echo "<br><br>Projektnummer:<br>";
  echo $project_nr;
//  echo "<br>Datenbankabfrage:<br>";
//  echo $bedaplan_query;;




?>
<script type="text/javascript">
     window.setTimeout("this.close()",4000);
        </script>
</body>
