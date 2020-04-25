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
    $von = $_POST['von'];
    $bis = $_POST['bis'];


    #$d=mktime(11, 14, 00, 8, 12, 2014);
    #echo "Created date is " . date("Y-m-d H:i:s", $d);
    #$vonDate = new DateTime($von);
   # $vonDate->format("Y-m-d H:i:s");
    #echo $vonDate->format("Y-m-d H:i:s");
    #echo $d->format("Y-m-d H:i:s");
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




