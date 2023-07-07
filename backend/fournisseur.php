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
if(isset($_POST['ajouter'])){
	$nom_fourni=htmlspecialchars($_POST['nom_fourni']);
    $address_fourni=htmlspecialchars($_POST['address_fourni']);
    $phone_fourni=htmlspecialchars($_POST['phone_fourni']);
    $age_fourni=htmlspecialchars($_POST['age_fourni']);

	if(isset($nom_fourni) and !empty($address_fourni) and !empty($phone_fourni) and !empty($age_fourni)){
		$logs= $my_bd->prepare("SELECT * FROM tbl_fournisseurs WHERE nom_fourni=? AND phone_fourni=?");
		$logs->execute(array($nom_fourni,$phone_fourni));
		$logs->rowCount();
		$checks=$logs->fetch();
		if($checks >0){
 			?>
			<script>
				alert("Ce Fournisseur existe deja");
			</script>
 			<?php
		}
		else{
			$insert_user=$my_bd->prepare("INSERT INTO tbl_fournisseurs(nom_fourni,address_fourni,phone_fourni,age_fourni)VALUES(?,?,?,?)");
			$insert_user->execute(array($nom_fourni,$address_fourni,$phone_fourni,$age_fourni));
				}
			}
		}

if(isset($_POST['modifier'])){
    $id_fourn= htmlspecialchars($_POST['id_fourni']);
	$nom_fourni=htmlspecialchars($_POST['nom_fourni']);
    $address_fourni=htmlspecialchars($_POST['address_fourni']);
    $phone_fourni=htmlspecialchars($_POST['phone_fourni']);
    $age_fourni=htmlspecialchars($_POST['age_fourni']);
    if(isset($id_fourn)){
        $logs=$my_bd->prepare("SELECT * FROM tbl_fournisseurs WHERE id_fourni=?");
		$logs->execute(array($id_fourn));
		$logs->rowCount();
		$checks=$logs->fetch();
        if($checks >0){
            $modifier=$my_bd->prepare("UPDATE tbl_fournisseurs SET nom_fourni=?,address_fourni=?,phone_fourni=?,age_fourni=? WHERE id_fourni='$id_fourn'");
			$modifier->execute(array($nom_fourni,$address_fourni,$phone_fourni,$age_fourni));
		}
	}
}

if(isset($_POST['supprimer'])){
    $id_fourni=htmlspecialchars($_POST['id_fourni']);
    if(isset($id_fourni)){
        $logs= $my_bd->prepare("SELECT * FROM tbl_fournisseurs WHERE id_fourni=?");
        $logs->execute(array($id_fourni));
        $logs->rowCount();
        $checks= $logs->fetch();
        if($checks >0){
            $delete=$my_bd->prepare("DELETE FROM tbl_fournisseurs WHERE id_fourni=?");
            $delete->execute(array($id_fourni));
        }
    }
}

if(isset($my_bd)){
	if(isset($doctorproil_mail_cookies ) and !empty($idutil)){
		require('view/fournisseur.view.php');
	}
	else
	{
		header('location: ../logout.php');
	}
}

?>