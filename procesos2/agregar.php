<?php 
	require_once "../clases/Conexion.php";
	require_once "../clases/crudC.php";
	$obj= new crud();

	$datos=array(
		$_POST['nombreC'],
		$_POST['descripcion']
				);

	echo $obj->agregar($datos);
	

 ?>