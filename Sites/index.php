<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title>Consultas E2</title>
</head>
<body>

<h1 align="center">Página para consultas</h1>
<p>estas consultas si funcionan</p>
<h3 align="center">Multiplicador de números</h3>
<form align="center" action="multiplicador.php" method="post"> 
  Primer Número:
  <input type="text" name="valor_1">
  <br>
  Segundo Número:
  <input type="text" name="valor_2">
  <br>
  <input type="submit" value="Generar resultado">
</form>
<br>
<p>acá solo es el front-end</p>
<h3 align="center">username y correo asociado</h3>
<form align="center" action="consultas/username_correo.php" method="post"> 
  <input type="submit" value="Ver consulta">
</form>
<br>
<h3 align="center">ciudades de algún país</h3>
<form align="center" action="consultas/ciudades_del_pais.php" method="post"> 
  <input type="text" name="pais">
  <input type="submit" value="Ver consulta">
</form>

</body>
</html>
