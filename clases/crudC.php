<?php 

	class crud{
		public function agregar($datos){
			$obj= new Conexion();
			$conexion=$obj->conectar();

			$sql="INSERT into t_categoria (nombreC,descripcion)
									values ('$datos[0]',
											'$datos[1]')";
			return mysqli_query($conexion,$sql);
		}

		public function obtenDatos($id_categoria){
			$obj= new Conexion();
			$conexion=$obj->conectar();

			$sql="SELECT id_categoria,
							nombreC,
							descripcion
					from t_categoria 
					where id_categoria='$id_categoria'";
			$result=mysqli_query($conexion,$sql);
			$ver=mysqli_fetch_row($result);

			$datos=array(
				'id_categoria' => $ver[0],
				'nombreC' => $ver[1],
				'descripcion' => $ver[2]
				);
			return $datos;
		}

		public function actualizar($datos){
			$obj= new Conexion();
			$conexion=$obj->conectar();

			$sql="UPDATE t_categoria set nombreC='$datos[0]',
								      descripcion='$datos[1]'
						where id_categoria='$datos[2]'";
			return mysqli_query($conexion,$sql);
		}
        
		public function eliminar($id_categoria){
			$obj= new Conexion();
			$conexion=$obj->conectar();

			$sql="DELETE from t_categoria where id_categoria='$id_categoria'";
			return mysqli_query($conexion,$sql);
		}
	}

 ?>