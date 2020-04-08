<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>

<h1 align="center">Página para consultas</h1>

<?php
#Para definir variables que pueda ser utilizada en todo el HTML se deben anteceder con $
$var1 = 20;
$booleano = true;

#Para imprimir en el HTML ocupamos echo
echo "<p> aqui pruebo un print:<br> supongo que esta etiqueta es un salto de linea <br> Var1: $var1 <br> booleano: $booleano</p>";

#Control de flujo
if ($booleano){
    echo "<h4> Dentro del if: la variable era TRUE.</h4>";
    echo "<p> Era True pero sin negrita </p>";
    echo "<h3> este tamaño corresponde a h3, no elvides el ;</h3>";
} else {
    echo "<h4> Dentro del if: la variable era FALSE.</h4>";
}

#Looping. Hay varios tipos de looping. Investigar!
echo "<h3>For Loop:</h3>";
for($i = 0; $i<10; $i++) {
  echo "<p> i: $i </p>";
}

echo "<h3>Foreach Loop:</h3>";
$array = array( 1, 2, 3, 4, 5);
foreach( $array as $v ) {
   echo "<p> Value is: $v </p>";
}
?>

</body>
</html>
