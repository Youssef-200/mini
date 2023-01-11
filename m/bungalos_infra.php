<?php
include("connect_bd.php");
?>
<?php
if(isset($_POST['Ajouter'])){
    if(!empty($_POST['type']) AND !empty($_POST['prix']) AND !empty($_POST['equip'])){
        
        $insert = $bdd->prepare('INSERT INTO bang(type,prix,equipement) VALUES(?,?,?)');
        $insert->execute(array($_POST['type'],$_POST['prix'],$_POST['equip']));
       
    }else{
        $err="veuillez completer toutes les champs...";
    }
}
//AJOUT D'UN EQUIPEMENT
if(isset($_POST['ajouter'])){
    if( !empty($_POST['nom_equipement'])){
        
        $insert = $bdd->prepare('INSERT INTO equip_b(nom_equipement,num_b) VALUES(?,?)');
        $insert->execute(array($_POST['nom_equipement'],$_POST['num_b']));
    }else{
        $err="veuillez completer toutes les champs...";
    }
   }
//modefications 
if(isset($_POST['valider'])){
    if( !empty($_POST['type_b'])){
        
        $insert = $bdd->prepare('UPDATE bang SET type_b=? WHERE num_b=?');
        $insert->execute(array($_POST['type_b'],$_POST['num_b']));
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
    <title>Bungalos</title>
</head>
<body>
<div class="index">
<?php include("para_infra.php");?>
        <div class="desc">
            <h2>Bangalos</h2>
            <h5 style="margin-left: 20%; color: crimson;"><?=  $err; ?></h5>
            <?php
            $re = $bdd->prepare('SELECT * FROM bang');
            $re->execute();
            $re = $re->fetchAll();
            $j=0;
            for ($i = 0; $i < count($re); $i++){
        ?>
           <div class="Description">
                
                <p><label for="num_b">N°: <span style="color: #ff4800;margin-left: 20px;"> <?= $re[$i]['num_b'];?></span></label></p>
                <p><label>Type :<span style="color: #ff4800;margin-left: 20px;"><?= $re[$i]['type_b'];?></span></label></p>
                <div style="display: block;">
                    <button id="p<?=$re[$i]['num_b'];?>" onclick="c<?=$re[$i]['num_b'];?>()" style="color: white; border:2px solid #fff;margin-left: 33%;border-radius: 10px;background-color: rgb(10, 103, 243);margin-left: 15%;padding: 0.2rem 1rem;">Modifie Type</form></button>
                    <form method="POST" id="fm<?=$re[$i]['num_b'];?>" style="display: none;" >
                        <div style="display: flex;">
                    <input type="text" name="type_b" value="<?=$re[$i]['type_b'];?>" style="width: 130px;height: 22px;margin-left: 15%;text-align: center;">
                    <input type="text" name="num_b" value="<?=$re[$i]['num_b'];?>" style="display:none;">
                    <br>
                    <input type="submit" value="valider" style="height: 22px;padding-top: -2rem;" name="valider">  </div>
                </form>
                </div>
                <p><label for="prix">Prix : <span style="color: #ff4800;margin-left: 20px;"><?= $re[$i]['prix'];?>DH</span></label></p>
                <p><label for="equip">Equipement : <span style="color: #ff4800;margin-left: 20px;"></span></label></p>
                <?php
                $ee = $re[$i]['num_b'];
                $e = $bdd->prepare('SELECT * FROM equip_b');
                $e->execute(array());
                $e = $e->fetchAll();
                for ($K = 0; $K < count($e); $K++){
                    if ($ee == $e[$K]['num_b']) {                               
                ?>
                <div style="display: flex;">
                    <p> <span  style="color: #ff4800;margin-left: 50px;"><?=  $e[$K]['nom_equipement']; ?></span> </p>
                    <a href="enlever_equip.php?id_equipb=<?= $e[$K]['id_equipb']; ?>" style="color: red;text-decoration: none;margin-left:20%;">enlever</a>
                </div>
                <?php
            }
            }?>
            
            <div style="display: block;">
                <button id="p<?=$re[$i]['num_b'];?>" onclick="m<?=$re[$i]['num_b'];?>()" style="border:2px solid #fff;margin-left: 33%;border-radius: 10px;color: white;padding: 0 0.5rem;text-decoration: none;margin-left:15%;background:rgb(10, 103, 243);">Ajout Aquipement</form></button>
                <form method="POST" id="f<?=$re[$i]['num_b'];?>"   style="display: none;" >
                    <div style="display: flex;">
                        <input type="text" name="nom_equipement" style="margin-left: 15%;text-align: center;width: 145px;height: 25px;">
                        <input type="text" name="num_b" value="<?=$re[$i]['num_b'];?>" style="display:none;">
                        <br>
                        <input type="submit" value="ajouter" class="su" name="ajouter">
                    </div>
            </div>
           <script>
                function b<?= $i;?>(){
                    var a=document.getElementById("ff<?= $i;?>");
                    console.log(a.style.display);
                    if (a.style.display === 'none') {
                        a.style.display = 'block';
                    } else {
                        a.style.display = 'none';
                    }
                    }
                    function m<?=$re[$i]['num_b'];?>(){
                    var a=document.getElementById("f<?=$re[$i]['num_b'];?>");
                    console.log(a.style.display);
                    if (a.style.display === 'none') {
                        a.style.display = 'block';
                    } else {
                        a.style.display = 'none';
                    }
               }
                
               function c<?=$re[$i]['num_b'];?>(){
                    var a=document.getElementById("fm<?=$re[$i]['num_b'];?>");
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
            $j++;
          } 
          ?>
        </div>
</div>
</body>
</html>