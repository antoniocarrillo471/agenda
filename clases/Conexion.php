
<?php 

	class Conexion{
		public function conectar(){
			$conexion = mysqli_connect('localhost', 
										'root', 
										'', 
										'agenda');
			return $conexion;
		}
	}
 ?>