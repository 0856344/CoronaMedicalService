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

$ArztID = $_GET['ArztID'];
#echo $ArztID;
  
$SQL = $conn->prepare("DELETE FROM Arzt WHERE ArztID=?");
$SQL->bind_param('i', $ArztID);

$SQL->execute();

$conn->close();

echo '<meta http-equiv="refresh" content="1; URL=Aerztepersonal.php" />';
?> 



