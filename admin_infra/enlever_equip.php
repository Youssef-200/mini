<?php
include("connect_bd.php");
?>
<?php
if(isset($_GET['id_equip']) AND !empty($_GET['id_equip'])){
    $getid = $_GET['id_equip'];
    $recupuser = $bdd->prepare('SELECT * FROM equip WHERE id_equip = ?');
    $recupuser->execute(array($getid));
    if($recupuser->rowCount() > 0){

        $banniruser = $bdd->prepare('DELETE FROM equip WHERE id_equip = ?');
        $banniruser->execute(array($getid));

        header('Location: admin_infra_strctr.php');

    }else{
        echo "Acun membre n'a ete trouve";
    }

}


if(isset($_GET['id_equipb']) AND !empty($_GET['id_equipb'])){
    $getid = $_GET['id_equipb'];
    $recupuser = $bdd->prepare('SELECT * FROM equip_b WHERE id_equipb = ?');
    $recupuser->execute(array($getid));
    if($recupuser->rowCount() > 0){

        $banniruser = $bdd->prepare('DELETE FROM equip_b WHERE id_equipb = ?');
        $banniruser->execute(array($getid));

        header('Location: bungalos_infra.php');

    }else{
        echo "Acun membre n'a ete trouve";
    }

}
?>