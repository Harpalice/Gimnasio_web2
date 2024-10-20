<?php

class AuthHelper{
    
    public static function init(){
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
    } 
    
    public static function login($user) {
        AuthHelper::init();
        $_SESSION['id_Admin'] = $user->id_Admin;
        $_SESSION['name'] = $user->name; 
    }

    public static function logout() {
        AuthHelper::init();
        session_destroy();
    }

    // Verificar si está seteado o no 
    public static function verify() {
        AuthHelper::init();
        // Verificación de la sesión
        if (!isset($_SESSION['name'])) {
            // Redirigir al login si no están seteadas las variables
            header('Location: ' . BASE_URL . 'login');
            die();
        }
    }

    public static function isAuthenticated(){
        AuthHelper::init();
        return isset($_SESSION['id_Admin']);
    }
}