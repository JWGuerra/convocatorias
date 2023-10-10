<?php
global $mydb;
$red_id = isset($_GET['id']) ? $_GET['id'] : '';

$registrationPuestoLaboral = new puestoLaboral();
$registroLaboral = $registrationPuestoLaboral->single_RegistroPuestoLaboral($red_id);

?>

<form action="" method="POST">
	<div class="col-sm-6 content-body">
		<p>INFORMACIÓN DEL SOLICITANTEE</p>
		<h3> <?php echo $registroLaboral->APELLIDOS . ', ' . $registroLaboral->NOMBRES ?></h3>
		<ul>
			<li>DNI : <?php echo $registroLaboral->DNI; ?></li>
			<li>Dirección : <?php echo $registroLaboral->DIRECCION; ?></li>
			<li>N° Celular : <?php echo $registroLaboral->CELULAR; ?></li>
			<li>Correo : <?php echo $registroLaboral->CORREO; ?></li>
		</ul>
		<div class="col-sm-12">
			<p>Formación Profesional : </p>
			<p style="margin-left: 15px;"><?php echo $registroLaboral->FORMACIONACADEMICA; ?></p>
			<p>Profesión u Oficio : </p>
			<p style="margin-left: 15px;"><?php echo $registroLaboral->PROFESION_OFICIO; ?></p>
			<p>Experiencia Pública : </p>
			<p style="margin-left: 15px;"><?php echo $registroLaboral->EXPERIENCIAPUBLICA .' MESES'; ?></p>
			<p>Experiencia Privada : </p>
			<p style="margin-left: 15px;"><?php echo $registroLaboral->EXPERIENCIAPRIVADA .' MESES'; ?></p>
		</div>
	</div>
	<div class="col-sm-12 content-footer">
		<h4><i class="fa fa-paperclip"></i>Ver CV <a href="#" data-toggle="modal" data-target="#pdfModal"><span class="btn btn-success rounded-pill" style="background-color: #016543;">AQUÍ</span></a></h4>
		<div class="col-sm-12 slider">
		</div>

		<!-- Modal -->
		<div class="modal fade" id="pdfModal" tabindex="-1" role="dialog" aria-labelledby="pdfModalLabel">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content" style="border-radius: 2%;">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h4 class="modal-title" id="pdfModalLabel">Solicitante: <?php echo $registroLaboral->APELLIDOS . ', ' . $registroLaboral->NOMBRES ?></h4>
					</div>
					<div class="modal-body" style="height:500px;">
						<!-- Ubicación del PDF -->
						<iframe src="<?php echo substr($registroLaboral->UBICACIONCV, 24); ?>" style="width: 100%; height: 100%; border: none;"></iframe>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>

<style type="text/css">
	.content-header {
		min-height: 50px;
		border-bottom: 1px solid #ddd;
		font-size: 15px;
		font-weight: bold;
	}

	.content-body {
		min-height: 350px;
	}

	.content-body>p {
		padding: 10px;
		font-size: 12px;
		font-weight: bold;
		border-bottom: 1px solid #ddd;
	}

	.content-footer {
		min-height: 100px;
		border-top: 1px solid #ddd;
	}

	.content-footer>p {
		padding: 5px;
		font-size: 15px;
		font-weight: bold;
	}

	.content-footer textarea {
		width: 100%;
		height: 200px;
	}

	.content-footer .submitbutton {
		margin-top: 20px;
	}
</style>