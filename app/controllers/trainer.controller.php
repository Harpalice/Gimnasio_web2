<?php 
require_once 'app/models/trainer.model.php';
require_once 'app/models/user.Model.php';
require_once 'app/views/trainers.View.php';


Class TrainerController{
    // ATRIBUTOS DE CLASE
    private $trainersModel;
    private $trainersView;
    private $activityModel;

    function __construct(){
        $this->trainersModel= new TrainerModel();
        $this->trainersView= new TrainerView();
        $this->activityModel= new ActivityModel();
    }

    public function showTrainers(){
        $trainers = $this->trainersModel->getTrainers();
        $this->trainersView->showTrainers($trainers);
    }
    public function showTrainersById($id_Trainer){
        // LLamo al modelo para obtener la actividad por el ID
        $trainer = $this->trainersModel->getTrainerById($id_Trainer);

        // Actualizo la vista
        $this->trainersView->showTrainerById($trainer);
    }

    public function showTrainersAdmin(){
        $trainers = $this->trainersModel->getTrainers();
        $this->trainersView->showTrainersAdmin($trainers);
    }

    public function addTrainers(){
        //FALTA: validación de datos
        AuthHelper::init();
        //obtengo los datos del usuario
        $name = $_POST['name'];
        $lastname = $_POST['lastname'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $contracting= $_POST['contracting'];
        
        // Verifico campos obligatorios
        if(empty($name) || empty($lastname) || empty($phone) || empty($email) || empty($contracting)) {
            $this->trainersView->showError('Faltan datos obligatorios');
            die();
        }

        // Inserto la actividad en la DB
        $id = $this->trainersModel->insertTrainer($name, $lastname, $phone, $email, $contracting);

        // redirijo al usuario a la pantalla principal
        header('Location: ' . BASE_URL. 'form');

    }
    public function removeTrainers($id){
        //Verifico Login
        AuthHelper::init();

        // Eliminar las actividades asociadas al entrenador
        $this->activityModel->deleteActivitiesByTrainer($id);

        // Elimina a un entrenador
        $this->trainersModel->deleteTrainer($id);
        // Una vez que la elimino, vuelvo a redirigir al route --> Lo que hace es eliminarla y automaticamente no verla más en la lista
        header('Location: '.BASE_URL. 'tableTrainers');
    }

    public function showTrainer($id_Trainer){
        // Verifica si el usuario está autenticado
        AuthHelper::verify();

        // Obtengo los datos de la actividad a editar
        $Trainer = $this->trainersModel->getActivityById($id_Trainer);
        $this->trainersView->showEditar($id_Trainer, $Trainer);
    }

    public function editTrainer($id_Trainer){
        // verifico logueado
        AuthHelper::verify();
    
        // obtengo los datos del formulario
        $name = $_POST['name'];
        $lastname = $_POST['lastname'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $contracting = $_POST['contracting'];
        
        // Validaciones
        if (empty($name) || empty($lastname) || empty($phone) || empty($email) || empty($contracting)) {
            echo "Error: Campos vacíos o incompletos.";
            return;
        }
        // Llamar al modelo para actualizar la actividad
        $this->trainersModel->editTrainer($name, $lastname, $phone, $email, $contracting, $id_Trainer);
        // Redirigir a la tabla de actividades
        header('Location: ' . BASE_URL . 'tableTrainers');
        exit();
    }
}   