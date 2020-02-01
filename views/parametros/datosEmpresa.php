<div class="content-wrapper">

	<section class="content-header">

		<h1>
			
		</h1>

		<ol class="breadcrumb">

			<li><a href="<?= URL_BASE ?>frontend/principal"><i class="fa fa-dashboard"></i> Inicio</a></li>

			<li class="active">Detalles Empresa</li>

		</ol>

	</section><br>
	<section class="content">

		<div class="box">

			<div class="box-header with-border">				
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEditarDatos" data-dismiss="modal">
					Editar Parametros
				</button>
				
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEditarDatosConsing" data-dismiss="modal">
					Editar Cuenta
				</button>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="box-body">

						<div class="panel panel-default">
							<div class="panel-heading">Informacion del Empresa</div>
							<ul class="list-group">			  
								<?php while ($row = $detallesEmpresa->fetch_object()):
									?>

									<li class="list-group-item"><b>NIT:</b><h4> <?= $row->nit ?></h4></li>
									<li class="list-group-item"><b>NOMBRE: </b><h4> <?= strtoupper($row->nombre) ?></h4></li>
									<li class="list-group-item"><b>Direccion: </b> <h4><?= $row->direccion ?> </h4></li>
									<li class="list-group-item"><b>Ciudad: </b> <h4><?= $row->ciudad ?></h4></li>
									<li class="list-group-item"><b>Departamento: </b> <h4><?= $row->departamento ?> </h4></li>							
									<li class="list-group-item"><b>Telefono:</b><h4> <?= $row->telefono ?></h4></li>									
								<?php endwhile; ?>
							</ul>
						</div>
					</div>
				</div>
				
				<div class="col-md-6">
					<div class="box-body">

						<div class="panel panel-default">
							<div class="panel-heading">Informacion del Empresa</div>
							<ul class="list-group">			  
								<?php while ($row = $detallesConsignacion->fetch_object()):
									?>

									<li class="list-group-item"><b>NUMERO DE CUENTA / NIT:</b><h4> <?= $row->numero ?></h4></li>
									<li class="list-group-item"><b>NOMBRE: </b><h4> <?= strtoupper($row->nombre) ?></h4></li>
													
								<?php endwhile; ?>
							</ul>
						</div>
					</div>
				</div>
				
			</div>
		</div>

	</section>

</div>

<div id="modalRegistrarDatos" class="modal fade" role="dialog">

	<div class="modal-dialog">

		<div class="modal-content">

			<form role="form" action="<?= URL_BASE ?>parametros/guardar" method="POST" enctype="multipart/form-data" >

				<!--=====================================
				CABEZA DEL MODAL
				======================================-->

				<div class="modal-header" style="background:#3c8dbc; color:white">

					<button type="button" class="close" data-dismiss="modal">&times;</button>

					<h4 class="modal-title">Agregar Datos Empresa</h4>

				</div>

				<!--=====================================
				CUERPO DEL MODAL
				======================================-->

				<div class="modal-body">

					<div class="box-body">


						<div class="form-group">
							<label>Nombre:</label>

							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-user"></i>
								</div>
								<input type="text" class="form-control" name="nombre" required>
							</div>
							<!-- /.input group -->
						</div>            

						<div class="form-group">
							<label>Nit - CC:</label>
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-tag"></i>
								</div>
								<input type="text" class="form-control"name="nit" required>
							</div>
							<!-- /.input group -->
						</div>             

						<div class="form-group">
							<label>Direccion:</label>

							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-map-marker"></i>
								</div>
								<input type="text" class="form-control" name="direccion" required>
							</div>
							<!-- /.input group -->
						</div>
						<div class="form-group">
							<label>Departamento:</label>

							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-map-marker"></i>
								</div>
								<input type="text" class="form-control" name="departamento" required>
							</div>
							<!-- /.input group -->
						</div>
						<div class="form-group">
							<label>Ciudad:</label>

							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-map-marker"></i>
								</div>
								<input type="text" class="form-control" name="ciudad" required>
							</div>
							<!-- /.input group -->
						</div>             
						<div class="form-group">
							<label>Telefono:</label>

							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-phone"></i>
								</div>
								<input type="text" class="form-control" name="telefono" data-inputmask='"mask": "(999) 999-9999"' data-mask>
							</div>
							<!-- /.input group -->
						</div>
						<div class="form-group">
							<label>Logo:</label>

							<div class="input-group">
								
								<input type="file" class="form-control" name="logo">
							</div>
							<!-- /.input group -->
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



