<?php

class TrainerView{
    function showTrainers($trainers){
        require_once ("./templates/trainers.phtml");
    }

    function showTrainersAdmin($trainers){
        require_once ("./templates/adminTrainers.phtml");
    }
    
    function showTrainerById($trainer){
        require_once("./templates/trainerById.phtml");
    }

    function showEditar($id_Trainer, $trainer){
        require_once ("./templates/editFormTrainer.phtml");
    }
    // El controlador es el que define qué error mostrar
    function showError($msg) {
        echo " <h1> ERROR! </h1>";
        echo " <h2> $msg </h2>";
    }
}