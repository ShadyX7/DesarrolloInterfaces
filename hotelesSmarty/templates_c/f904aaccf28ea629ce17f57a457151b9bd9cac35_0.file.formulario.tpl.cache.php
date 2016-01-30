<?php /* Smarty version 3.1.27, created on 2015-12-14 09:59:11
         compiled from "C:\Program Files (x86)\Apache Software Foundation\Apache2.2\htdocs\hotelesSmarty\templates\formulario.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:16469566e84df871219_72111786%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f904aaccf28ea629ce17f57a457151b9bd9cac35' => 
    array (
      0 => 'C:\\Program Files (x86)\\Apache Software Foundation\\Apache2.2\\htdocs\\hotelesSmarty\\templates\\formulario.tpl',
      1 => 1450083280,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16469566e84df871219_72111786',
  'variables' => 
  array (
    'exito' => 0,
    'enlaceListado' => 0,
    'categorias' => 0,
    'valor' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_566e84df8d3883_68984658',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_566e84df8d3883_68984658')) {
function content_566e84df8d3883_68984658 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '16469566e84df871219_72111786';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta charset="utf-8">
  <title>Your page title here :)</title>
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
<?php if (isset($_smarty_tpl->tpl_vars['exito']->value)) {?>
	<?php echo $_smarty_tpl->tpl_vars['exito']->value;?>

<?php }?>

<a href="<?php echo $_smarty_tpl->tpl_vars['enlaceListado']->value;?>
">Todos los Hoteles</a>

<form action="insertaRegistros.php" method="post" name="formulario">
	<label for="nombre">Nombre del hotel</label>
    <input type="text" id="nombre" name="nombre" size="15" maxlength="40"/>
    <br />
	<label for="direccion">Direcci&oacute; del hotel</label>
    <input type="text" id="direccion" name="direccion" size="15" maxlength="60"/>
    <br />
	<label for="telefono">Tel&eacute;fono del hotel</label>
    <input type="text" id="telefono" name="telefono" size="15" maxlength="9"/>
    <br />
	<label for="anio">A&ntilde;o de construcci&oacute;n</label>
    <input type="text" id="anio" name="anio" size="15" maxlength="60"/>
    <br />
    <label for="categoria">Categor&iacute;a</label>
    <select name="categoria" id="categoria">
<!--DEBEMOS PROPORCIONAR UNA VARIABLE QUE RECORRER PARA SACAR LAS CATEGORÍAS-->

		<?php
$_from = $_smarty_tpl->tpl_vars['categorias']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['valor'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['valor']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['valor']->value) {
$_smarty_tpl->tpl_vars['valor']->_loop = true;
$foreach_valor_Sav = $_smarty_tpl->tpl_vars['valor'];
?>

			<option value="<?php echo $_smarty_tpl->tpl_vars['valor']->value['id_categoria'];?>
"><?php echo $_smarty_tpl->tpl_vars['valor']->value['categoria'];?>
</option>

		<?php
$_smarty_tpl->tpl_vars['valor'] = $foreach_valor_Sav;
}
?>

	</select><br />

    <input type="submit" value="Enviarmelo"  />
    <input type="reset" value="Resetea" />
    
</form>




</body>
</html>
<?php }
}
?>