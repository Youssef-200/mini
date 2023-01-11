<?php
$bdd=new PDO('mysql:host=localhost:5000;dbname=m;charset=utf8;','root','');
$z=$bdd->prepare('SELECT * FROM emp');
$z->execute();
$z = $z->fetchAll();
if(isset($_POST['Entrer'])){
    if(!empty($_POST['id_emp']) AND !empty($_POST['mdp'])){
       $v=0;
       for($i=0;$i<count($z);$i++){
        
        $pseudo_saisie=htmlspecialchars($_POST['id_emp']);
        $mdp_saisie=sha1(htmlspecialchars($_POST['mdp']));
        $z[$i]['pass'] = sha1($z[$i]['pass']);
        if($pseudo_saisie ==$z[$i]['id_emp'] AND $mdp_saisie==$z[$i]['pass']){
            $_SESSION['mdp']=$mdp_saisie;
            $v=1;
            switch($z[$i]['post']){
                    case 'admin_infra':
                        include("para_infra.php");
                        $j = 1;
                        break;
                    case 'dericteur':
                        include("para_infra.php");
                        $j = 2;
                        break;
                    case 'admin_actvt_srvs':
                        include("para_infra.php");
                        $j = 3;
                        break;
                    case 'secritaire':
                        include("para_infra.php");
                            $j = 4;
                            break;
                    case 'admin_ventes':
                            include("para_ventes.php");
                            $j = 5;
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