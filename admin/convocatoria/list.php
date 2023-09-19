<?php
if (!isset($_SESSION['ADMIN_USERID'])) {
	redirect(web_root . "admin/index.php");
}
?>
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Lista de Convocatorias <a href="index.php?view=add" class="btn btn-primary btn-xs  "> <i class="fa fa-plus-circle fw-fa"></i> Agregar</a> </h1>
	</div>
</div>
<form action="controller.php?action=delete" Method="POST">
	<div class="table-responsive">
		<table id="dash-table" class="table table-striped table-bordered table-hover" style="font-size:12px" cellspacing="0">
			<thead>
				<tr>
					<!-- <th>No.</th> -->
					<th>ID</th>
					<th>Nombre</th>
					<th>N°</th>
					<th>Año</th>
					<th width="10%" align="center">Acción</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$mydb->setQuery("SELECT * FROM `tblConvocatoria`");
				$cur = $mydb->loadResultList();

				foreach ($cur as $result) {
					echo '<tr>';
					echo '<td>' . $result->IDCONVOCATORIA . '</td>';
					echo '<td>' . $result->CONVOCATORIA . '</td>';
					echo '<td>' . $result->NROCONVOCATORIA . '</td>';
					echo '<td>' . $result->ANIO . '</td>';
					echo '<td align="center"><a title="Edit" href="index.php?view=edit&id=' . $result->IDCONVOCATORIA . '" class="btn btn-primary btn-xs  ">  <span class="fa fa-edit fw-fa"></a>
				  		     <a title="Delete" href="controller.php?action=delete&id=' . $result->IDCONVOCATORIA . '" class="btn btn-danger btn-xs  ">  <span class="fa  fa-trash-o fw-fa "></a></td>';
					echo '</tr>';
				}
				?>
			</tbody>

		</table>
		<div class="btn-group">
			<!--<a href="index.php?view=add" class="btn btn-default">Agregar</a>-->
			<?php
			if ($_SESSION['ADMIN_ROLE'] == 'Administrator') {
					//echo '<button type="submit" class="btn btn-default" name="delete"><span class="glyphicon glyphicon-trash"></span> Delete Selected</button'
				;
			} ?>
		</div>
</form>