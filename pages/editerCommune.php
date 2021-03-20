<?php
require_once '../classesdao/CommuneDAO.php';
require_once '../classesdao/DistrictDAO.php';
$commune = new CommuneDAO();
$idC = isset($_GET['idC']) ? $_GET['idC'] : 0;
$cmmne = $commune->afficherParId($idC);
$idDistrict = $cmmne->getId_district();
$district = new DistrictDAO();
$dstrct = $district->afficher();

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
            <h1 class="h3 mb-4 text-gray-800">Editer une Commune</h1>
            <div class="col-lg-6">

                <div class="card position-relative">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Infos de la commune à editer</h6>
                    </div>
                    <div class="card-body">
                        <form action="action.php?a=modif" method="post">

                            <strong><label for="idC" id="idCL"></label><?php echo $cmmne->getId_commune() ?></strong>
                            <input class="form-control" id="idC" name="idC" type="hidden" required="" value="<?php echo $cmmne->getId_commune() ?>" />
                            <div class="form-group ">
                                <label for="nomC">NOM COMMUNE</label>
                                <input class="form-control" value="<?php echo $cmmne->getNom() ?>" id="nomC" name="nomC" type="text" required="" />
                            </div>
                            <div class="form-group">
                                <label for="district">District :</label> 
                                <select name="district" id="district" class="form-control"> 
                                    <option value=""></option>
                                    <?php foreach ($dstrct as $ligneD): ?>
                                        <option value="<?php echo $ligneD->getId_district() ?>" <?php if ($ligneD->getId_district() == $idDistrict) echo "selected"; ?>><?php echo $ligneD->getNom() ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" >Annuler</button>
                                <button type="submit" name="ajout" class="btn btn-success">Editer</button>
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
