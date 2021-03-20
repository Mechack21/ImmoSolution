<?php

class Agence {

    private $id_agence; 	 
    private $denomination;
    private $adresse;
    function getId_agence() {
        return $this->id_agence;
    }

    function getDenomination() {
        return $this->denomination;
    }

    function getAdresse() {
        return $this->adresse;
    }

    function setId_agence($id_agence) {
        $this->id_agence = $id_agence;
    }

    function setDenomination($denomination) {
        $this->denomination = $denomination;
    }

    function setAdresse($adresse) {
        $this->adresse = $adresse;
    }



}
