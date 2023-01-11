<?php
session_start();
$bdd=new PDO('mysql:host=localhost:5000;dbname=m;charset=utf8;','root','');
$err = "";
if(!$_SESSION['mdp']){
    header('Location: Administrateur.php');
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
                <p><label for="type_actvt">Type d'activité :</label></label> <span style="color: #ff4800;margin-left: 15%;"><?= $user['type_actvt'];?></span></p>
           </div>
           <?php
          } 
          ?>
        </div>
</div>
</body>
</html>