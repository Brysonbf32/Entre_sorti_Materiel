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
	$idfourni= htmlspecialchars($_POST['id_fourni']);
    $id_prod= htmlspecialchars($_POST['id_prod']);
	if(isset($id_prod) and !empty($idfourni)){
		$logs= $my_bd->prepare("SELECT * FROM tbl_entre_produits WHERE ref_entre=? AND id_fourni=?");
		$logs->execute(array($id_prod,$idfourni));
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
				$ref_rand=rand(100, 300);
				$ref_prod="entre-".$ref_rand;
				$insert_user=$my_bd->prepare("INSERT INTO tbl_entre_produits(ref_entre,id_pro,id_fourni,id_util)VALUES(?,?,?,?)");
				$insert_user->execute(array($ref_prod,$id_prod,$idfourni,$idutil));

				header('location: entre_unitproduit.php?id_prod='.$ref_prod);
			}
	}
}


if(isset($my_bd)){
	if(isset($doctorproil_mail_cookies ) and !empty($idutil)){
		require('view/entreprod.view.php');
	}
	else
	{
		header('location: ../logout.php');
	}
}

?>