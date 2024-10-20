<?php

class ActivityView{

    function showHome($activities){
        require_once ("./templates/home.phtml");
    }
    function printActivities($activities) {
        require_once ("./templates/activityByTrainer.phtml");
    }
    function showAdmin($activities){
        require_once ("./templates/adminActivity.phtml");
    }
    function showEditar($id_Activity, $activity){
        require_once ("./templates/editForm.phtml");
    }
    // El controlador es el que define qué error mostrar
    function showError($msg) {
        echo " <h1> ERROR! </h1>";
        echo " <h2> $msg </h2>";
    }
}