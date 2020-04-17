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
      <li  class="active"><a href="coronamedicalservice.php">Home</a></li>
      <li><a href="Patienten.php">Patienten</a></li>
      <li><a href="Aerztepersonal.php">Ärztepersonal</a></li>
      <li><a href="Pflegepersonal.php">Pflegepersonal</a></li>
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


 $ArztID = $_GET['ArztID'];
 $sql = "SELECT * FROM Schicht, Station, Arzt WHERE Arzt.ArztID ='$ArztID' AND
                                                    Schicht.FK_Arzt = '$ArztID' AND
                                                    Schicht.FK_Station = Station.StationID 
                                                    ORDER BY Schicht.von ASC";
 $result_dates = $conn->query($sql);

    if ($result_dates->num_rows > 0) {
    // output data of each row
      while($dates = $result_dates->fetch_assoc()) {

        $von1 = $dates["von"];
        $bis1 = $dates["bis"];
        $vorname = $dates["Vorname"];
        $nachname = $dates["Nachname"];

        # nur Schichten aus den letzten 2 Wochen anzeigen (24h * 14 Tage = 336h)
        date_default_timezone_set('Europe/Berlin');
        $current_datum = date("Y-m-d H:i:s");
        $timeSpan = round((strtotime($current_datum)-strtotime($von1)) / 3600,2). " Stunden";
        if ($timeSpan > 336.0){
          #echo $timeSpan;
          continue;
        }else{
        ?> 
        
        <?php

        $sql = "SELECT * FROM Schicht, Station, Arzt WHERE Arzt.ArztID !='$ArztID' AND
                                                           Schicht.FK_Arzt = Arzt.ArztID AND
                                                           Schicht.FK_Station = Station.StationID AND
                                                           Schicht.von BETWEEN '$von1' and '$bis1'
                                                           OR
                                                           (
                                                           Arzt.ArztID !='$ArztID' AND
                                                           Schicht.FK_Arzt = Arzt.ArztID AND
                                                           Schicht.FK_Station = Station.StationID AND
                                                           Schicht.bis BETWEEN '$von1' and '$bis1')
                                                           ORDER BY Schicht.von ASC";
        $result = $conn->query($sql);


            if ($result->num_rows > 0) {

              ?> 
              <p class="lead">gemeinsame Schichten mit Dr. <?php echo $nachname ?> von: <?php echo $von1 ?> bis <?php echo $bis1 ?> (in den letzten 2 Wochen)</p>
               <table class="table table-striped" style="table-layout: fixed;" >
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Vorname</th>
                    <th scope="col">Nachname</th>
                    <th scope="col">Station</th>
                    <th scope="col">von</th>
                    <th scope="col">bis</th>
                    <th scope="col">Dauer</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                
              while($row = $result->fetch_assoc()) {

                $fromA = strtotime($von1);
                $toA = strtotime($bis1);

                $von2 = $row["von"];
                $bis2 = $row["bis"];
                $fromB = strtotime($von2);
                $toB = strtotime($bis2);

                # Es gibt insgesamt 8 Möglichkeiten, wie 2 Intervalle sich überlappen können
                $dauer = 0;
                if ($fromA < $fromB && $toA > $fromB){
                  $dauer =  round(($toA - $fromB) / 3600,2). " Stunden";
                }
                if ($fromA == $fromB && $toA == $toB){
                  $dauer =  round(($toB - $fromA) / 3600,2). " Stunden";
                }
                if ($fromA == $fromB && $toA < $toB){
                  $dauer =  round(($toA - $fromA) / 3600,2). " Stunden";
                }
                 if ($fromA < $fromB && $toB == $toA){
                  $dauer =  round(($toB - $fromB) / 3600,2). " Stunden";
                }
                if ($fromB < $fromA && $toB == $toA){
                  $dauer =  round(($toA - $fromA) / 3600,2). " Stunden";
                }
                 if ($fromB < $fromA && $toB > $fromA){
                  $dauer =  round(($toB - $fromA) / 3600,2). " Stunden";
                }
                if ($fromB > $fromA && $toB < $toA){
                  $dauer =  round(($toB - $fromB) / 3600,2). " Stunden";
                }
                if ($dauer == 0){
                  $dauer = "Schichtwechsel";
                }

                ?> 
                <tr>
                  <td><?php echo $row["ArztID"] ?> </td>
                  <td><?php echo $row["Vorname"] ?> </td>
                  <td><?php echo $row["Nachname"] ?> </td>
                  <td><?php echo $row["Station"] ?> </td>
                  <td><?php echo $row["von"] ?> </td>
                  <td><?php echo $row["bis"] ?> </td>
                  <td><?php echo $dauer?> </td>
                </tr>
                <?php
              }
            }else {
            }
            ?> 

          </tbody>
         </table>


      <?php 
        }
      }
    }else {
          $conn->close();
      echo "keine gemeinsamen Schichten";
    }
?>


</body>
</html>