<?php
include("connect_bd.php");
?>
<?php
//AJOUT ACTIVITE
if(isset($_POST['Ajouter'])){
    if(!empty($_POST['nom_actvt'])AND!empty($_POST['type_actvt'])){
        $insert = $bdd->prepare('INSERT INTO actvt(nom_actvt,type_actvt) VALUES(?,?)');
        $insert->execute(array($_POST['nom_actvt'],$_POST['type_actvt']));
        header('Location: Admin_actvt_srvs.php');
    }else{
        $err="veuillez completer toutes les champs...";
    }
}
//MODIFI ACTIVITE
if(isset($_POST['valider'])){
    if(!empty($_POST['nom_actvt'])AND!empty($_POST['type_actvt'])){
        $insert = $bdd->prepare('UPDATE actvt SET nom_actvt=? ,type_actvt=? WHERE id_actvt=?');
        $insert->execute(array($_POST['nom_actvt'],$_POST['type_actvt'],$_POST['id_actvt']));
        header('Location: Admin_actvt_srvs.php');
    }else{
        $err="veuillez completer toutes les champs...";
    }
}
//suppression ACTIVITE
if(isset($_POST['supprimer'])){
        $getid = $_POST['id_actvt'];
        $banniruser = $bdd->prepare('DELETE FROM actvt WHERE id_actvt= ?');
        $banniruser->execute(array($getid));
        header('Location: Admin_actvt_srvs.php');
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
    <title>Activites</title>
</head>
<body>
<div class="index">
        <div class="parametres">
            <h1>Paramétres de site web</h1>
            <br>
            <a href="Admin_actvt_srvs.php">Activite .</a>
            <br>
            <a href="srvs_admin.php">Services .</a>
            <br>
            <a href="logout.php"><input type="submit" value="Deconnexion" class="subm1"></a>
        </div>
        <div class="desc">
            <h5 style="margin-left: 20%; color: crimson;"><?=  $err; ?></h5>
            <h2 style="margin-top: 5%;">Activité</h2>
            <?php
            $recupuser = $bdd->query('SELECT * FROM actvt');
            while($user = $recupuser->fetch()){
           ?>
           <div class="Description">
                <p><label for="nom_actvt">Nom :</label></label> <span style="color: #ff4800;margin-left: 15%;"><?= $user['nom_actvt'];?></span></p>
                <p><label for="type_actvt">Type :</label></label> <span style="color: #ff4800;margin-left: 15%;"><?= $user['type_actvt'];?></span></p>
                <div style="display: flex;margin-left: 50%;">
                    <form method="POST" >
                        <input type="submit" name="supprimer" value="Supprimper"  style="color: red;height: 25px;padding: 0% 0.3rem;">
                        <input type="number" name="id_actvt" value="<?= $user['id_actvt'];?>"  style="display: none;">
                    </form>
                    <div>
                        <button onclick="d<?= $user['id_actvt'];?>()" style="border: none;"><input type="submit" name="modifier" value="Modifier"  style="color: red;height: 25px;padding: 0% 0.3rem;"></button>
                        <form method="POST" id="ff<?=$user['id_actvt'];?>" style="margin-left: -80%;display: none;" >
                            Nom :<input type="text" name="nom_actvt" style="width: 167px;height: 20px;text-align: center;"><br>
                            Type :<input type="text" name="type_actvt" style="width: 170px;height: 20px;text-align: center;">
                            <input type="submit" value="valider" class="subm" style="height: 25px;padding: 0.2px 0.3rem;margin-left: 20%;" name="valider">
                            <input type="number" name="id_actvt" value="<?= $user['id_actvt'];?>"  style="display: none;">
                        </form>
                        <script>
                        function d<?=$user['id_actvt'];?>(){
                        var a=document.getElementById("ff<?=$user['id_actvt'];?>");
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
           </div>
           <?php
          } 
          ?>
          <form method="POST" class="frm">
                <h4>Crée une Activité</h4>
                <p><label for="nom_actvt">Nom :</label><input type="text" name="nom_actvt" style="width: 170px;height: 20px;text-align: center;color: white;"></p>
                <p><label for="type_actvt">Type :</label><input type="text" name="type_actvt" style="width: 170px;height: 20px;text-align: center;color: white;"></p>
                <input type="submit" value="Ajouter" class="subm" name="Ajouter">
         </form>
        
        </div>
</div>
</body>
</html>