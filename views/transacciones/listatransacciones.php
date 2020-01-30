<div class="content-wrapper">

	<section class="content-header">

		<h1>
			Lista Transacciones
		</h1>

		<ol class="breadcrumb">

			<li><a href="<?= URL_BASE ?>home/principal"><i class="fa fa-dashboard"></i> Inicio</a></li>

			<li class="active">Gestor Transacciones</li>

		</ol>

	</section>
	

	<section class="content">
		<div class="box-footer">
				Procesar
			</div>
		<div class="box">

			<div class="box-header with-border">
				
			</div>


			<div class="box-body">

				<table id="" class="table table-bordered table-striped dt-responsive tablalistatransaccionessinProcesar" width="100%">

					<thead>

						<tr>

							<th style="width:10px">Codigo</th>
							<th>Nombre</th>
							<th>Valor</th>
							<th>Banco</th>
							<th>Tipo Cuenta</th>							
							<th>Acciones</th>

						</tr>

					</thead>
					<tbody>

					</tbody>

				</table> 

			</div>


		</div>
		<div class="box-footer">
			Transacciones
        </div>

	</section>
	
	<section class="content">

		<div class="box">

			<div class="box-header with-border">

			</div>


			<div class="box-body">

				<table id="" class="table table-bordered table-striped dt-responsive tablalistatransacciones" width="100%">

					<thead>

						<tr>

							<th style="width:10px">Codigo</th>
							<th>Nombre</th>
							<th>Valor</th>
							<th>Banco</th>
							<th>Tipo Cuenta</th>
							<th>Anexo</th>
							<th>Acciones</th>

						</tr>

					</thead>
					<tbody>

					</tbody>

				</table> 

			</div>


		</div>
		<div class="box-footer">
			Transacciones
        </div>

	</section>

</div>

<div id="modalConfirmar" class="modal fade" role="dialog">

	<div class="modal-dialog">

		<div class="modal-content">

			<form method="post" action="<?= URL_BASE ?>transacciones/confirmar" enctype="multipart/form-data">

				<!--=====================================
				CABEZA DEL MODAL
				======================================-->

				<div class="modal-header" style="background:#3c8dbc; color:white">

					<button type="button" class="close" data-dismiss="modal">&times;</button>

					<h4 class="modal-title">Confirmar Operacion</h4>

				</div>

				<!--=====================================
				CUERPO DEL MODAL
				======================================-->

				<div class="modal-body">

					<div class="box-body">

						<input type="hidden" class="id" name="id" />

						<input type="hidden" class="estado" name="estado" value="0" />

						<div class="form-group">

							<div class="panel">SUBIR IMAGEN DE CONFIRMAION</div>

							<input type="file" class="nuevaimg" name="img">							

							<p class="help-block">Peso máximo de la imagen 2MB</p>

						</div>

					</div>

				</div>

				<!--=====================================
				PIE DEL MODAL
				======================================-->

				<div class="modal-footer">

					<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

					<button type="submit" class="btn btn-primary">Confirmar</button>

				</div>

			</form>


		</div>

	</div>

</div>
<div id="modalPorcesar" class="modal fade" role="dialog">

	<div class="modal-dialog">

		<div class="modal-content">

			<form method="post" action="<?= URL_BASE ?>transacciones/confproceso" enctype="multipart/form-data">

				<!--=====================================
				CABEZA DEL MODAL
				======================================-->

				<div class="modal-header" style="background:#3c8dbc; color:white">

					<button type="button" class="close" data-dismiss="modal">&times;</button>

					<h4 class="modal-title">Porcesar Operacion</h4>

				</div>

				<!--=====================================
				CUERPO DEL MODAL
				======================================-->

				<div class="modal-body">

					<div class="box-body">

						<input type="hidden" class="idProceso" name="id" />

						<input type="hidden" class="estado" name="estado" value="3" />
						
						<div class="form-group">

							<div class="panel">Valor</div>

							<input type="text" class="form-control valorProceso" readonly />							


						</div>

						<div class="form-group">

							<div class="panel">Valor a Consignar</div>

							<input type="number"class="form-control" name="nuevovalor">							

							

						</div>
						

					</div>

				</div>

				<!--=====================================
				PIE DEL MODAL
				======================================-->

				<div class="modal-footer">

					<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

					<button type="submit" class="btn btn-primary">Confirmar</button>

				</div>

			</form>


		</div>

	</div>

</div>

<div id="modalVerConfirmacion" class="modal fade" role="dialog">

	<div class="modal-dialog">

		<div class="modal-content">

			<form method="post" action="<?= URL_BASE ?>transacciones/confirmar" enctype="multipart/form-data">

				<!--=====================================
				CABEZA DEL MODAL
				======================================-->

				<div class="modal-header" style="background:#3c8dbc; color:white">

					<button type="button" class="close" data-dismiss="modal">&times;</button>

					<h4 class="modal-title">Ver anexo</h4>

				</div>

				<!--=====================================
				CUERPO DEL MODAL
				======================================-->

				<div class="modal-body">

					<div class="box-body">

						<input type="hidden" class="id" name="id" />

						<input type="hidden" class="estado" name="estado" value="0" />

						<div class="form-group">

							<img src="<?= URL_BASE ?>/image/transaciones/default.jpg" class="previsualizar"  width="550" height="500">

						</div>

					</div>

				</div>

				<!--=====================================
				PIE DEL MODAL
				======================================-->

				<div class="modal-footer">

					<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>



				</div>

			</form>


		</div>

	</div>

</div>

<div id="modalVer" class="modal fade" role="dialog">

	<div class="modal-dialog">

		<div class="modal-content">

			<form method="post" action="" enctype="multipart/form-data">

				<!--=====================================
				CABEZA DEL MODAL
				======================================-->

				<div class="modal-header" style="background:#3c8dbc; color:white">

					<button type="button" class="close" data-dismiss="modal">&times;</button>

					<h4 class="modal-title">Ver</h4>

				</div>

				<!--=====================================
				CUERPO DEL MODAL
				======================================-->

				<div class="modal-body">

					<div class="box-body">

						<input type="hidden" class="id" name="id" />

						<input type="hidden" class="estado" name="estado" value="0" />

						<div class="form-group">

							<div class="col-sm-4 invoice-col">	
								<h3 ><strong>Nombre:</strong> <p class="nombre"> </p> </h3>

								<address>
									<h4><strong>Fecha:</strong><p class="fecha"> </p>  </h4>									
									<h4><strong>Valor: </strong> <p class="valor"> </p> </h4>
									<h4><strong>Numero Cuenta: </strong> <p class="numero"> </p></h4>
									<h4><strong>Tipo Cuenta : </strong> <p class="tipo"> </p></h4>
									<h4><strong>Banco : </strong> <p class="banco"> </p> <br></h4>										
								</address>
								<div class="form-group">

									<img src="<?= URL_BASE ?>/image/transaciones/default.jpg" class="previsualizar"  width="500" height="450">

								</div>
							</div>

						</div>

					</div>

				</div>

				<!--=====================================
				PIE DEL MODAL
				======================================-->

				<div class="modal-footer">

					<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>



				</div>

			</form>


		</div>

	</div>

</div>