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




<table class="table table-striped" style="table-layout: fixed;" >

  <thead>
    <tr>
      <th scope="col">Profil</th>

    </tr>
  </thead>
  <tbody>
   

      <form action="create_arzt_db.php" method="post" name="form1">
        <tr>
          <td>Vorname</td>
          <td><input type="text" name="Vorname" size="50px" value="Vorname"></td>
        </tr>
        <tr>
          <td>Nachname</td>
          <td><input type="text" name="Nachname" size="50px" value="Nachname"></td>
        </tr>
        <tr>
         <td>Fachrichtung</td>
         <td><input type="text" name="Fachrichtung" size="50px" value="Fachrichtung"></td>
       </tr>
     </tr>
     <td></td>
     <td><input type="submit" name="Submit" value="anlegen"></td>

   </form> 
 </tr>


</tbody>
</table>


</body>
</html>