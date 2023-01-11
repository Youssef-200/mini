<?php
session_start();
$err = "";
$bdd=new PDO('mysql:host=localhost:5000;dbname=m;charset=utf8;','root','');
$z=$bdd->prepare('SELECT * FROM emp');
$z->execute();
$z = $z->fetchAll();
if(isset($_POST['Entrer'])){
    if(!empty($_POST['id_emp']) AND !empty($_POST['mdp'])){
       $v=0;
       for($i=0;$i<count($z);$i++){
        
        $pseudo_saisie=htmlspecialchars($_POST['id_emp']);
        $mdp_saisie= htmlspecialchars($_POST['mdp']);

        if($pseudo_saisie ==$z[$i]['id_emp'] AND $mdp_saisie==$z[$i]['pass']){
            $_SESSION['mdp']=$mdp_saisie;
            $v=1;
            switch($z[$i]['post']){
                    case 'admin_infra':
                        header('Location: admin_infra_strctr.php');
                        break;
                    case 'dericteur':
                        header('Location:hotel_directeur.php');
                        break;
                    case 'admin_actvt_srvs':
                        header('Location: admin_actvt_srvs.php');
                        break;
                    case 'secritaire':
                            header('Location: secritaire.php');
                            break;
                    case 'admin_ventes':
                            header('Location: admin_ventes.php');
                            break;
                    default:
                        $err= "mot de passe ou pseudo incorrect";
                        break;
                    
            }
           
        }
        }if($v==0){
            $err= "mot de passe ou pseudo incorrect";
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
    <title>connexion-admin</title>
</head>
<body style="background: url(4.jpg);background-size: cover;position:center;">
    <div class="adm-main">
        <p><?= $err; ?></p><br>
      <form method="POST" class="admin" >
      <label for="id_emp">Id_emp :</label>
      <input type="number" name="id_emp" autocomplete="off"><br>
      <label for="mdp">Password :</label>
      <input type="password" name="mdp" autocomplete="off"><br>
      <input type="submit" name="Entrer" value="Entrer">
      </form>
    </div>
</body>
</html>