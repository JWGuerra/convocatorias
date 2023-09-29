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

<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close" id="closeModalBtn">&times;</span>
        <h2>Formulario Modal</h2>
        <form action="controller.php?action=savePoint" method="POST">
            <div class="form-group">
                <label for="opciones">Opciones:</label>
                <select id="opciones" name="opciones">
                    <option value="opcion1">Opción 1</option>
                    <option value="opcion2">Opción 2</option>
                    <option value="opcion3">Opción 3</option>
                </select>
            </div>
            <div class="form-group">
                <label for="inputSimple">Input Simple:</label>
                <input type="text" id="inputSimple" name="inputSimple" required>
            </div>
            <button type="button" id="guardarBtn">Guardar</button>
        </form>
    </div>
</div>


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

    /* Estilos para el modal */
    .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
    }

    .modal-content {
        background-color: #fff;
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 50%;
    }

    .close {
        float: right;
        font-size: 30px;
        font-weight: bold;
        cursor: pointer;
    }

    /* Estilos para el formulario */
    .form-group {
        margin-bottom: 15px;
    }

    /* Estilos para el botón */
    #guardarBtn {
        background-color: #4CAF50;
        color: white;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
    }

    #guardarBtn:hover {
        background-color: #45a049;
    }
</style>

<script>
    // Función para abrir el modal
    document.getElementById('openModalBtn').addEventListener('click', function() {
        document.getElementById('myModal').style.display = 'block';
    });

    // Función para cerrar el modal
    document.getElementById('closeModalBtn').addEventListener('click', function() {
        document.getElementById('myModal').style.display = 'none';
    });

    // Función para guardar los datos del formulario
    document.getElementById('guardarBtn').addEventListener('click', function() {
        const opciones = document.getElementById('opciones').value;
        const inputSimple = document.getElementById('inputSimple').value;

        // Aquí puedes hacer lo que desees con las opciones y el inputSimple
        // Por ejemplo, puedes enviarlos a un servidor o mostrarlos en la página.

        // Cerrar el modal después de guardar
        document.getElementById('myModal').style.display = 'none';
    });
</script>