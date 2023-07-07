<?php
include('../config/database.php');
error_reporting(0);
session_start();
$doctorproil_mail_cookies = $_COOKIE['cookies_utilisateur'];
$idutil=$_SESSION['id_util'];
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

if(isset($_POST['entre'])){
    $identre=htmlspecialchars($_POST['id_entre']);
	$refentre=htmlspecialchars($_POST['ref_produit']);
	$date_entre= htmlspecialchars($_POST['date_prod']);
	$quant_entree= htmlspecialchars($_POST['quanti_prod']);
    if(isset($identre)){
        $logs=$my_bd->prepare("SELECT * FROM tbl_entre_produits WHERE id_entrepro=?");
		$logs->execute(array($identre));
		$logs->rowCount();
		$checks=$logs->fetch();
        if($checks >0){
            $modifier=$my_bd->prepare("UPDATE tbl_entre_produits SET ref_prodw=?,entre_quanti_pro=?,date_entre=? WHERE id_entrepro='$identre'");
			$modifier->execute(array($refentre,$quant_entree,$date_entre));

            header('location: entreprod.php');
		}
	}
}

if(isset($my_bd)){
	if(isset($doctorproil_mail_cookies ) and !empty($idutil)){
		require('view/stock.view.php');
	}
	else
	{
		header('location: ../logout.php');
	}
}

?>