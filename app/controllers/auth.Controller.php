<?php
require_once 'app/views/login.View.php';
require_once 'app/models/user.Model.php';


Class AuthController{
    private $view;
    private $model;

    function __construct(){
        $this->view = new LoginView();
        $this->model = new UserModel();
    }

    public function showLogin(){
        $this->view-> showLogin();
    }
    
    public function hash(){
        // Contraseña original
        $password = "admin";
        // Crear el hash usando bcrypt
        $hash = password_hash($password, PASSWORD_BCRYPT);
        // Imprimir el hash generado
        echo $hash;
    }

    public function showAuth(){
        $name = $_POST['name'];
        $password = $_POST['password'];
        
        //Verifica si se completaron todos los campos
        if(empty($name) || empty($password)){
            $this->view->showLogin();
        }

        //Busca al usuario
        $user = $this->model->getByName($name);
        if($user){
            $this->hash();
            //Verifica la contraseña del usuario utilizando password_verify
            if(password_verify($password, $user->password)){
                AuthHelper::login($user);
                header('Location: ' . BASE_URL . 'form');
                exit; //para detener el script despues de la redirección
            } else {
                // La contraseña no es válida
                $this->view->showLogin();
            }
        }
        else {
            // El usuario no existe
            $this->view->showLogin();
        }
    }

    public function showLogout(){
        AuthHelper::init();
        if (isset($_SESSION['id_Admin'])) {
            // El usuario está autenticado, procede con la desconexión
            AuthHelper::logout();
        }

        header('Location: ' . BASE_URL);
    }
}