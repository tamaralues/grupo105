<?php
  try {
    #Pide las variables para conectarse a la base de datos.
    require('data.php'); 
    # Se crea la instancia de PDO
    $db = new PDO("pgsql:dbname=$databaseName;host=localhost;port=5432;user=$user;password=$password");
  } catch (Exception $e) {
    echo "No se pudo conectar a la base de datos 102: $e";
  }
  try {
    #Pide las variables para conectarse a la base de datos.
    require('data.php');
    # Se crea la instancia de PDO
    $db1 = new PDO("pgsql:dbname=$databaseName1;host=localhost;port=5432;user=$user1;password=$password1");
  } catch (Exception $e) {
    echo "No se pudo conectar a la base de datos 105: $e";
  }
?>
