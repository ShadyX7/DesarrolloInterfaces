<?php
/*INCLUDES DE LOS ARCHIVOS DE BASES DE DATOS Y CONEXIÓN CON EL SERVIDOR*/
include_once("datos.php");
include_once("funcionesBBDD.php");
/*INCLUDES DE LOS ARCHIVOS DE BASES DE DATOS Y CONEXIÓN CON EL SERVIDOR*/

require '../Smarty/libs/Smarty.class.php';

$smarty = new Smarty;
/*MENSAJES DE EXITO O ERROR*/
if(isset($_GET["exito"])){
	
	if ($_GET["exito"] == true){
		$smarty->assign("exito","La inserci&oacute;n fue bien");
	}
	if ($_GET["exito"] == false){
		$smarty->assign("exito","Problemas en la inserci&oacute;n");
	}

}
/*MENSAJES DE EXITO O ERROR*/



//$smarty->force_compile = true;
$smarty->debugging = true;
$smarty->caching = true;
$smarty->cache_lifetime = 120;

/*OBTENCIÓN DE REGISTROS DE LA BASE DE DATOS DE LAS CATEGORÍAS*/
$smarty->assign("enlaceListado","listadoHoteles.php");

$enlace = conectar($server,$user,$password);
seleccionBBDD($baseDatos,$enlace);
$query = "SELECT id_categoria,categoria FROM categoria";
$registros = ejecutaQuery($query,$enlace);

$arrayCategorias = array();

while ($fila = mysql_fetch_array($registros,MYSQL_ASSOC)){
	//Esto hace un append 
	$arrayCategorias[ ] = $fila;
	
}

$smarty->assign("categorias",$arrayCategorias);
/*OBTENCIÓN DE REGISTROS DE LA BASE DE DATOS DE LAS CATEGORÍAS*/
$smarty->display("formulario.tpl");






?>