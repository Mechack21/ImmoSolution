<?php
require_once '../classesdao/BienDAO.php';
$bien = new BienDAO();
$bns = $bien->afficher();

include('../includes/header.php');
include('../includes/navbar.php');
?>
<!-- Modal de Suppression -->
<div class="modal fade" id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Suppression d'un bien</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="actionB.php?a=sup" method="post">
                <div class="modal-body">
                    <input class="form-control" id="id" name="idB" type="hidden" />
                    <h4>Valider la suppression cet(te): <strong><span id="prt"></span></strong> ?</h4>
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
            <h1 class="h3 mb-4 text-gray-800">BIENS
                <!-- Button trigger modal -->
                 <a href="ajoutBien.php" class="btn btn-primary">Ajouter</a>
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
                                    <th>Type Bien</th>
                                    <th>Detail</th>
                                    <th>Adresse</th>
                                    <th>Commune</th>
                                    <th>Prix</th>
                                    <th>Agence</th>
                                    <th>Operation</th>
                                    <th>Statut</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($bns as $ligneB): ?>
                                    <tr>
                                        <td><?php echo $ligneB->getId_biens() ?></td>
                                        <td><?php echo $ligneB->getId_type_bien() ?></td>
                                        <td><?php echo $ligneB->getDetail() ?></td>
                                        <td><?php echo $ligneB->getAdresse() ?></td>
                                        <td><?php echo $ligneB->getId_commune() ?></td>
                                        <td><?php echo $ligneB->getPrix() ?></td>
                                        <td><?php echo $ligneB->getId_agence() ?></td>
                                        <td><?php echo $ligneB->getId_operation() ?></td>
                                        <td><?php echo $ligneB->getStatut() ?></td>
                                        <td>
                                            <a href="editerBien.php?idB=<?php echo $ligneB->getId_biens() ?>" class="btn btn-success editbtn">Edit</a>
                                            <button type="button" class="btn btn-danger deletebtn" data-toggle="modal" data-target="#delete_modal">Delete</button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Type Bien</th>
                                    <th>Detail</th>
                                    <th>Adresse</th>
                                    <th>Commune</th>
                                    <th>Prix</th>
                                    <th>Agence</th>
                                    <th>Operation</th>
                                    <th>Statut</th>
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
