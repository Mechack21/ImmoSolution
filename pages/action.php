<?php

//require_once '../classesdao/PersonneDAO.php';
//require_once '../classes/Personne.php';
//$a = $_GET['a'];


require_once '../classesdao/CommuneDAO.php';
require_once '../classes/Commune.php';
$a = $_GET['a'];
//$t = $_GET['t'];
//var_dump($_POST['idCommune']); die();
if (isset($_POST['ajout'])) {
    if ($a == inse) {
        $cmne = new CommuneDAO();
        $commune = new Commune();
        $commune->setNom($_POST['nomC']);
        $commune->setId_district($_POST['district']);
        $test = $cmne->ajouter($commune);
    } elseif ($a == modif) {
        $cmne = new CommuneDAO();
        $commune = new Commune();
        $commune->setId_commune($_POST['idC']);
        $commune->setNom($_POST['nomC']);
        $commune->setId_district($_POST['district']);
        $cmne->modifier($commune);
    } elseif ($a == sup) {
        $cmne = new CommuneDAO();
        $commune = new Commune();
        $commune->setId_commune($_POST['idC']);
        $cmne->supprimer($commune);
    }
    header('location:commune.php');
}
?>