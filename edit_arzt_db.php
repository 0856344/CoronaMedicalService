<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "coronaDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


if(isset($_POST['Submit'])) {    
    $ArztID = $_POST['ArztID'];
    $Vorname = $_POST['Vorname'];
    $Nachname = $_POST['Nachname'];
    $Fachrichtung = $_POST['Fachrichtung'];
    #echo $Vorname;
    #echo $ArztID;
  }


$SQL = $conn->prepare("UPDATE Arzt SET Vorname='$Vorname' WHERE ArztID=?");
$SQL->bind_param('i', $ArztID);
$SQL->execute();

$SQL = $conn->prepare("UPDATE Arzt SET Nachname='$Nachname' WHERE ArztID=?");
$SQL->bind_param('i', $ArztID);
$SQL->execute();

$SQL = $conn->prepare("UPDATE Arzt SET Fachrichtung='$Fachrichtung' WHERE ArztID=?");
$SQL->bind_param('i', $ArztID);
$SQL->execute();

$conn->close();


echo '<meta http-equiv="refresh" content="1; URL=Aerztepersonal.php" />';
?> 



