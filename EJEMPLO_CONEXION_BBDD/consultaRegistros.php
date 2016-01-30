<?php
include_once("datos.php");
include_once("funcionesBBDD.php");

$enlaceServidor = conectar($server,$user,$password);
seleccionBBDD($baseDatos, $enlaceServidor);

$query = "SELECT hotel.*,categoria.* FROM hotel, categoria WHERE hotel.id_categoria = categoria.id_categoria";

$todosRegistros = ejecutaQuery($query, $enlaceServidor);

while($fila = mysql_fetch_array($todosRegistros,MYSQL_BOTH)){
	echo("los datos del registro encontrado son:<br />");
	echo($fila["nombre"] . "<br />");
	echo($fila["direccion"] . "<br />");
	echo($fila["telefono"] . "<br />");
	echo($fila["anio_construccion"] . "<br />");
	//En este conjunto de registros tengo también el id de categoría del hotel, vamos a sacar
	//la categoria correspondiente en funcion del hotel
	echo($fila["iva"] . "<br />");
	echo($fila["descripcion"] . "<br />");
	echo($fila["categoria"] . "<br />");
	
	}
	
cierraConexion($enlaceServidor);	


?>