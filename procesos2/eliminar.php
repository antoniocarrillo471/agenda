<?php 
	
	require_once "../clases/Conexion.php";
	require_once "../clases/crudC.php";

	$obj= new crud();

	echo $obj->eliminar($_POST['id_categoria']);

 ?>