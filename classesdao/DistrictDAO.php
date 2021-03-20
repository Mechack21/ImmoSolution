<?php

require_once '../classes/connexion.class.php';
require_once '../classes/District.php';

class DistrictDAO {

    public function ajouter($district) {

        $ps = Connexion::getPreparedStatement("INSERT INTO district(nom) values(?)");
        $ps->bindValue(1, $district->getNom());
        $test = $ps->execute();
        return $test;
    }

    public function modifier($district) {
        $ps = Connexion::getPreparedStatement("UPDATE district set nom=? WHERE id_district=?");
        $ps->bindValue(1, $district->getNom());
        $ps->bindValue(2, $district->getId_district());
        $ps->execute();
    }

    public function supprimer($district) {
        $ps = Connexion::getPreparedStatement("DELETE FROM district WHERE id_district=?");
        $ps->bindValue(1, $district->getId_district());
        $ps->execute();
    }

    public function afficher() {
        try {

            $ps = Connexion::getPreparedStatement("SELECT * FROM district");
            $ps->execute();

            while ($row = $ps->fetch(PDO::FETCH_ASSOC)) {
                $district = new District();
                $district->setId_district($row['id_district']);
                $district->setNom($row['nom']);
                $distrct[] = $district;
            }
        } catch (Exception $ex) {
            echo 'Erreur AFFICHAGE' . $ex->getMessage();
        }
        return $distrct;
    }

    public function afficherParId($id) {
        try {
            $ps = Connexion::getPreparedStatement("SELECT * FROM district WHERE id_district=?");
            $ps->bindValue(1, $id);
            $ps->execute();
            while ($row = $ps->fetch(PDO::FETCH_ASSOC)) {
                $district = new District();
                $district->setId_district($row['id_district']);
                $district->setNom($row['nom']);
            }
        } catch (Exception $ex) {
            echo 'Erreur AFFICHAGE' . $ex->getMessage();
        }

        return $district;
    }

}
