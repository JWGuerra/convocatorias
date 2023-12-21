<?php
if (!isset($_SESSION['ADMIN_USERID'])) {
	redirect(web_root . "admin/index.php");
}
?>
<div class="col-lg-12">
	<h1 class="page-header">Lista de Usuarios <a href="index.php?view=add" class="btn btn-primary btn-xs  "> <i class="fa fa-plus-circle fw-fa"></i> Agregar</a> </h1>
</div>
<div class="col-lg-12">
	<table id="dash-table" class="table  table-bordered table-hover table-responsive" style="font-size:12px;" cellspacing="0">
		<thead>
			<tr>
				<th>ID</th>
				<th>Nombre de Cuenta</th>
				<th>Nombre de Usuario</th>
				<th>Rol</th>
				<th width="10%">Acción</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$mydb->setQuery("SELECT * FROM  `tblusers`");
			$cur = $mydb->loadResultList();
			foreach ($cur as $result) {
				echo '<tr>';
				echo '<td>' . $result->USERID . '</a></td>';
				echo '<td>' . $result->FULLNAME . '</a></td>';
				echo '<td>' . $result->USERNAME . '</td>';
				echo '<td>' . $result->ROLE . '</td>';
				if ($result->USERID == $_SESSION['ADMIN_USERID'] || $result->ROLE == 'MainAdministrator' || $result->ROLE == 'Administrator') {
					$active = "Disabled";
				} else {
					$active = "";
				}
				echo '<td align="center" > <a title="Edit" href="index.php?view=edit&id=' . $result->USERID . '"  class="btn btn-primary btn-xs  ">  <span class="fa fa-edit fw-fa"></span></a>
				  					 <a title="Delete" href="controller.php?action=delete&id=' . $result->USERID . '" class="btn btn-danger btn-xs" ' . $active . '><span class="fa fa-trash-o fw-fa"></span> </a>
				  					 </td>';
				echo '</tr>';
			}
			?>
		</tbody>
	</table>
</div>