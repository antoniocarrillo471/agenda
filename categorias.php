<?php 
		require_once "menu.php";
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
						Categorias
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
						<label>Nombre</label>
						<input type="text" class="form-control input-sm" id="nombreC" name="nombreC">
						<label>Descripcion</label>
						<input type="text" class="form-control input-sm" id="descripcion" name="descripcion">
					</form>
				</div>
				<div class="modal-footer" >
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="submit" id="btnAgregarnuevo" class="btn btn-primary">Agregar nuevo</button>
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
                        <input type="text" hidden="" id="id_categoria" name="id_categoria">
				        <label>Nombre</label>
						<input type="text" class="form-control input-sm" id="nombreCU" name="nombreCU">
						<label>Descripcion</label>
						<input type="text" class="form-control input-sm" id="descripcionU" name="descripcionU">
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
				url:"procesos2/agregar.php",
				success:function(r){
					if(r==1){
						$('#frmnuevo')[0].reset();
						$('#tablaDatatable').load('tabla2.php');
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
				url:"procesos2/actualizar.php",
				success:function(r){
					if(r==1){
						$('#tablaDatatable').load('tabla2.php');
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
		$('#tablaDatatable').load('tabla2.php');
	});
</script>

<script type="text/javascript">
	function agregaFrmActualizar(id_categoria){
		$.ajax({
			type:"POST",
			data:"id_categoria=" + id_categoria,
			url:"procesos2/obtenDatos.php",
			success:function(r){
				datos=jQuery.parseJSON(r);
				$('#id_categoria').val(datos['id_categoria']);
				$('#nombreCU').val(datos['nombreC']);
				$('#descripcionU').val(datos['descripcion']);
				
			}
		});
	}

	function eliminarDatos(id_categoria){
		alertify.confirm('Eliminar datos', '¿Seguro de eliminar estos datos :(?', function(){ 

			$.ajax({
				type:"POST",
				data:"id_categoria=" + id_categoria,
				url:"procesos2/eliminar.php",
				success:function(r){
					if(r==1){
						$('#tablaDatatable').load('tabla2.php');
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
