<?php
include("connect_bd.php");
?>
<?php
$h=$bdd->prepare('SELECT * FROM chambre');
$h->execute();
$h = $h->fetchAll();
if (isset($_POST['Ajouter'])) {
    if (!empty($_POST['id_h']) and !empty(!empty($_POST['Type_ch']) and !empty($_POST['Prix_ch']))) {
        $insert = $bdd->prepare('INSERT INTO chambre(type_ch,prix_ch,id_h) VALUES(?,?,?)');
        $insert->execute(array($_POST['Type_ch'], $_POST['Prix_ch'], $_POST['id_h']));
    } else {
        $err = "veuillez completer toutes les champs...";
    }
}

//AJOUT D'UN EQUIPEMENT
if(isset($_POST['ajouter'])){
 if( !empty($_POST['nom_equipement'])){
     
     $insert = $bdd->prepare('INSERT INTO equip(nom_equipement,num_ch) VALUES(?,?)');
     $insert->execute(array($_POST['nom_equipement'],$_POST['num_ch']));
 }else{
     $err="veuillez completer toutes les champs...";
 }
}

//modefications 
if(isset($_POST['valider'])){
    if( !empty($_POST['type_ch'])){
        
        $insert = $bdd->prepare('UPDATE chambre SET type_ch=? WHERE num_ch=?');
        $insert->execute(array($_POST['type_ch'],$_POST['num_ch']));
    }else{
        $err="veuillez completer toutes les champs...";
    }
   }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>admin_infra_strctr</title>
</head>
<body>

