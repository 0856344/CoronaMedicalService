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
    $Station = $_POST['Station'];
    $ArztID = $_POST['ArztID'];

    $vonDate = $_POST['vonDate'];
    $vonTime = $_POST['vonTime'];
   
    $sql =  "SELECT ADDTIME(CONVERT('$vonDate', DATETIME), '$vonTime')";
    $result = $conn->query($sql);
    $row = $result->fetch_row();
    $von = $row[0];

    $bisDate = $_POST['bisDate'];
    $bisTime = $_POST['bisTime'];
    $sql =  "SELECT ADDTIME(CONVERT('$bisDate', DATETIME), '$bisTime')";
    $result = $conn->query($sql);
    $row = $result->fetch_row();
    $bis = $row[0];
  }


  $stmt = $conn->prepare("INSERT INTO Schicht (von, bis, FK_Arzt, FK_Pfleger, FK_Reinigung, FK_Station) VALUES (?, ?, ?, ?, ?, ?)");

  $FK_Arzt = NULL;
  $FK_Pfleger = NULL;

  $stmt->bind_param("ssiiii", $von, $bis, $ArztID, $FK_Arzt, $FK_Pfleger, $Station);

  $stmt->execute();

  $stmt->close();

  $conn->close();

  echo '<meta http-equiv="refresh" content="1; URL=Anwesenheitsplaner.php" />';


?> 




