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
    echo $ArztID;
  

$sql = "DELETE FROM Arzt WHERE ArztID='$ArztID'";


if ($conn->query($sql) === TRUE) {
  echo "Delete Arzt successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

echo '<meta http-equiv="refresh" content="1; URL=Aerztepersonal.php" />';
?> 



