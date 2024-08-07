<?php
if (!isset($_SESSION['ADMIN_USERID'])) {
	redirect(web_root . "admin/index.php");
}
?>
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Lista de Vacantes <a href="index.php?view=add" class="btn btn-primary btn-xs  "> <i class="fa fa-plus-circle fw-fa"></i> Agregar</a> </h1>
	</div>
	<!-- /.col-lg-12 -->
</div>
<form action="controller.php?action=delete" Method="POST">
	<div class="table-responsive">
		<table id="dash-table" class="table table-striped table-bordered table-hover" style="font-size:12px" cellspacing="0">
			<thead>
				<tr>
					<th>Convocatoria</th>
					<th>Servicio</th>
					<th>Categoría</th>
					<th>Remuneracion</th>
					<th>Formación Académica</th>
					<th>N° Vacantes</th>
					<th>Duracion</th>
					<th>Experiencia General</th>
					<th>Experiencia Específica</th>
					<th>Funciones</th>
					<th>Lugar de Trabajo</th>
					<th width="10%" align="center">Acción</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$mydb->setQuery("SELECT * FROM `tblVacante` j, `tblConvocatoria` c WHERE j.IDCONVOCATORIA=c.IDCONVOCATORIA");
				$cur = $mydb->loadResultList();
				foreach ($cur as $result) {
					echo '<tr>';
					echo '<td>' . $result->CONVOCATORIA . '</td>';
					echo '<td>' . $result->SERVICIO . '</td>';
					echo '<td>' . $result->CATEGORIA . '</td>';
					echo '<td>' . $result->REMUNERACION . '</td>';
					echo '<td>' . $result->FORMACIONACADEMICA . '</td>';
					echo '<td>' . $result->NROVACANTES . '</td>';
					echo '<td>' . $result->DURACION . '</td>';
					echo '<td>' . $result->EXPERIENCIAGENERAL ." MESES".'</td>';
					echo '<td>' . $result->EXPERIENCIAESPECIFICA ." MESES".'</td>';
					echo '<td>' . substr($result->FUNCIONES, 0, 40).'...'.'</td>';
					echo '<td>' . $result->LUGARTRABAJO . '</td>';
					echo '<td align="center"><a title="Edit" href="index.php?view=edit&id=' . $result->IDVACANTE . '" class="btn btn-primary btn-xs  ">  <span class="fa fa-edit fw-fa"></a>
				  		  <a title="Delete" href="controller.php?action=delete&id=' . $result->IDVACANTE . '" class="btn btn-danger btn-xs  ">  <span class="fa  fa-trash-o fw-fa "></a></td>';
					echo '</tr>';
				}
				?>
			</tbody>
		</table>
</form>
<div class="table-responsive">