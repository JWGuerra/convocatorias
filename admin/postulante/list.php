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
	<div class="row">
		<div class="col-md-4">
			<select class="form-control input-sm" id="CONVOCATORIA" name="CONVOCATORIA" style="width: 200px;">
				<option value="None">Seleccionar</option>
				<?php
				$sql = "SELECT * FROM tblConvocatoria";
				$mydb->setQuery($sql);
				$res = $mydb->loadResultList();
				foreach ($res as $row) {
					echo '<option value=' . $row->CONVOCATORIA . '>' . $row->CONVOCATORIA . '</option>';
				}
				?>
			</select>
		</div>
		<div class="col-md-4">
			<button style="background: #016543;" id="exportToExcel" class="btn btn-success btn-sm">Exportar a Excel</button>
			<button style="background: #016543;" id="generatePdfButton" class="btn btn-success btn-sm">Generar PDF</button>
		</div>
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
				var convocatoriaCell = row.getElementsByTagName("td")[2]; // Cambiar el índice si es necesario

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

<form class="wow fadeInDownaction" action="controller.php?action=delete" Method="POST">
	<table id="dash-table" class="table table-striped  table-hover table-responsive" style="font-size:12px" cellspacing="0">

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
			$mydb->setQuery("SELECT * FROM `tblConvocatoria` c  , `tblRegistroPostulacion` j, `tblVacante` j2, `tblPostulante` a WHERE c.`IDCONVOCATORIA`=j.`IDCONVOCATORIA` AND  j.`IDVACANTE`=j2.`IDVACANTE` AND j.`IDPOSTULANTE`=a.`IDPOSTULANTE` ");
			$cur = $mydb->loadResultList();

			foreach ($cur as $result) {
				echo '<tr>';
				// echo '<td width="5%" align="center"></td>';
				echo '<td>' . $result->APELLIDOS . ' ' . $result->NOMBRES . '</td>';
				echo '<td>' . $result->DNI . '</a></td>';
				echo '<td>' . $result->CONVOCATORIA . '</a></td>';
				echo '<td>' . $result->FORMACIONACADEMICA . '</td>';
				echo '<td>' . $result->SERVICIO . '</td>';
				echo '<td>' . $result->FECHAREGISTRO . '</td>';
				echo '<td>' . $result->OBSERBACIONES . '</td>';
				echo '<td align="center" >    
					  		             <a title="View" href="index.php?view=view&id=' . $result->IDREGISTRO . '"  class="btn btn-info btn-xs  ">
					  		             <span class="fa fa-info fw-fa"></span> Ver</a> 
					  		             <a title="Remove" href="controller.php?action=delete&id=' . $result->IDREGISTRO . '"  class="btn btn-danger btn-xs  ">
					  		             <span class="fa fa-trash-o fw-fa"></span> Eliminar</a> 
					  					 </td>';
				echo '</tr>';
			}
			?>
		</tbody>
	</table>
	<!-- GENERAR EXCEL -->
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

			var selectedConvocatoria = document.getElementById("CONVOCATORIA").value;
			const fileName = selectedConvocatoria + "_lista_postulantes.xlsx";
			// Guardar el archivo Excel
			XLSX.writeFile(wb, fileName);
		}
	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/pdfmake.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/vfs_fonts.js"></script>

	<script>
		// Obtén el botón y la tabla
		const generatePdfButton = document.getElementById('generatePdfButton');
		const tableToConvert = document.getElementById('dash-table');

		// Agrega un controlador de eventos al botón
		generatePdfButton.addEventListener('click', function() {
			// Obtener la convocatoria seleccionada
			const selectedConvocatoria = document.getElementById('CONVOCATORIA').value;

			// Filtrar la tabla por la convocatoria seleccionada
			filterTableByConvocatoria(selectedConvocatoria);

			// Obtener los datos de la tabla visible excluyendo la última columna
			const visibleTableData = tableToPdf(tableToConvert, true); // El segundo argumento indica si se debe excluir la última columna

			// Define la estructura del documento PDF
			const documentDefinition = {
				content: [{
						text: 'Lista de Postulantes de la ' + selectedConvocatoria,
						style: 'header'
					},
					{
						table: {
							headerRows: 1,
							body: visibleTableData.body,
							widths: 'auto', // Ajusta automáticamente el ancho de las columnas al contenido
						},
						style: 'tableStyle',
					},
				],
				styles: {
					header: {
						fontSize: 16,
						bold: true,
						alignment: 'center',
						margin: [0, 0, 0, 20],
					},
					tableStyle: {
						fontSize: 10,
						margin: [0, 10, 0, 10], // Márgenes de la tabla
					},
					tableHeader: {
						bold: true, // Poner en negrita el encabezado de la tabla
					},
				},
				pageSize: 'A4', // Tamaño de la hoja (A4 es el tamaño estándar)
			};

			// Genera el PDF utilizando pdfmake
			pdfMake.createPdf(documentDefinition).open();
		});

		// Función para filtrar la tabla por convocatoria seleccionada
		function filterTableByConvocatoria(convocatoria) {
			const table = document.getElementById('dash-table');
			const rows = table.getElementsByTagName('tr');

			// Recorrer las filas de la tabla y ocultar/mostrar según la convocatoria seleccionada
			for (let i = 1; i < rows.length; i++) {
				const row = rows[i];
				const convocatoriaCell = row.getElementsByTagName('td')[2]; // Cambiar el índice si es necesario

				if (convocatoria === 'None' || convocatoriaCell.textContent === convocatoria) {
					row.style.display = '';
				} else {
					row.style.display = 'none';
				}
			}
		}

		// Función para convertir una tabla HTML en una tabla de pdfmake
		function tableToPdf(table, excludeLastColumn) {
			const rows = [];
			const headers = [];

			// Obtener las filas y celdas de la tabla visible
			const visibleRows = Array.from(table.getElementsByTagName('tr')).filter(
				(row) => row.style.display !== 'none'
			);

			// Obtener el número de columnas a incluir (excluyendo la última si es necesario)
			const numColumns = excludeLastColumn ? visibleRows[0].getElementsByTagName('th').length - 1 : visibleRows[0].getElementsByTagName('th').length;

			// Obtener los encabezados de la tabla
			for (let i = 0; i < numColumns; i++) {
				const headerCell = visibleRows[0].getElementsByTagName('th')[i];
				headers.push({
					text: headerCell.textContent,
					style: 'tableHeader'
				});
			}

			// Obtener los datos de la tabla visible
			for (let i = 1; i < visibleRows.length; i++) {
				const row = [];
				const cells = visibleRows[i].getElementsByTagName('td');

				for (let j = 0; j < numColumns; j++) {
					const cell = cells[j];
					row.push(cell.textContent);
				}

				rows.push(row);
			}

			return {
				body: [headers, ...rows],
			};
		}
	</script>

</form>