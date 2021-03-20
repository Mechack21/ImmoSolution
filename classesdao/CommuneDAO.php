<?php

require_once '../classes/connexion.class.php';
require_once '../classes/Commune.php';

class CommuneDAO {

    public function ajouter($commune) {

        $ps = Connexion::getPreparedStatement("INSERT INTO commune(nom,id_district) values(?,?)");
        $ps->bindValue(1, $commune->getNom());
        $ps->bindValue(2, $commune->getId_district());
        $test = $ps->execute();
        return $test;
    }

    public function modifier($commune) {
        $ps = Connexion::getPreparedStatement("UPDATE commune set nom=?, id_district=? WHERE id_commune=?");
        $ps->bindValue(1, $commune->getNom());
        $ps->bindValue(2, $commune->getId_district());
        $ps->bindValue(3, $commune->getId_commune());
        $ps->execute();
    }

    public function supprimer($commune) {
        $ps = Connexion::getPreparedStatement("DELETE FROM commune WHERE id_commune=?");
        $ps->bindValue(1, $commune->getId_commune());
        $ps->execute();
    }

    public function afficher() {
        try {

            $ps = Connexion::getPreparedStatement("SELECT commune.id_commune, commune.nom, district.nom as distrct FROM commune, district where commune.id_district=district.id_district
");
            $ps->execute();

            while ($row = $ps->fetch(PDO::FETCH_ASSOC)) {
                $commune = new Commune();
                $commune->setId_commune($row['id_commune']);
                $commune->setNom($row['nom']);
                $commune->setId_district($row['distrct']);
                $cmmne[] = $commune;
            }
        } catch (Exception $ex) {
            echo 'Erreur AFFICHAGE' . $ex->getMessage();
        }
        return $cmmne;
    }

    public function afficherParId($id) {
        try {
            $ps = Connexion::getPreparedStatement("SELECT * FROM commune WHERE id_commune=?");
            $ps->bindValue(1, $id);
            $ps->execute();
            while ($row = $ps->fetch(PDO::FETCH_ASSOC)) {
                $commune = new Commune();
                $commune->setId_commune($row['id_commune']);
                $commune->setNom($row['nom']);
                $commune->setId_district($row['id_district']);
            }
        } catch (Exception $ex) {
            echo 'Erreur AFFICHAGE' . $ex->getMessage();
        }

        return $commune;
    }

}
