<?php

require_once '../classes/connexion.class.php';
require_once '../classes/Agence.php';

class AgenceDAO {

    public function ajouter($agence) {

        $ps = Connexion::getPreparedStatement("INSERT INTO agence(denomination,adresse) values(?,?)");
//        $agence = new Agence();
        $ps->bindValue(1, $agence->getDenomination());
        $ps->bindValue(2, $agence->getAdresse());
        $ps->execute();
    }

    public function modifier($agence) {
        $ps = Connexion::getPreparedStatement("UPDATE agence set denomination=?, adresse=? WHERE id_agence=?");
        $ps->bindValue(1, $agence->getDenomination());
        $ps->bindValue(2, $agence->getAdresse());
        $ps->bindValue(3, $agence->getId_agence());
        $ps->execute();
    }

    public function supprimer($agence) {
        $ps = Connexion::getPreparedStatement("DELETE FROM agence WHERE id_agence=?");
        $ps->bindValue(1, $agence->getId_agence());
        $ps->execute();
    }

    public function afficher() {
        try {

            $ps = Connexion::getPreparedStatement("SELECT * FROM agence");
            $ps->execute();

            while ($row = $ps->fetch(PDO::FETCH_ASSOC)) {
                $agence = new Agence();
                $agence->setId_agence($row['id_agence']);
                $agence->setDenomination($row['denomination']);
                $agence->setAdresse($row['adresse']);
                $agnce[] = $agence;
            }
        } catch (Exception $ex) {
            echo 'Erreur AFFICHAGE' . $ex->getMessage();
        }
        return $agnce;
    }

    public function afficherParId($id) {
        try {
            $ps = Connexion::getPreparedStatement("SELECT * FROM agence WHERE id_agence=?");
            $ps->bindValue(1, $id);
            $ps->execute();
            while ($row = $ps->fetch(PDO::FETCH_ASSOC)) {
                $agence = new Agence();
                $agence->setId_agence($row['id_agence']);
                $agence->setDenomination($row['denomination']);
                $agence->setAdresse($row['adresse']);
            }
        } catch (Exception $ex) {
            echo 'Erreur AFFICHAGE' . $ex->getMessage();
        }

        return $agence;
    }

}