<div id="modalEditarDatos" class="modal fade" role="dialog">

	<div class="modal-dialog">

		<div class="modal-content">

			<form role="form" action="<?= URL_BASE ?>parametros/actulizar" method="POST" enctype="multipart/form-data">
				<?php while ($row = $detallesEditar->fetch_object()): ?>

					<input type="hidden" name="id" value="<?= $row->id ?>" />			
					<!--=====================================
					CABEZA DEL MODAL
					======================================-->

					<div class="modal-header" style="background:#3c8dbc; color:white">

						<button type="button" class="close" data-dismiss="modal">&times;</button>

						<h4 class="modal-title">Agregar Datos Empresa</h4>

					</div>

					<!--=====================================
					CUERPO DEL MODAL
					======================================-->

					<div class="modal-body">

						<div class="box-body">


							<div class="form-group">
								<label>Nombre:</label>

								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-user"></i>
									</div>
									<input type="text" class="form-control" name="nombre" value="<?= $row->nombre ?>" required>
								</div>
								<!-- /.input group -->
							</div>            

							<div class="form-group">
								<label>Nit - CC:</label>
								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-tag"></i>
									</div>
									<input type="text" class="form-control"name="nit" value="<?= $row->nit ?>" required>
								</div>
								<!-- /.input group -->
							</div>             

							<div class="form-group">
								<label>Direccion:</label>

								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-map-marker"></i>
									</div>
									<input type="text" class="form-control" name="direccion" value="<?= $row->direccion ?>" required>
								</div>
								<!-- /.input group -->
							</div>
							<div class="form-group">
								<label>Departamento:</label>

								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-map-marker"></i>
									</div>
									<input type="text" class="form-control" name="departamento" value="<?= $row->departamento ?>" required>
								</div>
								<!-- /.input group -->
							</div>
							<div class="form-group">
								<label>Ciudad:</label>

								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-map-marker"></i>
									</div>
									<input type="text" class="form-control" name="ciudad" value="<?= $row->ciudad ?>" required>
								</div>
								<!-- /.input group -->
							</div>             
							<div class="form-group">
								<label>Telefono:</label>

								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-phone"></i>
									</div>
									<input type="text" class="form-control" name="telefono" value="<?= $row->telefono ?>" data-inputmask='"mask": "(999) 999-9999"' data-mask>
								</div>
								<!-- /.input group -->
							</div>	
							<div class="form-group">

							<div class="panel">SUBIR IMAGEN "logo"</div>

							<input type="file" class="nuevaImagen" name="imagen">

							<p class="help-block">Peso máximo de la imagen 2MB</p>
							<?php  if($row->logo != ''):?>
							<img src="<?= URL_BASE ?>image/logo/<?=$row->logo?>" class="img-thumbnail previsualizar" width="100px">
							<?php else: ?>
							<img src="<?= URL_BASE ?>image/logo/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">
							<?php endif;?>
							<input type="hidden" name="imagenActual" id="imagenActual" value=<?=$row->logo?>"">

						</div>

						</div>

					</div>
<?php endwhile; ?>
				<!--=====================================
				PIE DEL MODAL
				======================================-->

				<div class="modal-footer">

					<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

					<button type="submit" class="btn btn-primary">Editar</button>

				</div>

			</form>     

		</div>

	</div>

</div>

<div id="modalEditarDatosConsing" class="modal fade" role="dialog">

	<div class="modal-dialog">

		<div class="modal-content">

			<form role="form" action="<?= URL_BASE ?>parametros/actulizardatoscuenta" method="POST" >
				<?php while ($row3 = $detallesConsignacion2->fetch_object()): ?>

					<input type="hidden" name="id" value="<?= $row3->id ?>" />			
					<!--=====================================
					CABEZA DEL MODAL
					======================================-->

					<div class="modal-header" style="background:#3c8dbc; color:white">

						<button type="button" class="close" data-dismiss="modal">&times;</button>

						<h4 class="modal-title">Datos de cuenta</h4>

					</div>

					<!--=====================================
					CUERPO DEL MODAL
					======================================-->

					<div class="modal-body">

						<div class="box-body">


							<div class="form-group">
								<label>Nombre del Titular:</label>

								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-user"></i>
									</div>
									<input type="text" class="form-control" name="nombre" value="<?= $row3->nombre ?>" required>
								</div>
								<!-- /.input group -->
							</div>            

							<div class="form-group">
								<label>Nit - CC:</label>
								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-tag"></i>
									</div>
									<input type="text" class="form-control"name="numero" value="<?= $row3->numero ?>" required>
								</div>
								<!-- /.input group -->
							</div>             

																

						</div>

					</div>
<?php endwhile; ?>
				<!--=====================================
				PIE DEL MODAL
				======================================-->

				<div class="modal-footer">

					<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

					<button type="submit" class="btn btn-primary">Editar</button>

				</div>

			</form>     

		</div>

	</div>

</div>
