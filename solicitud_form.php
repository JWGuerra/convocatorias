<div class="form-group">
    <div class="col-md-11">
        <label class="col-md-6 control-label" for="DNI">DNI:</label>
        <div class="col-md-6">
            <input class="form-control input-sm" id="DNI" name="DNI" placeholder="DNI" type="text" value="" onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off" maxlength="8">
        </div>
    </div>
</div>

<div class="form-group">
    <div class="col-md-11">
        <label class="col-md-6 control-label" for="APELLIDOS">Apellidos:</label>
        <div class="col-md-6">
            <input name="deptid" type="hidden" value="">
            <input class="form-control input-sm" id="APELLIDOS" name="APELLIDOS" placeholder="Apellidos" onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
        </div>
    </div>
</div>

<div class="form-group">
    <div class="col-md-11">
        <label class="col-md-6 control-label" for="NOMBRES">Nombres:</label>
        <div class="col-md-6">
            <input name="deptid" type="hidden" value="">
            <input class="form-control input-sm" id="NOMBRES" name="NOMBRES" placeholder="Nombres" onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
        </div>
    </div>
</div>

<div class="form-group">
    <div class="col-md-11">
        <label class="col-md-6 control-label" for="DIRECCION">Dirección:</label>
        <div class="col-md-6">
            <textarea class="form-control input-sm" id="DIRECCION" name="DIRECCION" placeholder="Direccion" type="text" value="" required onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off"></textarea>
        </div>
    </div>
</div>

<div class="form-group">
    <div class="col-md-11">
        <label class="col-md-6 control-label" for="CORREO">Correo:</label>
        <div class="col-md-6">
            <input type="Email" class="form-control input-sm" id="CORREO" name="CORREO" placeholder="Email" autocomplete="false" />
        </div>
    </div>
</div>

<div class="form-group">
    <div class="col-md-11">
        <label class="col-md-6 control-label" for="CELULAR">Celular:</label>
        <div class="col-md-6">
            <input class="form-control input-sm" id="CELULAR" name="CELULAR" placeholder="Celular" type="text" any value="" required onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off" maxlength="9">
        </div>
    </div>
</div>

<div class="form-group">
    <div class="col-md-11">
        <label class="col-md-6 control-label" for="FORMACIONACADEMICA">Formación Académica:</label>
        <div class="col-md-6">
            <select class="form-control input-sm" id="FORMACIONACADEMICA" name="FORMACIONACADEMICA">
                <option value="None">Seleccionar</option>
                <option value="SECUNDARIA-COMPLETA">SECUNDARIA COMPLETA</option>
                <option value="SUPERIOR-TECNICA-INCOMPLETA">SUPERIOR TECNICA INCOMPLETA</option>
                <option value="SUPERIOR-TECNICA-COMPLETA">SUPERIOR TECNICA COMPLETA</option>
                <option value="SUPERIOR-UNIVERSITARIA-INCOMPLETA">SUPERIOR UNIVERSITARIA INCOMPLETA</option>
                <option value="SUPERIOR-UNIVERSITARIA-COMPLETA">SUPERIOR UNIVERSITARIA COMPLETA</option>
            </select>
        </div>
    </div>
</div>

<div class="form-group">
    <div class="col-md-11">
        <label class="col-md-6 control-label" for="PROFESION_OFICIO">Profesión / Oficio:</label>
        <div class="col-md-6">
            <input name="deptid" type="hidden" value="">
            <input class="form-control input-sm" id="PROFESION_OFICIO" name="PROFESION_OFICIO" placeholder="Profesión u Oficio" onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group">
    <div class="col-md-11">
        <label class="col-md-6 control-label" for="EXPERIENCIAPUBLICA">Experiencia Laboral Pública(meses):</label>
        <div class="col-md-6">
            <input name="deptid" type="hidden" value="">
            <input class="form-control input-sm" id="EXPERIENCIAPUBLICA" name="EXPERIENCIAPUBLICA" placeholder="Experiencia Laboral Pública (MESES)" onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group">
    <div class="col-md-11">
        <label class="col-md-6 control-label" for="EXPERIENCIAPRIVADA">Experiencia Laboral Privada(meses):</label>
        <div class="col-md-6">
            <input name="deptid" type="hidden" value="">
            <input class="form-control input-sm" id="EXPERIENCIAPRIVADA" name="EXPERIENCIAPRIVADA" placeholder="Experiencia Laboral Privada (MESES)" onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
        </div>
    </div>
</div>