<?php
include('../config/database.php');
//error_reporting(0);
session_start();
$utilisa_mail_cookies=$_COOKIE['cookies_utilisateur'];
$id_session=$_SESSION['id_util'];
$name_session=$_SESSION['nom_util'];

if(isset($utilisa_mail_cookies)){
	$log= $my_bd->prepare("SELECT * FROM tbl_utilisateurs WHERE emai_util=?");
	$log->execute(array($utilisa_mail_cookies));
	$log->rowCount();
	$checks=$log->fetch();
	if($checks >0){
		$id= $checks['id_util'];
		$name= $checks['nom_util'];
		$mail= $checks['emai_util'];
		$name= $checks['passwo_util'];
		$role= $checks['role_util'];
		$imgage= $checks['img_util'];
	}
	else{
		header('location: ../logout.php');
	}
} 
if(isset($my_bd)){
	if(isset($utilisa_mail_cookies) and !empty($id_session)){
		require('view/index.view.php');
	}
	else
	{
		header('location: ../logout.php');
	}
}
?>