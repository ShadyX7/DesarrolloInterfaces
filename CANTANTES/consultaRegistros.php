<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
  <title>Registros</title>
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Mobile Specific Metas
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- FONT
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">

  <!-- CSS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/skeleton.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>

<?php

include_once("datos.php");
include_once("funcionesBBDD.php");

$enlaceServidor = conectar($server,$user,$password);
seleccionBBDD($baseDatos, $enlaceServidor);

$query = "SELECT cantante.* , pais.* FROM cantante, pais WHERE cantante.nombre_pais=pais.nombre_pais";

$todosRegistros = ejecutaQuery($query, $enlaceServidor);

while($fila = mysql_fetch_array($todosRegistros,MYSQL_BOTH)){

echo("LOS DATOS DEL CANTANTE SON:<br />");

	echo("<br />");
	echo("Nombre del cantante: " . $fila["nombre_cantante"] . "<br />");
	echo("Apellido del cantante: " . $fila["apellido_cantante"] . "<br />");
	echo("Fecha de nacimiento: " . $fila["fecha_nac"] . "<br />");
	echo("Edad: " . $fila["edad"] . "<br />");
	echo("Pais de nacimiento: " . $fila["nombre_pais"] . "<br />");
	echo("<br />");
	
}

cierraConexion($enlaceServidor);	



?>

</body>
</html>