<?php
if (!isset($_SESSION['ADMIN_USERID'])) {
  redirect(web_root . "admin/index.php");
}
?>

<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">Lista de Postulantes</h1>
  </div>
  <!-- /.col-lg-12 -->
</div>
<div class="row">
  <label class="col-md-4 control-label" for="CONVOCATORIA" style="width: 200px;">Filtrar por Convocatoria:</label>
  <div class="col-md-8">
    <select class="form-control input-sm" id="CONVOCATORIA" name="CONVOCATORIA" style="width: 200px;">
      <option value="None">Seleccionar</option>
      <?php
      $sql = "SELECT * FROM tblConvocatoria";
      $mydb->setQuery($sql);
      $res  = $mydb->loadResultList();
      foreach ($res as $row) {
        echo '<option value="' . $row->CONVOCATORIA . '">' . $row->CONVOCATORIA . '</option>';
      }
      ?>
    </select>
  </div>
</div>

<button id="exportToExcel" class="btn btn-success btn-sm">Exportar a Excel</button>

<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header"> </h1>
  </div>
</div>

<table id="dash-table" class="table table-striped table-hover table-responsive" style="font-size: 12px" cellspacing="0">
  <thead>
    <tr>
      <th>Postulante</th>
      <th>DNI</th>
      <th>Convocatoria</th>
      <th>Formación Académica</th>
      <th>Servicio al que Postula</th>
      <th>Fecha de Postulación</th>
      <th>Observación</th>
      <th width="14%">Acción</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $mydb->setQuery("SELECT * FROM tblConvocatoria c, tblRegistroPostulacion j, tblVacante j2, tblPostulante a WHERE c.IDCONVOCATORIA = j.IDCONVOCATORIA AND  j.IDVACANTE = j2.IDVACANTE AND j.IDPOSTULANTE = a.IDPOSTULANTE");
    $cur = $mydb->loadResultList();

    foreach ($cur as $result) {
      echo '<tr>';
      echo '<td>' . $result->APELLIDOS . ' ' . $result->NOMBRES . '</td>';
      echo '<td>' . $result->DNI . '</td>';
      echo '<td>' . $result->CONVOCATORIA . '</td>';
      echo '<td>' . $result->FORMACIONACADEMICA . '</td>';
      echo '<td>' . $result->SERVICIO . '</td>';
      echo '<td>' . $result->FECHAREGISTRO . '</td>';
      echo '<td>' . $result->OBSERVACIONES . '</td>';
      echo '<td align="center">    
                    <a title="View" href="index.php?view=view&id=' . $result->IDREGISTRO . '" class="btn btn-info btn-xs">
                    <span class="fa fa-info fw-fa"></span> Ver</a> 
                    <a title="Remove" href="controller.php?action=delete&id=' . $result->IDREGISTRO . '" class="btn btn-danger btn-xs">
                    <span class="fa fa-trash-o fw-fa"></span> Eliminar</a> 
                  </td>';
      echo '</tr>';
    }
    ?>
  </tbody>
</table>

<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.4/xlsx.full.min.js"></script>
<script>
  document.getElementById("exportToExcel").addEventListener("click", function() {
    exportTableToExcel("dash-table");
  });

  function exportTableToExcel(tableId) {
    const table = document.getElementById(tableId);
    const ws = XLSX.utils.table_to_sheet(table);

    // Crear un libro de Excel
    const wb = XLSX.utils.book_new();
    XLSX.utils.book_append_sheet(wb, ws, "Lista de Postulantes");

    // Guardar el archivo Excel
    XLSX.writeFile(wb, "lista_postulantes.xlsx");
  }
</script>
