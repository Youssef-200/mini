<?php
include("connect_bd.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Activites</title>
</head>
<body>
<div class="index">
        <?php
        include("para_sec.php");
        ?>
        <div class="desc">
            <p><h5 style="margin-left: 20%; color: crimson;"><?=  $err; ?></h5></p>
            <h2 style="margin-top: 5%;">Activité</h2>
            <?php
            $recupuser = $bdd->query('SELECT * FROM actvt');
            while($user = $recupuser->fetch()){
           ?>
           <div class="Description">
                <p><label for="nom_actvt">Nom :</label></label> <span style="color: #ff4800;margin-left: 15%;"><?= $user['nom_actvt'];?></span></p>
                <p><label for="type_actvt">Type :</label></label> <span style="color: #ff4800;margin-left: 15%;"><?= $user['type_actvt'];?></span></p>
           </div>
           <?php
          } 
          ?>
        </div>
</div>
</body>
</html>