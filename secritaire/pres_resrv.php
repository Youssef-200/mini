<?php
session_start();
$bdd=new PDO('mysql:host=localhost:5000;dbname=m;charset=utf8;','root','');
$err = "";
if(!$_SESSION['mdp']){
    header('Location: Administrateur.php');
}
//AJOUT
if(isset($_POST['Ajouter'])){
    if(!empty($_POST['dat_sjr'])AND!empty($_POST['nbr_prtcp'])AND!empty($_POST['nom'])AND!empty($_POST['prenom'])AND!empty($_POST['dat_nt'])AND!empty($_POST['nom_actvt'])AND!empty($_POST['type_actvt'])){
        $insert = $bdd->prepare('INSERT INTO actvt(nom_actvt,type_actvt) VALUES(?,?)');
        $insert->execute(array($_POST['nom_actvt'],$_POST['type_actvt']));
        $insert = $bdd->prepare('INSERT INTO client(nom,prenom) VALUES(?,?,?)');
        $insert->execute(array($_POST['nom'],$_POST['prenom'],$_POST['dat_n']));
        $insert = $bdd->prepare('INSERT INTO sjr(nbr_prtcp,dat_sjr) VALUES(?,?)');
        $insert->execute(array($_POST['nbr_prtcp'],$_POST['dat_sjr']));
        header('Location: Admin_actvt_srvs.php');
    }else{
        $err="veuillez completer toutes les champs...";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Reservations</title>
</head>
<body>
<div class="index">
    <?php
        include("para_sec.php");
    ?>
    <div class="desc">
        <p><h5 style="margin-left: 20%; color: crimson;"><?=  $err; ?></h5></p>
        <h2 style="margin-top: 5%;">Reservations</h2>
        <?php
        $recupuser = $bdd->query('SELECT * FROM resrv_activite');
        while($user = $recupuser->fetch()){
        ?>
        <div class="Description">
            <p><label for="dat_sjr">Date sejeur :</label></label> <span style="color: #ff4800;margin-left: 15%;"><?= $user['dat_sjr'];?></span></p>
            <p><label for="nbr_prtcp">Nombre de participants :</label></label> <span style="color: #ff4800;margin-left: 15%;"><?= $user['nbr_prtcp'];?></span></p>
            <p><label for="nom_actvt">Nom Activité :</label><span style="width: 170px;height: 20px;text-align: center;color: white;"><?= $user['nom_actvt'];?></span></p>
            <p><label for="type_actvt">Type d'activité :</label></label> <span style="color: #ff4800;margin-left: 15%;"><?= $user['type_actvt'];?></span></p>
        </div>
        <?php
         } 
        ?>
    <form method="POST" class="frm">
        <h4>Crée une Prés-reservation</h4>
        <p style="margin-left: -40%;"><label for="dat_sjr">Dat de séjeur :<input type="date" name="dat_sjr"></label></p>
        <p style="margin-left: -30%;"><label for="nbr_prtcp">Nombre de participants <input type="number" name="nbr_prtcp"><a href="#">confirmer</a></label></p>
        
        <?php
        $n=1;
        if(!empty($_GET["nbr_prctp"])){?>
            <p style="margin-left: -40%;">Leurs Informations</p>

        <?php
        while($n<$nbrp){
        ?>
        <p style="margin-left: -40%;"><label for="nom">Nom :<input type="text" name="dat_sjr"></label></p>
        <p style="margin-left: -40%;"><label for="prenom">Prenom :<input type="date" name="dat_sjr"></label><</p>
        <p style="margin-left: -40%;"><label for="dat_n">Date de naissance :<input type="date" name="dat_n"></label><</p>
        <?php
        $n++;    
    }
        }?>
        <p style="margin-left: -40%;"><label for="nom_actvt">Nom Activité :<input type="text" name="nom_actvt"></label><</p>
        <p style="margin-left: -40%;"><label for="type_actvt">Type Activité:<input type="text" name="type_actvt"></label><</p>
        <input type="submit" value="Ajouter" class="subm" name="Ajouter">
    </form>

    </div>
</div>
</body>
</html>