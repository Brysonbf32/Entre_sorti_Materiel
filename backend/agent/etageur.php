<?php
include('../../config/database.php');
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
	$code_eta= htmlspecialchars($_POST['code_etage']);
	$nom_eta= htmlspecialchars($_POST['nom_etage']);
	if(isset($code_eta) and !empty($nom_eta)){
		$logs= $my_bd->prepare("SELECT * FROM tbl_etagiaire WHERE code_etage=?,nom_etage=?");
		$logs->execute(array($code_eta,$nom_eta));
		$logs->rowCount();
		$checks=$logs->fetch();
		if($checks >0){
 			?>
			<script>
				alert("Cet Etageur existe deja");
			</script>
 			<?php
		}
		else{
			$insert_user=$my_bd->prepare("INSERT INTO tbl_etagiaire(code_etage,nom_etage)VALUES(?,?)");
			$insert_user->execute(array($code_eta,$nom_eta));
				}
			}
		}
if(isset($_POST['modifier'])){
	$etage_id=htmlspecialchars($_POST['id_etage']);
	$code_eta=htmlspecialchars($_POST['code_etage']);
	$nom_eta=htmlspecialchars($_POST['nom_etage']);
    if(isset($code_eta)){
        $logs=$my_bd->prepare("SELECT * FROM tbl_etagiaire WHERE id_etage=?");
		$logs->execute(array($etage_id));
		$logs->rowCount();
		$checks=$logs->fetch();
        if($checks >0){
            $modifier=$my_bd->prepare("UPDATE tbl_etagiaire SET code_etage=?,nom_etage=? WHERE id_etage='$etage_id'");
            $modifier->execute(array($code_eta,$nom_eta));
		}
	}
}

if(isset($_POST['supprimer'])){
	$etage_id=htmlspecialchars($_POST['id_etage']);
if(isset($etage_id)){
	$logs= $my_bd->prepare("SELECT * FROM tbl_etagiaire WHERE id_etage=?");
	$logs->execute(array($etage_id));
	$logs->rowCount();
	$checks= $logs->fetch();
	if($checks >0){
		$delete_user=$my_bd->prepare("DELETE FROM tbl_etagiaire WHERE id_etage=?");
		$delete_user->execute(array($etage_id));
	}
}
}

if(isset($my_bd)){
	if(isset($doctorproil_mail_cookies ) and !empty($idutil)){
		require('view/etageur.view.php');
	}
	else
	{
		header('location: ../logout.php');
	}
}

?>