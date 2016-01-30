<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
  <title>Listado Hoteles</title>
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

$cantante = $_GET["idCantante"];

if(isset($_GET["botonazo"])){
	$enlace = conectar($server,$user,$password);
	seleccionBBDD($baseDatos,$enlace);
	
$query = "DELETE FROM cantante WHERE nombre_cantante = '$cantante'";


$bajaEjecutada = ejecutaQuery($query,$enlace);
	
	if($bajaEjecutada && (mysql_affected_rows($enlace) == 1)){
	//Si todo fue bien redireccionamos al formulario y pasamos una variable que lo indica
	header("Location: listadoCantantes.php?exitoBaja=true");
	}else{
	header("Location: listadoCantantes.php?exitoBaja=false");		
		}
	
	}

echo("<h1>Est&aacute; a punto de borrar el cantante $cantante, est&aacute; seguro de querer borrarlo?</h1>" );

?>

<form action="bajaCantante.php" name="formularioBorrar" method="get">
	<input type="hidden" name="idCantante" value="<?php echo($cantante);?>" />
    <input type="submit" value="borrar" name="botonazo"/>    
</form>



</body>
</html>