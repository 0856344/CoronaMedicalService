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
    $Vorname = $_POST['Vorname'];
    $Nachname = $_POST['Nachname'];
    $Fachrichtung = $_POST['Fachrichtung'];
    echo $Vorname;
    echo $Nachname;
    echo $Fachrichtung;
  }

$sql =  "INSERT INTO Arzt (Vorname, Nachname, Fachrichtung)
VALUES ('$Vorname', '$Nachname', '$Fachrichtung')";

if ($conn->query($sql) === TRUE) {
  echo "Create Arzt successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

echo '<meta http-equiv="refresh" content="1; URL=Aerztepersonal.php" />';
?> 




