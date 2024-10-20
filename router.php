<?php
require_once './app/controllers/activity.controller.php';
require_once './app/controllers/trainer.controller.php';
require_once './app/controllers/auth.Controller.php';
require_once './app/views/form.view.php';


define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

// Acción por defecto
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'home';
}


// Parsear la acción para separar acción real de parámetros
$params = explode('/', $action); // genera un arreglo

switch ($params[0]) {
    case 'home':
        $controller = new ActivityController();
        $controller->showActivities();
        break;
    // Listar actividades
    case 'listActivity':
        $controller = new ActivityController();
        if (!empty($params[1])) {
            $controller->showActivitiesByTrainer($params[1]); // Llama a la actividad con el ID
        } else {
            $controller->showActivities(); // Muestra todas las actividades
        }
        break;
    case 'tableActivity':
        $controller = new ActivityController();
        $controller->showActivitiesAdmin(); // Muestra todas las actividades
        break;
    // Listar entrenadores
    case 'listTrainers':
        $controller = new TrainerController;
        if (!empty($params[1])) {
            $id = $params[1]; 
            $controller->showTrainersById($id); // Llama al entrenador con el ID
        } else {
            $controller->showTrainers(); // Muestra todos los entrenadores
        }
        break;
    case 'tableTrainers':
        $controller = new TrainerController;
        $controller->showTrainersAdmin(); // Muestra todos los entrenadores
        break;
    case 'addActivity':
        $controller = new ActivityController();
        $controller->addActivity();
        break;
    case 'removeActivity':
        $controller = new ActivityController();
        $id = $params[1];
        $controller->removeActivity($id);
        break;
    case'editActivity':
        $controller = new ActivityController();
        $controller->showActivity($params[1]);
        break;
    case 'editadoActivity':
        $controller = new ActivityController();
        
        // Verificamos que el parámetro de ID exista
        if (isset($params[1]) && !empty($params[1])) {
            $controller->editActivity($params[1]);
        } else {
            echo "Error: No se proporcionó un ID de actividad.";
        }
        break;
    case 'addTrainer':
        $controller = new TrainerController();
        $controller->addTrainers();
        break;
    case 'removeTrainer':
        $controller = new TrainerController();
        $id = $params[1];
        $controller->removeTrainers($id);
        break;
    case'editTrainer':
        $controller = new TrainerController();
        $controller->showTrainer($params[1]);
        break;
    case 'editadoTrainer':
        $controller = new TrainerController();
        
        // Verificamos que el parámetro de ID exista
        if (isset($params[1]) && !empty($params[1])) {
            $controller->editTrainer($params[1]);
        } else {
            echo "Error: No se proporcionó un ID de actividad.";
        }
        break;
    case 'form':
        $controller = new FormView();
        $controller->showForm();  // Mostrar la vista form.phtml
        break;
    case 'login':
        $controller = new AuthController();
        $controller->showLogin();
        break;
    case 'auth':
        $controller = new AuthController();
        $controller->showAuth();
        break;
    case 'logout':
        $controller = new AuthController();
        $controller->showLogout();
        break;
    // Acción por defecto: Error 404
    default:
        echo "Error 404: Página no encontrada";
        break;      
}