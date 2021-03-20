<?php
require_once '../classesdao/CommuneDAO.php';
require_once '../classesdao/DistrictDAO.php';
$commune = new CommuneDAO();
$cmmne = $commune->afficher();
$district = new DistrictDAO();
$dstrct = $district->afficher();
include('../includes/header.php');
include('../includes/navbar.php');
?>
<!-- Modal D'AJOUT -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter commune</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="action.php?a=inse" method="post">
                <div class="modal-body">
                    <div class="form-group ">
                        <label for="nomC">NOM COMMUNE</label>
                        <input class="form-control" id="" name="nomC" type="text" required="" />
                    </div>
                    <div class="form-group">
                        <label for="district">District :</label> 
                        <select name="district" id="district" class="form-control"> 
                            <option value=""></option>
                            <?php foreach ($dstrct as $ligneD): ?>
                                <option value="<?php echo $ligneD->getId_district() ?>"><?php echo $ligneD->getNom() ?></option>
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
<!--FIN MODAL AJOUT-->

<!-- Modal de Suppression -->
<div class="modal fade" id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Suppression de la commune</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="action.php?a=sup" method="post">
                <div class="modal-body">
                    <input class="form-control" id="id" name="idC" type="hidden" />
                    <h4>Valider la suppression de la commune de : <strong><span id="prt"></span></strong> ?</h4>
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
            <h1 class="h3 mb-4 text-gray-800">COMMUNES
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Ajouter
                </button>

            </h1>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Liste des communes</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nom</th>
                                    <th>District</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($cmmne as $ligneC): ?>
                                    <tr>
                                        <td><?php echo $ligneC->getId_commune() ?></td>
                                        <td><?php echo $ligneC->getNom() ?></td>
                                        <td><?php echo $ligneC->getId_district() ?></td>
                                        <td>
                                            <a href="editerCommune.php?idC=<?php echo $ligneC->getId_commune()?>" class="btn btn-success editbtn">Edit</a>
                                            <button type="button" class="btn btn-danger deletebtn" data-toggle="modal" data-target="#delete_modal">Delete</button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Nom</th>
                                    <th>District</th>
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
