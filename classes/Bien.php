<?php

class Bien {

    private $id_biens;
    private $adresse;
    private $id_agence;
    private $id_type_bien;
    private $id_commune;
    private $prix;
    private $id_operation;
    private $detail;
    private $statut;
    
    function getId_biens() {
        return $this->id_biens;
    }

    function getAdresse() {
        return $this->adresse;
    }

    function getId_agence() {
        return $this->id_agence;
    }

    function getId_type_bien() {
        return $this->id_type_bien;
    }

    function getId_commune() {
        return $this->id_commune;
    }

    function getPrix() {
        return $this->prix;
    }

    function getId_operation() {
        return $this->id_operation;
    }

    function getDetail() {
        return $this->detail;
    }

    function getStatut() {
        return $this->statut;
    }

    function setId_biens($id_biens) {
        $this->id_biens = $id_biens;
    }

    function setAdresse($adresse) {
        $this->adresse = $adresse;
    }

    function setId_agence($id_agence) {
        $this->id_agence = $id_agence;
    }

    function setId_type_bien($id_type_bien) {
        $this->id_type_bien = $id_type_bien;
    }

    function setId_commune($id_commune) {
        $this->id_commune = $id_commune;
    }

    function setPrix($prix) {
        $this->prix = $prix;
    }

    function setId_operation($id_operation) {
        $this->id_operation = $id_operation;
    }

    function setDetail($detail) {
        $this->detail = $detail;
    }

    function setStatut($statut) {
        $this->statut = $statut;
    }



}
