<?php

require_once '../classes/connexion.class.php';
require_once '../classes/Bien.php';

class BienDAO {

    public function ajouter($bien) {

        $ps = Connexion::getPreparedStatement("INSERT INTO biens(adresse, id_agence, id_type_bien, id_commune, prix, id_operation, detail, statut)values(?,?,?,?,?,?,?,?)");
//         $bien = new Bien();
        $ps->bindValue(1, $bien->getAdresse());
        $ps->bindValue(2, $bien->getId_agence());
        $ps->bindValue(3, $bien->getId_type_bien());
        $ps->bindValue(4, $bien->getId_commune());
        $ps->bindValue(5, $bien->getPrix());
        $ps->bindValue(6, $bien->getId_operation());
        $ps->bindValue(7, $bien->getDetail());
        $ps->bindValue(8, $bien->getStatut());
        $ps->execute();
    }

    public function modifier($bien) {
        $ps = Connexion::getPreparedStatement("UPDATE biens set adresse=?, id_agence=?, id_type_bien=?, id_commune=?, prix=?, id_operation=?, detail=?, statut=? WHERE id_biens=?");
        $ps->bindValue(1, $bien->getAdresse());
        $ps->bindValue(2, $bien->getId_agence());
        $ps->bindValue(3, $bien->getId_type_bien());
        $ps->bindValue(4, $bien->getId_commune());
        $ps->bindValue(5, $bien->getPrix());
        $ps->bindValue(6, $bien->getId_operation());
        $ps->bindValue(7, $bien->getDetail());
        $ps->bindValue(8, $bien->getStatut());
        $ps->bindValue(9, $bien->getId_biens());
        $ps->execute();
    }

    public function supprimer($bien) {
        $ps = Connexion::getPreparedStatement("DELETE FROM biens WHERE id_biens=?");
        $ps->bindValue(1, $bien->getId_biens());
        $ps->execute();
    }

    public function afficher() {
        try {

            $ps = Connexion::getPreparedStatement("SELECT biens.id_biens, biens.adresse, biens.prix, biens.detail, biens.statut, agence.denomination as agence, type_bien.nom as typeBien, commune.nom as commune, operation.type_op"
                            . " FROM biens, agence, type_bien, commune, operation "
                            . "WHERE (biens.id_agence = agence.id_agence AND biens.id_type_bien = type_bien.id_type_bien AND biens.id_commune = commune.id_commune AND biens.id_operation = operation.id_operation)");
            $ps->execute();

            while ($row = $ps->fetch(PDO::FETCH_ASSOC)) {
                $bien = new Bien();
                $bien->setId_biens($row['id_biens']);
                $bien->setId_type_bien($row['typeBien']);
                $bien->setDetail($row['detail']);
                $bien->setAdresse($row['adresse']);
                $bien->setId_commune($row['commune']);
                $bien->setPrix($row['prix']);
                $bien->setId_agence($row['agence']);
                $bien->setId_operation($row['type_op']);
                $bien->setStatut($row['statut']);

                $bns[] = $bien;
            }
        } catch (Exception $ex) {
            echo 'Erreur AFFICHAGE' . $ex->getMessage();
        }
        return $bns;
    }

    public function afficherParId($id) {
        try {
            $ps = Connexion::getPreparedStatement("SELECT * FROM biens WHERE id_biens=?");
            $ps->bindValue(1, $id);
            $ps->execute();
            while ($row = $ps->fetch(PDO::FETCH_ASSOC)) {
                $bien = new Bien();
                $bien->setId_biens($row['id_biens']);
                $bien->setAdresse($row['adresse']);
                $bien->setId_agence($row['id_agence']);
                $bien->setId_type_bien($row['id_type_bien']);
                $bien->setId_commune($row['id_commune']);
                $bien->setPrix($row['prix']);
                $bien->setId_operation($row['id_operation']);
                $bien->setDetail($row['detail']);
                $bien->setStatut($row['statut']);
            }
        } catch (Exception $ex) {
            echo 'Erreur AFFICHAGE' . $ex->getMessage();
        }

        return $bien;
    }

}
