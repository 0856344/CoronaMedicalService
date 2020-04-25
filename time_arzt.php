 <!DOCTYPE html>
 <html>
 <head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <title>Corona Medical Service</title>
</head>
<body>

 <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="coronamedicalservice.php">Corona Medical Service</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="coronamedicalservice.php">Home</a></li>
      <li><a href="Patienten.php">Patienten</a></li>
      <li><a href="Aerztepersonal.php">Ärztepersonal</a></li>
      <li><a href="Pflegepersonal.php">Pflegepersonal</a></li>
      <li><a href="Reinigungspersonal.php">Reinigungspersonal</a></li>
      <li><a href="Anwesenheitsplaner.php">Anwesenheitsplaner</a></li>
      <li  class="active"><a href="admin.php">Administration</a></li>
    </ul>
  </div>
</nav>

<div class="jumbotron">
 <h1 class="display-4">Corona Medical Service</h1>
 <p class="lead">Corona Medical Service - Verwaltungsservice</p>
</div>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="admin.php">Administration</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="#">Patienten</a></li>
      <li class="active"><a href="admin.php">Ärztepersonal</a></li>
      <li><a href="#">Pflegepersonal</a></li>
      <li><a href="#">Reinigungspersonal</a></li>
    </ul>
  </div>
</nav>


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






# Arzt Daten anzeigen
$ArztID = $_GET['ArztID'];
$sql = "SELECT * FROM Arzt WHERE ArztID=$ArztID";
$result = $conn->query($sql);
?> 

<table class="table table-striped" style="table-layout: fixed;" >
  <thead>
    <tr>
      <th scope="col">Profil</th>

    </tr>
  </thead>
  <tbody>
   <?php
   if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      ?> 

      <tr>
        <td>Vorname</td>
        <td><input type="text" name="Vorname" size="50px"style="background-color: lightgrey;" readonly value=<?php echo $row['Vorname']; ?>></td>
      </tr>
      <tr>
        <td>Nachname</td>
        <td><input type="text" name="Nachname" size="50px" style="background-color: lightgrey;" readonly value=<?php echo $row['Nachname']; ?>></td>
      </tr>
      <tr>
       <td>Fachrichtung</td>
       <td><input type="text" name="Fachrichtung" size="50px" style="background-color: lightgrey;"readonly value=<?php echo $row['Fachrichtung']; ?>></td>
     </tr>
   </tr>
 </tr>
 <?php
}
}else {
  echo "keine Person gefunden";
}
?> 
</tbody>
</table>




<?php

#Schichtplan anzeigen

$sql = "SELECT * FROM Schicht, Station WHERE Schicht.FK_Arzt = '$ArztID' AND Schicht.FK_Station = Station.StationID ORDER BY Schicht.von ASC";
$result = $conn->query($sql);
?> 
<p class="lead">Schichtplan</p>
<table class="table table-striped" style="table-layout: fixed;" >
  <thead>
    <tr>
      <th scope="col">Station</th>
      <th scope="col">von</th>
      <th scope="col">bis</th>
      <th scope="col">Schicht löschen</th>
    </tr>
  </thead>
  <tbody>
    <?php
    if ($result->num_rows > 0) {
    // output data of each row
      while($row = $result->fetch_assoc()) {
        ?> 
        <tr>
          <td><?php echo $row["Station"] ?> </td>
          <td><?php echo $row["von"] ?> </td>
          <td><?php echo $row["bis"] ?> </td>

          <td>
            <a href="delete_Schicht_db.php?SchichtID=<?php echo $row["SchichtID"]; ?>"><span class="glyphicon glyphicon-remove"></span></a>
          </td>

        </tr>
        <?php
      }
    }else {
      echo "keine Schichten eingetragen";
    }
    ?> 
  </tbody>
</table>




<?php

# neue Schicht: kein JAVASCRIPT erlaubt in Exercise 2 -> kein Datepicker

$sql = "SELECT * FROM Station ORDER BY Station.Station ASC";
$result = $conn->query($sql);
?> 

<br>
<p class="lead">Schicht eintragen</p>

<table class="table table-striped" style="table-layout: fixed;" >
  <thead>
    <tr>
      <th scope="col">Schicht</th>
    </tr>
  </thead>

  <tbody>
    <form action="create_schicht_db.php" method="post" name="form1">
      <tr>
        <td>Station</td>
        <td>
          <select name = "Station">
            <?php
            while($row = $result->fetch_assoc()) {
              echo "<option value=\"{$row['StationID']}\">";
              echo $row['Station'];
              echo "</option>";
            }
            ?>
          </select>

        </td>
      </tr>
      <tr>
        <td>Beginn</td>
        <td>          
          <input type="date" name="vonDate" required>
          <input type="time" name="vonTime" required>
        </td>

      </tr>
      <tr>
       <td>Ende</td>
       <td>
          <input type="date" name="bisDate" required>
          <input type="time" name="bisTime" required>
      </td>
    </tr>
  </tr>
  <td></td>
  <input type="hidden" name="ArztID"  value=<?php echo $ArztID; ?>>
  <td><input type="submit" name="Submit" class="btn btn-info" value="Schicht eintragen"></td>
</form> 
</tr>
</tbody>


</body>
</html>