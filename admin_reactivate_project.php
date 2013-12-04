<html>
 <head>
  <title>bedaplan Admin - Create Project</title>
 </head>

 <body>
  <img src="http://213.23.35.50/bedaplan/bedaplanlogo.jpg">
  <p align="right"><font size="5">Admin - Projekt wieder aktivieren</font></p>
  <hr>
  <!-- Reciving the project data and send it to adduser_project.php -->

  <form action="http://213.23.35.50/bedaplan/reactivate_project.php" method="post">
    <p>Projektnummer: <input name="project_nr" type="text" size="30" maxlength="30"></p>
    <p>Projektdatum:<input name="project_date" type="text" size="30" maxlength="30"></p>
    <p>Mitarbeiter:<input name="project_user" type="text" size="30" maxlength="30"></p>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="submit" value=" Projekt aktivieren ">
  </form>
  

 <body>
</html>
