<?php

require_once '../classes/connexion.class.php';
require_once '../classes/TypeBien.php';

class TypeBienDAO {

    public function ajouter($typeBien) {

        $ps = Connexion::getPreparedStatement("INSERT INTO type_bien (nom)values(?)");
//        $typeBien = new TypeBien();
//        var_dump($typeBien->getNom()); die();
        $ps->bindValue(1, $typeBien->getNom());
        $ps->execute();
    }

    public function modifier($typeBien) {
        $ps = Connexion::getPreparedStatement("UPDATE type_bien set nom=? WHERE id_type_bien=?");
        $ps->bindValue(1, $typeBien->getNom());
        $ps->bindValue(2, $typeBien->getId_type_bien());
        $ps->execute();
    }

    public function supprimer($typeBien) {
        $ps = Connexion::getPreparedStatement("DELETE FROM type_bien WHERE id_type_bien=?");
        $ps->bindValue(1, $typeBien->getId_type_bien());
        $ps->execute();
    }

    public function afficher() {
        try {

            $ps = Connexion::getPreparedStatement("SELECT * FROM type_bien");
            $ps->execute();

            while ($row = $ps->fetch(PDO::FETCH_ASSOC)) {
                $typeBien = new TypeBien();
                $typeBien->setId_type_bien($row['id_type_bien']);
                $typeBien->setNom($row['nom']);
                $typeB[] = $typeBien;
            }
        } catch (Exception $ex) {
            echo 'Erreur AFFICHAGE' . $ex->getMessage();
        }
        return $typeB;
    }

    public function afficherParId($id) {
        try {
            $ps = Connexion::getPreparedStatement("SELECT * FROM type_bien WHERE id_type_bien=?");
            $ps->bindValue(1, $id);
            $ps->execute();
            while ($row = $ps->fetch(PDO::FETCH_ASSOC)) {
                $typeBien = new TypeBien();
                $typeBien->setId_type_bien($row['id_type_bien']);
                $typeBien->setNom($row['nom']);
            }
        } catch (Exception $ex) {
            echo 'Erreur AFFICHAGE' . $ex->getMessage();
        }

        return $typeBien;
    }

}
