<?php
require('config/database.php');
error_reporting(0);
session_start();

if($my_bd){
    header('Location: index.php');
}
?>