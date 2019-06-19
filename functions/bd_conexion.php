<?php 
  //MYSQLi requiere 4 parámetros en un orden exacto: 1ro el host, en el caso de MAMP es localhost. 2do el usuario. 3ro el password (en MAMP ambos son 'root' por default). 4to es el nombre de la base de datos.
  $conn = new mysqli('localhost', 'root', 'root', 'contactos');

  //Se usa la función connect_error que viene con mysqli para que en caso de existir un error, nos imprima el error.
  if ($conn->connect_error) {
    echo $error = $conn->connect_error;
  }
?>