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

      <form action="edit_arzt_db.php" method="post" name="form1">
        <tr>
          <td>Vorname</td>
          <td><input type="text" name="Vorname" size="50px" value=<?php echo $row['Vorname']; ?>></td>
        </tr>
        <tr>
          <td>Nachname</td>
          <td><input type="text" name="Nachname" size="50px" value=<?php echo $row['Nachname']; ?>></td>
        </tr>
        <tr>
         <td>Fachrichtung</td>
         <td><input type="text" name="Fachrichtung" size="50px" value=<?php echo $row['Fachrichtung']; ?>></td>
       </tr>
     </tr>
     <td></td>
     <input type="hidden" name="ArztID"  value=<?php echo $row['ArztID']; ?>>
     <td><input type="submit" name="Submit" class="btn btn-info" value="ändern"></td>

   </form> 
 </tr>


 <?php
}
}else {
  echo "keine Einträge";
}
$conn->close();
?> 
</tbody>
</table>


</body>
</html>