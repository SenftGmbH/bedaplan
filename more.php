
<?php

$mitarbeiter = $_GET["current_user"];
$project = $_GET["project_nr"];

	
?>

<html>
 <head>
  <title>bedaplan</title>
  <meta name="viewport" content="width=500" />

 </head>
 <body background="background.jpg">
 <img src="http://213.23.35.50/bedaplan/bedaplanlogo.jpg">
<br>
<font size="4">Weitere Funktionen f&uuml;r Mitarbeiter: <?php echo $mitarbeiter ?> und Projekt <?php echo $project ?></font>
<br><br>
<center>
<hr>
<form action="http://213.23.35.50/bedaplan/more_worktime_list.php?mitarbeiter=<?php echo $mitarbeiter ?>&" method="post" target="_blank">
           <p>Monat ausw&auml;hlen (03.2013): <input name="worktime_date" type="text" size="30" maxlength="30"></p>
           <input type="submit" value=" Arbeitszeit auflisten ">
          </form>
<hr>
Ausstempeln vergessen, Mitarbeiter wieder freischalten<br>
<input type="button" style="width: 290px"  name="update" value="Arbeitsbeginn freischalten" onclick="window.open('http://213.23.35.50/bedaplan/more_emopen.php?current_employee=<?php echo $mitarbeiter ?>')">

<hr>
 <br>Einen Hinweis zu diesem Tag hinterlegen<br><br>
<input type="button" style="width: 290px"  name="update" value="Tagesnotiz hinzufügen" onclick="window.open('http://213.23.35.50/bedaplan/f_insert_ptinfo.php?current_employee=<?php echo $mitarbeiter ?>&current_nr=<?php echo $project ?>')">

<br><br><br><br>


<p align="center">  
<a href="javascript:window.close()"><img src="hauptseite.jpg" alt="Fenster schliessen" border=0></a>
</p>
</center>  
 </body>
</html>
