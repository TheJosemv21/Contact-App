<?php 
//Se definen las variables
  if(isset($_GET['nombre'])) {
    $nombre = $_GET['nombre'];
  }
  if(isset($_GET['apellido'])) {
    $apellido = $_GET['apellido'];
  }
  if(isset($_GET['numero'])) {
    $numero = $_GET['numero'];
  }
  if(isset($_GET['id'])) {
    $id = $_GET['id'];
  }

//Try Catch. El try ejecuta la conexión y el catch nos permite imprimir cualquier error que nos arroje
  try {
    require_once('functions/bd_conexion.php');
  $sql = "DELETE FROM `contactos` WHERE `id` = '{$id}';";
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
              <h2 class="contCreado"><i class="fas fa-check"></i><br>El Contacto ha sido Eliminado con éxito</h2>';
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