
<?php
// connect to the database
$db = mysqli_connect("localhost", "username", "password", "database");

// and show if there any errors
if(!$db)
{
  exit("Verbindungsfehler: ".mysqli_connect_error());
}
$mitarbeiter = $_GET["mitarbeiter"];
	$timestamp = time();
	$datum = date("d.m.Y",$timestamp);
	$bedaplan_query = "SELECT * FROM project WHERE project_date = '$datum' AND project_done <= '1' AND project_employee = '$mitarbeiter'";
	$bedaplan_result = mysqli_query($db, $bedaplan_query);
	$row = $bedaplan_result->fetch_assoc();
	$current_nr = $row["project_nr"];
	
	
?>

<html>
 <head>
  <title>bedaplan</title>
  <meta name="viewport" content="width=500" />
  <meta http-equiv="refresh" content="60;url=http://213.23.35.50/bedaplan/bedaplan1.php?mitarbeiter=<?php echo $mitarbeiter ?>">
 </head>
 <body background="background.jpg">

 <img src="http://213.23.35.50/bedaplan/bedaplanlogo.jpg">

 <table border="3" frame="void">
  <tr>
   <td width="450">
    <table border=0>
     <tr>
      <td>
	Projektbeschreibung:<?php echo "$current_nr"; ?><br>
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
	        onclick="window.open('http://213.23.35.50/bedaplan/insert_worktime.php?current_nr=&current_user=<?php echo $mitarbeiter ?>')"><br>
	        <input type="button" name="Arbeitsende" value="Arbeitsende"Style="WIDTH:300" WIDTH="300"
	        onclick="window.open('http://213.23.35.50/bedaplan/update_worktime.php?current_nr=&current_user=<?php echo $mitarbeiter ?>')"><br>
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
	 <input type="button" name="RE-SE-428" value="RE-SE-428" Style="WIDTH:110" WIDTH="110"
	        onclick="window.open('http://213.23.35.50/bedaplan/insert_vehicle.php?current_user=<?php echo $mitarbeiter ?>&vehicle=RE-SE-428')">
	 <input type="button" name="RE-SE-102" value="RE-SE-426" Style="WIDTH:110" WIDTH="110"
	        onclick="window.open('http://213.23.35.50/bedaplan/insert_vehicle.php?current_user=<?php echo $mitarbeiter ?>&vehicle=RE-SE-426')">
	 <input type="button" name="RE-SE-103" value="RE-SE-354" Style="WIDTH:110" WIDTH="110"
	        onclick="window.open('http://213.23.35.50/bedaplan/insert_vehicle.php?current_user=<?php echo $mitarbeiter ?>&vehicle=RE-SE-354')">
	 <input type="button" name="RE-SE-104" value="RE-SE-1060" Style="WIDTH:110" WIDTH="110"
	        onclick="window.open('http://213.23.35.50/bedaplan/insert_vehicle.php?current_user=<?php echo $mitarbeiter ?>&vehicle=RE-SE-1060')"><br>
	 <input type="button" name="RE-SE-105" value="RE-SE-355" Style="WIDTH:110" WIDTH="110"
	        onclick="window.open('http://213.23.35.50/bedaplan/insert_vehicle.php?current_user=<?php echo $mitarbeiter ?>&vehicle=RE-SE-355')">

	 <input type="button" name="RE-SE-105" value="RE-SE-1030" Style="WIDTH:110" WIDTH="110"
	        onclick="window.open('http://213.23.35.50/bedaplan/insert_vehicle.php?current_user=<?php echo $mitarbeiter ?>&vehicle=RE-SE-1030')">

	 <input type="button" name="RE-SE-105" value="RE-SE-131" Style="WIDTH:110" WIDTH="110"
	        onclick="window.open('http://213.23.35.50/bedaplan/insert_vehicle.php?current_user=<?php echo $mitarbeiter ?>&vehicle=RE-SE-131')">

	 <input type="button" name="RE-SE-105" value="RE-SE-206" Style="WIDTH:110" WIDTH="110"
	        onclick="window.open('http://213.23.35.50/bedaplan/insert_vehicle.php?current_user=<?php echo $mitarbeiter ?>&vehicle=RE-SE-206')"><br>

	 <input type="button" name="RE-SE-105" value="RE-SE-191" Style="WIDTH:110" WIDTH="110"
	        onclick="window.open('http://213.23.35.50/bedaplan/insert_vehicle.php?current_user=<?php echo $mitarbeiter ?>&vehicle=RE-SE-191')">

	 <input type="button" name="RE-SE-105" value="RE-SE-1080" Style="WIDTH:110" WIDTH="110"
	        onclick="window.open('http://213.23.35.50/bedaplan/insert_vehicle.php?current_user=<?php echo $mitarbeiter ?>&vehicle=RE-SE-1080')">

	 <input type="button" name="RE-SE-105" value="RE-SE-1011" Style="WIDTH:110" WIDTH="110"
	        onclick="window.open('http://213.23.35.50/bedaplan/insert_vehicle.php?current_user=<?php echo $mitarbeiter ?>&vehicle=RE-SE-1011')">

	 <input type="button" name="RE-SE-105" value="RE-SE-1033" Style="WIDTH:110" WIDTH="110"
	        onclick="window.open('http://213.23.35.50/bedaplan/insert_vehicle.php?current_user=<?php echo $mitarbeiter ?>&vehicle=RE-SE-1033')"><br>
 
	 <input type="button" name="RE-SE-105" value="RE-SE-72" Style="WIDTH:110" WIDTH="110"
	        onclick="window.open('http://213.23.35.50/bedaplan/insert_vehicle.php?current_user=<?php echo $mitarbeiter ?>&vehicle=RE-SE-72')">

	 <input type="button" name="RE-SE-105" value="RE-SE-1120" Style="WIDTH:110" WIDTH="110"
	        onclick="window.open('http://213.23.35.50/bedaplan/insert_vehicle.php?current_user=<?php echo $mitarbeiter ?>&vehicle=RE-SE-1120')">

	 <input type="button" name="RE-SE-105" value="RE-SE-1050" Style="WIDTH:110" WIDTH="110"
	        onclick="window.open('http://213.23.35.50/bedaplan/insert_vehicle.php?current_user=<?php echo $mitarbeiter ?>&vehicle=RE-SE-1050')">



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

