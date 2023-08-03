<section id="content">
<div class="container content">      
     
 <?php
 if (isset($_GET['search'])) {
     # code...
    $jobid = $_GET['search'];
 }else{
     $jobid = '';

 }
    $sql = "SELECT * FROM `tblcompany` c,`tbljob` j WHERE c.`COMPANYID`=j.`COMPANYID` AND JOBID LIKE '%" . $jobid ."%' ORDER BY DATEPOSTED DESC" ;
    $mydb->setQuery($sql);
    $cur = $mydb->loadResultList();


    foreach ($cur as $result) {
        # code...
 
 // `OCCUPATIONTITLE`, `REQ_NO_EMPLOYEES`, `SALARIES`, `DURATION_EMPLOYEMENT`, `QUALIFICATION_WORKEXPERIENCE`, `PREFEREDSEX`, `SECTOR_VACANCY`, `DATEPOSTED`
  ?> 
           <div class="container">
             <div class="mg-available-rooms">
                    <h5 class="mg-sec-left-title">Día de Publicación :  <?php echo date_format(date_create($result->DATEPOSTED),'M d, Y'); ?></h5>
                        <div class="mg-avl-rooms">
                            <div class="mg-avl-room">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <a href="#"><span class="fa fa-briefcase" style="font-size: 50px"></span><!-- <img src="img/room-1.png" alt="" class="img-responsive"> --></a>
                                    </div>
                                    <div class="col-sm-10">
                                        <div style="border-bottom: 1px solid #ddd;padding: 10px;font-size: 25px;font-weight: bold;color: #000;margin-bottom: 5px;"><?php echo $result->OCCUPATIONTITLE ;?> 
                                        </div> 
                                        <div class="row contentbody">
                                            <div class="col-sm-6">
                                                <ul>
                                                    <li><i class="fp-ht-bed"></i>N° de Vacantes : <?php echo $result->REQ_NO_EMPLOYEES; ?></li>
                                                    <li><i class="fp-ht-food"></i>Remuneración : <?php echo number_format($result->SALARIES,2);  ?></li>
                                                    <li><i class="fa fa-sun-"></i>Duración del Contrato : <?php echo $result->DURATION_EMPLOYEMENT; ?></li>
                                                </ul>
                                            </div>
                                            <div class="col-sm-6">
                                                <ul>
                                                    <!-- <li><i class="fp-ht-dumbbell"></i>Qualification/Work Experience : <?php echo $result->QUALIFICATION_WORKEXPERIENCE; ?></li> -->
                                                    <li><i class="fp-ht-tv"></i>Género : <?php echo $result->PREFEREDSEX; ?></li>
                                                    <li><i class="fp-ht-computer"></i>Lugar de Trabajo : <?php echo $result->SECTOR_VACANCY; ?></li>
                                                </ul>
                                            </div>
                                            <div class="col-sm-12">
                                                <p>Experiencia Laboral :</p>
                                                 <ul style="list-style: none;"> 
                                                    <li><?php echo $result->QUALIFICATION_WORKEXPERIENCE ;?></li> 
                                                </ul> 
                                            </div>
                                            <div class="col-sm-12"> 
                                                <p>Funciones:</p>
                                                <ul style="list-style: none;"> 
                                                     <li><?php echo $result->JOBDESCRIPTION ;?></li> 
                                                </ul> 
                                             </div>
                                            <div class="col-sm-12">
                                                <p>Nombre Convocatoria:</p>
                                                <ul style="list-style: none;">
                                                    <li><?php echo  $result->COMPANYNAME; ?><li> 
                                                </ul>
                                            </div>
                                        </div>
                                        <a href="<?php echo web_root; ?>index.php?q=apply&job=<?php echo $result->JOBID;?>&view=personalinfo" class="btn btn-main btn-next-tab">POSTULAR!</a>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
            </div>                             
<?php  } ?>    </div>
</section>