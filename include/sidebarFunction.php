<?php 
function get_Convocatoria(){
	$mydb->setQuery("SELECT * FROM `tblConvocatoria`");
	$cur = $mydb->loadResultList();

	foreach ($cur as $result) {
		echo '<ul>
				<li><a href="index.php?q=product&convocatoria='.$result->CONVOCATORIA.'" >'.$result->CONVOCATORIA.'</a></li> 
			</ul>';
	}
}
?>