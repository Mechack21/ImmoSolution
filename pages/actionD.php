<?php

//require_once '../classesdao/PersonneDAO.php';
//require_once '../classes/Personne.php';
//$a = $_GET['a'];


require_once '../classesdao/DistrictDAO.php';
require_once '../classes/District.php';
$a = $_GET['a'];
//$t = $_GET['t'];
//var_dump($_POST['nomT']); die();
if (isset($_POST['ajout'])) {
    if ($a == inse) {
        $dist = new DistrictDAO();
        $district = new District();
        $district->setNom($_POST['nomD']);
        $test = $dist->ajouter($district);
    } elseif ($a == modif) {
        $dist = new DistrictDAO();
        $district = new District();
        $district->setId_district($_POST['idD']);
        $district->setNom($_POST['nomD']);
        $test = $dist->modifier($district);
    } elseif ($a == sup) {
         $dist = new DistrictDAO();
        $district = new District();
        $district->setId_district($_POST['idD']);
        $test = $dist->supprimer($district);
    }
    header('location:district.php');
}
?>