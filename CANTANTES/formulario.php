<?php

include_once("datos.php");
include_once("funcionesBBDD.php");


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
  <title>Formulario</title>
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

if (isset($_GET["exito"]) && $_GET["exito"] == true){
	echo("<h2> La inserci&oacute;n fue bien</h2>");
}
if (isset($_GET["exito"]) && $_GET["exito"] == false){
		echo("<h2> Problemas en la inserci&oacute;n </h2>");
}
echo('<a href=\'listadoCantantes.php\'>Todos los Cantantes</a>');
?>


<form action="insertaRegistros.php" method="post" name="formulario">
	<label for="nombre_cantante">Nombre del cantante</label>
    <input type="text" id="nombre_cantante" name="nombre_cantante" size="15" maxlength="40"/>
    <br />
	<label for="apellido_cantante">Apellido del cantante</label>
    <input type="text" id="apellido_cantante" name="apellido_cantante" size="15" maxlength="60"/>
    <br />
	<label for="fecha_nac">Fecha de nacimiento</label>
    <input type="text" id="fecha_nac" name="fecha_nac" size="15" maxlength="10"/>
    <br />
	<label for="edad">Edad del cantante</label>
    <input type="text" id="edad" name="edad" size="15" maxlength="60"/>
    <br />
    <label for="nombre_pais">Pais de nacimiento</label>
    <select name="nombre_pais" id="nombre_pais">
	
<?php

$enlace = conectar($server,$user,$password);
seleccionBBDD($baseDatos,$enlace);

$query = "SELECT * FROM pais";
$registros = ejecutaQuery($query,$enlace);
while ($fila = mysql_fetch_array($registros,MYSQL_BOTH)){
echo("<option value=".$fila["nombre_pais"].">".$fila["nombre_pais"]."</option>");
}

?>

</select><br />

    <input type="submit" value="Enviarmelo"  />
    <input type="reset" value="Resetea" />
    
</form>




</body>
</html>














