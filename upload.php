<html>
 <head>
  <title>bedaplan</title>
 </head>
 <body>
 <img src="http://213.23.35.50/bedaplan/bedaplanlogo.jpg">
  <p align="right"><font size="5">Admin - Projektzeitauswertung nach Projektnummer</font></p>
<hr>
<br>
<?php
define("UPLOAD_DIR", "/var/www/bedaplan/uploads/");
 
if (!empty($_FILES["myFile"])) {
    $myFile = $_FILES["myFile"];
 
    if ($myFile["error"] !== UPLOAD_ERR_OK) {
        echo "<p>An error occurred.</p>";
        exit;
    }
 
    // ensure a safe filename
    $name = preg_replace("/[^A-Z0-9._-]/i", "_", $myFile["name"]);
 
    // don't overwrite an existing file
    $i = 0;
    $parts = pathinfo($name);
    while (file_exists(UPLOAD_DIR . $name)) {
        $i++;
        $name = $parts["filename"] . "-" . $i . "." . $parts["extension"];
    }
 
    // preserve file from temporary directory
    $success = move_uploaded_file($myFile["tmp_name"],
        UPLOAD_DIR . $name);
    if (!$success) {
        echo "<p>Unable to save file.</p>";
        exit;
    }
 
    // set proper permissions on the new file
    chmod(UPLOAD_DIR . $name, 0644);
echo "Dokumentname: ";
echo $myFile["name"];
}
?>
<br>
<br><br>
Bitte die Projektnummer angeben zu der die Datei <?php echo $myFile["name"]; ?> zugeordnet werden soll:<br><br>
 <form action="http://213.23.35.50/bedaplan/addfile_project2.php?filename=<?php echo $myFile['name'] ?>" method="post">
           <input name="project_nr" type="text" size="30" maxlength="64">
           <input type="submit" value="Hinzuf&uuml;gen ">
          </form>
</html>
