<?php
if (!isset($_SESSION['ADMIN_USERID'])) {
	redirect(web_root . "admin/index.php");
}
?>
<div class="container mt-5">
	<div class="row">
		<!-- Primera fila con dos secciones -->
		<div class="col-md-6">
			<h3 style="background-color:#016543;padding:5px;border-radius:10px;color:white;" class="text-center">Reporte de la Evaluación Curricular</h3>
			<br>
			<form class="form-horizontal" method="POST" action="plantilla_revision_fp.php">
				<div class="form-group">
					<label for="selectReport" class="col-sm-2 control-label">Convocatoria</label>
					<div class="col-sm-10">
						<select class="form-control input-sm" id="IDCONVOCATORIA" name="IDCONVOCATORIA">
							<?php
							$sql = "Select * From tblConvocatoria";
							$mydb->setQuery($sql);
							$res  = $mydb->loadResultList();
							foreach ($res as $row) {
								echo '<option value=' . $row->IDCONVOCATORIA . '>' . $row->CONVOCATORIA . '</option>';
							}
							?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-primary" name="generarInforme">Generar Informe</button>
					</div>
				</div>
			</form>

		</div>
		<div class="col-md-6">
			<h3 style="background-color: #016543; padding: 5px; border-radius: 10px; color: white;" class="text-center">Generar cronograma de entrevistas</h3>
			<br>
			<form class="form-horizontal" method="POST" action="generar_cronograma.php" onsubmit="return validarFormulario()">
				<div class="form-group">
					<label for="selectReport" class="col-sm-4 control-label">Convocatoria</label>
					<div class="col-sm-8">
						<select class="form-control input-sm" id="IDCONVOCATORIA" name="IDCONVOCATORIA">
							<?php
							$sql = "Select * From tblConvocatoria";
							$mydb->setQuery($sql);
							$res  = $mydb->loadResultList();
							foreach ($res as $row) {
								echo '<option value=' . $row->IDCONVOCATORIA . '>' . $row->CONVOCATORIA . '</option>';
							}
							?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="fechaEntrevista" class="col-sm-4 control-label">Fecha y Hora de Inicio</label>
					<div class="col-sm-8">
						<input type="datetime-local" class="form-control" id="fechaEntrevista" name="fechaEntrevista">
					</div>
				</div>
				<div class="form-group">
					<label for="DURACIONENTREVISTA" class="col-sm-4 control-label">Duración de entrevista:</label>
					<div class="col-sm-8">
						<input type="number" class="form-control" id="DURACIONENTREVISTA" name="DURACIONENTREVISTA" step="1">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-4 col-sm-10">
						<button type="submit" class="btn btn-primary" name="generarCronograma">Generar Cronograma</button>
					</div>
				</div>
			</form>
			<script>
				function validarFormulario() {
					// Obtener valores de los campos
					var idConvocatoria = document.getElementById("IDCONVOCATORIA").value;
					var fechaEntrevista = document.getElementById("fechaEntrevista").value;
					var duracionEntrevista = document.getElementById("DURACIONENTREVISTA").value;

					// Realizar validaciones aquí
					if (idConvocatoria === "") {
						alert("Por favor, seleccione una convocatoria.");
						return false; // Detener el envío del formulario
					}

					if (fechaEntrevista === "") {
						alert("Por favor, seleccione una fecha y hora de inicio.");
						return false; // Detener el envío del formulario
					}

					if (duracionEntrevista === "") {
						alert("Por favor, ingrese la duración de la entrevista.");
						return false; // Detener el envío del formulario
					}

					// Otras validaciones personalizadas pueden ir aquí

					// Si todas las validaciones son exitosas, el formulario se enviará
					return true;
				}
			</script>
		</div>
	</div>
	<div class="row">
		<!-- Segunda fila con otras dos secciones -->
		<div class="col-md-6">
			<h1 class="text-center">Sección 03</h1>
			<form class="form-horizontal">
				<div class="form-group">
					<label for="selectReport" class="col-sm-2 control-label">Tipo de Informe</label>
					<div class="col-sm-10">
						<select class="form-control" id="selectReport">
							<option value="informe1">Informe 1</option>
							<option value="informe2">Informe 2</option>
							<option value="informe3">Informe 3</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="searchBox" class="col-sm-2 control-label">Búsqueda</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="searchBox" placeholder="Escriba su búsqueda...">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="button" class="btn btn-primary">Buscar</button>
						<button type="button" class="btn btn-success">Generar Informe</button>
					</div>
				</div>
			</form>
		</div>
		<div class="col-md-6">
			<h1 class="text-center">Sección 04</h1>
			<form class="form-horizontal">
				<div class="form-group">
					<label for="selectReport" class="col-sm-2 control-label">Tipo de Informe</label>
					<div class="col-sm-10">
						<select class="form-control" id="selectReport">
							<option value="informe1">Informe 1</option>
							<option value="informe2">Informe 2</option>
							<option value="informe3">Informe 3</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="searchBox" class="col-sm-2 control-label">Búsqueda</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="searchBox" placeholder="Escriba su búsqueda...">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="button" class="btn btn-primary">Buscar</button>
						<button type="button" class="btn btn-success">Generar Informe</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="btn-group">
	<?php
	if ($_SESSION['ADMIN_ROLE'] == 'Administrator') {;
	} ?>
</div>