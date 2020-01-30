<div class="content-wrapper">

	<section class="content-header">

		<h1>
			Lista Solicitudes
		</h1>

		<ol class="breadcrumb">

			<li><a href="<?= URL_BASE ?>home/principal"><i class="fa fa-dashboard"></i> Inicio</a></li>

			<li class="active">Gestor Solicitudes</li>

		</ol>

	</section>

	<section class="content">

		<div class="box">

			<div class="box-header with-border">
				
			</div>


			<div class="box-body">

				<table id="" class="table table-bordered table-striped dt-responsive tablalistasoliditudes" width="100%">

					<thead>

						<tr>

							<th>Codigo</th>
							<th>usuario</th>
							<th>Transaccion</th>
							<th>Detalles</th>
							<th>Fecha</th>
							<th>Estado</th>
							<th>Responder</th>
							

						</tr>

					</thead>
					<tbody>

					</tbody>

				</table> 

			</div>


		</div>
		<div class="box-footer">
			Solicitudes
        </div>

	</section>

</div>


<div id="modalRespuesta" class="modal fade" role="dialog">

	<div class="modal-dialog">

		<div class="modal-content">

			<form method="post" action="<?= URL_BASE ?>solicitudes/respuesta" enctype="multipart/form-data">

				<!--=====================================
				CABEZA DEL MODAL
				======================================-->

				<div class="modal-header" style="background:#3c8dbc; color:white">

					<button type="button" class="close" data-dismiss="modal">&times;</button>

					<h4 class="modal-title">Respuesta Solicitud</h4>

				</div>

				<!--=====================================
				CUERPO DEL MODAL
				======================================-->

				<div class="modal-body">

					<div class="box-body">

						<input type="hidden" class="id" name="id" />

						<input type="hidden" class="estado " name="estado" value="0" />
						<div class="form-group">

							<div class="panel">Solicitud de Respuesta</div>

							<textarea class="form-control detalles" rows="4" readonly></textarea>

						</div>

						<div class="form-group">

							<div class="panel">Respuesta</div>

							<textarea class="form-control" name="respuesta" rows="4" required></textarea>

						</div>

					</div>

				</div>

				<!--=====================================
				PIE DEL MODAL
				======================================-->

				<div class="modal-footer">

					<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

					<button type="submit" class="btn btn-primary">Responder</button>

				</div>

			</form>


		</div>

	</div>

</div>