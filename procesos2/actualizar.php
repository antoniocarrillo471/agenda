<?php 
	require_once "../clases/Conexion.php";
	require_once "../clases/crudC.php";
	$obj= new crud();

	$datos=array(
		$_POST['nombreCU'],
		$_POST['descripcionU'],
		$_POST['id_categoria']
				);

	echo $obj->actualizar($datos);
	

 ?>