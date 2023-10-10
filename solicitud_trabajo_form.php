<section id="content">
    <div class="container content">
        <p> <?php check_message(); ?></p>
        <form class="form-horizontal span6  wow fadeInDown" action="process.php?action=puestoLaboral" enctype="multipart/form-data" method="POST" style="text-align: center;">
            <div class="col-sm-11">
                <div class="row">
                    <h2 class=" ">Registre su información personal para solicitar un puesto laboral</h2>
                    <?php require_once('solicitud_form.php') ?>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-header">
                            <div style="border-bottom: 1px solid #ddd;padding: 10px;font-size: 25px;font-weight: bold;color: #000;margin-bottom: 5px;">Adjuntar CV Documentado
                            </div>
                        </div>
                        <div class="panel-body">
                            <label class="col-md-2" for="picture" style="padding: 0;margin: 0;">Archivo Adjunto:</label>
                            <div class="col-md-10" style="padding: 0;margin: 0;">
                                <input id="UBICACIONCV" name="UBICACIONCV" type="file">
                                <input name="MAX_FILE_SIZE" type="hidden" value="1000000">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-11">
                    <button class="btn btn-primary btn-sm" name="save" type="submit"><strong>ENVIAR SOLICITUD </strong><span class="fa fa-arrow-right"></span></button>
                </div>
            </div>
        </form>
    </div>
</section>