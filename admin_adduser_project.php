<html>
 <head>
  <title>bedaplan Admin - Create Project</title>
 </head>

 <body>
  <img src="http://213.23.35.50/bedaplan/bedaplanlogo.jpg">
  <p align="right"><font size="5">Admin - Benutzer zum Projekt hinzuf&uuml;gen</font></p>
  <hr>
  <!-- Reciving the project data and send it to adduser_project.php -->

  <form action="http://213.23.35.50/bedaplan/adduser_project.php" method="post">
    <p>Projektnummer: <input name="project_nr" type="text" size="30" maxlength="30"></p>
    <select name="project_employee" size="3">
     <option>sbodner</option>
     
    </select>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="submit" value=" Projekt Erstellen ">
  </form>
<p align="right">  
<a href="javascript:window.close()"><img src="close.gif" alt="Fenster schliessen" border=0></a>
</p>
 <body>
</html>
