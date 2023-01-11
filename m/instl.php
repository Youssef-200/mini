<?php
include("connect_bd.php");
?>
<?php
$h=$bdd->prepare('SELECT * FROM instlations');
$h->execute();
$h = $h->fetchAll(); 
if (isset($_POST['Ajouter'])) {
    if (!empty($_POST['id_h']) and !empty(!empty($_POST['nom_inst']) and !empty($_POST['nbr_inst']))) {
    $vh = 1;
    for ($j = 0; $j < count($h); $j++) {
        if ($h[$j]['nom_inst']==$_POST['nom_inst']){
        $vh = 0;
        $err = "Deja existe...";
        break;
        }
    }
    if ($vh == 1) {
        $insert = $bdd->prepare('INSERT INTO instlations(nom_inst,nbr_inst,id_h) VALUES(?,?,?)');
        $insert->execute(array($_POST['nom_inst'], $_POST['nbr_inst'], $_POST['id_h']));    
    }
    } else {
        $err = "veuillez completer toutes les champs...";
    }
}
//MOdify
if (isset($_POST['valider'])) {
    if (!empty($_POST['id_inst']) and !empty(($_POST['nbr_inst']))) {
            $insert = $bdd->prepare('UPDATE instlations SET nbr_inst=? WHERE id_inst=?');
            $insert->execute(array($_POST['nbr_inst'],$_POST['id_inst']));
    } else {
        $err = "veuillez completer toutes les champs...";
    }
}
//SUPPRIMER
if (isset($_POST['supprimer'])) {
    if (!empty($_POST['id_inst'])) {
            $insert = $bdd->prepare('DELETE FROM instlations WHERE id_inst=?');
            $insert->execute(array($_POST['id_inst']));
    } else {
        $err = "veuillez completer toutes les champs...";
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
    <title>Instalations</title>
</head>
<body>
<div class="index">
    <?php include("para_d.php"); ?>    
        <div class="desc">
            <h2 style="margin-top: 5%;">Installations</h2>
            <h5 style="margin-left: 20%; color: crimson;"><?=  $err; ?></h5>
            <?php
            $j = 0;         
            $z=$bdd->prepare('SELECT * FROM hotel');
            $z->execute();
            $z = $z->fetchAll();
            for ($i = 0; $i < count($z); $i++) {
            ?>
           <div class="Description">
                <p><label>Nom Hotel : <span><?= $z[$i]['nom_h']; ?></span></label></p>
                <p><span style="margin-left: -10%;color: #ff4800;">Installations :</span></p>
                <?php
                $d = $z[$i]['id_h'];
                $r1 = $bdd->prepare('SELECT * FROM instlations');
                $r1->execute(array());
                $r1 = $r1->fetchAll();
                for ($l = 0; $l < count($r1); $l++) {
                    if ($d == $r1[$l]['id_h']) {
                ?>
                <p><label>Nom installation :<span style="margin-left: 3.7rem;color: #ff4800;font-weight: bold;"><?= $r1[$l]['nom_inst']; ?></span> </label></p>
                <p><label>Nombre :<span style="margin-left: 8rem;color: #ff4800;font-weight: bold;"> <?= $r1[$l]['nbr_inst']; ?></span> </label></p>
                <div style="display: flex;margin-left: 60%;margin-top: -2%;">
                    <form method="POST">
                        <input type="number" name="id_inst" value="<?= $r1[$l]['id_inst']; ?>" style="display: none;">
                        <input type="submit" name="supprimer" value="supprimer" style="height:min-content; color: white; border:2px solid #fff;border-radius: 10px;background-color: rgb(10, 103, 243);padding:0 0.3rem;">
                    </form>
                 <div>
                    <button id="p<?=$r1[$l]['id_inst'];?>" onclick="c<?=$r1[$l]['id_inst'];?>()" style="height:min-content; color: white; border:2px solid #fff;border-radius: 10px;background-color: rgb(10, 103, 243);padding:0 0.3rem;">modifie</form></button>
                    <form method="POST" id="f<?=$r1[$l]['id_inst'];?>"   style="display: none;" >
                        <div style="display: flex;margin-left: -54%;">
                        <input type="number" name="nbr_inst" style="width: 120px;height: 25px;text-align: center;">
                        <input type="text" name='id_inst' value="<?=$r1[$l]['id_inst'];?>" style="display:none;">
                        <br>
                        <input type="submit" value="v" class="su" name="valider" style="height:20px; color: white; border:2px solid #fff;border-radius: 10px;background-color:  rgba(71, 191, 242, 0.585);padding:0.3rem 0.5rem;"></div>
                    </form>
                    <script>
                       function c<?=$r1[$l]['id_inst'];?>(){
                    var a=document.getElementById("f<?=$r1[$l]['id_inst'];?>");
                    console.log(a.style.display);
                    if (a.style.display === 'none') {
                        a.style.display = 'block';
                    } else {
                        a.style.display = 'none';
                    }
               }
                </script>
                    </div>
                </div>
                <?php    
            }
            
                }?>
                <button onclick="d<?=$z[$i]['id_h'];?>()" style="color: white;padding: 0 0.5rem;text-decoration: none;margin-left:15%;border:2px solid #fff;border-radius: 10px;background:rgb(10, 103, 243);">ajouter</form></button>
                <form method="POST" id="ff<?=$z[$i]['id_h'];?>" style="display: none;" >
                    <div>
                      <input type="number" name="id_h" value="<?=$z[$i]['id_h'];?>" style="display: none;">
                      <p><label>Nom :</label><input type="text" name="nom_inst" style="width: 200px;height: 25px;border-radius: 6px;margin-left: 13%;text-align: center;"></p>
                      <p><label>Nombre :</label><input type="number" name="nbr_inst" style="width: 200px;height: 25px;border-radius: 6px;margin-left: 5%;text-align: center;"></p>
                      <input type="submit" value="Ajouter" class="subm" name="Ajouter">
                    </div>
                </form>
                <script>
                    function d<?=$z[$i]['id_h'];?>(){
                    var a=document.getElementById("ff<?=$z[$i]['id_h'];?>");
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
        ?>
    </div>
</div>
    
</body>
</html>