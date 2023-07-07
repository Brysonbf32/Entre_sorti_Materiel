<?php
try{
    $my_bd= NEW PDO('mysql:host=localhost;dbname=gestion_materiel','root','');
}
catch(Exception $e){
    header('location: error.php');
}
?>