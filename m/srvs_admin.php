<?php
include("connect_bd.php");
//AJOUT SERVICE
if(isset($_POST['Ajouter'])){
    if(!empty($_POST['type_serv'])AND !empty($_POST['tarif'])AND!empty($_POST['dat_db'])AND!empty($_POST['dat_fn'])AND!empty($_POST['heur_db'])AND!empty($_POST['heur_fn'])){
        $insert = $bdd->prepare('INSERT INTO service(type_serv,tarif,dat_db,dat_fn,heur_db,heur_fn) VALUES(?,?,?,?,?,?)');
        $insert->execute(array($_POST['type_serv'],$_POST['tarif'],$_POST['dat_db'],$_POST['dat_fn'],$_POST['heur_db'],$_POST['heur_fn']));
        header('Location: srvs_admin.php');
    }else{
        $err="veuillez completer toutes les champs...";
    }
}
//MODIFI SERVICE
if(isset($_POST['valider'])){
    if(!empty($_POST['type_serv'])AND!empty($_POST['dat_db'])AND!empty($_POST['dat_fn'])AND!empty($_POST['heur_db'])AND!empty($_POST['heur_fn'])){
        $insert = $bdd->prepare('UPDATE service SET type_serv=?,dat_db=? ,dat_fn=? ,heur_db=? ,heur_fn=? WHERE id_serv=?');
        $insert->execute(array($_POST['type_serv'],$_POST['id_serv'],$_POST['dat_db'],$_POST['dat_fn'],$_POST['heur_db'],$_POST['heur_fn']));
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
    <?php include("para_actvt_srvs.php");?>
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
                <p><label for="dat_db">Date debut :</label></label> <span style="color: #ff4800;margin-left: 15%;"><?= $user['dat_db'];?></span></p>
                <p><label for="dat_fn">Dte fin:</label></label> <span style="color: #ff4800;margin-left: 27%;"><?= $user['dat_fn'];?></span></p>
                <p><label for="heur_db">Commence a :</label></label> <span style="color: #ff4800;margin-left: 15%;"><?= $user['heur_db'];?>heur</span></p>
                <p><label for="heur_fn">Fini a :</label></label> <span style="color: #ff4800;margin-left: 33%;"><?= $user['heur_fn'];?>heur</span></p>
                <div style="display: flex;margin-left: 50%;">
                <form method="POST">
                    <input type="submit" name="supprimer" value="Supprimper"  style="color: red;height: 25px;padding: 0% 0.3rem;">
                    <input type="number" name="id_serv" value="<?=$user['id_serv'];?>"  style="display: none;">
                </form>
                <div>
                        <button onclick="d<?= $user['id_serv'];?>()" style="border: none;"><input type="submit" name="modifier" value="Modifier"  style="color: red;height: 25px;padding: 0% 0.3rem;"></button>
                        <form method="POST" id="ff<?=$user['id_serv'];?>" style="margin-left: -78%;display: none;" >
                            <div>Type :<input type="text" name="type_serv" value=<?= $user['type_serv'];?> style="width: 166px;height: 20px;text-align: center;margin-left: 1.4rem;"></div><br>
                            <div>Tarif :<input type="number" name="tarif" value=<?= $user['tarif'];?> style="width: 170px;height: 20px;text-align: center;margin-left: 1.8rem;"></div><br>
                            <div>Date-d: <input type="date" name="dat_db" value=<?= $user['dat_db'];?> style="width: 167px;height: 20px;text-align: center;margin-left: 1rem;"></div><br>
                            <div>Date-f: <input type="date" name="dat_fn" value=<?= $user['dat_fn'];?> style="width: 167px;height: 20px;text-align: center;margin-left: 1.4rem;"></div><br>
                            <div>Commence a :<input type="time" name="heur_db" value=<?= $user['heur_db'];?> style="width: 100px;height: 20px;text-align: center;margin-left: 2.5rem"></div><br>
                            <div>Fini a :<input type="time" name="heur_fn" value=<?= $user['heur_fn'];?> style="width: 100px;height: 20px;text-align: center;margin-left: 6rem"></div><br>
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
                <p><label for="type_serv">Type :</label><input type="text" name="type_serv" style="width: 170px;height: 20px;color: white;text-align: center;"></p>
                <p><label for="tarif">Tarif :</label><input type="number" name="tarif" style="width: 170px;height: 20px;margin-left: 30%;color: white;text-align: center;"></p>
                <p><label for="nom_actvt">Date debut :</label><input type="date" name="dat_db" style="width: 170px;height: 20px;text-align: center;color: white;margin-left: 3rem;"></p>
                <p><label for="type_actvt">Date fin :</label><input type="date" name="dat_fn" style="width: 170px;height: 20px;text-align: center;color: white;margin-left: 5rem;"></p>
                <p><label for="nom_actvt">Comence a :</label><input type="time" name="heur_db" style="width: 170px;height: 20px;text-align: center;color: white;margin-left: 3rem;"></p>
                <p><label for="type_actvt">Fini a:</label><input type="time" name="heur_fn" style="width: 170px;height: 20px;text-align: center;color: white;margin-left: 6.4rem;"></p>
                <input type="submit" value="Ajouter" class="subm" name="Ajouter">
            </form>
        </div>
</div>
</body>
</html>