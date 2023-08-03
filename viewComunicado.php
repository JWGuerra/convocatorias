<section id="content">
    <div class="container">      
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
        ?> 
                <div class="comunicadoContainer">
                        <div class="pdf">
                            <h5 class="mg-sec-left-title">Día de Publicación :  <?php echo date_format(date_create($result->DATEPOSTED),'M d, Y'); ?></h5>
                            <object class="pdfview" type="application/pdf" data="./pdf/CRONOGRAMA0001.pdf"></object>
                            <br>
                            <br>
                        </div>
                    </div>                             
        <?php  } ?>
    </div>
</section>

<!--        ESTILOS DE LA VISTA DE COMUNICADOS      -->
<style>
/* Ordenar los contenedores cadno el tamaño del dispositivo se reduzca */
@media only screen and (max-width: 1200px) {
.pdf{
    /* Centrado */
    margin: auto;
    position: relative;
    display: block;
    /* Tamaño */
    width: 100%;
  }
}
.pdfview {
    /* Centrado */
    margin: auto;
    display: block;
    /* Tamaño */
    width: 90%;
    height: 100vh;
    /* Mejorar aspecto */
    border-radius: 20px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}

</style>