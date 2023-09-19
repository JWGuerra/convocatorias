<?php
if (!isset($_SESSION['ADMIN_USERID'])) {
	redirect(web_root . "admin/index.php");
}
?>
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Lista de Comunicados <a href="index.php?view=add" class="btn btn-primary btn-xs  "> <i class="fa fa-plus-circle fw-fa"></i> Agregar Comunicado</a> </h1>
	</div>
	<!-- /.col-lg-12 -->
</div>

<div class="row">
	<label class="col-md-4 control-label" for="CONVOCATORIA" style="width: 200px;">Filtrar por Convocatoria:</label>
	<div class="col-md-8">
		<select class="form-control input-sm" id="CONVOCATORIA" name="CONVOCATORIA" style="width: 200px;">
			<option value="None">Seleccionar</option>
			<?php
			$sql = "Select * From tblConvocatoria";
			$mydb->setQuery($sql);
			$res  = $mydb->loadResultList();
			foreach ($res as $row) {
				# code...
				echo '<option value=' . $row->CONVOCATORIA . '>' . $row->CONVOCATORIA	 . '</option>';
			}
			?>
		</select>
	</div>
	<script>
		document.getElementById("CONVOCATORIA").addEventListener("change", function() {
			// Obtener el valor seleccionado
			var selectedValue = this.value;

			// Llamar a la función de filtrado
			filterTableByConvocatoria(selectedValue);
		});
	</script>
	<script>
		function filterTableByConvocatoria(convocatoria) {
			var table = document.getElementById("dash-table");
			var rows = table.getElementsByTagName("tr");

			// Recorrer las filas de la tabla y ocultar/mostrar según la convocatoria seleccionada
			for (var i = 1; i < rows.length; i++) { // Empezamos desde 1 para omitir el encabezado
				var row = rows[i];
				var convocatoriaCell = row.getElementsByTagName("td")[1]; // Cambiar el índice si es necesario

				if (convocatoria === "None" || convocatoriaCell.textContent === convocatoria) {
					row.style.display = "";
				} else {
					row.style.display = "none";
				}
			}
		}
	</script>

</div>
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header"> </h1>
	</div>
	<!-- /.col-lg-12 -->
</div>
<form action="controller.php?action=delete" Method="POST">
	<div class="table-responsive">
		<table id="dash-table" class="table table-striped table-bordered table-hover" style="font-size:12px" cellspacing="0">
			<thead>
				<tr>
					<th>ID</th>
					<th>Convocatoria</th>
					<th>Tipo</th>
					<th>Descripción</th>
					<th>Fecha Publicación</th>
					<th width="10%" align="center">Acción</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$mydb->setQuery("SELECT * FROM `tblComunicado`");
				$cur = $mydb->loadResultList();

				foreach ($cur as $result) {
					echo '<tr>';
					echo '<td>' . $result->IDCOMUNICADO . '</td>';
					echo '<td>' . $result->CONVOCATORIA . '</td>';
					echo '<td>' . $result->TIPOCOMUNICADO . '</td>';
					echo '<td>' . $result->DESCRIPCION . '</td>';
					echo '<td>' . $result->FECHAPUBLICACION . '</td>';
					echo 	'<td align="center"><a title="Edit" href="index.php?view=edit&id=' . $result->IDCOMUNICADO . '" class="btn btn-primary btn-xs  ">  <span class="fa fa-edit fw-fa"></a>
				  			<a title="Delete" href="controller.php?action=delete&id=' . $result->IDCOMUNICADO . '" class="btn btn-danger btn-xs  ">  <span class="fa  fa-trash-o fw-fa "></a></td>';
					echo 	'</tr>';
				}
				?>
			</tbody>
		</table>
		<div class="btn-group">
			<!--  <a href="index.php?view=add" class="btn btn-default">New</a> -->
			<?php
			if ($_SESSION['ADMIN_ROLE'] == 'Administrator') {
					// echo '<button type="submit" class="btn btn-default" name="delete"><span class="glyphicon glyphicon-trash"></span> Delete Selected</button'
				;
			} ?>
		</div>
</form>
<div class="table-responsive">