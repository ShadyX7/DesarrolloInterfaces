<?php
$fichero = $_FILES["archivo"];
foreach($_FILES["archivo"] as $indice => $valor){
	echo($indice .": ". $valor."<br />");
}

echo("Cada una de las propiedades por separado<br />");
//Nombre del archivo en la máquina del cliente
echo($fichero['name']."<br />");


//Tipo MIME asociado al archivo(texto plano, imagen(de qué tipo), video(de qué tipo), etc)
echo($fichero['type']."<br />");

//Tamaño en bytes del archivo subido
echo($fichero['size']."<br />");

//Nombre temporal del archivo que se almacenará en el servidor
echo($fichero['tmp_name']."<br />");

//Código de error asociado con la subida del archivo
echo($fichero['error']."<br />");



copy($_FILES["archivo"]["tmp_name"],"archivo.txt");
?>