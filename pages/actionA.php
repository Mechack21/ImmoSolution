<?php

//require_once '../classesdao/PersonneDAO.php';
//require_once '../classes/Personne.php';
//$a = $_GET['a'];


require_once '../classesdao/AgenceDAO.php';
require_once '../classes/Agence.php';
$a = $_GET['a'];
//$t = $_GET['t'];
//var_dump($_POST['idCommune']); die();
if (isset($_POST['ajout'])) {
    if ($a == inse) {
        $agnce = new AgenceDAO();
        $agc = new Agence();
        $agc->setDenomination($_POST['nomA']);
        $agc->setAdresse($_POST['adrA']);
        $test = $agnce->ajouter($agc);
    } elseif ($a == modif) {
        $agnce = new AgenceDAO();
        $agc = new Agence();
        $agc->setId_agence($_POST['idA']);
        $agc->setDenomination($_POST['nomA']);
        $agc->setAdresse($_POST['adrA']);
        $test = $agnce->modifier($agc);
    } elseif ($a == sup) {
        $agnce = new AgenceDAO();
        $agc = new Agence();
        $agc->setId_agence($_POST['idA']);
        $test = $agnce->supprimer($agc);
    }
    header('location:agence.php');
}
?>