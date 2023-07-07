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
	$nom_pro= htmlspecialchars($_POST['nom_prod']);
    $categ_pro= htmlspecialchars($_POST['categ_prod']);
	$prix_pro= htmlspecialchars($_POST['prix_prod']);
	if(isset($nom_pro) and !empty($categ_pro) and !empty($prix_pro)){
		$logs= $my_bd->prepare("SELECT * FROM tbl_produits WHERE id_categ=? AND nom_pro=?");
		$logs->execute(array($categ_pro,$nom_pro));
		$logs->rowCount();
		$checks=$logs->fetch();
		if($checks >0){
 			?>
			<script>
				alert("Ce Produit existe deja");
			</script>
 			<?php
		}
		else{
				$file_name=$_FILES['photo_prod']['name'];
				$file_extension=strrchr($file_name, ".");
				$file_tmp_name=$_FILES['photo_prod']['tmp_name'];
				$path='photo_prod/'.$file_name;
				$extension_allowed=array('.jpg','.png','.jpeg');
				if(in_array($file_extension,$extension_allowed)){
					if(move_uploaded_file($file_tmp_name,$path)){
						$ref_rand=rand(10, 300);
						$ref_prod="Prod-".$ref_rand;
						$quantipro=0;
						$insert=$my_bd->prepare("INSERT INTO tbl_produits(ref_prod,nom_prod,photo_pro,id_categ,prix_pro,quanti_pro)VALUES(?,?,?,?,?,?)");
						$insert->execute(array($ref_prod,$nom_pro,$file_name,$categ_pro,$prix_pro,$quantipro));
					}
				}

			}
		}
    }

if(isset($_POST['modifier'])){
    $id_mate=htmlspecialchars($_POST['idprod']);
	$nom_pro= htmlspecialchars($_POST['nom_prod']);
    $categ_pro= htmlspecialchars($_POST['categ_prod']);
	$prix_pro= htmlspecialchars($_POST['prix_prod']);
    if(isset($id_mate)){
        $logs=$my_bd->prepare("SELECT * FROM tbl_produits WHERE id_pro=?");
		$logs->execute(array($id_mate));
		$logs->rowCount();
		$checks=$logs->fetch();
        if($checks >0){
			$file_name=$_FILES['photo_prod']['name'];
			$file_extension=strrchr($file_name, ".");
			$file_tmp_name=$_FILES['photo_prod']['tmp_name'];
			$path='photo_prod/'.$file_name;
			$extension_allowed=array('.jpg','.png','.jpeg');
            if(in_array($file_extension,$extension_allowed)){
                if(move_uploaded_file($file_tmp_name,$path)){
            $modifier=$my_bd->prepare("UPDATE tbl_produits SET nom_prod=?,photo_pro=?,id_categ=?,prix_pro=? WHERE id_pro='$id_mate'");
			$modifier->execute(array($nom_pro,$file_name,$categ_pro,$prix_pro));
		}
	}
}
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
		require('view/materiel.view.php');
	}
	else
	{
		header('location: ../logout.php');
	}
}

?>