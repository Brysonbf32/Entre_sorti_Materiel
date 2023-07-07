<?php
 include('includes/header.php');
?>
<style>
    .colorerroe{
        color: red!important;
    }
</style>
<?php
$entreproduit=current($my_bd->query("SELECT COUNT(*) FROM tbl_entre_produits WHERE id_util='$idutil'")->fetch());
$entrehistoric=current($my_bd->query("SELECT COUNT(*) FROM tbl_historic_pro  WHERE id_util='$idutil'")->fetch());
$sortihistoric=current($my_bd->query("SELECT COUNT(*) FROM tbl_historic_sorti ")->fetch());
$entrehistoric=current($my_bd->query("SELECT COUNT(*) FROM tbl_historic_pro")->fetch());
?>
	<div id="page-wrapper">
			<div class="main-page">
				<div class="col_3">
					<div class="col-md-3 widget widget1">
						<div class="r3_counter_box">
							<h2 align="center"><?=$entreproduit?></h2>
							<p align="center">Meteriels Disponible</p>
						</div>
					</div>
				</div>
			</div>
			<div class="main-page">
				<div class="col_3">
					<div class="col-md-3 widget widget1">
						<div class="r3_counter_box">
							<h2 align="center"><?=$entreproduit?></h2>
							<p align="center">Stock Encours</p>
						</div>
					</div>
				</div>
			</div>
			<div class="main-page">
				<div class="col_3">
					<div class="col-md-3 widget widget1">
						<div class="r3_counter_box">
							<h2 align="center"><?=$entrehistoric?></h2>
							<p align="center">Historique Entree</p>
						</div>
					</div>
				</div>
			</div>	
			<div class="main-page">
				<div class="col_3">
					<div class="col-md-3 widget widget1">
						<div class="r3_counter_box">
							<h2 align="center"><?=$sortihistoric?></h2>
							<p align="center">Historique Sorti</p>
						</div>
					</div>
				</div>
			</div>			

		<script src="js/amcharts.js"></script>
		<script src="js/serial.js"></script>
		<script src="js/export.min.js"></script>
		<link rel="stylesheet" href="../css/export.css" type="text/css" media="all" />
		<script src="js/light.js"></script>
		<script  src="js/index1.js"></script>
 	</div>
 </div>
<br><br>
<?php
 include('includes/footer.php');
?>