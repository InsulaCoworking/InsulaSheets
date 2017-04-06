<?php
include("conexion.php");
$values = conectar('A1:Z');

$m = new Mustache_Engine(array(
    'loader' => new Mustache_Loader_FilesystemLoader(dirname(__FILE__) . '/views'),
));

//var_dump($values);
$arr = array();
foreach ($values as $key=>$row) {
  if ($key>0 && $row[0] != '')

  	// Modificar aquí según los campos necesarios de la hoja de cáculo. Los nombres se asocian después a la plantilla Mustache
    $arr['grupos'][] = array(
    	'nombre'=>$row[0],
    	'imagen'=>$row[1],
    	'ano'=>$row[3], 
    	'id'=>$key);
}
//$template = $m->loadTemplate('list');
echo $m->render('list', $arr);

