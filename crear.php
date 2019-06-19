<?php 
//Se definen las variables
  if(isset($_POST['nombre'])) {
    $nombre = $_POST['nombre'];
  }
  if(isset($_POST['apellido'])) {
    $apellido = $_POST['apellido'];
  }
  if(isset($_POST['numero'])) {
    $numero = $_POST['numero'];
  }

//Try Catch. El try ejecuta la conexión y el catch nos permite imprimir cualquier error que nos arroje
  try {
    require_once('functions/bd_conexion.php');
    $sql = "INSERT INTO `contactos` (`id`,`Nombre`,`Apellido`,`Teléfono`) ";
    $sql .= "VALUES (NULL, '{$nombre}', '{$apellido}', '{$numero}'); ";
    $resultado = $conn->query($sql);
  } catch (Exception $e) {
    $error = $e->getMessage();
  }
?>

<!DOCTYPE html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Agenda PHP</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" href="css/estilos.css">
  </head>

  <body>

    <div class="contenedor">
      <h1>Agenda de Contactos</h1>
      <div class="contenido">
        <?php 
          if($resultado) {
            echo '
              <h2 class="contCreado"><i class="fas fa-check"></i><br>El Contacto ha sido Creado con éxito</h2><br>';
            echo '<span class="datosUsuario">-Nombre: </span>' . $nombre . '<br>';
            echo '<span class="datosUsuario">-Apellido: </span>' . $apellido . '<br>';
            echo '<span class="datosUsuario">-N° Teléfono: </span>' . $numero . '<br>';
            ;
          } else {
            echo 'ERROR. ' . $conn->error;
          }
        ?>
        <br>
        <a class="volver" href="index.php"><i class="fas fa-reply"></i> Volver</a>
      </div>
    </div>

<?php //SE DEBE CERRAR AL FINAL LA CONEXIÓN A LA BASE DE DATOS  
  $conn->close;
?>

  </body>
</html>