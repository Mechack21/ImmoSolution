<?php
require_once '../classesdao/BienDAO.php';
require_once '../classesdao/AgenceDAO.php';
require_once '../classesdao/TypeBienDAO.php';
require_once '../classesdao/CommuneDAO.php';
require_once '../classesdao/OperationDAO.php';
$bien= new BienDAO();
$idB = isset($_GET['idB']) ? $_GET['idB'] : 0;
$bns = $bien->afficherParId($idB);
$idAgence = $bns->getId_agence();
$idTypeBien = $bns->getId_type_bien();
//var_dump($idTypeBien);die();
$idCommune = $bns->getId_commune();
$idOperation = $bns->getId_operation();

$agence = new AgenceDAO();
$agnce = $agence->afficher();

$typBien = new TypeBienDAO();
$typb = $typBien->afficher();

$commune = new CommuneDAO();
$cmmne = $commune->afficher();

$operation = new OperationDAO();
$op = $operation->afficher();

//var_dump($cmmne->getId_district()); die();
//$idDst=$dstrct['id_district'];
include('../includes/header.php');
include('../includes/navbar.php');
?>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <?php include('../includes/topmenu.php'); ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Editer un bien</h1>
            <div class="row">
                <div class="col-lg-6">

                    <div class="card position-relative">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Edition du bien n°<strong><?php echo $bns->getId_biens() ?></strong></h6>
                        </div>
                        <div class="card-body">
                            <form action="actionB.php?a=modif" method="post">
                                <div class="modal-body">
                                     <input class="form-control" name="idB" type="hidden" required="" value="<?php echo $bns->getId_biens() ?>" />
                                    <div class="form-group ">
                                        <label for="detail">Detail</label>
                                        <input class="form-control" value="<?php echo $bns->getDetail() ?>" id="" name="detail" type="text" required="" />
                                    </div>
                                    <div class="form-group ">
                                        <label for="detail">Adresse</label>
                                        <input class="form-control" value="<?php echo $bns->getAdresse() ?>" id="" name="adresse" type="text" required="" />
                                    </div>
                                    <div class="form-group ">
                                        <label for="detail">Prix</label>
                                        <input class="form-control" value="<?php echo $bns->getPrix() ?>" id="" name="prix" type="text" required="" />
                                    </div>
                                    <div class="form-group">
                                        <label for="commune">Commune :</label> 
                                        <select name="commune" id="" class="form-control"> 
                                            <option value=""></option>
                                            <?php foreach ($cmmne as $ligneC): ?>
                                                <option value="<?php echo $ligneC->getId_commune() ?>"<?php if ($ligneC->getId_commune() == $idCommune) echo "selected"; ?>><?php echo $ligneC->getNom() ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card position-relative">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Infos bien suite</h6>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="typebien">Type Bien :</label> 
                                    <select name="typebien" id="" class="form-control"> 
                                        <option value=""></option>
                                        <?php foreach ($typb as $ligneT): ?>
                                            <option value="<?php echo $ligneT->getId_type_bien() ?>" <?php if ($ligneT->getId_type_bien() == $idTypeBien) echo "selected"; ?> ><?php echo $ligneT->getNom() ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="agence">Agence :</label> 
                                    <select name="agence" id="" class="form-control"> 
                                        <option value=""></option>
                                        <?php foreach ($agnce as $ligneA): ?>
                                            <option value="<?php echo $ligneA->getId_agence() ?>"<?php if ($ligneA->getId_agence() == $idAgence) echo "selected"; ?> ><?php echo $ligneA->getDenomination() ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="operation">Operation :</label> 
                                    <select name="operation" id="" class="form-control"> 
                                        <option value=""></option>
                                        <?php foreach ($op as $ligneO): ?>
                                            <option value="<?php echo $ligneO->getId_operation() ?>"<?php if ($ligneO->getId_operation() == $idOperation) echo "selected"; ?> ><?php echo $ligneO->getType_op() ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" name="ajout" class="btn btn-primary">Save</button>
                            </div>
                            </form>
                        </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <?php include('../includes/footer.php'); ?>

</div>
<!-- End of Page Wrapper -->
<?php
include('../includes/scripts.php');
?>
