<?php
//Incluye fichero con parámetros de conexión a la base de datos
include_once("config.php");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<title>Pokemon S.L.</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">

</head>
<body>
<div>
	<header>
		<h1>Pokemon S.L.</h1>
	</header>
	
	<main>				
	<ul>
		<li><a href="index.php" class="btn btn-outline-dark">Inicio</a></li>
		<li><a href="add.html" class="btn btn-outline-dark">Añadir competidor/a</a></li>
	</ul>
	<h2>Modificar competidor/a</h2>


<?php


/*Obtiene el id del registro del empleado a modificar, idempleado, a partir de su URL. Este tipo de datos se accede utilizando el método: GET*/

//Recoge el id del empleado a modificar a través de la clave idempleado del array asociativo $_GET y lo almacena en la variable idempleado
$Entrenadores_id = $_GET['Entrenadores_id'];

//Con mysqli_real_scape_string protege caracteres especiales en una cadena para ser usada en una sentencia SQL.
$Entrenadores_id = $mysqli->real_escape_string($Entrenadores_id);


//Se selecciona el registro a modificar: select
$resultado = $mysqli->query("SELECT apellido, nombre, edad, pokemon_principal, puesto, ciudad_natal FROM Entrenadores WHERE Entrenadores_id = $Entrenadores_id" );

//Se extrae el registro y lo guarda en el array $fila
//Nota: También se puede utilizar el método fetch_assoc de la siguiente manera: $fila = $resultado->fetch_assoc();
$fila = $resultado->fetch_array();
$surname = $fila['apellido'];
$name = $fila['nombre'];
$age = $fila['edad'];
$pokemon_principal = $fila['pokemon_principal'];
$puesto = $fila['puesto'];
$ciudad_natal = $fila['ciudad_natal'];

//Se cierra la conexión de base de datos
$mysqli->close();
?>

<!--FORMULARIO DE EDICIÓN. Al hacer click en el botón Guardar, llama a la página (form action="edit_action.php"): edit_action.php
-->

	<form action="edit_action.php" method="post" >
		<div>
			<label for="name">Nombre</label>
			<input type="text" name="name" id="name" value="<?php echo $name;?>" required>
		</div>

		<div>
			<label for="surname">Apellido</label>
			<input type="text" name="surname" id="surname" value="<?php echo $surname;?>" required>
		</div>

		<div>
			<label for="age">Edad</label>
			<input type="number" name="age" id="age" value="<?php echo $age;?>" required>
		</div>
		
		<div>
			<label for="pokemon_principal">pokemon_principal</label>
			<input type="text" name="pokemon_principal" id="pokemon_principal" value="<?php echo $pokemon_principal;?>" required>
		</div>

		<div>
			<label for="puesto">Puesto</label>
			<select name="puesto" id="puesto" placeholder="puesto">
				<option value="<?php echo $puesto;?>" selected><?php echo $puesto;?></option>
				<option value="Lider">Lider</option>
				<option value="Campeon/a">Campeon/a</option>
				<option value="Entrenador">Entrenador</option>
			</select>	
		</div>
		
		<div>
			<label for="ciudad_natal">ciudad_natal</label>
			<input type="text" name="ciudad_natal" id="ciudad_natal" value="<?php echo $ciudad_natal;?>" required>
		</div>

		<div >
			<input type="hidden" name="Entrenadores_id" value=<?php echo $Entrenadores_id;?>>
			<input type="submit" name="modifica" value="Guardar">
			<input type="button" value="Cancelar" onclick="location.href='index.php'">
		</div>
	</form>
	</main>	
	<footer>
		Created by the IES Miguel Herrero team &copy; 2024
  	</footer>
</div>
</body>
</html>

