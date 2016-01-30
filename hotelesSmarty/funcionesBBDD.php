<?php
function conectar($server,$user,$password){
	$enlace = mysql_connect($server,$user,$password);
		//comprobamos si se estableció correctamente el enlace o no:
	if (!$enlace) {
		die('No pudo conectarse: ' . mysql_error());
	}
	return $enlace;
}

function seleccionBBDD($baseDatos,$enlace){
	$bd_seleccionada = mysql_select_db($baseDatos, $enlace);
	if (!$bd_seleccionada) {
    	die ('No se puede usar hoteles : ' . mysql_error());
	}
}

function ejecutaQuery($query,$enlace){
	$registros = mysql_query($query,$enlace);
	if (!$registros) {
    	die('Consulta no válida: ' . mysql_error());
	}
	return $registros;
}

function cierraConexion($enlace){
	mysql_close($enlace);

}




?>