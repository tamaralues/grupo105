<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  #Se obtiene el valor del input del usuario
  $name = $_POST["lugares"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset='UTF-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="css/bootstrapE3.css" rel="stylesheet">
    <link href="css/estiloE3.css" rel="stylesheet">
    <title>Documento random</title>
</head>
<body>
    <?php echo "<p>$name</p>"; ?>
