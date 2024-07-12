<?php
include('config.php');
$mat=0;
$nom=$_POST['Nombre1'];
$nom2=$_POST['Nombre2'];
$Apep=$_POST['Appa'];
$Apem=$_POST['Apma'];
$dir=$_POST['Direccion'];
$gen=$_POST['genero'];
$est=$_POST['estado'];
$cuatri=$_POST['Cuatri'];
$car=$_POST['Car'];
$email=$_POST['email'];

$sql = "INSERT INTO estudiante(Matricula, Nombre_1, Nombre_2, Apellido_paterno, Apellido_materno, Direccion, Estado, Genero, Carrera, Cuatrimestre, Email)
VALUES($mat, '$nom', '$nom2', '$Apep', '$Apem', '$dir', '$gen', '$est', '$cuatri', '$car', '$email') ";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Registro de estudiante</title>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Registro de estudiante</h1>
        </div>

    <div class="row">
        <table class="table">
  <thead>
    <tr>
      <th scope="col">Matricula</th>
      <th scope="col">Primer nombre</th>
      <th scope="col">Segundo nombre</th>
      <th scope="col">Apellido paterno</th>
      <th scope="col">Apellido materno</th>
      <th scope="col">Estado</th>
      <th scope="col">Direccion</th>
      <th scope="col">Genero</th>
      <th scope="col">Cuatrimestre</th>
      <th scope="col">Carrera</th>
      <th scope="col">Email</th>
    </tr>
  </thead>
  <tbody>

<?php

  if ($conn->query($sql) === TRUE) {
    $sql = "SELECT * FROM estudiante";
    $result = $conn->query($sql);
    if ($result -> num_rows > 0) {
      // Salida de datos de cada fila
      while ($row = $result->fetch_assoc()){

?>

  <tr>
      <th scope="row"><?php echo$row['Matricula']; ?></th>
      <td><?php echo$row['Nombre_1']; ?></td>
      <td><?php echo$row['Nombre_2']; ?></td>
      <td><?php echo$row['Apellido_paterno']; ?></td>
      <td><?php echo$row['Apellido_materno']; ?></td>
      <td><?php echo$row['Direccion']; ?></td>
      <td><?php echo$row['Estado']; ?></td>
      <td><?php echo$row['Genero']; ?></td>
      <td><?php echo$row['Carrera']; ?></td>
      <td><?php echo$row['Cuatrimestre']; ?></td>
      <td><?php echo$row['Email']; ?></td>
  </tr>

<?php

      }
    } else {
      echo "0 resultados";
    }
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  $conn->close();

?>
  
  </tbody>

</table>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>
