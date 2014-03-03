
<?php
// connect to the database
$db = mysqli_connect("localhost", "dbuser", "dbpassword", "dbname");

// and show if there any errors
if(!$db)
{
  exit("Verbindungsfehler: ".mysqli_connect_error());
}
	$timestamp = time();
	$datum = date("d.m.Y",$timestamp);
	$bedaplan_query = "SELECT * FROM project WHERE project_date = '$datum' AND project_done <= '1' AND project_employee = '$mitarbeiter'";
	$bedaplan_result = mysqli_query($db, $bedaplan_query);
	$row = $bedaplan_result->fetch_assoc();
	$current_nr = $row["project_nr"];
	$mitarbeiter = $_GET["mitarbeiter"];
	
?>

<html>
 <head>
  <title>bedaplan</title>
  <meta name="viewport" content="width=500" />
  <meta http-equiv="refresh" content="60;url=http://213.23.35.50/bedaplan/bedaplanl.php?mitarbeiter=<?php echo $mitarbeiter ?>">
 </head>
 <body background="background.jpg">
 <img src="http://213.23.35.50/bedaplan/bedaplanlogo.jpg">

 <table border="3" frame="void">
  <tr>
   <td width="450">
    <table border=0>
     <tr>
      <td>
	Projektbeschreibung:<br>
       <textarea cols="25" rows="5" name="projekttext"><?php
	// here we look after the current date        
	$timestamp = time();
	$datum = date("d.m.Y",$timestamp);
	
	// select the project after status, current daten and employee
	$bedaplan_query = "SELECT * FROM project WHERE project_date = '$datum' AND project_done < '2' AND project_employee = '$mitarbeiter'";
	$bedaplan_result = mysqli_query($db, $bedaplan_query);
	$row = $bedaplan_result->fetch_assoc();
	echo $row["project_description"];
        ?>
       </textarea><br>
      </td>
      <td>
	Nachricht von der Zentrale:<br>
        <!-- Here is a possiblity to send messages to the employee -->
	<textarea cols="25" rows="5" name="nachricht"><?php
	
	// select the project after status, current daten and employee
	$bedaplan_query = "SELECT * FROM message WHERE me_employee = '$mitarbeiter'";
	$bedaplan_result = mysqli_query($db, $bedaplan_query);
	$row = $bedaplan_result->fetch_assoc();
	echo $row["me_content"];
        ?>
       </textarea><br>
      </td>
     </tr>
    </table>
   </td>
  </tr>
 
  <tr>
   <td>
<!-- project planner  -->
	<center>
	<form action="input_button.htm">
	  <p>
    		Projektzeit Erfassen / Aktuelle Projektnummer:
		<?php echo $current_nr; ?><br>
		<!-- here we show the current time in the field and add the timestamp to the database -->
	        <input type="button" name="Ankunft" value="Ankunft" Style="WIDTH:300" WIDTH="300"  onclick="window.open('http://213.23.35.50/bedaplan/update_projecttime.php?current_nr=<?php echo $current_nr ?>&current_user=<?php echo $mitarbeiter ?>')">
		

		

				
		<br>
	        <input type="button" name="Abfahrt" value="Abfahrt" Style="WIDTH:300" WIDTH="300"
	        onclick="window.open('http://213.23.35.50/bedaplan/update_projecttime2.php?current_nr=<?php echo $current_nr ?>&current_user=<?php echo $mitarbeiter ?>')">

		<br>
          </p>
        </form>
        </center>
   </td>
  </tr>

  <tr>
   <td>
      <!-- work time planner -->

      	<form action="arbeitszeit.html">
	  <p>
    		<center>
		 Arbeitszeit Erfassung:<br>
	        <input type="button" name="Arbeitsbeginn" value="Arbeitsbeginn" Style="WIDTH:300" WIDTH="300"
	        onclick="window.open('http://213.23.35.50/bedaplan/ichkomm.html?current_nr=&current_user=<?php echo $mitarbeiter ?>')"><br>
	        <input type="button" name="Arbeitsende" value="Arbeitsende"Style="WIDTH:300" WIDTH="300"
	        onclick="window.open('http://213.23.35.50/bedaplan/ichgeh.html?current_nr=&current_user=<?php echo $mitarbeiter ?>')"><br>
                <input type="button" name="Krank" value="Krank"Style="WIDTH:300" WIDTH="300"
	        onclick="this.form.textfeld.value='Krank'">
                </center>
          </p>
        </form>
   </td>
  </tr>

  <tr>
   <td>
