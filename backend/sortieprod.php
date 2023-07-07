<?php
include('../config/database.php');
error_reporting(0);
session_start();
$doctorproil_mail_cookies = $_COOKIE['cookies_utilisateur'];
$idutil=$_SESSION['id_util'];
$nomutilisateur=$_SESSION['nom_util'];
if(isset($doctorproil_mail_cookies)){
	$log= $my_bd->prepare("SELECT * FROM tbl_utilisateurs WHERE emai_util=?");
	$log->execute(array($doctorproil_mail_cookies));
	$log->rowCount();
	$checks=$log->fetch();
	if($checks >0){
		$access= $checks['role_util'];
		$id= $checks['id_util'];
		$img_util= $checks['img_util'];
		$name= $checks['nom_util'];
		$motdepass= $checks['passwo_util'];
		$mail= $checks['emai_util'];
		$role= $checks['role_util'];

	}
	else{
		header('location: ../logout.php');
	}
} 
if(isset($_POST['ventepro'])){
	$id_prod=htmlspecialchars($_POST['prod_id']);
	$prix_vent= htmlspecialchars($_POST['prix_vente']);
	$dateso= htmlspecialchars($_POST['date_vente']);
	$quantidepo= htmlspecialchars($_POST['quantidepo']);
	$quanti_ve= htmlspecialchars($_POST['quanti_vente']);
	$ref_pro= htmlspecialchars($_POST['ref_pro']);
	if(isset($id_prod)){
		$recupro=$my_bd->prepare("SELECT * FROM tbl_entre_produits WHERE id_pro=? ");
		$recupro->execute(array($id_prod));
		$recupro->rowCount();
		$checks=$recupro->fetch();
		if($checks >0){
			if($quanti_ve > $quantidepo){
				?>
				<script>
					alert("Desole la quantite demander est superieur");
				</script>
				<?php
			}
			else{
				$restquanti= $quantidepo - $quanti_ve;
				$totalmontantvendu= $quanti_ve * $prix_vent;
				
				$update_depopro=$my_bd->prepare("UPDATE tbl_entre_produits SET entre_quanti_pro=? WHERE id_pro='$id_prod'");
				$update_depopro->execute(array($restquanti));

				$insert_sorti=$my_bd->prepare("INSERT INTO tbl_historic_sorti(id_pro,id_util,date_sorti,quantite_sorti,prix_sorti,prix_total)VALUES(?,?,?,?,?,?)");
				$insert_sorti->execute(array($id_prod,$idutil,$dateso,$quanti_ve,$prix_vent,$totalmontantvendu));
			}
		
		}	
	}
}


if(isset($my_bd)){
	if(isset($doctorproil_mail_cookies ) and !empty($idutil)){
		require('view/sortieprod.view.php');
	}
	else
	{
		header('location: ../logout.php');
	}
}

?>