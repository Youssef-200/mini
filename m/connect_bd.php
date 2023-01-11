<?php
session_start();
$bdd=new PDO('mysql:host=localhost:5000;dbname=m;charset=utf8;','root','');
$err = "";
if(!$_SESSION['mdp']){
    header('Location: Administrateur.php');
}
?>