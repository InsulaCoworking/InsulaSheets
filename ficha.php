<?php
include("conexion.php");
$id = intval($_GET['id'])+1;
$range = 'A' . $id . ':Z' . $id;
$values = conectar($range);


$m = new Mustache_Engine(array(
    'loader' => new Mustache_Loader_FilesystemLoader(dirname(__FILE__) . '/views'),
));

//var_dump($values);
foreach ($values as $key=>$row) {
    $arr = array('nombre'=>$row[0],'imagen'=>$row[1],'descripcion'=>nl2br($row[2]),'ano'=>$row[3], 'id'=>$key);
}
//$template = $m->loadTemplate('ficha');
echo $m->render('ficha', $arr);

