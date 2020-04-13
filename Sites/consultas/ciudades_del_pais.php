<body>
<?php
#crea el PDO para realizar las consultas
require("../configuracion/conexion_db.php");

$pais = $_POST["pais"];
#se realiza la consulta, esta no tiene inputs
$query = "SELECT cid, nombreciudad FROM ciudades WHERE LOWER(nombrepais) = LOWER('$pais');";

#se asocia la consulta a una db, se ejecuta y el resultado se guarda en una variable
$result = $db -> prepare($query);
$result -> execute();
$ciudades = $result -> fetchAll();
?>
<table>
    <tr>
      <th>ciudad</th>
    </tr>
  
      <?php
        foreach ($ciudades as $p) {
          echo "<tr><td>$p[0]</td><td>$p[1]</td></tr>";
      }
      ?>