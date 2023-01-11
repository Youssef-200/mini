<?php
include("connect_bd.php");
//AJOUT SERVICE
if(isset($_POST['Ajouter'])){
    if(!empty($_POST['type_serv'])AND !empty($_POST['tarif'])){
        $insert = $bdd->prepare('INSERT INTO service(type_serv,tarif) VALUES(?,?)');
        $insert->execute(array($_POST['type_serv'],$_POST['tarif']));
        header('Location: srvs_admin.php');
    }else{
        $err="veuillez completer toutes les champs...";
    }
}
//MODIFI SERVICE
if(isset($_POST['valider'])){
    if(!empty($_POST['type_serv'])){
        $insert = $bdd->prepare('UPDATE service SET type_serv=? WHERE id_serv=?');
        $insert->execute(array($_POST['type_serv'],$_POST['id_serv']));
        header('Location: srvs_admin.php');
    }else{
        $err="veuillez completer toutes les champs...";
    }
}
//suppression SERVICE
if(isset($_POST['supprimer'])){
    $getid = $_POST['id_serv'];
    $banniruser = $bdd->prepare('DELETE FROM service WHERE id_serv= ?');
    $banniruser->execute(array($getid));
    header('Location: srvs_admin.php');
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
    <title>Services</title>
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
            <h2 style="margin-top: 5%;">Service</h2>
            <?php
            $recupuser = $bdd->query('SELECT * FROM service');
            while($user = $recupuser->fetch()){
           ?>
           <div class="Description">   
                <p><label >Type :</label> <span style="color: #ff4800;margin-left: 15%;"><?= $user['type_serv'];?></span></p>
                <p><label >Tarif :</label><span style="color: #ff4800;margin-left: 20%;"><?= $user['tarif'];?></span></p>
                <div style="display: flex;margin-left: 50%;">
                <form method="POST">
                    <input type="submit" name="supprimer" value="Supprimper"  style="color: red;height: 25px;padding: 0% 0.3rem;">
                    <input type="number" name="id_serv" value="<?=$user['id_serv'];?>"  style="display: none;">
                </form>
                <div>
                        <button onclick="d<?= $user['id_serv'];?>()" style="border: none;"><input type="submit" name="modifier" value="Modifier"  style="color: red;height: 25px;padding: 0% 0.3rem;"></button>
                        <form method="POST" id="ff<?=$user['id_serv'];?>" style="margin-left: -78%;display: none;" >
                            Type :<input type="text" name="type_serv" style="width: 166px;height: 20px;text-align: center;">
                            <br>
                            Tarif :<input type="number" name="tarif" style="width: 170px;height: 20px;text-align: center;">
                            <input type="submit" value="valider" class="subm" style="height: 25px;padding: 0.2px 0.3rem;margin-left: 20%;" name="valider">
                            <input type="number" name="id_serv" value="<?= $user['id_serv'];?>"  style="display: none;">
                        </form>
                        <script>
                        function d<?=$user['id_serv'];?>(){
                        var a=document.getElementById("ff<?=$user['id_serv'];?>");
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
                <p><h4>Crée une Service</h4></p>
                <p><label for="type_serv">Type :</label><input type="text" name="type_serv" style="width: 200px;height: 20px;color: white;text-align: center;"></p>
                <p><label for="tarif">Tarif :</label><input type="number" name="tarif" style="width: 200px;height: 20px;margin-left: 30%;color: white;text-align: center;"></p>
                <input type="submit" value="Ajouter" class="subm" name="Ajouter">
            </form>
        </div>
</div>
</body>
</html>