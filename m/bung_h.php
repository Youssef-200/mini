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
    <title>Hotel-Secritaire</title>
</head>
<body>
<div class="index">
        <?php 
            include("para_sec.php");
            ?>        
        <div class="desc">
            <h2 style="margin-top: 5%;">Bungalos</h2>
            <?php
            $recupuser = $bdd->query('SELECT * FROM bang');
            $i=0;
            while($user = $recupuser->fetch()){                
           ?>
           <div class="Description">
                <p><label>N° bung :  <span style="color: #ff4800;"><?= $user['num_b'];?></span></label></p>                
                <p><label>Categorie  : <span style="color: #ff4800;"> <?= $user['type_b'];?></span></label></p>                                
                <p><label>Prix : <span style="color: #ff4800;"><?= $user['prix'];?>DH</span></label></p> 
           <script>
               function b<?=$i;?>(){
                    var a=document.getElementById("f<?=$i;?>");
                    console.log(a.style.display);
                    if (a.style.display === 'none') {
                        a.style.display = 'block';
                    } else {
                        a.style.display = 'none';
                    }
               }
           </script>
           </div>
           <?php
           $i++;
          } 
          ?>
        </div>
</div>
    
</body>
</html>