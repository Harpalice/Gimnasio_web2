<?php 

class LoginView{
    function showLogin(){
        require_once ("./templates/login.phtml");
    }

    // El controlador es el que define qué error mostrar
    function showError($msg) {
        echo " <h1> ERROR! </h1>";
        echo " <h2> $msg </h2>";
    }
}