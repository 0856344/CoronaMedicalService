 <!DOCTYPE html>
 <html>
 <head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <!-- Add icon library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

 $sql = "SELECT * FROM Arzt";
 $result = $conn->query($sql);
 ?> 



 <table class="table table-striped" style="table-layout: fixed;" >
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Vorname</th>
      <th scope="col">Nachname</th>
      <th scope="col">Fachrichtung</th>
      <th scope="col">bearbeiten / löschen</th>
      <th scope="col">Anwesenheit</th>
    </tr>
  </thead>
  <tbody>
    <?php
    if ($result->num_rows > 0) {
    // output data of each row
      while($row = $result->fetch_assoc()) {
        ?> 
        <tr>
          <td><?php echo $row["ArztID"] ?> </td>
          <td><?php echo $row["Vorname"] ?> </td>
          <td><?php echo $row["Nachname"] ?> </td>
          <td><?php echo $row["Fachrichtung"] ?> </td>
          <td>


            <a href="edit_Arzt.php?ArztID=<?php echo $row["ArztID"]; ?>"><span class="glyphicon glyphicon-pencil"></span></a>
            <a href="delete_Arzt_db.php?ArztID=<?php echo $row["ArztID"]; ?>"><span class="glyphicon glyphicon-remove"></span></a>
          </td>
          <td><a href="time_Arzt.php?ArztID=<?php echo $row["ArztID"]; ?>"><span class="glyphicon glyphicon-calendar"></span></a></td>
        </tr>

        <?php
      }
    }else {
      echo "keine Einträge";
    }
    $conn->close();
    ?> 
  <a href="create_Arzt.php" class="btn btn-info" role="button">neuen Arzt/Ärztin anlegen <i class="fa fa-plus"></i>  </a>

  </tbody>

 </table>




</body>
</html>