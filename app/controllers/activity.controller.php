<?php
require_once 'app/models/activity.model.php';
require_once './app/views/activity.View.php';
require_once './app/views/error404.View.php';

class ActivityController{
    // ATRIBUTOS DE CLASE
    private $activityModel;
    private $ActivityView;
    private $ErrorView;
    
    function __construct(){
        $this->activityModel= new ActivityModel();
        $this->ActivityView = new ActivityView();
        $this->ErrorView = new E404View();
    }

    public function showActivities(){
        $activities = $this->activityModel->getActivities();
        $this->ActivityView->showHome($activities);
    }
    public function showActivitiesByTrainer($id_Trainer){
        // LLamo al modelo para obtener las actividades por el ID del entrenador
        $activities = $this->activityModel->getActivitiesByTrainer($id_Trainer);

        // Actualizo la vista
        $this->ActivityView->printActivities($activities);
    }
    public function showActivitiesAdmin(){
        $activities = $this->activityModel->getActivities();
        $this->ActivityView->showAdmin($activities);
    }

    public function addActivity(){
        //FALTA: validación de datos
        AuthHelper::init();
        //obtengo los datos del usuario
        $nameActivity = $_POST['name_activity'] ? $_POST['name_activity'] : null;
        $duration = $_POST['duration'];
        $capacityMax = $_POST['capacity_max'];
        $id_Trainer = $_POST['id_Trainer'];
        
        // Verifico campos obligatorios
        if(empty($nameActivity) || empty($duration) || empty($capacityMax) || empty($id_Trainer) ) {
            $this->ActivityView->showError('Faltan datos obligatorios');
            die();
        }
        if ($this->activityModel->trainerExists($id_Trainer)) {
            // El id_Trainer existe, procede con la inserción
            $this->activityModel->insertActivity($nameActivity, $duration, $capacityMax, $id_Trainer);
            // redirijo al usuario a la pantalla principal
            header('Location: ' . BASE_URL. 'form');
        } else {
            // Manejo del error: el id_Trainer no existe
            $this->ErrorView->show404();
        }

    }

    // Verificar si el ID existe 
    public function removeActivity($id){
        //Verifico Login
        AuthHelper::init();
        $this->activityModel->deleteActivity($id);
        //Una vez que la elimino, vuelvo a redirigir al route --> Lo que hace es eliminarla y automaticamente no verla más en la lista
        header('Location: '.BASE_URL. 'tableActivity');
    }
    public function showActivity($id_Activity){
        // Verifica si el usuario está autenticado
        AuthHelper::verify();

        // Obtengo los datos de la actividad a editar
        $activity = $this->activityModel->getActivityById($id_Activity);
        $this->ActivityView->showEditar($id_Activity, $activity);
    }
    public function editActivity($id_Activity){
        // verifico logueado
        AuthHelper::verify();
    
        // obtengo los datos del formulario
        $nameActivity = $_POST['name_activity'];
        $duration = $_POST['duration'];
        $capacityMax = $_POST['capacity_max'];
        $id_Trainer = $_POST['id_Trainer'];

        // Validaciones
        if (empty($nameActivity) || empty($duration) || empty($capacityMax) || empty($id_Trainer)) {
            echo "Error: Campos vacíos o incompletos.";
            return;
        }
    
        // Llamar al modelo para actualizar la actividad
        $this->activityModel->editActivity($nameActivity, $duration, $capacityMax, $id_Trainer, $id_Activity);
    
        // Redirigir a la tabla de actividades
        header('Location: ' . BASE_URL . 'tableActivity');
        exit();
    }
}