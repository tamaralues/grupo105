
<?php
    #Llama a conexión, crea el objeto PDO y obtiene la variable $db
    #Se obtiene el valor del input del usuario
		require("../configuracion/conexion_db_e3.php");

    $hotel = $_POST["hotel"];

		$query = "SELECT hid , nombrehotel FROM hoteles ;";

		$result = $db -> prepare($query);
    $result -> execute();
    $hid1 = $result -> fetchAll();


		foreach ($hid1 as $p){
			if($p[1] == $hotel){
				$hid = $p[0];
				$hotel = $p[1];
			}
		}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset='UTF-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="../css/bootstrapE3.css" rel="stylesheet">
    <link href="../css/estiloE3.css" rel="stylesheet">
    <title>Compra de tickets</title>
</head>

<body>

	<?php
		$path_navbar ='../';
		include_once '../nav_bar.php';
	?>

<div class="container px-4 py-2" style="width:70%; margin-top: 100px;">

	<?php echo "<h3 class=\"my-0 font-weight-normal\">$hotel</h3>"; ?>

  <h4 class="my-0 font-weight-normal">Realizar reserva</h4>


    <form action="realizacion_reserva.php" method="POST">
			<div class="btn-group" role="group">
		  Fecha de entrada
			<br>
      <input type="date" class="form-control" name="fechainicio" aria-describedby="emailHelp" placeholder="Ingrese la fecha de ingreso">
			</div>
			<div class="btn-group" role="group">
			Fecha de salida
			<br>
			<input type="date" class="form-control" name="fechatermino" aria-describedby="emailHelp" placeholder="ingrese la fecha de salida">
			</div>
			<div class="btn-group" role="group">
			<input type="hidden" name="hotel1" value="<?php echo $hotel ;?>" >
			<input type="hidden" name="hid" value= "<?php echo $hid ;?>" >
			 </div>
      <br>
      <button type="submit" class="btn btn-dark">Reservar</button>
    </form>


	<form action ="consultas_hotel.php" method="POST">
				<input type="hidden" name="hotel" value= "<?php echo $hid ;?>"  >
				<br>
				<button type="submit" class="btn btn-dark">
						Volver
				</button>
	</form>

</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="../css/bootstrap.js"></script>
</body>
</html>
