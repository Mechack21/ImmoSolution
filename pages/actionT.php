<?php

//require_once '../classesdao/PersonneDAO.php';
//require_once '../classes/Personne.php';
//$a = $_GET['a'];


require_once '../classesdao/TypeBienDAO.php';
require_once '../classes/TypeBien.php';
$a = $_GET['a'];
//$t = $_GET['t'];
//var_dump($_POST['nomT']); die();
if (isset($_POST['ajout'])) {
    if ($a == inse) {
        $typB = new TypeBienDAO();
        $typeBien = new TypeBien();
        $typeBien->setNom($_POST['nomT']);
        $test = $typB->ajouter($typeBien);
    } elseif ($a == modif) {
        $typB = new TypeBienDAO();
        $typeBien = new TypeBien();
        $typeBien->setId_type_bien($_POST['idT']);
        $typeBien->setNom($_POST['nomT']);
        $test = $typB->modifier($typeBien);
    } elseif ($a == sup) {
        $typB = new TypeBienDAO();
        $typeBien = new TypeBien();
        $typeBien->setId_type_bien($_POST['idT']);
        $test = $typB->supprimer($typeBien);
    }
    header('location:typeBien.php');
}
?>