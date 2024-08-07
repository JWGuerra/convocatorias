 <style type="text/css">
 	#content {
 		min-height: 500px;
 	}

 	#content .panel {
 		padding: 10px;
 	}

 	.panel-body label {
 		font-size: 20px;
 	}

 	.panel-body input {
 		font-size: 15px;
 	}

 	.panel-body>.row {
 		margin-bottom: 10px;
 	}
 </style>
 <form action="index.php?q=result&searchfor=advancesearch" method="POST">
 	<section id="content">
 		<div class="container content">
 			<div class="col-sm-2"></div>
 			<div class="col-sm-8">
 				<div class="panel">
 					<div class="panel-header"></div>
 					<div class="panel-body">
 						<div class="row">
 							<div class="col-sm-12 search1">
 								<label class="col-sm-3">Buscar:</label>
 								<div class="col-sm-9">
 									<input class="form-control" type="" name="SEARCH" placeholder="Buscar por">
 								</div>
 							</div>
 						</div>
 						<div class="row">
 							<div class="col-sm-12 search1">
 								<label class="col-sm-3">Convocatoria:</label>
 								<div class="col-sm-9">
 									<select class="form-control" name="CONVOCATORIA">
 										<option value="">Todos</option>
 										<?php
											$sql = "SELECT * FROM tblConvocatoria";
											$mydb->setQuery($sql);
											$res = $mydb->loadResultList();
											foreach ($res as $row) {
												echo '<option>' . $row->CONVOCATORIA . '</option>';
											}
											?>
 									</select>
 								</div>
 							</div>
 						</div>
 						<div class="row">
 							<div class="col-sm-12 search1">
 								<label class="col-sm-3">Servicio:</label>
 								<div class="col-sm-9">
 									<select class="form-control" name="SERVICIO">
 										<option value="">Todos</option>
 										<?php
											$sql = "SELECT * FROM `tblServicio`";
											$mydb->setQuery($sql);
											$res = $mydb->loadResultList();
											foreach ($res as $row) {
												echo '<option>' . $row->SERVICIO . '</option>';
											}
											?>
 									</select>
 								</div>
 							</div>
 						</div>
 						<div class="row">
 							<div class="col-sm-12 search1">
 								<label class="col-sm-3"></label>
 								<div class="col-sm-9">
 									<input type="submit" name="submit" class="btn btn-success">
 								</div>
 							</div>
 						</div>
 					</div>
 				</div>
 			</div>
 			<div class="col-sm-2"></div>
 		</div>
 	</section>
 </form>