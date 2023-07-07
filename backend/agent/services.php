<?php
require('../../config/database.php');
error_reporting(0);
session_start();
$email_user_cookie = $_COOKIE['backend_user_email'];
if(isset($email_user_cookie)){
        $logs = $my_bd->prepare("SELECT * FROM tbl_users WHERE u_mail=? ");
        $logs->execute(array($email_user_cookie));
        $logs->rowCount();
        $checks=$logs->fetch();
        if($checks >0){
          $access= $checks['u_role']; 
          $id= $checks['u_id'];
          $name= $checks['u_name'];
          $mail= $checks['u_mail'];
          $role= $checks['u_role'];  
        }
        else{
            header('location: ../logout.php'); 
        }  
}

if(isset($_POST['save'])){
    $serv_name = htmlspecialchars($_POST['serv_name']);
    $serv_descr = htmlspecialchars($_POST['serv_descr']);
   // $imagese=htmlspecialchars($_POST['image_name']);
    if(isset($serv_name) and !empty($serv_descr)){
      $logs = $my_bd->prepare("SELECT * FROM tbl_services WHERE s_name=?");
      $logs->execute(array($serv_name));
      $logs->rowCount();
      $checks=$logs->fetch();
      if($checks >0){
        ?>
        <script>
            alert("Service already exist");
        </script>
        <?php
      }
      else{
        $file_name=$_FILES['image_name']['name'];
        $file_extension=strrchr($file_name, ".");
        $file_tmp_name=$_FILES['image_name']['tmp_name'];
        $path='photos/'.$add_id.'-'.$file_name;
        $extension_allowed=array('.jpg','.png','.jpeg');
  if (in_array($file_extension, $extension_allowed)) {
    if (move_uploaded_file($file_tmp_name, $path)) {

        $s_insert=$my_bd->prepare("INSERT INTO tbl_services (s_name,s_description,image_serv) VALUES(?,?,?)");
        $s_insert->execute(array($serv_name,$serv_descr,$path));
    }
  }


      }
    }
  }

  if(isset($_POST['update'])){
    $ser_id = htmlspecialchars($_POST['id_auto']);
    $serv_name = htmlspecialchars($_POST['serv_name']);
    $serv_descr = htmlspecialchars($_POST['serv_descr']);
    if(isset($serv_name) and !empty($serv_descr)){
      $logs = $my_bd->prepare("SELECT * FROM tbl_services WHERE s_id=?");
      $logs->execute(array($ser_id));
      $logs->rowCount();
      $checks=$logs->fetch();
      if($checks >0){
        $file_name=$_FILES['image_name']['name'];
        $file_extension=strrchr($file_name, ".");
        $file_tmp_name=$_FILES['image_name']['tmp_name'];
        $path='photos/'.$add_id.'-'.$file_name;
        $extension_allowed=array('.jpg','.png','.jpeg');
  if (in_array($file_extension, $extension_allowed)) {
    if (move_uploaded_file($file_tmp_name, $path)) {
    
        $s_insert=$my_bd->prepare("UPDATE tbl_services SET s_name=?,s_description=?,image_serv=? WHERE s_id='$ser_id'");
        $s_insert->execute(array($serv_name,$serv_descr,$path));
    }
  }
  
      }
    }
  }

  if(isset($_POST['delete'])){
    $ser_id = htmlspecialchars($_POST['id_auto']);
    if(isset($ser_id)){
      $logs = $my_bd->prepare("SELECT * FROM tbl_services WHERE s_id=?");
      $logs->execute(array($ser_id));
      $logs->rowCount();
      $checks=$logs->fetch();
      if($checks >0){
        $s_insert=$my_bd->prepare("DELETE FROM tbl_services  WHERE s_id=?");
        $s_insert->execute(array($ser_id));
      }
    }
  }

if($my_bd == true){
    if(isset($email_user_cookie)){
        require('view/services.view.php');
    }
    else{
        header('location: ../logout.php');
    }
}
?>