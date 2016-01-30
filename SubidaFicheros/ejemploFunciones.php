<?php

$fichero = $_FILES["archivo"];
$destino = "./fotos";
$nombre = $fichero["name"];

if(is_uploaded_file($fichero["tmp_name"])){
	echo ("El fichero " . $fichero["tmp_name"] . "fue subido por HTTP POST");
	
	move_uploaded_file($fichero['tmp_name'], "$destino/$nombre");
}
else{
	
	echo("$fichero no fue subido por HTTP POST");
}


?>