Fahrzeug ausw&auml;hlen:<br>
	 <input type="button" name="RE" value="RE" Style="WIDTH:110" WIDTH="110"
	        onclick="window.open('http://213.23.35.50/bedaplan/insert_vehicle.php?current_user=<?php echo $mitarbeiter ?>&vehicle=RE')">
	 <input type="button" name="RE value="RE" Style="WIDTH:110" WIDTH="110"
	        onclick="window.open('http://213.23.35.50/bedaplan/insert_vehicle.php?current_user=<?php echo $mitarbeiter ?>&vehicle=RE')">
	 <input type="button" name="RE" value="RE" Style="WIDTH:110" WIDTH="110"
	        onclick="window.open('http://213.23.35.50/bedaplan/insert_vehicle.php?current_user=<?php echo $mitarbeiter ?>&vehicle=RE')">
	 <input type="button" name="RE" value="RE" Style="WIDTH:110" WIDTH="110"
	        onclick="window.open('http://213.23.35.50/bedaplan/insert_vehicle.php?current_user=<?php echo $mitarbeiter ?>&vehicle=RE')"><br>
	 <input type="button" name="RE" value="RE" Style="WIDTH:110" WIDTH="110"
	        onclick="window.open('http://213.23.35.50/bedaplan/insert_vehicle.php?current_user=<?php echo $mitarbeiter ?>&vehicle=RE')">

	 <input type="button" name="RE" value="RE" Style="WIDTH:110" WIDTH="110"
	        onclick="window.open('http://213.23.35.50/bedaplan/insert_vehicle.php?current_user=<?php echo $mitarbeiter ?>&vehicle=RE')">

	 <input type="button" name="RE" value="RE" Style="WIDTH:110" WIDTH="110"
	        onclick="window.open('http://213.23.35.50/bedaplan/insert_vehicle.php?current_user=<?php echo $mitarbeiter ?>&vehicle=RE')">

	 <input type="button" name="RE" value="RE" Style="WIDTH:110" WIDTH="110"
	        onclick="window.open('http://213.23.35.50/bedaplan/insert_vehicle.php?current_user=<?php echo $mitarbeiter ?>&vehicle=RE')"><br>

	 <input type="button" name="RE" value="RE" Style="WIDTH:110" WIDTH="110"
	        onclick="window.open('http://213.23.35.50/bedaplan/insert_vehicle.php?current_user=<?php echo $mitarbeiter ?>&vehicle=RE')">

	 <input type="button" name="RE" value="RE" Style="WIDTH:110" WIDTH="110"
	        onclick="window.open('http://213.23.35.50/bedaplan/insert_vehicle.php?current_user=<?php echo $mitarbeiter ?>&vehicle=RE')">

	 <input type="button" name="RE" value="RE" Style="WIDTH:110" WIDTH="110"
	        onclick="window.open('http://213.23.35.50/bedaplan/insert_vehicle.php?current_user=<?php echo $mitarbeiter ?>&vehicle=RE')">

	 <input type="button" name="RE" value="RE" Style="WIDTH:110" WIDTH="110"
	        onclick="window.open('http://213.23.35.50/bedaplan/insert_vehicle.php?current_user=<?php echo $mitarbeiter ?>&vehicle=RE')"><br>
 
	 <input type="button" name="RE" value="RE" Style="WIDTH:110" WIDTH="110"
	        onclick="window.open('http://213.23.35.50/bedaplan/insert_vehicle.php?current_user=<?php echo $mitarbeiter ?>&vehicle=RE')">

	 <input type="button" name="RE" value="RE" Style="WIDTH:110" WIDTH="110"
	        onclick="window.open('http://213.23.35.50/bedaplan/insert_vehicle.php?current_user=<?php echo $mitarbeiter ?>&vehicle=RE')">

	 <input type="button" name="RE" value="RE" Style="WIDTH:110" WIDTH="110"
	        onclick="window.open('http://213.23.35.50/bedaplan/insert_vehicle.php?current_user=<?php echo $mitarbeiter ?>&vehicle=RE')">



   </td>
  </tr>

  <tr>
   <td>
<!-- further projects of the day appears in this field ... -->
        Weitere Tagesprojekte:
<?php 
        $bedaplan_query = "SELECT * FROM project WHERE project_done = '0' AND project_employee = '$mitarbeiter' AND project_date = '$datum'"; 
        $bedaplan_result = mysqli_query($db, $bedaplan_query);
        //create the table with the active projects
        echo "<table border='3' frame='void'>";
       // table headers are here
       
       while($row = $bedaplan_result->fetch_assoc()) 
        { 
	echo "<tr>";
	
	echo "<td style='width:200px' bgcolor='#FFFFFF'>";
	echo $row["project_description"];
	echo "</td>";
	
	echo "</td>";
	echo "</tr>";
        } 

       echo "</table>";

?>
   </td>
  </tr>

 </table>

<font size=1>Projekthomepage: <a href="https://github.com/SenftGmbH" alt="Projektseite">https://github.com/SenftGmbH</a><br>
bedaplan version 1 03.12.2013
</font>
  
 </body>
</html>
