<?php

class Operation {
    
    private $id_operation;
    private $date_op;
    private $type_op;
    
    function getId_operation() {
        return $this->id_operation;
    }

    function getDate_op() {
        return $this->date_op;
    }

    function getType_op() {
        return $this->type_op;
    }

    function setId_operation($id_operation) {
        $this->id_operation = $id_operation;
    }

    function setDate_op($date_op) {
        $this->date_op = $date_op;
    }

    function setType_op($type_op) {
        $this->type_op = $type_op;
    }


 


}
