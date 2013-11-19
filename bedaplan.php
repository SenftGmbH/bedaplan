
<?php
// connect to the database
$db = mysqli_connect("localhost", "username", "userpassword", "database");

// and show if there any errors
if(!$db)
{
  exit("Verbindungsfehler: ".mysqli_connect_error());
}
	$timestamp = time();
	$datum = date("d.m.Y",$timestamp);
	$bedaplan_query = "SELECT * FROM project WHERE project_date = '$datum' AND project_done = '0' AND project_employee = 'sbodner'";
	$bedaplan_result = mysqli_query($db, $bedaplan_query);
	$row = $bedaplan_result->fetch_assoc();
	$current_nr = $row["project_nr"];
	
?>

<html>
 <head>
  <title>bedaplan</title>
 </head>
 <body background="background.jpg">
 <img src="http://213.23.35.50/bedaplan/bedaplanlogo.jpg">
  <table border="3" frame="void">
   <tr>

      <td width="260">
 	<!-- Kostenstelle hier erfassen -->
	Kostenstelle ausw&auml;len:<br>
	<form action="input_button.htm">
	  <p>
    	   <textarea cols="20" rows="1" name="kostenstelle"></textarea><br>
           <input type="button" name="beton" value="Beton"
           onclick="this.form.kostenstelle.value='Kostenstelle Beton'">
           <input type="button" name="dach" value="Dach"
           onclick="this.form.kostenstelle.value='Kostenstelle Dach'">
          </p>
	  <p>
	    <select name="projektname" size="1">
	     <option>Kreissparkasse</option>
	     <option>Flughafen</option>
	     <option>Halle Nürnberg</option>
	     <option>Bunkerumbau</option>
    	    </select>
          </p>
        </form>
      </td>

<!-- load the project description from the database and show it
     for this compare the projektdate with the current-date and the status
     of the project -->
      <td width="260">
       Projektbeschreibung:<br>
       <textarea cols="20" rows="5" name="projekttext"><?php
	// here we look after the current date        
	$timestamp = time();
	$datum = date("d.m.Y",$timestamp);
	
	// select the project after status, current daten and employee
	$bedaplan_query = "SELECT * FROM project WHERE project_date = '$datum' AND project_done = '0' AND project_employee = 'sbodner'";
	$bedaplan_result = mysqli_query($db, $bedaplan_query);
	$row = $bedaplan_result->fetch_assoc();
	echo $row["project_description"];
        ?>
       </textarea><br>
      </td>

   </tr>


   <tr>

    <td>
	<!-- project planner  -->
	Projektzeit Erfassen:<br>
	<form action="input_button.htm">
	  <p>
    		Aktuelle Projektnummer:
		<?php echo $current_nr; ?><br>
		<!-- here we show the current time in the field and add the timestamp to the database -->
	        <input type="button" name="Ankunft" value="Ankunft"
	        onclick="window.open('http://192.168.100.4/bedaplan/update_projecttime.php?current_nr=<?php echo $current_nr ?>&current_user=sbodner')">
		

		

				
		
	        <input type="button" name="Abfahrt" value="Abfahrt"
	        onclick="window.open('http://192.168.100.4/bedaplan/update_projecttime2.php?current_nr=<?php echo $current_nr ?>&current_user=sbodner')">
          </p>
        </form>
    </td>

    <td>
        Weitere Tagesprojekte:<br>
        - Herten, Deckendurchbruch <br>
 	- Dorsten, 4 Betonbohrungen
    </td>

   </tr>

   <tr>

    <td>
      <!-- work time planner -->
        Arbeitszeit Erfassung:<br>
      	<form action="arbeitszeit.html">
	  <p>
    		
	        <input type="button" name="Arbeitsbeginn" value="Arbeitsbeginn"
	        onclick="window.open('http://192.168.100.4/bedaplan/insert_worktime.php?current_nr=&current_user=sbodner')">
	        <input type="button" name="Arbeitsende" value="Arbeitsende"
	        onclick="window.open('http://192.168.100.4/bedaplan/update_worktime.php?current_nr=&current_user=sbodner')">
                <input type="button" name="Krank" value="Krank"
	        onclick="this.form.textfeld.value='Krank'">
          </p>
        </form>

<!-- Chose the vehicle for the employee -->
	Fahrzeug ausw&ahlen:<br>
	 <input type="button" name="RE-SE-101" value="RE-SE-101"
	        onclick="window.open('http://192.168.100.4/bedaplan/insert_vehicle.php?current_user=sbodner&vehicle=RE-SE-101')">
	 <input type="button" name="RE-SE-102" value="RE-SE-102"
	        onclick="window.open('http://192.168.100.4/bedaplan/insert_vehicle.php?current_user=sbodner&vehicle=RE-SE-102')"><br>
	 <input type="button" name="RE-SE-103" value="RE-SE-103"
	        onclick="window.open('http://192.168.100.4/bedaplan/insert_vehicle.php?current_user=sbodner&vehicle=RE-SE-103')">
	 <input type="button" name="RE-SE-104" value="RE-SE-104"
	        onclick="window.open('http://192.168.100.4/bedaplan/insert_vehicle.php?current_user=sbodner&vehicle=RE-SE-104')"><br>
	 <input type="button" name="RE-SE-105" value="RE-SE-105"
	        onclick="window.open('http://192.168.100.4/bedaplan/insert_vehicle.php?current_user=sbodner&vehicle=RE-SE-105')">

    </td>

    <td> 
	<!-- more functions into this field -->
	
	<form action="input_file.htm" method="post" enctype="multipart/form-data">
	  <p>Bild zum Projekt hinzuf&uuml;gen:<br>
	   <input name="Datei" type="file" size="50" maxlength="100000" accept="text/*">
  	  </p>
	</form>


    </td>

   </tr>

   

  </table>
<font size=1>Projekthomepage: <a href="https://github.com/SenftGmbH" alt="Projektseite">https://github.com/SenftGmbH</a></font>
  
 </body>
</html>
