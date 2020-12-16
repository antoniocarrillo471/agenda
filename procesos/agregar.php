<?php 
	require_once "../clases/Conexion.php";
	require_once "../clases/crud.php";
	$obj= new crud();

	$datos=array(
		$_POST['paterno'],
		$_POST['materno'],
		$_POST['nombre'],
		$_POST['telefono'],
		$_POST['email'],
		$_POST['id_categoria'],
				);

	echo $obj->agregar($datos);
	

 ?>