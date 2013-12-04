<html>
 <head>
  <title>bedaplan Admin - &Uuml;bersichtsseite</title>
 </head>

 <body>
  <img src="http://213.23.35.50/bedaplan/bedaplanlogo.jpg">
  <p align="right"><font size="5">Admin - &Uuml;bersichtsseite</font></p>
  <hr>
  <!-- this is the main page of the admin interface -->

<table border="3" frame="void">
   <tr>

      <td width="340">
	<b>Projektverwaltung</b><br>

	
	 <input type="button" style="width: 165px"  name="Erstelle" value="Projekt Erstellen" onclick="window.open('http://192.168.100.4/bedaplan/admin_create_project.php')">
	 <input type="button" style="width: 165px"  name="Laufend" value="Zeige laufende Projekte" onclick="window.open('http://192.168.100.4/bedaplan/show_active_project.php')"><br>
		 <input type="button" style="width: 165px"  name="Geplant" value="Zeige geplante Projekte" onclick="window.open('http://192.168.100.4/bedaplan/show_future_project.php')">
		 <input type="button" style="width: 165px"  name="Geplant-Entfernen" value="L&ouml;sche geplantes Projekt" onclick="window.open('http://192.168.100.4/bedaplan/delete_future_project.php')"><br>
	 <input type="button" style="width: 165px"  name="update" value="Benutzer hinzuf&uuml;gen" onclick="window.open('http://192.168.100.4/bedaplan/admin_adduser_project.php')">
<input type="button" style="width: 165px"  name="update" value="Projekt wieder aktivieren" onclick="window.open('http://192.168.100.4/bedaplan/admin_reactivate_project.php')">
<br><br><br><br><br>
      </td>



      <td width="340">
	<b>Nachricht an Mitarbeiter</b>
	 <form action="http://192.168.100.4/bedaplan/message_to_employee.php" method="post">
           <input name="message_content" type="text" size="30" maxlength="64">
	   <select name="current_user" size="3">
 	      <option>sbodner</option>
   
           </select>
           <input type="submit" value=" Nachricht zustellen ">
          </form>
      </td>

   </tr>

   <tr>

      <td width="340">
	  <b>Arbeitszeit Auswertung</b>
	  <form action="http://192.168.100.4/bedaplan/show_worktime_list.php" method="post">
           <p>Monat ausw&auml;hlen (03.2013): <input name="worktime_date" type="text" size="30" maxlength="30"></p>
	   <select name="current_user" size="3">
 	      <option>sbodner</option>
     
           </select>
           <input type="submit" value=" Arbeitszeit auflisten ">
          </form>
	<br><br><br><br>
      </td>

      <td width="340">
	<b>Projektzeit Auswertung nach Mitarbeiter</b><br>
	
	  <form action="http://192.168.100.4/bedaplan/show_projecttime_list.php" method="post">
         
	   <select name="current_user" size="3">
 	      <option>sbodner</option>
       
           </select>
           <input type="submit" value=" Projektzeit auflisten ">
          </form>
	<hr>
	<b>Projektzeit Auswertung nach Projektnummer</b>
	  <form action="http://192.168.100.4/bedaplan/show_projecttime_list2.php" method="post">
         
	   <p>Projektnummer eingeben: <input name="project_nr" type="text" size="30" maxlength="30"></p>
           <input type="submit" value=" Projektzeit auflisten ">
          </form>


      </td>

   </tr>


   <tr>

      <td width="340">
      </td>

      <td width="340">
      </td>

   </tr>



</table>
  

 <body>
</html>
