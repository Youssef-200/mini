<?php
include("connect_bd.php");
?>
<?php
$h=$bdd->prepare('SELECT * FROM bang');
$h->execute();
$h = $h->fetchAll();
if(isset($_POST['Ajouter'])){
    if(!empty($_POST['type'])AND !empty($_POST['prix'])AND !empty($_POST['num_b'])){ 
        $vh = 1;
        for ($j = 0; $j < count($h); $j++) {
                if ($h[$j]['num_b']==$_POST['num_b']){
                $vh = 0;
                $err="Deja exist ...";
                break;
                }
        }
        if ($vh == 1) {
            $insert = $bdd->prepare('INSERT INTO bang(num_b,type_b,prix) VALUES(?,?,?)');
            $insert->execute(array($_POST['num_b'],$_POST['type'],$_POST['prix']));
        }
    }else{
        $err="veuillez completer toutes les champs...";
    }
}
//MODIFY
if(isset($_POST['valider'])){
    if( !empty($_POST['type_b']) AND !empty($_POST['prix_b'])AND !empty($_POST['num_b'])){
        $insert = $bdd->prepare('UPDATE bang SET type_b=? , prix=? WHERE num_b=?');
        $insert->execute(array($_POST['type_b'],$_POST['prix_b'],$_POST['num_b']));
        header('Location: bungalos_d.php');
    }else{
        $err="veuillez completer toutes les champs...";
    }
}
//SUPPRIMER
if (isset($_POST['supprimer'])) {
    if (!empty($_POST['num_b'])) {
            $insert = $bdd->prepare('DELETE FROM bang WHERE num_b=?');
            $insert->execute(array($_POST['num_b']));
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
    <title>Hotel-Dericteur</title>
</head>
<body>
<div class="index">
    <?php include("para_d.php"); ?>
    <div class="desc">
        <h5 style="margin-top: 1%;margin-left: 20%; color: crimson;"><?=  $err; ?></h5>
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
                <div style="display: flex;">
                   <button id="p<?=$i;?>" onclick="b<?=$i;?>()" style="color: red; color: white; border:2px solid #fff;border-radius: 10px;background-color: rgb(10, 103, 243);margin-left: 20%;padding: 0.2rem 1rem;">modifie</form></button>
                   <form method="POST">
                    <input type="number" name="num_b" value=<?=$user["num_b"]?> style="display:none">
                    <input type="submit" style="color: red; color: white; border:2px solid #fff;border-radius: 10px;background-color: rgb(10, 103, 243);margin-left: 45%;padding: 0.2rem 1rem;" name="supprimer" value="supprimer">
                   </form>
                </div>
                <br>
           <form method="POST" id="f<?=$i;?>"   style="display: none;" >
                <h5 style="margin-left: 26%;">Modefier Bung</h5>
                <input type="number" name="num_b" value=<?= $user["num_b"]?> style="display:none">
                <label>Categorie :</label>
                <input type="text" name="type_b" value=<?=$user["type_b"]?> style="width: 200px;height: 20px;margin-left:7%;">
                <br>
                <label>Prix  : </label>
                <input type="number" name="prix_b" value=<?= $user["prix"]?> style="width: 200px;height: 20px;margin-left:20%;">
                <br>
                <input type="submit" value="Valider" class="subm" name="valider">
            </form> 
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
          <form method="POST" class="frm">
                <h4 style="margin-left: 26%;">Ajouter un Bungalos</h4>
                <p><label for="num_b">N° BUNG:</label><input type="number" name="num_b" style="color:#fff;width: 200px;height: 20px;margin-left: 20%;text-align: center;"></p>
                <p><label for="type">Categorie :</label> <input type="text" name="type" style="color:#fff;width: 200px;height: 20px;margin-left: 17%;text-align: center;"></p>
                <p><label for="prix">Prix :</label><input type="number" name="prix" style="color:#fff;width: 200px;height: 20px;margin-left: 33%;text-align: center;"></p>
                <input type="submit" value="Ajouter" class="subm" style="color: alicebleu;" name="Ajouter">
            </form>
    </div>
</div>
    
</body>
</html>