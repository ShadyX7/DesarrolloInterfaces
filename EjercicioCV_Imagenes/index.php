<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FORMULARIO CV/IMAGENES</title>
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
</head>

<body>
<form action="funciones.php" method="post" enctype="multipart/form-data">

<label for="nombre">Nombre</label>
 <input type="text" id="nombre" name="nombre" size="15" maxlength="40"/>
 
 <br />
 
 <label for="apellidos">Apellidos</label>
 <input type="text" id="apellidos" name="apellidos" size="15" maxlength="40"/>
 
 <br />
 
  <label for="dni">DNI</label>
 <input type="text" id="dni" name="dni" size="15" maxlength="9"/>
 
 
 <br />
 
 <label for="nacimiento">Fecha de nacimiento</label>
 <input type="text" id="nacimiento" name="nacimiento" size="15" maxlength="40"/>
 
 <br />
 
  <label for="telefono">Telefono</label>
 <input type="text" id="telefono" name="telefono" size="15" maxlength="9"/>
 
 <br />
 
  <label for="oficio">Oficio</label>
 <input type="text" id="oficio" name="oficio" size="15" maxlength="60"/>
 
 <br />
 
 <label for="file">Introduzca su foto de perfil</label>
 <input type="file" name="imagen[]" id="imagen1" /><br />
 <input type="file" name="imagen[]" id="imagen2" /><br />
 <input type="file" name="imagen[]" id="imagen3" /><br />
 <input type="file" name="imagen[]" id="imagen4" /><br />
 
 <br />
 
 <label for="file">Introduzca su curriculum</label>
 <input type="file" name="cv" id="cv" />
 
 <br />
 
 <input type="submit" value="Enviar" />
 
 </form>


</body>
</html>