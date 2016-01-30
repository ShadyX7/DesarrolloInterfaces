<?php
$server = "localhost";
$user = "usuario";
$password = "usuario";
$baseDatos = "hoteles";

//1. CONECTAMOS CON EL SERVIDOR y guardamos en la variable "enlace" el recurso devuelto
$enlace = mysql_connect($server,$user,$password);
	//comprobamos si se estableció correctamente el enlace o no:
if (!$enlace) {
    die('No pudo conectarse: ' . mysql_error());
}
echo 'Conectado satisfactoriamente <br />';

//2. SELECCIONAMOS LA BASE DE DATOS CON LA QUE TRABAJAREMOS

$bd_seleccionada = mysql_select_db($baseDatos, $enlace);
if (!$bd_seleccionada) {
    die ('No se puede usar hoteles : ' . mysql_error());
}
echo 'La base de datos ha sido seleccionada <br />';

//3. LANZAMOS UNA QUERY A LA BBDD y recogemos los registros encontrados en una variable
$query = "SELECT hotel.*,categoria.* FROM hotel, categoria WHERE hotel.id_categoria = categoria.id_categoria";
$registros = mysql_query($query,$enlace);
	//si existe algún problema con la query lanzamos un error
if (!$registros) {
    die('Consulta no válida: ' . mysql_error());
}

//4. TRATAMOS EL CONJUNTO DE REGISTROS ENCONTRADOS Y DEVUELTOS

echo ("El n&uacute;mero de registros encontrados es: " . mysql_num_rows($registros)."<br />");
while($registro = mysql_fetch_array($registros, MYSQL_BOTH)){
	echo("los datos del registro encontrado son:<br />");
	echo($registro["nombre"] . "<br />");
	echo($registro["direccion"] . "<br />");
	echo($registro["telefono"] . "<br />");
	echo($registro["anio_construccion"] . "<br />");
	//En este conjunto de registros tengo también el id de categoría del hotel, vamos a sacar
	//la categoria correspondiente en funcion del hotel
	echo($registro["iva"] . "<br />");
	echo($registro["descripcion"] . "<br />");
	echo($registro["categoria"] . "<br />");
	}

//después de procesar los registros cerramos la conexion con la BBDD

mysql_close($enlace);

































?>