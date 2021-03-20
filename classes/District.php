<?php

class District {
    
    private $id_district;
    private $nom;
    
    function getId_district() {
        return $this->id_district;
    }

    function getNom() {
        return $this->nom;
    }

    function setId_district($id_district) {
        $this->id_district = $id_district;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }


}
