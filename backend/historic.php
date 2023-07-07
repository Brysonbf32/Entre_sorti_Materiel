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
if(isset($_POST['ajouter'])){
	$num_prod= htmlspecialchars($_POST['num_entre']);
    $id_prod= htmlspecialchars($_POST['id_prod']);
	$date_entre= htmlspecialchars($_POST['date_entre']);
	$quant_entre= htmlspecialchars($_POST['quant_entre']);
    $prix_unient= htmlspecialchars($_POST['prix_unient']);
	$prix_estima= htmlspecialchars($_POST['prix_estim']);
	if(isset($id_prod) and !empty($num_prod) and !empty($date_entre) and !empty($quant_entre) and !empty($prix_unient) and !empty($prix_estima)){
		$logs= $my_bd->prepare("SELECT * FROM tbl_entreprod WHERE id_prod=? AND num_entre=?");
		$logs->execute(array($id_prod,$num_prod));
		$logs->rowCount();
		$checks=$logs->fetch();
		if($checks >0){
 			?>
			<script>
				alert("Ce produit est deja entree dans le stock");
			</script>
 			<?php
		}
		else{
			$insert_user=$my_bd->prepare("INSERT INTO tbl_entreprod(num_entre,id_prod,date_entre,quantite_entre,priuni_entre,prix_estimatio)VALUES(?,?,?,?,?,?)");
			$insert_user->execute(array($num_prod,$id_prod,$date_entre,$quant_entre,$prix_unient,$prix_estima));
				}
			}
		}
if(isset($_POST['modifier'])){
    $id_entrepro= htmlspecialchars($_POST['id_entrepro']);
    $id_prod= htmlspecialchars($_POST['id_prod']);
	$date_entre= htmlspecialchars($_POST['date_entre']);
	$quant_entre= htmlspecialchars($_POST['quant_entre']);
    $prix_unient= htmlspecialchars($_POST['prix_unient']);
    if(isset($id_entrepro)){
        $logs=$my_bd->prepare("SELECT * FROM tbl_entreprod WHERE id_entre=?");
		$logs->execute(array($id_entrepro));
		$logs->rowCount();
		$checks=$logs->fetch();
        if($checks >0){
            $modifier=$my_bd->prepare("UPDATE tbl_entreprod SET id_prod=?,date_entre=?,quantite_entre=?,priuni_entre=? WHERE id_entre='$id_entrepro'");
			$modifier->execute(array($id_prod,$date_entre,$quant_entre,$prix_unient));
		}
	}
}

if(isset($_POST['supprimer'])){
    $id_entrepro= htmlspecialchars($_POST['id_entrepro']);
    if(isset($id_entrepro)){
        $logs= $my_bd->prepare("SELECT * FROM tbl_entreprod WHERE id_entre=?");
        $logs->execute(array($id_entrepro));
        $logs->rowCount();
        $checks= $logs->fetch();
        if($checks >0){
            $delete=$my_bd->prepare("DELETE FROM tbl_entreprod WHERE id_entre=?");
            $delete->execute(array($id_entrepro));
        }
    }
}

if(isset($my_bd)){
	if(isset($doctorproil_mail_cookies ) and !empty($idutil)){
		require('view/historic.view.php');
	}
	else
	{
		header('location: ../logout.php');
	}
}

?>