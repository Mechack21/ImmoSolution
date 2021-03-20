<?php

require_once '../classes/connexion.class.php';
require_once '../classes/Operation.php';

class OperationDAO {

    public function ajouter($operation) {

        $ps = Connexion::getPreparedStatement("INSERT INTO operation(date_op, type_op) values(?,?)");
//        $operation = new Operation();
        $ps->bindValue(1, $operation->getDate_op());
        $ps->bindValue(2, $operation->getType_op());
        $test = $ps->execute();
        return $test;
    }

    public function modifier($operation) {
        $ps = Connexion::getPreparedStatement("UPDATE operation set date_op=?, type_op=? WHERE id_operation=?");
        $ps->bindValue(1, $operation->getDate_op());
        $ps->bindValue(2, $operation->getType_op());
        $ps->bindValue(3, $operation->getId_operation());
        $ps->execute();
    }

    public function supprimer($operation) {
        $ps = Connexion::getPreparedStatement("DELETE FROM operation WHERE id_operation=?");
        $ps->bindValue(1, $operation->getId_operation());
        $ps->execute();
    }

    public function afficher() {
        try {

            $ps = Connexion::getPreparedStatement("SELECT * FROM operation");
            $ps->execute();

            while ($row = $ps->fetch(PDO::FETCH_ASSOC)) {
                $operation = new Operation();
                $operation->setId_operation($row['id_operation']);
                $operation->setDate_op($row['date_op']);
                $operation->setType_op($row['type_op']);
                $op[] = $operation;
            }
        } catch (Exception $ex) {
            echo 'Erreur AFFICHAGE' . $ex->getMessage();
        }
        return $op;
    }

    public function afficherParId($id) {
        try {
            $ps = Connexion::getPreparedStatement("SELECT * FROM operation WHERE id_operation=?");
            $ps->bindValue(1, $id);
            $ps->execute();
            while ($row = $ps->fetch(PDO::FETCH_ASSOC)) {
                $operation = new Operation();
                $operation->setId_operation($row['id_operation']);
                $operation->setDate_op($row['date_op']);
                $operation->setType_op($row['type_op']);
            }
        } catch (Exception $ex) {
            echo 'Erreur AFFICHAGE' . $ex->getMessage();
        }

        return $operation;
    }

}
