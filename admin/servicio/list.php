<?php
if (!isset($_SESSION['ADMIN_USERID'])) {
	redirect(web_root . "admin/index.php");
}
?>
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Lista de Servicios <a href="index.php?view=add" class="btn btn-primary btn-xs  "> <i class="fa fa-plus-circle fw-fa"></i> Agregar Servicio</a> </h1>
	</div>
</div>
<form action="controller.php?action=delete" Method="POST">
	<div class="table-responsive">
		<table id="dash-table" class="table table-striped table-bordered table-hover" style="font-size:12px" cellspacing="0">
			<thead>
				<tr>
					<th>Servicio</th>
					<th>Categoría</th>
					<th>Remuneración</th>
					<th width="10%" align="center">Acción</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$mydb->setQuery("SELECT * FROM `tblServicio`");
				$cur = $mydb->loadResultList();

				foreach ($cur as $result) {
					echo '<tr>';
					echo '<td>' . $result->SERVICIO . '</td>';
					echo '<td>' . $result->CATEGORIA . '</td>';
					echo '<td>' . $result->REMUNERACIONCATEGORIA . '</td>';
					echo '<td align="center"><a title="Edit" href="index.php?view=edit&id=' . $result->IDSERVICIO . '" class="btn btn-primary btn-xs  ">  <span class="fa fa-edit fw-fa"></a>
				  		     <a title="Delete" href="controller.php?action=delete&id=' . $result->IDSERVICIO . '" class="btn btn-danger btn-xs  ">  <span class="fa  fa-trash-o fw-fa "></a></td>';
					echo '</tr>';
				}
				?>
			</tbody>
		</table>
	</div>
</form>