<html>
 <head>
  <title>bedaplan Admin - Create Project</title>
 </head>

 <body>
  <img src="http://213.23.35.50/bedaplan/bedaplanlogo.jpg">
  <p align="right"><font size="5">Admin - Arbeitszeit nachtr&auml;glich hinzuf&uuml;gen</font></p>
  <hr>
  <!-- Reciving the worktime and send it to addworktime.php -->

  <form action="http://213.23.35.50/bedaplan/addworktime.php" method="post">
    <p>Arbeitszeit Start: <input name="wt_start" type="text" size="30" maxlength="30" value="2014-01-13 16:00:00"></p>
    <p>Arbeitszeit Ende: <input name="wt_stop" type="text" size="30" maxlength="30" value="2014-01-13 16:00:00"></p>
    <p>Arbeitszeit Monat: <input name="wt_sort" type="text" size="30" maylenght="30" value="01.2014"></p>
    <select name="current_user" size="3">
     <option>sbodner</option>
     

    </select>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="submit" value=" Arbeitszeit hinzufügen ">
  </form>
<p align="right">  
<a href="javascript:window.close()"><img src="close.gif" alt="Fenster schliessen" border=0></a>
</p>
 <body>
</html>
