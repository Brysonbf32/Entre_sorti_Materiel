<?php
require('config/database.php');
error_reporting(0);
session_start();

if(isset($_POST['login'])){
  $email= htmlspecialchars($_POST['email']);
  $password=htmlspecialchars($_POST['password']);
  if(isset($email) and !empty($password)){
    $logs = $my_bd->prepare("SELECT * FROM tbl_utilisateurs WHERE emai_util=? AND passwo_util=?");
    $logs->execute(array($email,$password));
    $logs->rowCount();
    $checks=$logs->fetch();
    if($checks >0){
      $access= $checks['role_util'];
      $_SESSION['id_util']=$checks['id_util'];
      $_SESSION['nom_util']=$checks['nom_util']; 
      $_SESSION['emai_util']=$checks['emai_util'];
      $_SESSION['passwo_util']=$checks['passwo_util'];
      $_SESSION['role_util']=$checks['role_util'];
      setcookie('cookies_utilisateur', $email, time() + (86400 * 30), "/");
      if($access == "administrateur"){
        header('location: backend/index.php');
      }
      else if($access == "agent"){
        header('location: backend/agent/index.php');
      }
    }
      else{
        $incorectpara= "Mot de passe ou Password Incorecte";
      }
  }
}

if($my_bd == true){ 
  require('viewlogin/login.view.php');
}
?>
