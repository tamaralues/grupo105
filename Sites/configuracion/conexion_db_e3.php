<?php
  try {
    $user = 'grupo105';
    $password = 'grupo105';
    $databaseName = 'grupo105e3';
    $db = new PDO("pgsql:dbname=$databaseName;host=localhost;port=5432;user=$user;password=$password");
  } catch (Exception $e) {
    echo "No se pudo conectar a la base de datos: $e, F";
  }

  try {
    $user = 'grupo102';
    $password = 'grupo102';
    $databaseName = 'grupo102e3';
    $db = new PDO("pgsql:dbname=$databaseName;host=localhost;port=5432;user=$user;password=$password");
  } catch (Exception $e) {
    echo "No se pudo conectar a la base de datos: $e, F";
  }
  
?>
