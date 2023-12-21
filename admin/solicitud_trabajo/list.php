<?php
if (!isset($_SESSION['ADMIN_USERID'])) {
	redirect(web_root . "admin/index.php");
}
?>

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header"></h1>
	</div>
	<!-- Creación de botnones para exportar -->
	<label class="col-md-4 control-label" for="CONVOCATORIA" style="width: 200px;"></label>
	<div class="col-lg-12">
		<div class="col-md-4">
			<button style="background: #016543;" id="exportToExcel" class="btn btn-success btn-sm">Exportar a Excel</button>
			<button style="background: #016543;" id="generatePdfButton" class="btn btn-success btn-sm">Imprimir Lista</button>
		</div>
		<br>
		<br>
	</div>
</div>
<form class="wow fadeInDownaction" action="controller.php?action=delete" Method="POST">
	<table id="dash-table" class="table table-striped  table-hover table-responsive" style="font-size:12px" cellspacing="0">

		<thead>
			<tr>
				<th>DNI</th>
				<th>Solicitante</th>
				<th>Correo</th>
				<th>Celular</th>
				<th>Experiencia Pública</th>
				<th>Experiencia Privada</th>
				<th>Formación Académica</th>
				<th>Profesión u Oficio</th>
				<th width="14%">Acción</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$mydb->setQuery("SELECT * FROM `tblRegistroPuestoLaboral`");
			$cur = $mydb->loadResultList();
			foreach ($cur as $result) {
				echo '<tr>';
				echo '<td>' . $result->DNI . '</a></td>';
				echo '<td>' . $result->APELLIDOS . ' ' . $result->NOMBRES . '</td>';
				echo '<td>' . $result->CORREO . '</a></td>';
				echo '<td>' . $result->CELULAR . '</a></td>';
				echo '<td>' . $result->EXPERIENCIAPUBLICA . ' meses </td>';
				echo '<td>' . $result->EXPERIENCIAPRIVADA . ' meses </td>';
				echo '<td>' . $result->FORMACIONACADEMICA . '</td>';
				echo '<td>' . $result->PROFESION_OFICIO . '</td>';
				echo '<td align="center" >    
					  		             <a title="View" href="index.php?view=view&id=' . $result->IDREGISTROPUESTO . '"  class="btn btn-info btn-xs  ">
					  		             <span class="fa fa-info fw-fa"></span> Ver</a> 
					  		             <a title="Remove" href="controller.php?action=delete&id=' . $result->IDREGISTROPUESTO . '"  class="btn btn-danger btn-xs  ">
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

			const fileName = "Lista_solicitud_puesto_laboral.xlsx";
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

			// Obtener los datos de la tabla visible excluyendo la última columna
			const visibleTableData = tableToPdf(tableToConvert, true); // El segundo argumento indica si se debe excluir la última columna

			// Define la estructura del documento PDF
			const documentDefinition = {
				content: [{
						text: 'Lista de solicitudes de puestos de Trabajo',
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
						fontSize: 8,
						margin: [0, 10, 0, 10], // Márgenes de la tabla
					},
					tableHeader: {
						fillColor: '#016543', // Color de fondo de la fila de encabezado
						color: '#ffffff',
						alignment: 'center',
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