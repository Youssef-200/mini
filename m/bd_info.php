<?php
include("connect_bd.php");
?>
<?php
$z=$bdd->prepare('SELECT * FROM emp');
$z->execute();
$z = $z->fetchAll();
$h=$bdd->prepare('SELECT * FROM hotel');
$h->execute();
$h = $h->fetchAll();

if(isset($_POST['Entrer'])){
    if(!empty($_POST['id_emp']) AND !empty($_POST['mdp'])){
       $v=0;
       for($i=0;$i<count($z);$i++){
        
        $pseudo_saisie=htmlspecialchars($_POST['id_emp']);
        $mdp_saisie=htmlspecialchars($_POST['mdp']);

        if($pseudo_saisie ==$z[$i]['id_emp'] AND $mdp_saisie==$z[$i]['pass']){
            $_SESSION['mdp']=$mdp_saisie;
            $v=1;
            header('Location: index.php');
        }
        }if($v==0){
            $err= "mot de passe ou pseudo incorrect";
        }
    }else{
        $err="veuillez completer toutes les champs...";
    }
}

if(isset($_POST['modefier'])){
    if( !empty($_POST['adress_h']) AND !empty($_POST['nombre_ch']) AND !empty($_POST['categorie']) AND !empty($_POST['nom_h'])AND !empty($_POST['id_h'])){
        
        $insert = $bdd->prepare('UPDATE hotel SET adress_h=? ,nombre_ch=? , categorie=?, nom_h=? WHERE id_h=?');
        $insert->execute(array($_POST['adress_h'],$_POST['nombre_ch'],$_POST['categorie'],$_POST['nom_h'],$_POST['id_h']));
        header('Location: hotel_directeur.php');
    }else{
        $err="veuillez completer toutes les champs...";
    }
}




if(isset($_POST['Ajouter'])){
    if(!empty($_POST['categorie'])AND !empty($_POST['adresse'])AND!empty($_POST['nbr_ch'])AND!empty($_POST['nom_h'])){
        
        $vh = 1;
        for ($j = 0; $j < count($h); $j++) {
                if ($h[$j]['nom_h']==$_POST['nom_h']){
                $vh = 0;
                break;
                }


        }
        if ($vh == 1) {
            $insert = $bdd->prepare('INSERT INTO hotel(adress_h,nombre_ch,categorie,nom_h) VALUES(?,?,?,?)');
            $insert->execute(array($_POST['adresse'], $_POST['nbr_ch'], $_POST['categorie'], $_POST['nom_h']));
        }
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
    <title>Hotel-Secritaire</title>
</head>
<body>
<div class="index">
    <?php
        include("para_sec.php");
        ?>
    <div class="desc">
        <h5 style="margin-left: 20%; color: crimson;"><?=  $err; ?></h5>
        <h2 style="margin-top: 5%;">Hoteles</h2>
        <?php
        $recupuser = $bdd->query('SELECT * FROM hotel');    
        $i=0;
        while($user = $recupuser->fetch()){   
        ?>
        <div class="Description">
            <p><label>NOM HOTEL  :  <span style="color: #ff4800;"><?= $user['nom_h'];?></span></label></p>                
            <p><label>Categorie  : <span style="color: #ff4800;"> <?= $user['categorie'];?></span></label></p>                                
            <p><label>Addresse : <span style="color: #ff4800;"><?= $user['adress_h'];?></span></label></p> 
            <p><label>Nombre de chambres : <span style="color: #ff4800;"><?= $user['nombre_ch'];?></span></label></p>
           <form method="POST" id="f<?=$i;?>"   style="display: none;" >
                <h5 style="margin-left: 26%;"><b>Modefier un HOTEL</b></h5>
                <input type="text" name="id_h" value=<?= $user["id_h"]?> style="display:none">
                <p><label for="prix"><b>Nom :</b></label><input type="text" name="nom_h" value="<?= $user['nom_h'];?>" class="inp"></p>
                <p><label for=""><b>Adresse : </b></label><input type="text" name="adress_h" value="<?= $user['adress_h'];?>" class="inp"></p> 
                <p><label for="categorie"><b>Categorie : </b></label><input type="text" name="categorie" value="<?= $user['categorie'];?>" class="inp"></p>
                <p><label for="nombre_ch"><b>Nbr chambres : </b></label> <input type="number" name="nombre_ch" value="<?= $user['nombre_ch'];?>"class="inp"></p>
                <br>
                <input type="submit" value="Valider" class="subm" name="modefier">
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
    </div>
</div>
    
</body>
</html>