
<?php

$mitarbeiter = $_GET["current_user"];
$current_nr = $_GET["current_nr"];
	
?>

<html>
 <head>
  <title>bedaplan</title>
  <meta name="viewport" content="width=500" />
  <meta http-equiv="refresh" content="60;url=http://213.23.35.50/bedaplan/bedaplan1.php?mitarbeiter=<?php echo $mitarbeiter ?>">
 </head>
 <body background="background.jpg">
 <img src="http://213.23.35.50/bedaplan/bedaplanlogo.jpg">
Arbeitsbeginn f&uuml;r Mitarbeiter <?php echo $mitarbeiter ?>
<br><br>
<center>
 <a href="http://213.23.35.50/bedaplan/update_worktime.php?current_user=<?php echo $mitarbeiter ?>"  target="_blank"><img src="arbeitsende.jpg" border=0></a><br><br><br>

 <a href="javascript:window.close()"><img src="hauptseite.jpg" border=0></a>
</center>  
 </body>
</html>
