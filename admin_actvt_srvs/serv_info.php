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
    <title>Services</title>
</head>
<body>
<div class="index">
        <?php
        include("para_sec.php");
        ?>
        <div class="desc">
            <h5 style="margin-left: 20%; color: crimson;"><?=  $err; ?></h5>
            <h2 style="margin-top: 5%;">Service</h2>
            <?php
            $recupuser = $bdd->query('SELECT * FROM service');
            while($user = $recupuser->fetch()){
           ?>
           <div class="Description">   
                <p><label >Type :</label> <span style="color: #ff4800;margin-left: 15%;"><?= $user['type_serv'];?></span></p>
                <p><label >Tarif :</label><span style="color: #ff4800;margin-left: 20%;"><?= $user['tarif'];?></span></p>
           </div>
           <?php
          } 
          ?>
</div>
</body>
</html>