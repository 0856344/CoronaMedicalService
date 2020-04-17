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
$SchichtID = $_GET['SchichtID'];
$sql = "DELETE FROM Schicht WHERE SchichtID='$SchichtID'";


if ($conn->query($sql) === TRUE) {
  echo "Delete Schicht successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

echo '<meta http-equiv="refresh" content="1; URL=Anwesenheitsplaner.php" />';
?> 



