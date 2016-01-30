<?php
session_start();

$titulo = "Carrito de Compra con Php y Mysql";

include("conecta.php"); //conexión con la base de datos
include("meta_tags.php"); //definimos el título, los metas y la hojas de estilo
include("cabecera.php"); //incluimos la cabecera
include("izquierda.php"); 
?>
	<div id="derecha">
		<h1>Carrito de compras</h1>
	
		<div class='text-border'>
		<?php
			
			if (isset($_GET['id']))
				$id = $_GET['id'];
			else
				$id = 1;
			
			if (isset($_GET['action']))
				$action = $_GET['action'];
			else
				$action = "empty";
	
	
			switch($action){
			
				case "add":
					if(isset($_SESSION['carro'][$id]))
						$_SESSION['carro'][$id]++;
					else
						$_SESSION['carro'][$id]=1;
				break;
				
				case "remove":
					if(isset($_SESSION['carro'][$id]))
					{
						$_SESSION['carro'][$id]--;
						if($_SESSION['carro'][$id]==0)
							unset($_SESSION['carro'][$id]);
					}
					
				break;
				case "removeProd":
					if(isset($_SESSION['carro'][$id])){
						unset($_SESSION['carro'][$id]);
					}
				break;
				
				case "empty":
					unset($_SESSION['carro']);
				
				break;
						
				
			}

			/*MOSTRAR Carro*/
			/*echo "<pre>";
				print_r($_SESSION);
			echo "</pre>";

			echo "CANTIDAD: " .	$_SESSION['carro'][$id] . "<br>";
			echo "ID      : " . $id . "<br>";*/
			
			if(isset($_SESSION['carro'])){
				echo "<table border=0 cellspacing=5 cellpadding=3 width='500'>";
				$totalcoste = 0;
				$xTotal = 0;
				
				echo "<tr>";
					echo "<td>Producto</td>";
					echo "<td>Cantidad</td>";
					echo "<td>Acción</td>";
					echo "<td colspan=2 align=right>Total</td>";
				echo "</tr>";
				echo "<tr><td colspan=5><hr></td></tr>";
	
				
				foreach($_SESSION['carro'] as $id => $x){
					$resultado = mysql_query("SELECT id, producto, precio FROM productos WHERE id=$id");
					$mifila = mysql_fetch_array($resultado);
					$id = $mifila['id'];
					$producto = $mifila['producto'];
					//acortamos el nombre del producto a 40 caracteres
					$producto = substr($producto,0,40);
					$precio = $mifila['precio'];
					//Coste por artículo según la cantidad elegida
					$coste = $precio * $x;
					//Coste total del carro
					$totalcoste = $totalcoste + $coste;
					$xTotal = $xTotal + $x;
					
					echo "<tr>";
					echo "<td align='left'> $producto </td>";
					echo "<td align='center'>$x</td>";
					
					echo "<td align='left'>";
					//Botón para aumentar cantidad producto
					echo "<a href='carro.php?id=". $id ."&action=add'><img src='img/aumentar.png' alt='Aumentar cantidad' /></a>";
					//Botón para reducir cantidad producto
					echo "<a href='carro.php?id=". $id ."&action=remove'><img src='img/restar.png' alt='Reducir cantidad' /></a>";
					//Botón para eliminar el producto
					echo "<a href='carro.php?id=". $id ."&action=removeProd'><img src='img/eliminar.png' alt='Reducir cantidad' /></a></td>";
					
					echo "<td align='right'> = </td>";
					echo "<td align='right' style='margin-left:10px'>$coste €";
					echo "</tr>";
				}
				echo "<tr><td colspan='5'><hr></td></tr>";
				echo "<tr>";
				echo "<td align='right' colspan='4'><b><br>Total = </b></td>";
				echo "<td align='right'><b><br> $totalcoste </b> €</td>";
				echo "</tr>";
				//BOTON COMPRAR
				echo "<tr>";
				echo "<td align='right' colspan='5'>
						<a href='comprar.php'><input type='button' value='finalizar compra' /></a>
				</td>";
				echo "</tr>";
				
				echo "</table>";
				//Campos que nos serviran para informar la cesta de lo que llevamos comprados y que se mostrará en 
				//la página PRODUCTOS.
				$_SESSION["totalcoste"] = $totalcoste;
				$_SESSION["cantidadTotal"] = $xTotal;
				
			}
			else
				echo "El carro está vacío";
	
			
			echo "<p>Volver a la <a href='productos.php' title='lista de productos'>lista de productos</a></p>";
		
		?>
		</div> <!-- Cierro text-border -->
	</div> <!-- Cierro derecha -->

<?php
include("pie.php");
include("cerrar_etiquetas.php");
?>