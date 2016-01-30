<?php /* Smarty version 3.1.27, created on 2015-12-10 08:47:47
         compiled from "C:\Program Files (x86)\Apache Software Foundation\Apache2.2\htdocs\EjemploSmarty\templates\index.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:2574356693c3342a398_71655748%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '075697f94da0f83cfcc346f1764349eec31f5897' => 
    array (
      0 => 'C:\\Program Files (x86)\\Apache Software Foundation\\Apache2.2\\htdocs\\EjemploSmarty\\templates\\index.tpl',
      1 => 1449737064,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2574356693c3342a398_71655748',
  'variables' => 
  array (
    'nombre' => 0,
    'apellidos' => 0,
    'profesion' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56693c3347e482_53372044',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56693c3347e482_53372044')) {
function content_56693c3347e482_53372044 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '2574356693c3342a398_71655748';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>

<h1>
Hola me llamo, <?php echo $_smarty_tpl->tpl_vars['nombre']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['apellidos']->value;?>

</h1>

<h2>
y mi profesion es <?php echo $_smarty_tpl->tpl_vars['profesion']->value;?>

</h2>



</body>
</html>
<?php }
}
?>