<?php 
  //Selecciona solamente el id del elemento que se quiera editar
  if(isset($_GET['id'])) {
    $id = $_GET['id'];
  }

//Try Catch. El try ejecuta la función y el catch nos permite imprimir cualquier error que nos de
  try {
    require_once('functions/bd_conexion.php');
    $sql = "SELECT * FROM contactos WHERE `id` = {$id}";
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
    <link rel="stylesheet" href="css/estilos.css">
  </head>

  <body>

    <div class="contenedor">
      <h1>Agenda de Contactos</h1>
        <h2>Editar Contacto</h2>
        <form action="actualizar.php" method="post" autocomplete="off">

        <!-- Se asocia cada elemento al id, y se hace que aparezcan los datos en los inputs -->
        <?php while($registro = $resultado->fetch_assoc() ) { ?>

          <div class="campo">
            <label for="nombre">Nombre:
                <input type="text" value="<?php echo $registro['Nombre'] ?>" name="nombre" id="nombre" placeholder="Nombre"> 
            </label>
          </div>

          <div class="campo">
            <label for="apellido">Apellido:
                <input type="text" value="<?php echo $registro['Apellido'] ?>" name="apellido" id="apellido" placeholder="Apellido"> 
            </label>
          </div>

          <div class="campo">
            <label for="numero">Teléfono:
                <input type="text" value="<?php echo $registro['Teléfono'] ?>" name="numero" id="numero" placeholder="Número"> 
            </label>
          </div>

          <input type="hidden" name="id" value="<?php echo $registro['id']; ?>">
          <div class="botonMaldito"> 
            <input type="submit" value="Modificar" class="btnAgregar">
          </div>  
              
        <?php } ?>
        </form>

        

    </div>

    <?php 
      $conn->close;
    ?>


  </body>
</html>