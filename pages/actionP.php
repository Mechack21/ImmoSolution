<?php

//require_once '../classesdao/PersonneDAO.php';
//require_once '../classes/Personne.php';
//$a = $_GET['a'];


require_once '../classesdao/PhotoDAO.php';
require_once '../classes/Photo.php';
$a = $_GET['a'];
//$t = $_GET['t'];
//var_dump($_POST['idCommune']); die();
if (isset($_POST['ajout'])) {
    if ($a == inse) {
        $phto = new PhotoDAO();
        $pht = new Photo();
        $pht->setType_photo($_POST['typephoto']);
        $pht->setId_biens($_POST['bien']);
        $pht->setChemin($_FILES['photo']['name']);
        $imageTemp = $_FILES['photo']['tmp_name'];
        move_uploaded_file($imageTemp, "../assets/imgBD/" . $pht->getChemin());
        $test = $phto->ajouter($pht);
    } elseif ($a == modif) {
        $phto = new PhotoDAO();
        $pht = new Photo();
        $pht->setId_photo($_POST['idP']);
        $pht->setType_photo($_POST['typephoto']);
        $pht->setId_biens($_POST['bien']);
        $pht->setChemin($_FILES['photo']['name']);
        $imageTemp = $_FILES['photo']['tmp_name'];
        $currentphoto = $_POST['currentphoto'];
        move_uploaded_file($imageTemp, "../assets/imgBD/" . $pht->getChemin());
        if (!$pht->getChemin() == "") {
            $imagePath = "../assets/imgBD/" . $currentphoto;
            unlink($imagePath);
            $test = $phto->modifier($pht);
        } else {
            $test = $phto->modifierSansPhoto($pht);
        }
    } elseif ($a == sup) {
        $phto = new PhotoDAO();
        $pht = new Photo();
        $pht->setId_photo($_POST['idP']);
        $photoCourant = $_POST['photo'];
        $imagePath = "../assets/imgBD/" . $photoCourant;
        unlink($imagePath);
        $test = $phto->supprimer($pht);
    }
    header('location:photo.php');
}
?>