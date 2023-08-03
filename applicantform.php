
<!-- <div class="form-group">
  <div class="col-md-11">
  <label class="col-md-4 control-label" for=
    "NATIONALID">NationalID:</label>

    <div class="col-md-8"> 
       <input class="form-control input-sm" id="NATIONALID" name="NATIONALID" placeholder=
          "00-000000000000" type="text" value=""  onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
    </div>
  </div>
</div> -->
<div class="form-group">
	<div class="col-md-11">
	<label class="col-md-4 control-label" for=
		"FNAME">Apellido Paterno:</label>

		<div class="col-md-8">
		  <input name="JOBID" type="hidden" value="<?php echo $_GET['job'];?>">
		   <input class="form-control input-sm" id="FNAME" name="FNAME" placeholder=
		      "Apellido Paterno" type="text" value=""  onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
		</div>
	</div>
</div>

<div class="form-group">
	<div class="col-md-11">
		<label class="col-md-4 control-label" for=
		"LNAME">Apellido Materno:</label>

		<div class="col-md-8">
		  <input name="deptid" type="hidden" value="">
		  <input  class="form-control input-sm" id="LNAME" name="LNAME" placeholder=
		      "Apellido Materno"    onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
		  </div>
	</div>
</div>

<div class="form-group">
	<div class="col-md-11">
		<label class="col-md-4 control-label" for=
		"MNAME">Nombres:</label>

		<div class="col-md-8">
		  <input name="deptid" type="hidden" value="">
		  <input  class="form-control input-sm" id="MNAME" name="MNAME" placeholder=
		      "Nombres"    onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
		   <!-- <input class="form-control input-sm" id="DEPARTMENT_DESC" name="DEPARTMENT_DESC" placeholder=
		      "Description" type="text" value=""> -->
		</div>
	</div>
</div> 

<div class="form-group">
	<div class="col-md-11">
		<label class="col-md-4 control-label" for=
		"ADDRESS">Dirección:</label>

		<div class="col-md-8">

		 <textarea class="form-control input-sm" id="ADDRESS" name="ADDRESS" placeholder=
		    "Address" type="text" value="" required  onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off"></textarea>
		</div>
	</div>
</div> 

<div class="form-group">
	<div class="col-md-11">
		<label class="col-md-4 control-label" for=
		"Gender">Género:</label>

		<div class="col-md-8">
		 <div class="col-lg-5">
		    <div class="radio">
		      <label><input checked id="optionsRadios1" checked="True" name="optionsRadios" type="radio" value="Female">Femenino</label>
		    </div>
		  </div>

		  <div class="col-lg-4">
		    <div class="radio">
		      <label><input id="optionsRadios2"   name="optionsRadios" type="radio" value="Male"> Masculino</label>
		    </div>
		  </div> 
		 
		</div>
	</div>
</div>

<div class="form-group">
  <div class="rows">
    <div class="col-md-11"> 
      <div class="col-md-4">
        <label class="col-lg-11 control-label">Fecha de Nacimiento</label>
      </div>

      <div class="col-lg-3">
        <select class="form-control input-sm" name="month">
          <option>Mes</option>
          <?php

             $mon = array('Ene' => 1 ,'Feb'=> 2,'Mar' => 3 ,'Abr'=> 4,'May' => 5 ,'Jun'=> 6,'Jul' => 7 ,'Ago'=> 8,'Sep' => 9 ,'Oct'=> 10,'Nov' => 11 ,'Dic'=> 11 );    
          
        
            foreach ($mon as $month => $value ) {
              
                  # code...
                   echo '<option value='.$value.'>'.$month.'</option>';
                } 
          ?>
        </select>
      </div>

      <div class="col-lg-2">
        <select class="form-control input-sm" name="day">
          <option>Día</option>
        <?php 
          $d = range(31, 1);
          foreach ($d as $day) {
            echo '<option value='.$day.'>'.$day.'</option>';
          }
        
        ?>
          
        </select>
      </div>

      <div class="col-lg-3">
        <select class="form-control input-sm" name="year">
          <option>Año</option>
        <?php 
          $years = range(2010, 1960);
          foreach ($years as $yr) {
            echo '<option value='.$yr.'>'.$yr.'</option>';
          }
        
        ?>
        
        </select>
      </div> 
    </div>
  </div>
</div> 

 <div class="form-group">
    <div class="col-md-11">
      <label class="col-md-4 control-label" for=
      "BIRTHPLACE">Lugar de Nacimiento:</label>

      <div class="col-md-8">
        
         <textarea class="form-control input-sm" id="BIRTHPLACE" name="BIRTHPLACE" placeholder=
            "Place of Birth" type="text" value="" required  onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off"></textarea>
      </div>
    </div>
  </div> 


 <div class="form-group">
  <div class="col-md-11">
    <label class="col-md-4 control-label" for=
    "TELNO">Teléfono:</label>

    <div class="col-md-8">
      
       <input class="form-control input-sm" id="TELNO" name="TELNO" placeholder=
          "Contact No." type="text" any value="" required  onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
    </div>
  </div>
</div> 

 <div class="form-group">
  <div class="col-md-11">
    <label class="col-md-4 control-label" for=
    "CIVILSTATUS">Estado Civil:</label>

    <div class="col-md-8">
      <select class="form-control input-sm" name="CIVILSTATUS" id="CIVILSTATUS">
          <option value="none" >Seleccionar</option>
          <option value="Single">Soltero(a)</option>
          <option value="Married">Casado(a)</option>
          <option value="Widow" >Viudo(a)</option>
          <!-- <option value="Fourth" >Fourth</option> -->
      </select> 
    </div>
  </div>
</div>  

 <div class="form-group">
  <div class="col-md-11">
    <label class="col-md-4 control-label" for=
    "EMAILADDRESS">Coreo:</label> 
    <div class="col-md-8">
       <input type="Email" class="form-control input-sm" id="EMAILADDRESS" name="EMAILADDRESS" placeholder="Email"   autocomplete="false"/> 
    </div>
  </div>
</div>  
<div class="form-group">
  <div class="col-md-11">
    <label class="col-md-4 control-label" for=
    "USERNAME">Nombre de Usuario:</label>

    <div class="col-md-8">
      <input name="deptid" type="hidden" value="">
      <input  class="form-control input-sm" id="USERNAME" name="USERNAME" placeholder=
          "Nombre de Usuario"    onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
      </div>
  </div>
</div>

<div class="form-group">
  <div class="col-md-11">
    <label class="col-md-4 control-label" for=
    "PASS">Contraseña:</label>

    <div class="col-md-8">
      <input name="deptid" type="hidden" value="">
      <input  class="form-control input-sm" id="PASS" name="PASS" placeholder=
          "Contraseña" type="password"   onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
       <!-- <input class="form-control input-sm" id="DEPARTMENT_DESC" name="DEPARTMENT_DESC" placeholder=
          "Description" type="text" value=""> -->
    </div>
  </div>
</div> 
<div class="form-group">
  <div class="col-md-11">
    <label class="col-md-4 control-label" for=
    "DEGREE">Nivel Educativo:</label>

    <div class="col-md-8">
      <input name="deptid" type="hidden" value="">
      <input  class="form-control input-sm" id="DEGREE" name="DEGREE" placeholder=
          "Educational Attainment"    onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
      </div>
  </div>
</div> 
<div class="form-group">
    <div class="col-md-11">
      <label class="col-md-4 control-label" for=
      "d"></label>  

      <div class="col-md-8">
        <label><input type="checkbox"> Al registrarse estás de acuerdo con nuestros <a href="#">términos y condiciones</a></label>
     
     </div>
    </div>
</div>   
