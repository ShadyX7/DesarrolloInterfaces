<?php
include_once("datos.php");
include_once("funcionesBBDD.php");

$enlaceServidor = conectar($server,$user,$password);
seleccionBBDD($baseDatos, $enlaceServidor);

$query = "SELECT jugador.*,equipo.* FROM jugador,equipo where jugador.dni=equipo.dni";

$todosRegistros = ejecutaQuery($query, $enlaceServidor);

while($fila = mysql_fetch_array($todosRegistros,MYSQL_BOTH)){
	
	echo("<br /><h2> Los datos del trabajador son:</h2> <br /> ");
	echo("<br />");
	echo ("El dni del trabajador es: " . $fila["dni"] . "<br />");
	echo ("El dorsal del trabajador es: " . $fila["dorsal_equipo"]."<br />");
	echo ("Los puntos conseguidos del trabajador son: " . $fila["puntos_conseguidos"]."<br />");
	
	
	echo("<br />");echo("<br />");
	echo("<br /><h4> Los datos del equipo son:</h4> <br /> ");
	echo("<br />");
	echo ("El nombre del equipo es: " . $fila["nombre_equipo"]."<br />");
	echo ("Los anios que lleva el equipo en la liga son: " . $fila["num_aniosLiga"]."<br />");
	echo ("El numero de campeonatos ganados son: " . $fila["campeonatos_ganados"]."<br />");
	echo ("Los partidos que lleva el equipo perdidos son: " .$fila["partidos_perdidos"]."<br />");
	echo("<br />"); echo("<br />");
	
	}
	
cierraConexion($enlaceServidor);	


?>