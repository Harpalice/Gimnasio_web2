<?php 
require_once 'helpers/AuthHelper.php';

class FormView{
    function showForm(){
        AuthHelper::verify();  //Verificar que la sesión esté activa
        require_once ("./templates/form.phtml");
    }

    // El controlador es el que define qué error mostrar
    function showError($msg) {
        echo " <h1> ERROR! </h1>";
        echo " <h2> $msg </h2>";
    }
}