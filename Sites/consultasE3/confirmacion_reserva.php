
<?php
    #Llama a conexión, crea el objeto PDO y obtiene la variable $db
    #Se obtiene el valor del input del usuario
    $hotel = $_POST["hotel"];
		$query = "SELECT  hid FROM hoteles where nombrehotel = $hotel;";
		$result = $db -> prepare($query);
    $result -> execute();
    $hid = $result -> fetchAll();

?>


<div class="card mb-4 shadow-sm">
  <div class="card-header">
    <h4 class="my-0 font-weight-normal">Realizar reserva</h4>
    </div>
  <div class="card-body">
		<?php echo "<p>$hotel</p>"; ?>
		<?php echo "<p>$hid</p>"; ?>
    <ul class="list-unstyled mt-3 mb-4">
    </ul>
    <form align="center" action="realizacion_reserva.php" method="post">
      <input type="date" class="form-control" name="fechainicio" aria-describedby="emailHelp" placeholder="Ingrese la fecha de ingreso">
      <input type="date" class="form-control" name="fechatermino" aria-describedby="emailHelp" placeholder="ingrese la fecha de salida">
			<input type="hidden" name="hotel1" value="<?php echo $hotel ;?>"  >
			<input type="hidden" name="hid" value= "<?php echo $hid ;?>" >
      <br>
      <button type="submit" class="btn btn-lg btn-block btn-primary">Reservar</button>
    </form>
  </div>
</div>
