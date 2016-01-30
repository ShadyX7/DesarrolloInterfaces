<?php
$server = "localhost";
$user = "usuario";
$password = "usuario";
$baseDatos = "examenempresas";


$enlace = mysql_connect($server,$user,$password);
if (!$enlace) {
    die('No pudo conectarse: ' . mysql_error());
}
echo 'Conectado satisfactoriamente <br />';


$bd_seleccionada = mysql_select_db($baseDatos, $enlace);
if (!$bd_seleccionada) {
    die ('No se puede usar la empresa : ' . mysql_error());
}
echo 'La base de datos ha sido seleccionada <br />';

$query="SELECT jugador.*,equipo.* FROM jugador,equipo where jugador.dni=equipo.dni";
$registros = mysql_query($query,$enlace);

if (!$registros) {
    die('Consulta no válida: ' . mysql_error());
}

 	 	 	 
echo ("Los registros de los equipos con sus correspondientes jugadores son: ".mysql_num_rows($registros));
while($registro = mysql_fetch_array($registros, MYSQL_BOTH)){
 
	echo("<br /><h2> Los datos del registro encontrado son:</h2> <br /> ");
	echo ($registro["dni"]."<br />");
	echo ($registro["dorsal_equipo"]."<br />");
	echo ($registro["puntos_conseguidos"]."<br />");
	echo ($registro["nombre_equipo"]."<br />");
	echo ($registro["num_aniosLiga"]."<br />");
	echo ($registro["campeonatos_ganados"]."<br />");
	echo ($registro["partidos_perdidos"]."<br />");
	


	
	}
	
?>