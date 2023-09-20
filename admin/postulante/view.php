<?php
global $mydb;
$red_id = isset($_GET['id']) ? $_GET['id'] : '';

$jobregistration = new registroVacante();
$jobreg = $jobregistration->single_registroVacante($red_id);
// `IDCONVOCATORIA`, `IDVACANTE`, `IDPOSTULANTE`, `APPLICANT`, `REGISTRATIONDATE`, `REMARKS`, `IDARCHIVO`, `PENDINGAPPLICATION`

$applicant = new Postulantes();
$appl = $applicant->single_Postulante($jobreg->IDPOSTULANTE);
// `FNAME`, `LNAME`, `MNAME`, `ADDRESS`, `SEX`, `CIVILSTATUS`, `BIRTHDATE`, `BIRTHPLACE`, `AGE`, `USERNAME`, `PASS`, `EMAILADDRESS`,CONTACTNO

$jobvacancy = new Vacante();
$job = $jobvacancy->single_Vacante($jobreg->IDVACANTE);
// `IDCONVOCATORIA`, `CATEGORY`, `FORMACIONACADEMICA`, `REQ_NO_EMPLOYEES`, `SALARIES`, `DURATION_EMPLOYEMENT`, `QUALIFICATION_WORKEXPERIENCE`, `FUNCIONES`, `PREFEREDSEX`, `SECTOR_VACANCY`, `JOBSTATUS`, `DATEPOSTED`

$company = new Convocatoria();
$comp = $company->single_convocatoria($jobreg->IDCONVOCATORIA);
// `COMPANYNAME`, `COMPANYADDRESS`, `COMPANYCONTACTNO`

$sql = "SELECT * FROM `tblArchivoAdjunto` WHERE `IDUSARIOARCHIVO`=" . $jobreg->IDPOSTULANTE;
$mydb->setQuery($sql);
$archivo = $mydb->loadSingleResult();
?>

<form action="controller.php?action=approve" method="POST">
	<div class="col-sm-12 content-header">Ver Detalles</div>
	<div class="col-sm-6 content-body">
		<p>DETALLES VACANTE</p>
		<h3><?php echo $job->SERVICIO; ?></h3>
		<input type="hidden" name="IDREGISTRO" value="<?php echo $jobreg->IDREGISTRO; ?>">
		<input type="hidden" name="IDPOSTULANTE" value="<?php echo $appl->IDPOSTULANTE; ?>">
		<div class="col-sm-6">
			<ul>
				<li><i class="fp-ht-bed"></i>Convocatoria : <?php echo $job->IDCONVOCATORIA; ?></li>
				<li><i class="fp-ht-bed"></i>N° de Vacantes : <?php echo $job->NROVACANTES; ?></li>
				<li><i class="fp-ht-bed"></i>Categoría : <?php echo $job->CATEGORIA; ?></li>
				<li><i class="fp-ht-food"></i>Remuneración : <?php echo number_format($job->REMUNERACION, 2);  ?></li>
				<li><i class="fa fa-sun-"></i>Formación Profesional : <?php echo $job->FORMACIONACADEMICA; ?></li>
				<li><i class="fa fa-sun-"></i>Duración del Contrato : <?php echo $job->DURACION; ?></li>
			</ul>
		</div>
		<div class="col-sm-12">
			<p>Experiencia General : </p>
			<p style="margin-left: 15px;"><?php echo $job->EXPERIENCIAGENERAL; ?> MESES</p>
		</div>
		<div class="col-sm-12">
			<p>Experiencia Específica : </p>
			<p style="margin-left: 15px;"><?php echo $job->EXPERIENCIAESPECIFICA; ?> MESES</p>
		</div>
		<div class="col-sm-12">
			<p>Funciones : </p>
			<p style="margin-left: 15px;"><?php echo $job->FUNCIONES; ?></p>
		</div>
		<div class="col-sm-12">
			<p>Lugar de Trabajo : </p>
			<p style="margin-left: 15px;"><?php echo $job->LUGARTRABAJO; ?></p>
		</div>
	</div>
	<div class="col-sm-6 content-body">
		<p>INFORMACIÓN DEL POSTULANTE</p>
		<h3> <?php echo $appl->APELLIDOS . ', ' . $appl->NOMBRES ?></h3>
		<ul>
			<li>DNI : <?php echo $appl->DNI; ?></li>
			<li>Dirección : <?php echo $appl->DIRECCION; ?></li>
			<li>N° Celular : <?php echo $appl->CELULAR; ?></li>
			<li>Correo : <?php echo $appl->CORREO; ?></li>
		</ul>
		<div class="col-sm-12">
			<p>Formación Profesional : </p>
			<p style="margin-left: 15px;"><?php echo $appl->FORMACIONACADEMICA; ?></p>
		</div>
	</div>
	<div class="col-sm-12 content-footer">
		<h4><i class="fa fa-paperclip"></i>Ver ficha de Postulación <a href="#" data-toggle="modal" data-target="#pdfModal"><span class="btn btn-success rounded-pill" style="background-color: #016543;">AQUÍ</span></a></h4>
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
						<h4 class="modal-title" id="pdfModalLabel">Postulante: <?php echo $appl->APELLIDOS . ', ' . $appl->NOMBRES ?></h4>
					</div>
					<div class="modal-body" style="height:500px;">
						<!-- Ubicación del PDF -->
						<iframe src="<?php echo web_root . 'applicant/' . $archivo->UBICACIONARCHIVO; ?>" style="width: 100%; height: 100%; border: none;"></iframe>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					</div>
				</div>
			</div>
		</div>

		<div class="col-sm-12">
			<div class="col-md-8">
				<label class="col-md-2 control-label" for="OBSERVACIONES">EVALUACIÓN:</label>
				<div class="col-md-4">
					<select class="form-control input-sm" id="OBSERVACIONES" name="OBSERVACIONES">
						<option value="None">Seleccionar</option>
						<option value="APROBADO">APROBADO</option>
						<option value="OBSERVADO">OBSERVADO</option>
					</select>
				</div>
			</div>
			<br>
			<br>
			<div class="col-sm-12">
				<textarea class="input-group" id="mensajeTextarea" name="MENSAJE" style="display: none;"></textarea>
			</div>
		</div>

		<script>
			// Obtén el campo de selección y el textarea por su ID
			var selectElement = document.getElementById("OBSERVACIONES");
			var textareaElement = document.getElementById("mensajeTextarea");

			// Agrega un evento onchange al campo de selección
			selectElement.addEventListener("change", function() {
				// Verifica si la opción seleccionada es "OBSERVADO"
				if (selectElement.value === "OBSERVADO") {
					// Si es "OBSERVADO", muestra el textarea
					textareaElement.style.display = "block";
					textareaElement.value = "";
				} else {
					// Si no es "OBSERVADO", oculta el textarea
					textareaElement.style.display = "none";
					if (selectElement.value === "APROBADO") {
						textareaElement.value ="Su Curriculum Vitae cumple con el perfil del Servico Solicitado. Esté atento a la publicación del CRONOGRAMA de entrevista, publicado en la página WEB.";
					} else {
						textareaElement.value ="";
					}
				}
			});
		</script>

		<div class="col-sm-12  submitbutton ">
			<button type="submit" name="submit" class="btn btn-primary">ENVIAR</button>
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