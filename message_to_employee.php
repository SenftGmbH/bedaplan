<html>
 <head>
  <title>bedaplan</title>
 </head>
 <body>
 <img src="http://213.23.35.50/bedaplan/bedaplanlogo.jpg">
  <p align="right"><font size="5">Admin - Nachricht an Mitarbeiter</font></p>
<hr>
<br>
<?php
// connect to the database
$db = mysqli_connect("localhost", "username", "password", "database");

// and show if there any errors
if(!$db)
{
  exit("Verbindungsfehler: ".mysqli_connect_error());
}


// get the variables from the mainsite
$message_content = $_POST["message_content"];
$project_employee = $_POST["current_user"];
echo $message_content;
echo $project_employee;
echo "<hr>";
  // set the project start time to the current time
  $bedaplan_query = "UPDATE message SET me_content = '$message_content' WHERE me_employee = '$project_employee'"; 
  $bedaplan_result = mysqli_query($db, $bedaplan_query);

echo $bedaplan_query;

?>
<script type="text/javascript">
     window.setTimeout("this.close()",5000);
        </script>
</body>
