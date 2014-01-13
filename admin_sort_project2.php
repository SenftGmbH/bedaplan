<html>
 <head>
  <title>bedaplan Admin - Show Project List</title>
 </head>

 <body>
  <img src="http://213.23.35.50/bedaplan/bedaplanlogo.jpg">
  <p align="right"><font size="5">Admin - Projekte Umsortieren</font></p>
  <hr>
  <!-- Reciving the project data and send it to adduser_project.php -->
  Bitte geben Sie den Mitarbeiter und das Datum ein f&uuml;r die Projektliste<br>
  <form action="http://213.23.35.50/bedaplan/sort_project2.php" method="post">
    <p>Projektnr:<input name="project_nr" type="text" size="30" maxlength="30"></p>
    <p>Mitarbeiter:<input name="project_user" type="text" size="30" maxlength="30"></p>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="submit" value=" Projektliste zeigen ">
  </form>
  
<p align="right">  
<a href="javascript:window.close()"><img src="close.gif" alt="Fenster schliessen" border=0></a>
</p>
 <body>
</html>

