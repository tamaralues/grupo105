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
<h3 align="center">Todos los <i>username</i> y sus correos asociados</h3>
<form align="center" action="consultas/username_correo.php" method="post"> 
  <input type="submit" value="Ver consulta">
</form>
<br>
<h3 align="center">ciudades de algún país</h3>
<form align="center" action="consultas/ciudades_del_pais.php" method="post"> 
  <input type="text" name="pais">
  <input type="submit" value="Ver consulta">
</form>
<br>
<h3 align="center">Países en que se ha hospedado el usuario</h3>
<form align="center" action="consultas/username_hospedajes.php" method="post"> 
  <input type="text" name="username">
  <input type="submit" value="Ver consulta">
</form>
  <br>
<h3 align="center">Dinero gastado en tickets por el usuario según su ID</h3>
<form align="center" action="consultas/uid_dinero_gastado_tickets.php" method="post"> 
  <input type="text" name="username">
  <input type="submit" value="Ver consulta">
  <br>
</form>
<h3 align="center">Retornar reservas entre enero y marzo del 2020</h3>
<form align="center" action="consultas/reservas_enero_marzo.php" method="post"> 
  <input type="submit" value="Ver consulta">
  <br>
</form>
<h3 align="center">Dinero gastado por usuarios entre 2 fechas</h3>
<form align="center" action="consultas/dinero_gastado_entre_fechas.php" method="post"> 
  fecha inicial:
  <input type="text" name="fecha_inicio">
  <br>
  fecha final:
  <input type="text" name="fecha_final">
  <br>
  <input type="submit" value="Ver consulta">
</body>
</html>
