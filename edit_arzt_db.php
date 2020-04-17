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
    echo $Vorname;
    echo $ArztID;
  }

$sql = "UPDATE Arzt SET Vorname='$Vorname' WHERE ArztID='$ArztID'";

if ($conn->query($sql) === TRUE) {
  echo "Update Vorname successfully ";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "UPDATE Arzt SET Nachname='$Nachname' WHERE ArztID='$ArztID'";

if ($conn->query($sql) === TRUE) {
  echo "Update Nachname successfully ";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "UPDATE Arzt SET Fachrichtung='$Fachrichtung' WHERE ArztID='$ArztID'";

if ($conn->query($sql) === TRUE) {
  echo "Update Fachrichtung successfully ";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

echo '<meta http-equiv="refresh" content="1; URL=Aerztepersonal.php" />';
?> 



