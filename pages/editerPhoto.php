<?php
require_once '../classesdao/PhotoDAO.php';
require_once '../classesdao/BienDAO.php';
$photo = new PhotoDAO();
$idP = isset($_GET['idP']) ? $_GET['idP'] : 0;
$phts = $photo->afficherParId($idP);
$idBien = $phts->getId_biens();
$bien = new BienDAO();
$bns = $bien->afficher();

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
            <h1 class="h3 mb-4 text-gray-800">Editer une la Photo</h1>
            <div class="col-lg-6">

                <div class="card position-relative">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Infos de la la photo à editer</h6>
                    </div>
                    <div class="card-body">
                        <form action="actionP.php?a=modif" method="post" enctype="multipart/form-data">

                            <strong><label for="idC" id="idCL"></label><?php echo $phts->getId_photo() ?></strong>
                            <input class="form-control" id="idC" name="idP" type="hidden" required="" value="<?php echo $phts->getId_photo() ?>" />
                            <input class="form-control" id="" name="currentphoto" type="hidden" required="" value="<?php echo $phts->getChemin() ?>" />
                            <div class="form-group ">
                                <label for="nomC">Type Photo</label>
                                <input class="form-control" value="<?php echo $phts->getType_photo() ?>" id="" name="typephoto" type="text" required="" />
                            </div>
                            <div class="form-group">
                                <label for="district">District :</label> 
                                <select name="bien" id="" class="form-control"> 
                                    <option value=""></option>
                                    <?php foreach ($bns as $ligneB): ?>
                                        <option value="<?php echo $ligneB->getId_biens() ?>" <?php if ($ligneB->getId_biens() == $idBien) echo "selected"; ?>><?php echo $ligneB->getAdresse() ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div><br>
                            <div class="form-group">
                                <label for="photo">Photo :</label>
                                <input type="file" name="photo" >
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
