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

<?php
/*Se comprueba si se ha llegado a esta página PHP a través del formulario de edición. 
Para ello se comprueba la variable de formulario: "modifica" enviada al pulsar el botón Guardar de dicho formulario.
Los datos del formulario se acceden por el método: POST
*/

if(isset($_POST['modifica'])) {
/*Se obtienen los datos del empleado (id, nombre, apellido, edad y puesto) a partir del formulario de edición (idempleado, name, surname, age y job)  por el método POST.
Se envía a través del body del HTTP Request. No aparecen en la URL como era el caso del otro método de envío de datos: GET
Recuerda que   existen dos métodos con los que el navegador puede enviar información al servidor:
1.- Método HTTP GET. Información se envía de forma visible. A través de la URL (header HTTP Request )
En PHP los datos se administran con el array asociativo $_GET. En nuestro caso el dato del empleado se obiene a través de la clave: $_GET['idempleado']
2.- Método HTTP POST. Información se envía de forma no visible. A través del cuerpo del HTTP Request 
PHP proporciona el array asociativo $_POST para acceder a la información enviada.
*/

	$identrenador = $mysqli->real_escape_string($_POST['identrenador']);
	$name = $mysqli->real_escape_string($_POST['name']);
	$surname = $mysqli->real_escape_string($_POST['surname']);
	$age = $mysqli->real_escape_string($_POST['age']);
	$pokemon_principal = $mysqli->real_escape_string($_POST['pokemon_principal']);
	$puesto = $mysqli->real_escape_string($_POST['puesto']);
	$ciudad_natal = $mysqli->real_escape_string($_POST['ciudad_natal']);

/*Con mysqli_real_scape_string protege caracteres especiales en una cadena para ser usada en una sentencia SQL.
Esta función es usada para crear una cadena SQL legal que se puede usar en una sentencia SQL. 
Los caracteres codificados son NUL (ASCII 0), \n, \r, \, ', ", y Control-Z.
Ejemplo: Entrada sin escapar: "O'Reilly" contiene una comilla simple (').
Escapado con mysqli_real_escape_string(): Se convierte en "O\'Reilly", evitando que la comilla se interprete como el fin de una cadena en SQL.
*/	

//Se comprueba si existen campos del formulario vacíos
	if(empty($name) || empty($surname) || empty($age) || empty($pokemon_principal) || empty($puesto) || empty($ciudad_natal))	{
		if(empty($name)) {
			echo "<font color='red'>Campo nombre vacío.</font><br/>";
		}

		if(empty($surname)) {
			echo "<font color='red'>Campo apellido vacío.</font><br/>";
		}

		if(empty($age)) {
			echo "<font color='red'>Campo edad vacío.</font><br/>";
		}

		if(empty($pokemon_principal)) {
			echo "<font color='red'>Campo pokemon vacío.</font><br/>";
		}

		if(empty($puesto)) {
			echo "<font color='red'>Campo Puesto vacío.</font><br/>";
		}

		if(empty($ciudad_natal)) {
			echo "<font color='red'>Campo ciudad vacío.</font><br/>";
		}
	} //fin si
	else //Se realiza la modificación de un registro de la BD. 
	{
		//Se actualiza el registro a modificar: update
		$mysqli->query("UPDATE Entrenadores SET nombre = '$name', apellido = '$surname',  edad = '$age', pokemon_principal='$pokemon_principal', puesto = '$puesto', ciudad_natal ='$ciudad_natal' WHERE identrenador = $identrenador");
		$mysqli->close();
        echo "<div>Registro editado correctamente...</div>";
		echo "<a href='index.php'>Ver resultado</a>";
        //Se redirige a la página principal: index.php
        //header("Location: index.php");
	}// fin sino
}//fin si
?>

    <!--<div>Registro editado correctamente</div>
	<a href='index.php'>Ver resultado</a>-->
	</main>	
</div>
</body>
</html>

