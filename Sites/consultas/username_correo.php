<body>
<?php
#crea el PDO para realizar las consultas
require("configuracion/conexion_db.php");

#se realiza la consulta, esta no tiene inputs
$query = "SELECT username, correo FROM usuarios;";

#se asocia la consulta a una db, se ejecuta y el resultado se guarda en una variable
$result = $db -> prepare($query);
$result -> execute();
$username_y_correo = $result -> fetchAll();
?>
<table>
    <tr>
      <th>username</th>
      <th>correo</th>
    </tr>
  
      <?php
        foreach ($username_y_correo as $p) {
          echo "<tr><td>$p[0]</td><td>$p[1]</td></tr>";
      }
      ?>