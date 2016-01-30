<?php

header('Content-Type: text/html; charset=UTF-8');

//Datos


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
$carpetaImg = "./Imagenes"; //Carpeta de imagenes
$carpetaCV = "./Curriculums"; //Carpeta de curriculumns
$limiteMaximo = 5000000; // 5MB de limite maximo
$overwrite = "no"; // No permite la sobreescritura

$nombreImagen = $_FILES['imagen']['name'];
$imagenTemp = $_FILES['imagen']['tmp_name'];
$errorImg = $FILES['imagen']['error'];
$tamañoImg = $_FILES['imagen']['size'];
$nombreFinalImg = $_POST['dni']; 
$extensionImg = strtolower(pathinfo($nombreImagen, PATHINFO_EXTENSION));


$nombreCV = $_FILES['cv']['name'];
$cvTemp = $_FILES['cv']['tmp_name'];
$errorCv = $FILES['cv']['error'];
$tamañoCv = $_FILES['cv']['size'];
$nombreFinalCv =$_POST['dni']; 
$extensionCv = strtolower(pathinfo($nombreCV, PATHINFO_EXTENSION));

function validaDni($dni) {
$letra = substr($dni, -1);
$numeros = substr($dni, 0, -1);
if ( substr("TRWAGMYFPDXBNJZSQVHLCKE", $numeros%23, 1) == $letra && strlen($letra) == 1 && strlen ($numeros) == 8 ){
	return true;
}else{
return false;
}

}


if (validaDni($nombreFinalImg) == true){
	
	
	// Crea carpeta de "Imagenes"
	
	if(!file_exists($carpetaImg)){
	
	
	mkdir("./Imagenes",0777,true);
	
	}
	
	$validacion = true;
	
	
	
	
	
	
	
	//Valida extensiones de imagenes:
	
	if (!in_array($extensionImg,array('jpg','png','jpeg','gif'))){
		
	$validacion = false;
	echo (' Extension del fichero incorrecta.');
	
	echo ("<INPUT TYPE='button' VALUE='ATRAS' onClick='history.back()'>");
	}
	
	//Valida tamaño de la imagen:

	if ($tamañoImg > $limiteMaximo){
		$validacion = false;
		echo (' El tamaño de la imagen excede el limite máximo permitido (5MB)');
		
		
    echo ("<INPUT TYPE='button' VALUE='ATRAS' onClick='history.back()'>");
	}
 
	

	//Validacion correcta y envia Imagen
	
	if ($validacion == true){
		
		$imagen_final = "./Imagenes/$nombreFinalImg.$extensionImg";
		move_uploaded_file($imagenTemp, $imagen_final);
		header ( 'Location: index.php');
		
		
	}
		         



	// Crea carpeta de "Curriculumns"
	
	if(!file_exists($carpetaCV)){
		mkdir("./Curriculums",0777,true);
	}
		
	
	
	$validacion = true;
	
	//Valida extensiones de Curriculumns:
	
	if (!in_array($extensionCv,array('pdf'))){
	
	$validacion = false;
	echo (' Extension del fichero incorrecta.');
	
	echo ("<INPUT TYPE='button' VALUE='ATRAS' onClick='history.back()'>");
	
		
	}
	
	
	//Valida el tamaño del curriculum
	
	if ($tamañoCv > $limiteMaximo){
		$validacion = false;
		$error = ' El tamaño del curriculum excede el limite máximo permitido (5MB)';
		
		
    echo ("<INPUT TYPE='button' VALUE='ATRAS' onClick='history.back()'>");
	}
	
	
	//Validación correcta y envia curriculum
	
		if ($validacion == true){
		
		
		$cv_final = "./Curriculums/$nombreFinalCv.$extensionCv";
		move_uploaded_file($cvTemp, $cv_final);
		header ( 'Location: index.php');
		
		
	}
	
	exit;
	
}else{
	
	echo ("<INPUT TYPE='button' VALUE='ATRAS' onClick='history.back()'>");
	echo (" El DNI no es valido");	
	
}

}


?>