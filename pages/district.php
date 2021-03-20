<?php
require_once '../classesdao/DistrictDAO.php';
$district = new DistrictDAO();
$dist = $district->afficher();
include('../includes/header.php');
include('../includes/navbar.php');
?>
<!-- Modal D'AJOUT -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter district</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="actionD.php?a=inse" method="post">
                <div class="modal-body">
                    <div class="form-group ">
                        <label for="nomC">NOM DISTRICT</label>
                        <input class="form-control" id="" name="nomD" type="text" required="" />
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

<!-- Modal D'EDITION -->
<div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modifier district</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="actionD.php?a=modif" method="post">
                <div class="modal-body">
                    <strong><label for="idC" id="idDL"></label></strong>
                    <input class="form-control" id="idD" name="idD" type="hidden" required="" />
                    <div class="form-group ">
                        <label for="nomC">NOM DISTRICT</label>
                        <input class="form-control" id="nomD" name="nomD" type="text" required="" />
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
<!--FIN MODAL EDITION-->

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
            <form action="actionD.php?a=sup" method="post">
                <div class="modal-body">
                    <input class="form-control" id="id" name="idD" type="hidden" />
                    <h4>Valider la suppression du district de : <strong><span id="prt"></span></strong> ?</h4>
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
            <h1 class="h3 mb-4 text-gray-800"> DISTRICTS
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Ajouter
                </button>

            </h1>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Liste des Districts</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nom District</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($dist as $ligneD): ?>
                                    <tr>
                                        <td><?php echo $ligneD->getId_district() ?></td>
                                        <td><?php echo $ligneD->getNom() ?></td>
                                        <td>
                                            <button type="button" class="btn btn-success editbtn" data-toggle="modal" data-target="#edit_modal">Edit</button>
                                            <button type="button" class="btn btn-danger deletebtn" data-toggle="modal" data-target="#delete_modal">Delete</button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Nom District</th>
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
