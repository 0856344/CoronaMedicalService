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

$SQL = $conn->prepare("DELETE FROM Schicht WHERE SchichtID=?");
$SQL->bind_param('i', $SchichtID);

$SQL->execute();

$conn->close();


echo '<meta http-equiv="refresh" content="1; URL=Anwesenheitsplaner.php" />';
?> 



