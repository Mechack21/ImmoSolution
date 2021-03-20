<?php

require_once '../classes/connexion.class.php';
require_once '../classes/Photo.php';

class PhotoDAO {

    public function ajouter($photo) {

        $ps = Connexion::getPreparedStatement("INSERT INTO photos(chemin, id_biens, type_photo) values(?,?,?)");
//        $photo = new Photo();
        $ps->bindValue(1, $photo->getChemin());
        $ps->bindValue(2, $photo->getId_biens());
        $ps->bindValue(3, $photo->getType_photo());
        $ps->execute();
    }

    public function modifier($photo) {
        $ps = Connexion::getPreparedStatement("UPDATE photos set chemin=?, id_biens=?, type_photo=? WHERE id_photo=?");
        $ps->bindValue(1, $photo->getChemin());
        $ps->bindValue(2, $photo->getId_biens());
        $ps->bindValue(3, $photo->getType_photo());
        $ps->bindValue(4, $photo->getId_photo());
        $ps->execute();
    }
    
      public function modifierSansPhoto($photo) {
        $ps = Connexion::getPreparedStatement("UPDATE photos set id_biens=?, type_photo=? WHERE id_photo=?");
        $ps->bindValue(1, $photo->getId_biens());
        $ps->bindValue(2, $photo->getType_photo());
        $ps->bindValue(3, $photo->getId_photo());
        $ps->execute();
    }

    public function supprimer($photo) {
        $ps = Connexion::getPreparedStatement("DELETE FROM photos WHERE id_photo=?");
        $ps->bindValue(1, $photo->getId_photo());
        $ps->execute();
    }

    public function afficher() {
        try {

            $ps = Connexion::getPreparedStatement("SELECT * FROM photos");
            $ps->execute();

            while ($row = $ps->fetch(PDO::FETCH_ASSOC)) {
                $photo = new Photo();
                $photo->setId_photo($row['id_photo']);
                $photo->setChemin($row['chemin']);
                $photo->setId_biens($row['id_biens']);
                $photo->setType_photo($row['type_photo']);
                $phto[] = $photo;
            }
        } catch (Exception $ex) {
            echo 'Erreur AFFICHAGE' . $ex->getMessage();
        }
        return $phto;
    }

    public function afficherParId($id) {
        try {
            $ps = Connexion::getPreparedStatement("SELECT * FROM photos WHERE id_photo=?");
            $ps->bindValue(1, $id);
            $ps->execute();
            while ($row = $ps->fetch(PDO::FETCH_ASSOC)) {
                $photo = new Photo();
                $photo->setId_photo($row['id_photo']);
                $photo->setChemin($row['chemin']);
                $photo->setId_biens($row['id_biens']);
                $photo->setType_photo($row['type_photo']);
            }
        } catch (Exception $ex) {
            echo 'Erreur AFFICHAGE' . $ex->getMessage();
        }

        return $photo;
    }

}
