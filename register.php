<section id="content">
	<div class="container content">
		<p> <?php check_message(); ?></p>
		<form class="row form-horizontal span6  wow fadeInDown" action="process.php?action=register" method="POST">
			<h2 class=" ">INFORMACION PERSONAL</h2>
			<div class="row">
				<div class="form-group">
					<div class="col-md-8">
						<label class="col-md-4 control-label" for="DNI">DNI:</label>
						<div class="col-md-8">

							<input class="form-control input-sm" id="DNI" name="DNI" placeholder="DNI" type="text" value="" onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="col-md-8">
						<label class="col-md-4 control-label" for="APELLIDOS">Apellidos:</label>

						<div class="col-md-8">
							<input name="deptid" type="hidden" value="">
							<input class="form-control input-sm" id="APELLIDOS" name="APELLIDOS" placeholder="Apellidos" onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="col-md-8">
						<label class="col-md-4 control-label" for="NOMBRES">Nombres:</label>

						<div class="col-md-8">
							<input name="deptid" type="hidden" value="">
							<input class="form-control input-sm" id="NOMBRES" name="NOMBRES" placeholder="Nombres" onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
							<!-- <input class="form-control input-sm" id="DEPARTMENT_DESC" name="DEPARTMENT_DESC" placeholder=
					      "Description" type="text" value=""> -->
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="col-md-8">
						<label class="col-md-4 control-label" for="DIRECCION">Dirección:</label>

						<div class="col-md-8">

							<textarea class="form-control input-sm" id="DIRECCION" name="DIRECCION" placeholder="Dirección" type="text" value="" required onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off"></textarea>
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="col-md-8">
						<label class="col-md-4 control-label" for="NOMBREUSUARIO">Nombre de Usuario:</label>

						<div class="col-md-8">
							<input name="deptid" type="hidden" value="">
							<input class="form-control input-sm" id="NOMBREUSUARIO" name="NOMBREUSUARIO" placeholder="Nombre de Usuario" onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="col-md-8">
						<label class="col-md-4 control-label" for="PASS">Contraseña:</label>

						<div class="col-md-8">
							<input name="deptid" type="hidden" value="">
							<input class="form-control input-sm" id="CONTRASENA" name="CONTRASENA" placeholder="Contraseña" type="password" onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
							<!-- <input class="form-control input-sm" id="DEPARTMENT_DESC" name="DEPARTMENT_DESC" placeholder=
			          "Description" type="text" value=""> -->
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="col-md-8">
						<label class="col-md-4 control-label" for="CORREO">Correo:</label>
						<div class="col-md-8">
							<input type="Email" class="form-control input-sm" id="CORREO" name="CORREO" placeholder="Correo" autocomplete="false" />
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="col-md-8">
						<label class="col-md-4 control-label" for="CELULAR">Celular:</label>

						<div class="col-md-8">
							<input class="form-control input-sm" id="CELULAR" name="CELULAR" placeholder="Celular" type="text" any value="" required onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="col-md-8">
						<label class="col-md-4 control-label" for="FORMACIONACADEMICA">Formación Académica:</label>

						<div class="col-md-8">
							<input name="deptid" type="hidden" value="">
							<input class="form-control input-sm" id="FORMACIONACADEMICA" name="FORMACIONACADEMICA" placeholder="Formación Académica" onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-8">
						<label class="col-md-4 control-label" for=""></label>
						<div class="col-md-8">
							<label><input type="checkbox"> Al registrarse estás de acuerdo con nuestra <a href="#">terminos y condiciones.</a></label>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-8">
						<label class="col-md-4 control-label" for="idno"></label>
						<div class="col-md-8">
							<button class="btn btn-primary btn-sm" name="btnRegister" type="submit"><span class="fa fa-save fw-fa"></span> Guardar</button>
						</div>
					</div>
				</div>
		</form>
	</div>
</section>