<?php

class TypeBien {

    private $id_type_bien;
    private $nom;

    function getId_type_bien() {
        return $this->id_type_bien;
    }

    function getNom() {
        return $this->nom;
    }

    function setId_type_bien($id_type_bien) {
        $this->id_type_bien = $id_type_bien;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }



}
