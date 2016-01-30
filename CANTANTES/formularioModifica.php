<?php
include_once("datos.php");
include_once("funcionesBBDD.php");

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
  <title>Formulario Modifica</title>
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

	$nombreCantante = urldecode($_GET["idCantante"]);	
	$enlace = conectar($server,$user,$password);
	seleccionBBDD($baseDatos,$enlace);
	$query = "SELECT * FROM cantante WHERE nombre_cantante = '$nombreCantante'";
	$registros = ejecutaQuery($query,$enlace);
	$datosCantante = mysql_fetch_array($registros,MYSQL_BOTH);	

?>

	<form action="modificaRegistros.php" method="post" name="formulario">
	<label for="nombre_cantante">Nombre del cantante</label>
    <input type="text" id="nombre_cantante" name="nombre_cantante" size="15" maxlength="40"
    value="<?php echo($datosCantante['nombre_cantante'])?>"/>
    <input type="hidden" name="nombreActual" value="<?php echo($datosCantante['nombre_cantante'])?>" />
    <br />
	<label for="apellido_cantante">Apellido del cantante</label>
    <input type="text" id="apellido_cantante" name="apellido_cantante" size="15" maxlength="60"
    value="<?php echo($datosCantante['apellido_cantante'])?>"/>
    <br />
	<label for="fecha_nac">Fecha de nacimiento</label>
    <input type="text" id="fecha_nac" name="fecha_nac" size="15" maxlength="10"
    value="<?php echo($datosCantante['fecha_nac'])?>"/>
    <br />
	<label for="edad">Edad del cantante</label>
    <input type="text" id="edad" name="edad" size="15" maxlength="60"
    value="<?php echo($datosCantante['edad'])?>"/>
    <br />
    <label for="nombre_pais">Pais de nacimiento</label>
    <select name="nombre_pais" id="nombre_pais">
  
 
  <?php  
   
    $query = "SELECT * FROM pais";
	$registrosPais = ejecutaQuery($query,$enlace);
	
	while ($fila = mysql_fetch_array($registrosPais,MYSQL_BOTH)){
	if($fila["nombre_pais"] == $datosCantante['nombre_pais']){
	echo("<option value='".$fila["nombre_pais"]."' selected='selected'>".$fila["nombre_pais"]."</option>");
	}else{
		echo("<option value='".$fila["nombre_pais"]."'>".$fila["nombre_pais"]."</option>");
	}
}

?>

</select><br />

    <input type="submit" value="Enviarmelo"  />
    <input type="reset" value="Resetea" />
    
</form>

</html>
</body>