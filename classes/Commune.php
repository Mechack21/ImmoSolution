<?php

class Commune {

    private $id_commune;
    private $nom;
    private $id_district;

    function getId_district() {
        return $this->id_district;
    }

    function setId_district($id_district) {
        $this->id_district = $id_district;
    }

        
    function getId_commune() {
        return $this->id_commune;
    }

    function getNom() {
        return $this->nom;
    }

    function setId_commune($id_commune) {
        $this->id_commune = $id_commune;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }



}
