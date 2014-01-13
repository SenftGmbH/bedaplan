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

      <td width="420">
	<b>Projektverwaltung</b><br>

	
	 <input type="button" style="width: 190px"  name="Erstelle" value="Projekt Erstellen" onclick="window.open('http://192.168.100.4/bedaplan/admin_create_project.php')">
	 <input type="button" style="width: 190px"  name="Laufend" value="Zeige laufende Projekte" onclick="window.open('http://192.168.100.4/bedaplan/show_active_project.php')"><br>
		 <input type="button" style="width: 190px"  name="Geplant" value="Zeige geplante Projekte" onclick="window.open('http://192.168.100.4/bedaplan/show_future_project.php')">
		 <input type="button" style="width: 190px"  name="Geplant-Entfernen" value="L&ouml;sche geplantes Projekt" onclick="window.open('http://192.168.100.4/bedaplan/delete_future_project.php')"><br>
	 <input type="button" style="width: 190px"  name="update" value="Benutzer hinzuf&uuml;gen" onclick="window.open('http://192.168.100.4/bedaplan/admin_adduser_project.php')">
<input type="button" style="width: 190px"  name="update" value="Projekt wieder aktivieren" onclick="window.open('http://192.168.100.4/bedaplan/admin_reactivate_project.php')"><br>
<input type="button" style="width: 190px"  name="update" value="Projektliste nach Mitarbeiter" onclick="window.open('http://192.168.100.4/bedaplan/admin_sort_project.php')">
<input type="button" style="width: 190px"  name="update" value="Projektliste Umsortieren" onclick="window.open('http://192.168.100.4/bedaplan/admin_sort_project2.php')">
<input type="button" style="width: 190px"  name="update" value="Projekt verl&auml;ngern" onclick="window.open('http://192.168.100.4/bedaplan/admin_addmore_project.php')">


<br><br><br><br><br>
      </td>



      <td width="420" valign="top">
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

      <td width="420" valign="top">
	  <b>Arbeitszeit Auswertung</b>
	  <form action="http://192.168.100.4/bedaplan/show_worktime_list.php" method="post" target="_blank">
           <p>Monat ausw&auml;hlen (03.2013): <input name="worktime_date" type="text" size="30" maxlength="30" value="01.2014"></p>
	   <select name="current_user" size="3">
 	      <option>sbodner</option>
              

           </select>
           <input type="submit" value=" Arbeitszeit auflisten ">
          </form>
          <input type="button" style="width: 290px"  name="update" value="Arbeitszeit manuell hinzuf&uuml;gen" onclick="window.open('http://192.168.100.4/bedaplan/admin_addworktime.php')">
          <input type="button" style="width: 290px"  name="update" value="Anwesende Mitarbeiter" onclick="window.open('http://192.168.100.4/bedaplan/show_logedin_list.php')">
      </td>

      <td width="420" valign="top">
	<b>Projektzeit Auswertung nach Mitarbeiter</b><br>
	
	  <form action="http://192.168.100.4/bedaplan/show_projecttime_list.php" method="post" target="_blank">
         
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

      <td width="420" valign="top">
Heute Krank:<br>
<?php
// connect to the database
$db = mysqli_connect("localhost", "user", "password", "database");

// and show if there any errors
if(!$db)
{
  exit("Verbindungsfehler: ".mysqli_connect_error());
}
	$timestamp = time();
	$datum = date("d.m.Y",$timestamp);
$bedaplan_query = "SELECT * FROM ill WHERE ill_date = '$datum'"; 
$bedaplan_result = mysqli_query($db, $bedaplan_query);
       
       while($row = $bedaplan_result->fetch_assoc()) 
        { 
	echo $row["ill_user"];
	echo "<br>";
  	}
?>
      </td>

      <td width="420" valign="top">
Heute Urlaub/Frei:<br>
<?php
// connect to the database
$db = mysqli_connect("localhost", "user", "password", "database");

// and show if there any errors
if(!$db)
{
  exit("Verbindungsfehler: ".mysqli_connect_error());
}
	$timestamp = time();
	$datum = date("d.m.Y",$timestamp);
$bedaplan_query = "SELECT * FROM free WHERE free_date = '$datum'"; 
$bedaplan_result = mysqli_query($db, $bedaplan_query);
       
       while($row = $bedaplan_result->fetch_assoc()) 
        { 
	echo $row["free_user"];
	echo "<br>";
  	}
?>
      </td>

   </tr>



</table>

 <body>
</html>
