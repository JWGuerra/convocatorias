 <!-- INTERFAZ DE INICIO DE SESIÓN -->
 <div class="modal fade" id="myModal" tabindex="-1">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <button class="close" data-dismiss="modal" type="button">X</button>
         <h4 class="modal-title" id="myModalLabel">INICIAR SESIÓN POSTULANTES</h4>
       </div>
       <div class="modal-body hold-transition login-page">
         <div id="loginerrormessage"></div>
         <div class="login-box">
           <div class="login-box-body" style="border: solid 1px #ddd;padding: 35px;min-height: 350px;">
             <form action="" method="post">
               <div class="form-group has-feedback">
                 <input type="text" class="form-control" placeholder="Nombre Usuario" name="NOMBREUSUARIO" id="NOMBREUSUARIO">
                 <span class="fa fa-user form-control-feedback" style="margin-top: -22px;"></span>
               </div>
               <div class="form-group has-feedback">
                 <input type="password" class="form-control" placeholder="Contraseña" name="CONTRASENA" id="CONTRASENA">
                 <span class="fa fa-lock form-control-feedback" style="margin-top: -22px;"></span>
               </div>
               <div class="row">
                 <div class="col-xs-8">
                   <div class="checkbox icheck">
                     <label>
                       <input type="checkbox">Recordar Dispositivo
                     </label>
                   </div>
                 </div>
                 <div class="col-xs-4">
                 </div>
               </div>
             </form>
             <a href="#">Olvide mi contraseña</a><br>
             <a href="<?php echo web_root; ?>index.php?q=register" class="text-center">Registrarme como nuevo usuario</a>
           </div>
         </div>
       </div>
       <div class="modal-footer">
         <button class="btn btn-default" data-dismiss="modal">CERRAR</button> <button class="btn btn-primary" name="btnlogin" id="btnlogin">LOGIN</button>
       </div>
     </div>
   </div>
 </div>