<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
  <title>Formulario Modifica)</title>
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
<?php
include_once("datos.php");
include_once("funcionesBBDD.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<br /><b>Notice</b>:  Undefined variable: datosHotel in <b>C:\Apache\htdocs\MYSQL EJEMPLOS\formularioModifica.php</b> on line <b>34</b><br />
<?php
	$nombreHotel = urldecode($_GET["idHotel"]);	
	$enlace = conectar($server,$user,$password);
	seleccionBBDD($baseDatos,$enlace);
	$query = "SELECT * FROM hotel WHERE nombre = '$nombreHotel'";
	$registros = ejecutaQuery($query,$enlace);
	$datosHotel = mysql_fetch_array($registros,MYSQL_BOTH);	
	?>

<form action="modificaRegistros.php" method="post" name="formulario">
	<label for="nombre">Nombre del hotel</label>
    <input type="text" id="nombre" name="nombre" size="15" maxlength="40" 
    value="<?php echo($datosHotel['nombre'])?>"/>
    <input type="hidden" name="nombreActual" value="<?php echo($datosHotel['nombre'])?>" />
    <br />
	<label for="direccion">Direcci&oacute;n del hotel</label>
    <input type="text" id="direccion" name="direccion" size="15" maxlength="60"
    value="<?php echo($datosHotel['direccion'])?>"/>
    <br />
	<label for="telefono">Tel&eacute;fono del hotel</label>
    <input type="text" id="telefono" name="telefono" size="15" maxlength="9"
    value="<?php echo($datosHotel['telefono'])?>"/>
    <br />
	<label for="anio">A&ntilde;o de construcci&oacute;n</label>
    <input type="text" id="anio" name="anio" size="15" maxlength="60"
    value="<?php echo($datosHotel['anio_construccion'])?>"/>
    <br />
    <label for="categoria">Categor&iacute;a</label>
    <select name="categoria" id="categoria">
<?php

	$query = "SELECT * FROM categoria";
	$registrosCat = ejecutaQuery($query,$enlace);
	
	while ($fila = mysql_fetch_array($registrosCat,MYSQL_BOTH)){
		if($fila["id_categoria"] == $datosHotel['id_categoria']){
			echo("<option value='".$fila["id_categoria"]."' selected='selected'>".$fila["categoria"]."</option>");	
		}else{
			echo("<option value='".$fila["id_categoria"]."'>".$fila["categoria"]."</option>");
				}		
			}
    ?>
	</select><br />

    <input type="submit" value="Enviarmelo"  />
    <input type="reset" value="Resetea" />
    
</form>



</body>
</html>
