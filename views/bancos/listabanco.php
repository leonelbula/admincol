<div class="content-wrapper">

	<section class="content-header">

		<h1>
			Lista sucrsales
		</h1>

		<ol class="breadcrumb">

			<li><a href="<?= URL_BASE ?>home/principal"><i class="fa fa-dashboard"></i> Inicio</a></li>

			<li class="active">Gestor bancos</li>

		</ol>

	</section>

	<section class="content">

		<div class="box">

			<div class="box-header with-border">
				<button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarbanco">

					Agregar banco

				</button>
			</div>


			<div class="box-body">

				<table id="tablasucursal" class="table table-bordered table-striped dt-responsive tablalistabanco" width="100%">

					<thead>

						<tr>

							<th style="width:10px">Codigo</th>
							<th>Nombre</th>
							<th>Imagen</th>
							<th>Acciones</th>

						</tr>

					</thead>
					<tbody>

					</tbody>

				</table> 

			</div>


		</div>
		<div class="box-footer">
			Bancos
        </div>

	</section>

</div>


<div id="modalAgregarbanco" class="modal fade" role="dialog">

	<div class="modal-dialog">

		<div class="modal-content">

			<form method="post" action="<?= URL_BASE ?>bancos/registrarbancos" enctype="multipart/form-data">

				<!--=====================================
				CABEZA DEL MODAL
				======================================-->

				<div class="modal-header" style="background:#3c8dbc; color:white">

					<button type="button" class="close" data-dismiss="modal">&times;</button>

					<h4 class="modal-title">Agregar banco</h4>

				</div>

				<!--=====================================
				CUERPO DEL MODAL
				======================================-->

				<div class="modal-body">

					<div class="box-body">


						<div class="form-group">

							<div class="input-group">

								<span class="input-group-addon"><i class="fa fa-th"></i></span>

								<input type="text" class="form-control input-lg  nombrebanco" placeholder="Ingresar Nombre banco" name="nombrebanco" required> 

							</div> 

						</div>
						<div class="form-group">
							<label>Estado</label>
							<select class="form-control select2 seleccionarestado" style="width: 100%;" name="estado" required>

								<option>Seleccione una opcion</option>			
								<option value="1">Activado</option>
								<option value="0">Desactivado</option>

							</select>
						</div>


						<div class="form-group">

							<div class="panel">SUBIR IMAGEN</div>

							<input type="file" class="nuevaImagen" name="imagen">

							<p class="help-block">Peso máximo de la imagen 2MB</p>

							<img src="<?= URL_BASE ?>image/dancos/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

							<input type="hidden" name="imagenActual" id="imagenActual">

						</div>

					</div>

				</div>

				<!--=====================================
				PIE DEL MODAL
				======================================-->

				<div class="modal-footer">

					<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

					<button type="submit" class="btn btn-primary">Guardar</button>

				</div>

			</form>


		</div>

	</div>

</div>

<div id="modalEditarbanco" class="modal fade" role="dialog">

	<div class="modal-dialog">

		<div class="modal-content">

			<form method="post" action="<?= URL_BASE ?>bancos/actulizar" enctype="multipart/form-data">

				<!--=====================================
				CABEZA DEL MODAL
				======================================-->

				<div class="modal-header" style="background:#3c8dbc; color:white">

					<button type="button" class="close" data-dismiss="modal">&times;</button>

					<h4 class="modal-title">Editar banco</h4>

				</div>

				<!--=====================================
				CUERPO DEL MODAL
				======================================-->

				<div class="modal-body">

					<div class="box-body">

						<input type="hidden" class="id" name="id" />
						<div class="form-group">

							<div class="input-group">

								<span class="input-group-addon"><i class="fa fa-th"></i></span>

								<input type="text" class="form-control input-lg  nombre" placeholder="Ingresar Nombre banco" name="nombrebanco" required> 

							</div> 

						</div>
						<div class="form-group">
							<label>Tipo</label>
							<select class="form-control select2 seleccionarEstadobanco" style="width: 100%;" name="estado" required>							 
								<option class="optionEditarbanco"></option>			
								<option value="1">Activado</option>
								<option value="0">Desactivado</option>

							</select>
						</div>
						<div class="form-group">

							<div class="panel">SUBIR IMAGEN</div>

							<input type="file" class="nuevaImagen" name="editarImagen">							

							<p class="help-block">Peso máximo de la imagen 2MB</p>
							<div class="previsualizarImg"></div>
							<img src="<?= URL_BASE ?>image/dancos/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

							<input type="hidden" class="img" name="imagenActual" id="imagenActual">

						</div>

					</div>

				</div>

				<!--=====================================
				PIE DEL MODAL
				======================================-->

				<div class="modal-footer">

					<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

					<button type="submit" class="btn btn-primary">Guardar</button>

				</div>

			</form>


		</div>

	</div>

</div>
