<?php
include_once("datos.php");
include_once("funcionesBBDD.php");

$hotel = $_GET["idHotel"];

if(isset($_GET["botonazo"])){
	$enlace = conectar($server,$user,$password);
	seleccionBBDD($baseDatos,$enlace);
	$query = "DELETE FROM hotel WHERE nombre = '$hotel'";
	
	$bajaEjecutada = ejecutaQuery($query,$enlace);
	
	if($bajaEjecutada && (mysql_affected_rows($enlace) == 1)){
	//Si todo fue bien redireccionamos al formulario y pasamos una variable que lo indica
	header("Location: listadoHoteles.php?exitoBaja=true");
	}else{
	header("Location: listadoHoteles.php?exitoBaja=false");		
		}
	
	}
	else{



echo("<h1>Est&aacute; a punto de borrar el hotel $hotel, est&aacute; seguro de querer hacerlo?</h1>" );

?>

<form action="bajaHotel.php" name="formularioBorrar" method="get">
	<input type="hidden" name="idHotel" value="<?php echo($hotel);?>" />
    <input type="submit" value="borrar" name="botonazo"/>    
</form>

<?php
}
?>