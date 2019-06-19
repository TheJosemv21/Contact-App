<?php //Try Catch. El try ejecuta la función y el catch nos permite imprimir cualquier error que nos de
  try {
    require_once('functions/bd_conexion.php');
    $sql = 'SELECT * FROM contactos';
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
        <h2>Nuevo Contacto</h2>
        <form action="crear.php" method="post" autocomplete="off">

          <div class="campo">
            <label for="nombre">Nombre:
                <input type="text" name="nombre" id="nombre" placeholder="Nombre"> 
            </label>
          </div>

          <div class="campo">
            <label for="apellido">Apellido:
                <input type="text" name="apellido" id="apellido" placeholder="Apellido"> 
            </label>
          </div>

          <div class="campo">
            <label for="numero">Teléfono:
                <input type="text" name="numero" id="numero" placeholder="Número"> 
            </label>
          </div>

          <div class="botonMaldito"> 
            <input type="submit" value="Agregar" class="btnAgregar">
          </div>  
              

        </form>

        <div class="contenido existentes">
          <h2>Contactos existentes</h2>
          <p>Número de Contactos: <?php echo $resultado->num_rows ?></p>

          <table>

            <thead>
              <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Teléfono</th>
                <th>Editar</th>
                <th>Borrar</th>
              </tr>
            </thead>

            <tbody>
              <?php 
                while($registros = $resultado->fetch_assoc() ) { ?>

                  <tr>
                    <td><?php echo $registros['Nombre']; ?></td>
                    <td><?php echo $registros['Apellido']; ?></td>
                    <td><?php echo $registros['Teléfono']; ?></td>
                    <td>
                      <a href="editar.php?id=<?php echo $registros['id'];?>">Editar</a>
                    </td>
                    <td class="borrar">
                      <a href="borrar.php?id=<?php echo $registros['id'];?>">Borrar</a>
                    </td>
                  </tr>

              <?php } ?>
            </tbody>
            
          </table>
        </div>

    </div>

    <?php 
      $conn->close;
    ?>


  </body>
</html>