<?php
//DECLARAMOS LOS ATRIBUTOS NECESARIOS PARA CONECTAR A LA BBDD
$server = "localhost";
$login = "root";
$password = "root";
$db = "cantantes";

$enlace = mysql_connect($server, $login, $password);
if (!$enlace) {
	die ('No pudo conectarse: ' . mysql_error());
}
else{
	echo 'Conectado satisfactoriamente <br />';
}


$bd_seleccionada = mysql_select_db($db,$enlace);
if (!$bd_seleccionada){
	die ('Nos se puede usar cantantes: ' . mysql_error());
}else{
	echo 'BBDD seleccionada y lista para recibir consultas<br />';
}

$consulta = "SELECT * FROM cantante WHERE nombre_cantante = 'Marshall'";

$resultados = mysql_query($consulta,$enlace);

if(!$resultados){
	$mensaje = 'Consulta no válida: '.mysql_error()."<br />";
	$mensaje = 'Consulta completa: ' . $consulta;
	die($mensaje);

}

while ($fila = mysql_fetch_array($resultados, MYSQL_BOTH)){
	printf ("Nombre cantante: %s Id de la cancion: %s El apellido del cantante: %s La fecha de nacimiento: %s La edad: %s ",$fila['nombre_cantante'], $fila['id_cancion'],$fila['apellido_cantante'], $fila['fecha_nac'], $fila['edad']);
	echo "<br />";

}

while ($fila = mysql_fetch_object($resultados)){
		
printf("Nombre cantante: %s Id de la cancion: %s El apellido del cantante: %s La fecha de nacimiento: %s La edad: %s ", $fila->nombre_cantante, $fila->id_cancion, $fila->apellido_cantante, $fila->fecha_nac, $fila->edad);
		echo"<br />";
		
}


?>