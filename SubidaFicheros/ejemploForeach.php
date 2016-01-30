<?php
include_once("datos.php");
include_once("funcionesBBDD.php");

$enlaceServidor = conectar($server,$user,$password);
seleccionBBDD($baseDatos, $enlaceServidor);

$query = "SELECT hotel.*, categoria.* FROM hotel, categoria WHERE hotel.id_categoria = categoria.id_categoria";

$todosRegistros = ejecutaQuery($query, $enlaceServidor);
echo("<h1>Esto es con un while:</h1>");
echo("<table border = '1'>");
while($fila = mysql_fetch_array($todosRegistros,MYSQL_BOTH)){
	echo("<tr>");
		echo("<td>".$fila["nombre"]."</td>");
		echo("<td>".$fila["direccion"]."</td>");
		echo("<td>".$fila["telefono"]."</td>");
		echo("<td>".$fila["anio_construccion"]."</td>");
		echo("<td>".$fila["categoria"]."</td>");
		
		$nombreHotel = urlencode($fila["nombre"]);
		echo('<td><a href=\'formularioModifica.php?idHotel='.$nombreHotel.'\'>');
		
			echo("Modificar");
		echo("</a>");
		echo("</td>");
		echo('<td><a href=\'bajaHotel.php?idHotel='.$nombreHotel.'\'>');
		
			echo("borrar");
		echo("</a>");
		echo("</td>");
	echo("</tr>");
		
	}
echo("</table>");
echo("<h1>Esto es con un foreach:</h1>");
$todosRegistros = ejecutaQuery($query, $enlaceServidor);
echo("<table border = '1'>");
while($fila = mysql_fetch_array($todosRegistros,MYSQL_BOTH)){
	echo("<tr>");
	foreach($fila as $indice => $valor){
		
		echo("<td>".$valor."</td>");
		}
				
		$nombreHotel = urlencode($fila["nombre"]);
		echo('<td><a href=\'formularioModifica.php?idHotel='.$nombreHotel.'\'>');
		
			echo("Modificar");
		echo("</a>");
		echo("</td>");
		echo('<td><a href=\'bajaHotel.php?idHotel='.$nombreHotel.'\'>');
		
			echo("borrar");
		echo("</a>");
		echo("</td>");
	echo("</tr>");
		
	}
echo("</table>");

	
?>