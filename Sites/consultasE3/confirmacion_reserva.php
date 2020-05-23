
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

<div class="card mb-4 shadow-sm">
  <div class="card-header">
    <h4 class="my-0 font-weight-normal">Realizar reserva</h4>
    </div>
  <div class="card-body">
		<?php echo "<p>$hotel</p>"; ?>
    <ul class="list-unstyled mt-3 mb-4">
    </ul>
    <form align="center" action="realizacion_reserva.php" method="post">
      <input type="date" class="form-control" name="fechainicio" aria-describedby="emailHelp" placeholder="Ingrese la fecha de ingreso">
      <input type="date" class="form-control" name="fechatermino" aria-describedby="emailHelp" placeholder="ingrese la fecha de salida">
			<input type="hidden" name="hotel" value="<?php echo $hotel ;?>" >
			<input type="hidden" name="hid" value= "<?php echo $hid ;?>" >
      <br>
      <button type="submit" class="btn btn-lg btn-block btn-primary">Reservar</button>
    </form>
  </div>

	<form action ="consultas_hotel.php" method="POST">
				<input type="hidden" name="hotel" value= "<?php echo $hid ;?>"  >
				<br>
				<button type="submit" class="btn btn-dark btn-block mb-2">
						Volver
				</button>
	</form>

</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="../css/bootstrap.js"></script>
</body>
</html>
