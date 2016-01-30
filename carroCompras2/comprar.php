<?php
//Procesos para realizar la compra.
//*******************************************************************//
//1. Verificar que la lista de la compra es correcta.
//2. Enviar a la página para rellenar el formulario del cliente
//3. Realizar la compra
//*******************************************************************//
	session_start();

	$titulo = "Carrito de Compra con Php y Mysql";
	include("conecta.php");
	include("meta_tags.php");
	include("cabecera.php");
	include("izquierda.php");
?>
	<div id="derecha">
	
	<h1>Realizar la compra</h1>
	
		<div class='text-border'>
		<?php
		
		?>
		</div> <!-- Cierro text-border -->
	</div> <!-- Cierro derecha -->

<?php
include("pie.php");
include("cerrar_etiquetas.php");
?>