<div class="index">
    <?php include("para_infra.php");?>
        <div class="desc">
            <h5 style="margin-left: 20%; color: crimson;"><?=  $err; ?></h5>
            <h2>Hoteles</h2>
            <?php
            $j = 0;         
            $z=$bdd->prepare('SELECT * FROM hotel');
            $z->execute();
            $z = $z->fetchAll();
            for ($i = 0; $i < count($z); $i++) {
            ?>
           <div class="Description">
                <p><label>Nom Hotel : <span><?= $z[$i]['nom_h']; ?></span></label></p>
                <p><label>Categorie : <span><?= $z[$i]['categorie']; ?></span> </label></p>
                <p><label>Nombre chambres : <span><?= $z[$i]['nombre_ch']; ?></span> </label></p>
                <p><label>Addresse : <span><?= $z[$i]['adress_h']; ?></span> </label></p>
                <button onclick="d<?=$j;?>()" style="color: white;padding: 0 0.5rem;text-decoration: none;margin-left: 33%;border:2px solid #fff;border-radius: 10px;background:rgb(10, 103, 243);">Créer un Chambre</form></button>
                <form method="POST" id="ff<?=$j;?>" style="display: none;" >
                    <div>
                      <input type="number" name="id_h" value="<?=$z[$i]['id_h'];?>" style="display: none;">
                      <p><label>Type :</label><input type="text" name="Type_ch" style="width: 200px;height: 20px;margin-left: 6%;text-align: center;"></p>
                      <p><label>Prix :</label><input type="number" name="Prix_ch" style="width: 200px;height: 20px;margin-left: 9%;text-align: center;"></p>
                      <input type="submit" value="Ajouter" style="margin-left: 40%;" class="subm" name="Ajouter">
                    </div>
                </form>
                <script>
                    function d<?=$j;?>(){
                    var a=document.getElementById("ff<?=$j;?>");
                    console.log(a.style.display);
                    if (a.style.display === 'none') {
                        a.style.display = 'block';
                    } else {
                        a.style.display = 'none';
                    }
                    }
                </script>
                <?php
                $d = $z[$i]['id_h'];
                $r1 = $bdd->prepare('SELECT * FROM chambre');
                $r1->execute(array());
                $r1 = $r1->fetchAll();
                for ($l = 0; $l < count($r1); $l++) {
                    if ($d == $r1[$l]['id_h']) {
                ?>
                <p><label>N° chambre: <span style="color: #ff4800; margin-left: 2rem;"><?= $r1[$l]['num_ch']; ?></span> </label></p>
                <p><label>Prix : <span style="color: #ff4800; margin-left: 5.5rem;"> <?= $r1[$l]['prix_ch']; ?>DH</span> </label></p>
                <p><label>Type : <span style="color: #ff4800; margin-left: 5.4rem;"> <?= $r1[$l]['type_ch']; ?></span> </label></p>
                <div style="display: block;">
                    <button id="p<?=$r1[$l]['type_ch'];?>" onclick="c<?=$r1[$l]['type_ch'];?>()" style="height:min-content;margin-left: 33%; color: white; border:2px solid #fff;border-radius: 10px;background-color: rgb(10, 103, 243);padding:0 0.3rem;">Modifie Chambre</form></button>
                    <form method="POST" id="f<?=$r1[$l]['type_ch'];?>"   style="display: none;" >
                    <div style="display: flex;">
                    <input type="text" name="type_ch" value="<?= $r1[$l]['type_ch']; ?>" style="width: 140px;height: 25px;margin-left: 32%;text-align:center;">
                    <input type="text" name="num_ch" value="<?=$r1[$l]['num_ch'];?>" style="display:none;">
                    <br>
                    <input type="submit" value="valider" class="su" name="valider">  </div>
                </form>
                </div>
                <p><label style="color: #000;font-weight: bold;margin-left: 50px;">Equipements chambre: </label></p>
                <?php
                $ee = $r1[$l]['num_ch'];
                $e = $bdd->prepare('SELECT * FROM equip');
                $e->execute(array());
                $e = $e->fetchAll();
                for ($p = 0;$p < count($e); $p++)  {
                    if ($ee == $e[$p]['num_ch']) {   
                ?>
                <div style="display: flex;">
                    <p> <span  style="color: #ff9900;margin-left: 50px;"><?= $e[$p]['nom_equipement']; ?></span> </p>
                    <a href="enlever_equip.php?id_equip=<?= $e[$p]['id_equip']; ?>" style="color: red;text-decoration: none;margin-left:20%;">enlever</a>
                </div>  
                <?php    
            }
            
                }?>
                <div style="display: block;">
                    <button id="p<?=$r1[$l]['num_ch'];?>" onclick="b<?=$r1[$l]['num_ch'];?>()" style="color: white;padding: 0 0.5rem;border:2px solid #fff;border-radius: 10px;text-decoration: none;margin-left: 33%;background:rgb(10, 103, 243);">Ajout Equipe</form></button>
                    <form method="POST" id="f<?=$r1[$l]['num_ch'];?>"   style="display: none;" >
                      <div style="display: flex;">
                        <input type="text" name="nom_equipement" style="width: 110px;height: 23px;margin-left: 33%;text-align: center;">
                        <input type="text" name="num_ch" value="<?=$r1[$l]['num_ch'];?>" style="display:none;">
                        <br>
                        <input type="submit" value="ajouter" class="su" name="ajouter">
                      </div>
                    </form>
                    
                <script>
                    function b<?=$r1[$l]['num_ch'];?>(){
                    var a=document.getElementById("f<?=$r1[$l]['num_ch'];?>");
                    console.log(a.style.display);
                    if (a.style.display === 'none') {
                        a.style.display = 'block';
                    } else {
                        a.style.display = 'none';
                    }
                    }
                    function c<?=$r1[$l]['type_ch'];?>(){
                    var a=document.getElementById("f<?=$r1[$l]['type_ch'];?>");
                    console.log(a.style.display);
                    if (a.style.display === 'none') {
                        a.style.display = 'block';
                    } else {
                        a.style.display = 'none';
                    }
                    }
                    function d<?=$z[$i]['id_h'];?>(){
                    var a=document.getElementById("f<?=$z[$i]['id_h'];?>");
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
                    }
                   }?>
            </div>
                   <?php
                $j++;
                }
          ?>
    </div>
</div>                 
</body>
</html>


