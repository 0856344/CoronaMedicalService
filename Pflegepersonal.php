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
      <li class="active"><a href="Pflegepersonal.php">Pflegepersonal</a></li>
      <li><a href="Reinigungspersonal.php">Reinigungspersonal</a></li>
      <li><a href="Anwesenheitsplaner.php">Anwesenheitsplaner</a></li>
      <li><a href="admin.php">Administration</a></li>
    </ul>
  </div>
</nav>
 	<div class="jumbotron">
 		<h1 class="display-4">Corona Medical Service</h1>
 		<p class="lead">Corona Medical Service - Verwaltungsservice</p>
 	</div>
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

 $sql = "SELECT * FROM Pfleger";
 $result = $conn->query($sql);
 ?> 

 <table class="table table-striped" style="table-layout: fixed;" >
 	<thead>
 		<tr>
 			<th scope="col">ID</th>
 			<th scope="col">Vorname</th>
 			<th scope="col">Nachname</th>
 		</tr>
 	</thead>
 	<tbody>
 		<?php
 		if ($result->num_rows > 0) {
    // output data of each row
 			while($row = $result->fetch_assoc()) {
 				?> 
 				<tr>
 					<td><?php echo $row["PflegerID"] ?> </td>
 					<td><?php echo $row["Vorname"] ?> </td>
 					<td><?php echo $row["Nachname"] ?> </td>
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