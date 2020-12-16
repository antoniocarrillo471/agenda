<?php 
	require_once "../clases/Conexion.php";
	require_once "../clases/crud.php";
	$obj= new crud();

	$datos=array(
		$_POST['paternoU'],
		$_POST['maternoU'],
		$_POST['nombreU'],
		$_POST['telefonoU'],
		$_POST['emailU'],
		$_POST['id_categoriaU'],
		$_POST['id_agenda']
				);

	echo $obj->actualizar($datos);
	

 ?>