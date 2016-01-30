<?php
include_once("datos.php");
include_once("funcionesBBDD.php");


//PASO 1: RECOGEMOS LAS VARIABLES DEL FORMULARIO
$nombre_cantante = $_POST["nombre_cantante"];
$apellido_cantante = $_POST["apellido_cantante"];
$fecha_nac = $_POST["fecha_nac"];
$edad = $_POST["edad"];
$nombre_pais = $_POST["nombre_pais"];

//PASO 2: MONTAMOS LA QUERY DE INSERCIÓN

$query = "INSERT INTO cantante (nombre_cantante, nombre_pais, apellido_cantante, fecha_nac, edad) VALUES ('$nombre_cantante', '$nombre_pais', '$apellido_cantante', '$fecha_nac', '$edad')";

//PASO 3: CONECTAMOS CON LA BBDD Y EJECUTAMOS LAS QUERYS
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