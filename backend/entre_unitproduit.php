<?php
include('../config/database.php');
//error_reporting(0);
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
if($_GET['id_prod']){
    $ref_prod=$_GET['id_prod'];
    if(isset($ref_prod)){
        $recudata=$my_bd->prepare("SELECT * FROM tbl_entre_produits WHERE ref_entre=?");
        $recudata->execute(array($ref_prod));
        $recudata->rowCount();
        $checkdata=$recudata->fetch();
        if($checkdata >0){
            $id_ent=$checkdata['id_entrepro'];
            $refpro=$checkdata['ref_entre'];
            $id_pro=$checkdata['id_pro'];
            $id_fourni=$checkdata['id_fourni'];
            if(isset($id_pro)){
                $recudatapro=$my_bd->prepare("SELECT * FROM tbl_produits WHERE id_pro='$id_pro'");
                $recudatapro->execute(array($id_pro));
                $recudatapro->rowCount();
                $checkdatapro=$recudatapro->fetch();
                if($checkdatapro >0){
                    $nom_pro=$checkdatapro['nom_prod'];
                    $prix_pro=$checkdatapro['prix_pro'];

                    if(isset($id_fourni)){
                        $recudatafourni=$my_bd->prepare("SELECT * FROM tbl_fournisseurs WHERE id_fourni='$id_fourni'");
                        $recudatafourni->execute(array($id_fourni));
                        $recudatafourni->rowCount();
                        $checkdatafourni=$recudatafourni->fetch();
                        if($checkdatafourni >0){
                            $nom_fourni=$checkdatafourni['nom_fourni'];
                        }
                    }
                }
            }
        }
        else{

        }
    }
}
if(isset($_POST['entre'])){
         try{
            $identre=htmlspecialchars($_POST['id_entre']);
            $prixpro=htmlspecialchars($_POST['prix_pro']);
            $date_entre= htmlspecialchars($_POST['date_entre']);
            $quant_entree= htmlspecialchars($_POST['quant_entre']);
            // $pro=htmlspecialchars($_POST['inpu_pro']);
            // $fourni=htmlspecialchars($_POST['inpu_fou']);
            if(isset($identre)){
                $logs=$my_bd->prepare("SELECT * FROM tbl_entre_produits WHERE id_entrepro=?");
                $logs->execute(array($identre));
                $logs->rowCount();
                $checks=$logs->fetch();
                if($checks >0){
                    $modifier=$my_bd->prepare("UPDATE tbl_entre_produits SET date_entre=?,entre_quanti_pro=?,entre_prix_pro=? WHERE id_entrepro='$identre'");
                    $modifier->execute(array($date_entre,$quant_entree,$prixpro));
        
                    $inserthisto=$my_bd->prepare("INSERT INTO tbl_historic_pro(id_pro,id_fourni,date_entre,quanti_entre)VALUES(?,?,?,?)");
                    $inserthisto->execute(array($id_pro,$id_fourni,$date_entre,$quant_entree));
                    header('location: entreprod.php');
        
                }
            }
}
catch(Exception $e) {
    die("Oh noes! There's an error in the query!");
}
}

if(isset($_POST['supprimer'])){
    $id=htmlspecialchars($_POST['iid_mate']);
    if(isset($id)){
        $logs= $my_bd->prepare("SELECT * FROM tbl_produits WHERE id_pro=?");
        $logs->execute(array($id));
        $logs->rowCount();
        $checks= $logs->fetch();
        if($checks >0){
            $delete=$my_bd->prepare("DELETE FROM tbl_produits WHERE id_pro=?");
            $delete->execute(array($id));
        }
    }
}

if(isset($my_bd)){
	if(isset($doctorproil_mail_cookies ) and !empty($idutil)){
		require('view/entre_unitproduit.view.php');
	}
	else
	{
		header('location: ../logout.php');
	}
}

?>