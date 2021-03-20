<?php

class Photo {

    private $id_photo;
    private $chemin;
    private $id_biens;
    private $type_photo;

    function getId_photo() {
        return $this->id_photo;
    }

    function getChemin() {
        return $this->chemin;
    }

    function setId_photo($id_photo) {
        $this->id_photo = $id_photo;
    }

    function setChemin($chemin) {
        $this->chemin = $chemin;
    }

    function getId_biens() {
        return $this->id_biens;
    }

    function setId_biens($id_biens) {
        $this->id_biens = $id_biens;
    }
    function getType_photo() {
        return $this->type_photo;
    }

    function setType_photo($type_photo) {
        $this->type_photo = $type_photo;
    }

    
}
