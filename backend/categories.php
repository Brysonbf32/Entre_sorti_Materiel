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
    $id_etag= htmlspecialchars($_POST['id_etag']);
	$nom_categ= htmlspecialchars($_POST['nom_categ']);
	if(isset($id_etag) and !empty($nom_categ)){
		$logs= $my_bd->prepare("SELECT * FROM tbl_categorie WHERE id_etage=? AND nom_categ=?");
		$logs->execute(array($id_etag,$nom_categ));
		$logs->rowCount();
		$checks=$logs->fetch();
		if($checks >0){
 			?>
			<script>
				alert("Cette Categorie existe deja");
			</script>
 			<?php
		}
		else{
			$ref_rand=rand(10, 300);
			$code_categ="Cate-".$ref_rand;
			$insert_user=$my_bd->prepare("INSERT INTO tbl_categorie(id_etage,ref_categ,nom_categ)VALUES(?,?,?)");
			$insert_user->execute(array($id_etag,$code_categ,$nom_categ));
				}
			}
		}

if(isset($_POST['modifier'])){
    $id_categ= htmlspecialchars($_POST['id_etag']);
    $id_etag= htmlspecialchars($_POST['id_etag']);
	$code_categ= htmlspecialchars($_POST['code_categ']);
	$nom_categ= htmlspecialchars($_POST['nom_categ']);
    if(isset($id_categ)){
        $logs=$my_bd->prepare("SELECT * FROM tbl_categorie WHERE id_categ=?");
		$logs->execute(array($id_categ));
		$logs->rowCount();
		$checks=$logs->fetch();
        if($checks >0){
            $modifier=$my_bd->prepare("UPDATE tbl_categorie SET id_etage=?,ref_categ=?,nom_categ=? WHERE id_categ='$id_categ'");
			$modifier->execute(array($id_etag,$code_categ,$nom_categ));
		}
	}
}

if(isset($_POST['supprimer'])){
    $id_categ=htmlspecialchars($_POST['id_categ']);
    if(isset($id_categ)){
        $logs= $my_bd->prepare("SELECT * FROM tbl_categorie WHERE id_categ=?");
        $logs->execute(array($id_categ));
        $logs->rowCount();
        $checks= $logs->fetch();
        if($checks >0){
            $delete=$my_bd->prepare("DELETE FROM tbl_categorie WHERE id_categ=?");
            $delete->execute(array($id_categ));
        }
    }
}

if(isset($my_bd)){
	if(isset($doctorproil_mail_cookies ) and !empty($idutil)){
		require('view/categories.view.php');
	}
	else
	{
		header('location: ../logout.php');
	}
}

?>