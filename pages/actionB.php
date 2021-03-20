<?php

//require_once '../classesdao/PersonneDAO.php';
//require_once '../classes/Personne.php';
//$a = $_GET['a'];


require_once '../classesdao/BienDAO.php';
require_once '../classes/Bien.php';
$a = $_GET['a'];
//$t = $_GET['t'];
//var_dump($_POST['operation']); die();
if (isset($_POST['ajout'])) {
    if ($a == inse) {
        $bien = new BienDAO();
        $bns = new Bien();
        $bns->setDetail($_POST['detail']);
        $bns->setAdresse($_POST['adresse']);
        $bns->setPrix($_POST['prix']);
        $bns->setId_commune($_POST['commune']);
        $bns->setId_type_bien($_POST['typebien']);
        $bns->setId_agence($_POST['agence']);
        $bns->setId_operation($_POST['operation']);
        $bns->setStatut(0);
        $test = $bien->ajouter($bns);
    } elseif ($a == modif) {
        $bien = new BienDAO();
        $bns = new Bien();
        $bns->setId_biens($_POST['idB']);
        $bns->setDetail($_POST['detail']);
        $bns->setAdresse($_POST['adresse']);
        $bns->setPrix($_POST['prix']);
        $bns->setId_commune($_POST['commune']);
        $bns->setId_type_bien($_POST['typebien']);
        $bns->setId_agence($_POST['agence']);
        $bns->setId_operation($_POST['operation']);
        $bns->setStatut(0);
        $test = $bien->modifier($bns);
    } elseif ($a == sup) {
        $bien = new BienDAO();
        $bns = new Bien();
        $bns->setId_biens($_POST['idB']);
        $test = $bien->supprimer($bns);
    }
    header('location:bien.php');
}
?>