<?php
include_once("datos.php");
include_once("funcionesBBDD.php");

//PASO 1: RECOGEMOS LAS VARIABLES DEL FORMULARIO
$nombre = $_POST["nombre"];
$direccion = $_POST["direccion"];
$telefono = $_POST["telefono"];
$anio = $_POST["anio"];
$categoria = $_POST["categoria"];

//PASO 2: MONTAMOS LA QUERY DE INSERCIÓN

$query = "INSERT INTO hotel (nombre, direccion, telefono, anio_construccion, id_categoria) VALUES ('$nombre', '$direccion', '$telefono', '$anio', $categoria)";

//PASO 3: CONECTAMOS CON LA BBDD Y EJECUTAMOS LA QUERY
$enlaceServidor = conectar($server,$user,$password);
seleccionBBDD($baseDatos, $enlaceServidor);

$exitoInsercion = ejecutaQuery($query, $enlaceServidor);

//PASO 4: COMPROBAMOS QUE TODO FUE OK
if($exitoInsercion && (mysql_affected_rows($enlaceServidor) == 1)){
	//Si todo fue bien redireccionamos al formulario y pasamos una variable que lo indica
	header("Location: formulario.php?exito=true");
	}else{
	header("Location: formulario.php?exito=false");		
		}	
cierraConexion($enlaceServidor);	
















?>