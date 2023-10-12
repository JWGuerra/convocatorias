<?php 
global $mydb;
	$red_id = isset($_GET['id']) ? $_GET['id'] : '';

	$jobregistration = New registroVacante();
	$jobreg = $jobregistration->single_registroVacante($red_id);
	 // `IDCONVOCATORIA`, `IDVACANTE`, `IDPOSTULANTE`, `APPLICANT`, `REGISTRATIONDATE`, `REMARKS`, `FILEID`, `PENDINGAPPLICATION`


	$applicant = new Postulantes();
	$appl = $applicant->single_Postulante($jobreg->IDPOSTULANTE);
 // `FNAME`, `LNAME`, `MNAME`, `ADDRESS`, `SEX`, `CIVILSTATUS`, `BIRTHDATE`, `BIRTHPLACE`, `AGE`, `USERNAME`, `PASS`, `EMAILADDRESS`,CONTACTNO

	$jobvacancy = New Vacante();
	$job = $jobvacancy->single_Vacante($jobreg->IDVACANTE);
 // `IDCONVOCATORIA`, `CATEGORY`, `OCCUPATIONTITLE`, `REQ_NO_EMPLOYEES`, `SALARIES`, `DURATION_EMPLOYEMENT`, `QUALIFICATION_WORKEXPERIENCE`, `FUNCIONES`, `PREFEREDSEX`, `SECTOR_VACANCY`, `JOBSTATUS`, `DATEPOSTED`

	$company = new Convocatoria();
	$comp = $company->single_convocatoria($jobreg->IDCONVOCATORIA);
	 // `COMPANYNAME`, `COMPANYADDRESS`, `COMPANYCONTACTNO`

	 $sql = "SELECT * FROM `tblArchivoAdjunto` WHERE `IDUSARIOARCHIVO`=" . $jobreg->IDPOSTULANTE;
	$mydb->setQuery($sql);
	$attachmentfile = $mydb->loadSingleResult();


?> 
<style type="text/css">
.content-header {
	min-height: 50px;
	border-bottom: 1px solid #ddd;
	font-size: 20px;
	font-weight: bold;
}
.content-body {
	min-height: 350px;
	/*border-bottom: 1px solid #ddd;*/
}
.content-body >p {
	padding:10px;
	font-size: 12px;
	font-weight: bold;
	border-bottom: 1px solid #ddd;
}
.content-footer {
	min-height: 100px;
	border-top: 1px solid #ddd;

}
.content-footer > p {
	padding:5px;
	font-size: 15px;
	font-weight: bold; 
}
 
.content-footer textarea {
	width: 100%;
	height: 200px;
}
.content-footer  .submitbutton{  
	margin-top: 20px;
	/*padding: 0;*/

}
</style>
<form action="controller.php?action=approve" method="POST">
<div class="col-sm-12 content-header" style="">Ver Detalles</div>
<div class="col-sm-12 content-body" >  
	<h3><?php echo $job->SERVICIO; ?></h3>
	<input type="hidden" name="JOBREGID" value="<?php echo $jobreg->IDREGISTRO;?>">

	<div class="col-sm-6">
		<ul>
            <li><i class="fp-ht-food"></i>Remuneración : <?php echo number_format($job->REMUNERACION,2);  ?></li>
            <li><i class="fa fa-sun-"></i>Duración del contrato : <?php echo $job->DURACION; ?></li>
			<li><i class="fp-ht-tv"></i>Formación Académica Requerida : <?php echo $job->FORMACIONACADEMICA; ?></li>
        </ul>
	</div> 
	<div class="col-sm-6">
		<ul> 
			<li><i class="fp-ht-computer"></i>Lugar de Trabajo : <?php echo $job->LUGARTRABAJO; ?></li>
            <li><i class="fp-ht-computer"></i>Experiencia General : <?php echo $job->EXPERIENCIAGENERAL; ?> meses</li>
			<li><i class="fp-ht-computer"></i>Experiencia Específica : <?php echo $job->EXPERIENCIAESPECIFICA; ?> meses</li>
        </ul>
	</div>
	<div class="col-sm-12">
		<p>Funciones : </p>   
		<p style="margin-left: 15px;"><?php echo $job->FUNCIONES;?></p>
	</div>
	<div class="col-sm-12"> 
		<p>Convocatoria : </p> 
		<p style="margin-left: 15px;"><?php echo $comp->CONVOCATORIA ; ?></p>
	</div>
</div>
 
<div class="col-sm-12 content-footer">
<p><i class="fa fa-paperclip"></i>  Archivo Enviado</p>
	<div class="col-sm-12 slider">
		 <h3>Descargar Ficha de Postulación <a target="_blank" href="<?php echo web_root.'applicant/'.$attachmentfile->UBICACIONARCHIVO; ?>">AQUÍ</a></h3>
	</div>  
	<div class="col-sm-12  submitbutton "> 
		<a href="index.php?view=appliedjobs" class="btn btn-primary fa fa-arrow-left"> VOLVER</a>
	</div> 
</div>
</form>