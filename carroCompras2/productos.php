<?php
session_start();

$titulo = "Carrito de Compra con Php y Mysql";
include("conecta.php");
include("meta_tags.php");
include("cabecera.php");
?>
<!-- Información de la cesta-->
<div id="totales" style="float:right;padding:10px 25px 0 100px; background-color: #CECECE";>
		<table>
			<tr align="right">
				<td><strong>Cantidad de Productos:</strong></td>
				<td><?php echo $_SESSION["cantidadTotal"];?></td>
			</tr>
			<tr align="right">
				<td><strong>Total Compra:</strong></td>
				<td><?php echo $_SESSION["totalcoste"];?> €</td>
			</tr>
		</table>
</div>
<!-- FIN CESTA-->
<?php
include("izquierda.php");
?>
	<div id="derecha">
	<h1>Detalle de Productos</h1>
	
		<div class='text-border'>
		<?php
			/*MOSTRAR Carro*/
			//$id = $_GET['id'];
			
			$resultado = mysql_query("SELECT id, producto, precio FROM productos");
			
			//Desplegamos una tabla con los datos de los productos
			echo "<div class=verproductos>";
			echo "<table style=border:1px solid #333333>
				<tr class=titulo>
					<th style='display:none'>ID</th>
					<th class='desc_largo'>Producto</th>
					<th style='width:100px;text-align:right'>Precio</th>
					<th style='width:50px;text-align:right'>Acción</th>
				</tr>";
				
			// comienza un bucle que leera todos los registros y ejecutara las ordenes que siguen
			while ($productos = mysql_fetch_array($resultado)) { 
				echo "<tr class='borde_tabla'><td style='display:none'>" . $productos['id'] . "</td>";     // imprime el texto
				echo "<td>" . $productos['producto'] . "</td>";     // imprime el nombre
				echo "<td style='text-align:right'>" . $productos['precio'] . " € </td>"; // imprime el precio
				echo "<td style='text-align:right'>
								<a href='carro.php?id=" . $productos['id'] . "&action=";
								//Detectamos si el producto ya se ha añadido al cesta de la compra para usar una imagen u otra.
								//Si se ha añadido usamos una imagen para Restar una cantidad al carro
								if (isset($_SESSION['carro'][$productos['id']])){
									//echo "remove' alt='Eliminar del carro'><img src='img/remove_carro.png' width='48' height='48' alt='Eliminar del carro' title='Añadir producto al carrito'>";
									echo "removeProd' alt='Eliminar del carro'><img src='img/remove_carro.png' width='48' height='48' alt='Eliminar del carro' title='Añadir producto al carrito'>";
								}
								else
									echo "add' alt='Añadir al carro'><img src='img/add_carro.png' width='48' height='48' alt='Añadir al carrito' title='Añadir producto al carrito'>";
									
								
				echo "</a></td>";
			  echo "</tr>"; 
			} // fin del bucle de ordenes
							
			//cerramos la etiqueta tabla
			echo "</table>";
			
		
				echo $_SESSION["totalcoste"] . "<br>";
				echo $_SESSION["cantidadTotal"] . "<br>";
			
			echo "</div>";
		?>
		</div> <!-- Cierro text-border -->
	</div> <!-- Cierro derecha -->

<?php
include("pie.php");
include("cerrar_etiquetas.php");
?>