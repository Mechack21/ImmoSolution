<?php
require_once '../classesdao/PhotoDAO.php';
require_once '../classesdao/BienDAO.php';
$phot = new PhotoDAO();
$photo = $phot->afficher();
$bien = new BienDAO();
$bn = $bien->afficher();
include('../includes/header.php');
include('../includes/navbar.php');
?>
<!-- Modal D'AJOUT -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter photo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="actionP.php?a=inse" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group ">
                        <label for="typephoto">Type Photo</label>
                        <input class="form-control" id="" name="typephoto" type="text" required="" />
                    </div>
                    <div class="form-group">
                        <label for="district">Bien :</label> 
                        <select name="bien" id="district" class="form-control"> 
                            <option value=""></option>
                            <?php foreach ($bn as $ligneB): ?>
                                <option value="<?php echo $ligneB->getId_biens() ?>"><?php echo $ligneB->getAdresse() ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div><br>
                    <div class="form-group">
                        <label for="photo">Photo :</label>
                        <input type="file" name="photo" >
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
<!--FIN MODAL AJOUT-->


<!-- Modal de Suppression -->
<div class="modal fade" id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Suppression district</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="actionP.php?a=sup" method="post">
                <div class="modal-body">
                    <input class="form-control" id="id" name="idP" type="hidden" />
                    <input class="form-control" id="pho" name="photo" type="hidden" />
                    <h4>Valider la suppression de la photo : <strong><span id="prt"></span></strong> ?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="ajout" class="btn btn-primary">Valider</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--FIN MODAL SUPPRESSION-->

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
            <h1 class="h3 mb-4 text-gray-800"> PHOTOS
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Ajouter
                </button>

            </h1>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Liste des photos</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Type photo</th>
                                    <th>Id Bien</th>
                                    <th>Photo</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($photo as $ligneP): ?>
                                    <tr>
                                        <td><?php echo $ligneP->getId_photo() ?></td>
                                        <td><?php echo $ligneP->getType_photo() ?></td>
                                        <td><?php echo $ligneP->getId_biens() ?></td>
                                        <td>
                                            <img src="../assets/imgBD/<?php echo $ligneP->getChemin() ?>" 
                                                 width="50px" height="50px" class="img-circle">
                                        </td>
                                        <td>
                                            <a href="editerPhoto.php?idP=<?php echo $ligneP->getId_photo()?>" class="btn btn-success editbtn">Edit</a>
                                            <button type="button" tof="<?php echo $ligneP->getChemin() ?>" class="btn btn-danger deletebtn" data-toggle="modal" data-target="#delete_modal">Delete</button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Type photo</th>
                                    <th>Bien</th>
                                    <th>Photo</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                        </table>
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
