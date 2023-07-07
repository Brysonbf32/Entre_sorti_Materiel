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
if(isset($_POST['save'])){
	// $us_poto= htmlspecialchars($_POST['photo_us']);
	$us_name= htmlspecialchars($_POST['name_us']);
	$us_email= htmlspecialchars($_POST['mail_us']);
	$us_passwo= htmlspecialchars($_POST['passw_us']);
	$us_role= htmlspecialchars($_POST['role_us']);
	if(isset($us_name) and !empty($us_role) and !empty($us_email) and !empty($us_passwo)){
		$logs= $my_bd->prepare("SELECT * FROM tbl_utilisateurs WHERE emai_util=?");
		$logs->execute(array($us_email));
		$logs->rowCount();
		$checks=$logs->fetch();
		if($checks >0){
 			?>
			<script>
				alert("User already exist");
			</script>
 			<?php
		}
		else{
			$file_name=$_FILES['photo_us']['name'];
            $file_extension=strrchr($file_name, ".");
            $file_tmp_name=$_FILES['photo_us']['tmp_name'];
            $path='images/'.$file_name;
            $extension_allowed=array('.jpg','.png','.jpeg','.svg');
            if(in_array($file_extension,$extension_allowed)){
                if(move_uploaded_file($file_tmp_name, $path)){
			$insert_user=$my_bd->prepare("INSERT INTO tbl_utilisateurs(img_util,nom_util,emai_util,passwo_util,role_util)VALUES(?,?,?,?,?)");
			$insert_user->execute(array($file_name,$us_name,$us_email,$us_passwo,$us_role));
				}
			}
		}
	}
}

if(isset($_POST['modifier'])){
	$userd_id= htmlspecialchars($_POST['id_us']);
	$us_name= htmlspecialchars($_POST['name_us']);
	$us_email= htmlspecialchars($_POST['mail_us']);
	$us_passwo= htmlspecialchars($_POST['passw_us']);
	$us_role= htmlspecialchars($_POST['role_us']);
    if(isset($us_name) and !empty($us_email) and !empty($us_passwo) and !empty($us_role)){
        $logs=$my_bd->prepare("SELECT * FROM tbl_utilisateurs WHERE id_util=?");
		$logs->execute(array($userd_id));
		$logs->rowCount();
		$checks=$logs->fetch();
        if($checks >0){
            $file_name=$_FILES['photo_us']['name'];
            $file_extension=strrchr($file_name, ".");
            $file_tmp_name=$_FILES['photo_us']['tmp_name'];
            $path='images/'.'-'.$file_name;
            $extension_allowed=array('.jpg','.png','.jpeg');
            if(in_array($file_extension,$extension_allowed)){
            if(move_uploaded_file($file_tmp_name, $path)){
            $updateuser=$my_bd->prepare("UPDATE tbl_utilisateurs SET img_util=?,nom_util=?,emai_util=?,passwo_util=?,role_util=? WHERE id_util='$userd_id'");
            $updateuser->execute(array($file_name,$us_name,$us_email,$us_passwo,$us_role));
				}
			}
		}
	}
}
if(isset($_POST['delete'])){
$userd_id= htmlspecialchars($_POST['id_us']);
if(isset($userd_id)){
	$logs= $my_bd->prepare("SELECT * FROM tbl_utilisateurs WHERE id_util=?");
	$logs->execute(array($userd_id));
	$logs->rowCount();
	$checks= $logs->fetch();
	if($checks >0){
		$delete_user=$my_bd->prepare("DELETE FROM tbl_utilisateurs WHERE id_util=?");
		$delete_user->execute(array($userd_id));
	}
}
}

if(isset($my_bd)){
	if(isset($doctorproil_mail_cookies ) and !empty($idutil)){
		require('view/users.view.php');
	}
	else
	{
		header('location: ../logout.php');
	}
}

?>