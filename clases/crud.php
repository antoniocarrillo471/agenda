<?php 

	class crud{
		public function agregar($datos){
			$obj= new Conexion();
			$conexion=$obj->conectar();

			$sql="INSERT into t_agenda (paterno,materno,nombre,telefono,email,id_categoria)
									values ('$datos[0]',
											'$datos[1]',
											'$datos[2]',
											'$datos[3]',
											'$datos[4]',
											'$datos[5]')";
			return mysqli_query($conexion,$sql);
		}

		public function obtenDatos($id_agenda){
			$obj= new Conexion();
			$conexion=$obj->conectar();
            
            $sql="SELECT id_agenda,
							paterno,
							materno,
							nombre,
                            telefono,
                            email,
                            id_categoria
					from t_agenda 
					where id_agenda='$id_agenda'";
			//$sql="SELECT id_agenda, paterno, materno, nombre, telefono, email, nombreC from t_agenda INNER JOIN t_categoria where t_agenda.id_categoria = t_categoria.id_categoria";
			$result=mysqli_query($conexion,$sql);
			$ver=mysqli_fetch_row($result);

			$datos=array(
				'id_agenda' => $ver[0],
				'paterno' => $ver[1],
				'materno' => $ver[2],
				'nombre' => $ver[3],
				'telefono' => $ver[4],
				'email' => $ver[5],
				'id_categoria' => $ver[6]
				);
			return $datos;
		}

		public function actualizar($datos){
			$obj= new Conexion();
			$conexion=$obj->conectar();

			$sql="UPDATE t_agenda set paterno='$datos[0]',
										materno='$datos[1]',
										nombre='$datos[2]',
										telefono='$datos[3]',
										email='$datos[4]',
										id_categoria='$datos[5]'
						where id_agenda='$datos[6]'";
			return mysqli_query($conexion,$sql);
		}
		public function eliminar($id_agenda){
			$obj= new Conexion();
			$conexion=$obj->conectar();

			$sql="DELETE from t_agenda where id_agenda='$id_agenda'";
			return mysqli_query($conexion,$sql);
		}
	}

 ?>