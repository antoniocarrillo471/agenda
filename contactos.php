<?php 
		require_once "menu.php";
        //require_once "clases/conexion2.php";
        //$query = mysqli_query($conexion2,"SELECT id_categoria  from t_categoria");
?>
	<!DOCTYPE html>
<html>
<head>

	<title></title>
	<?php require_once "scripts.php";  ?>
</head> 
<body style="background-image: url(img/mont.jpg)">
	<div class="container">
		<div class="row">
			<div class="col-sm-12" style="background:rgba(215,215,215,0.50)">
				<div class="card text-left" style="background:rgba(215,215,215,0.50);">
					<div class="card-header" style="text-align: center; font-size: 30px; font-family:Latin; font-style: oblique;
 ">
						Contactos
					</div>
					<div class="card-body" style="background:rgba(215,215,215,0.50);">
						<span class="btn btn-primary" data-toggle="modal" data-target="#agregarnuevosdatosmodal">
							Agregar nuevo <span class="fa fa-plus-circle"></span>
						</span>
						<hr>
						<div id="tablaDatatable"></div>
					</div>
					<div class="card-footer text-muted">
						By LeyteCorp
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="agregarnuevosdatosmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Agrega nuevo</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="frmnuevo">
						<label>Apellido Paterno</label>
						<input type="text" class="form-control input-sm" id="paterno" name="paterno">
						<label>Apellido Materno</label>
						<input type="text" class="form-control input-sm" id="materno" name="materno">
						<label>Nombre</label>
						<input type="text" class="form-control input-sm" id="nombre" name="nombre">
						<label>Telefono</label>
						<input type="number" class="form-control input-sm" id="telefono" name="telefono">
						<label>Email</label>
						<input type="email" class="form-control input-sm" id="email" name="email">
						<label>Categoria</label>
						<input type="text" class="form-control input-sm" id="id_categoria" name="id_categoria">
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" id="btnAgregarnuevo" class="btn btn-primary">Agregar nuevo</button>
				</div>
			</div>
		</div>
	</div>


	<!-- Modal -->
	<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Actualizar datos</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="frmnuevoU">
                        <input type="text" hidden="" id="id_agenda" name="id_agenda">
				        <label>Apellido Paterno</label>
						<input type="text" class="form-control input-sm" id="paternoU" name="paternoU">
						<label>Apellido Materno</label>
						<input type="text" class="form-control input-sm" id="maternoU" name="maternoU">
						<label>Nombre</label>
						<input type="text" class="form-control input-sm" id="nombreU" name="nombreU">
						<label>Telefono</label>
						<input type="number" class="form-control input-sm" id="telefonoU" name="telefonoU">
						<label>Email</label>
						<input type="email" class="form-control input-sm" id="emailU" name="emailU">
						<label>Categoria</label>
						<input type="text" class="form-control input-sm" id="id_categoriaU" name="id_categoriaU">
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" class="btn btn-warning" id="btnActualizar">Actualizar</button>
				</div>
			</div>
		</div>
	</div>


</body>
</html>


<script type="text/javascript">
	$(document).ready(function(){
		$('#btnAgregarnuevo').click(function(){
			datos=$('#frmnuevo').serialize();

			$.ajax({
				type:"POST",
				data:datos,
				url:"procesos/agregar.php",
				success:function(r){
					if(r==1){
						$('#frmnuevo')[0].reset();
						$('#tablaDatatable').load('tabla.php');
						alertify.success("agregado con exito :D");
					}else{
						alertify.error("Fallo al agregar :(");
					}
				}
			});
		});

		$('#btnActualizar').click(function(){
			datos=$('#frmnuevoU').serialize();

			$.ajax({
				type:"POST",
				data:datos,
				url:"procesos/actualizar.php",
				success:function(r){
					if(r==1){
						$('#tablaDatatable').load('tabla.php');
						alertify.success("Actualizado con exito :D");
					}else{
						alertify.error("Fallo al actualizar :(");
					}
				}
			});
		});
	});
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaDatatable').load('tabla.php');
	});
</script>

<script type="text/javascript">
	function agregaFrmActualizar(id_agenda){
		$.ajax({
			type:"POST",
			data:"id_agenda=" + id_agenda,
			url:"procesos/obtenDatos.php",
			success:function(r){
				datos=jQuery.parseJSON(r);
				$('#id_agenda').val(datos['id_agenda']);
				$('#paternoU').val(datos['paterno']);
				$('#maternoU').val(datos['materno']);
				$('#nombreU').val(datos['nombre']);
				$('#telefonoU').val(datos['telefono']);
				$('#emailU').val(datos['email']);
				$('#id_categoriaU').val(datos['id_categoria']);
			}
		});
	}

	function eliminarDatos(id_agenda){
		alertify.confirm('Eliminar datos', '¿Seguro de eliminar estos datos :(?', function(){ 

			$.ajax({
				type:"POST",
				data:"id_agenda=" + id_agenda,
				url:"procesos/eliminar.php",
				success:function(r){
					if(r==1){
						$('#tablaDatatable').load('tabla.php');
						alertify.success("Eliminado con exito !");
					}else{
						alertify.error("No se pudo eliminar...");
					}
				}
			});

		}
		, function(){

		});
	}
</script>
