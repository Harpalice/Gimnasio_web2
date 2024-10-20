<?php

class ActivityModel{
    private $db;
    // Abre la conexión a la base de datos
    private function getConection(){
        $db = new PDO('mysql:host=localhost;dbname=gimnasio_tandil;charset=utf8', 'root', '');
        return $db;
    }

    // Obtiene y devuleve de mi base de datos todas las actividades.
    function getActivities(){
        // 1. Abrimos  una conexión con la base de datos
        $db = $this->getConection();

        // 2. Enviamos la consulta y obtenemos el resultado 
        $query = $db->prepare("SELECT * FROM actividades");
        $query->execute(); // Va sin parametros xq yo a la consulta anterior, no le estoy pasando ningún parámetro

        // obtengo todos los datos que arroja la query
        // $activities es un arreglo de actividades
        $activities = $query->fetchAll(PDO::FETCH_OBJ);

        // 3. Mostrar los datos obtenidos para generar el HTML
        return $activities;
        // 4. Cerramos la conexión
                // En PDO no es necesario cerrar la conexión
    }
    function getActivitiesByTrainer($id_Trainer){
        // 1. Abrimos  una conexión con la base de datos
        $db = $this->getConection();

        // 2. Enviar la consulta (2 sub-pasos) prepare y execute
        $query = $db->prepare('SELECT * FROM actividades WHERE id_Trainer = ?');
        $query->execute([$id_Trainer]);

        // 4. Obtenemos el resultado (fetch si es solo un resultado)
        $activities = $query->fetchAll(PDO::FETCH_OBJ);
        return $activities;
    }
    
    function getActivityById($id_Activity) {
                // 1. Abrimos  una conexión con la base de datos
                $db = $this->getConection();

                // 2. Enviamos la consulta y obtenemos el resultado 
                $query = $db->prepare("SELECT * FROM actividades WHERE id_Activity= ?");
                $query->execute([$id_Activity]); // Va sin parametros xq yo a la consulta anterior, no le estoy pasando ningún parámetro
        
                // obtengo todos los datos que arroja la query
                // $activities es un arreglo de actividades
                $activity = $query->fetch(PDO::FETCH_OBJ);
        
                // 3. Mostrar los datos obtenidos para generar el HTML
                return $activity;
                // 4. Cerramos la conexión
                        // En PDO no es necesario cerrar la conexión
    }
    public function trainerExists($id_Trainer) {
        $db = $this->getConection();
        $query = $db->prepare('SELECT COUNT(*) FROM entrenadores WHERE id_Trainer = ?');
        $query->execute([$id_Trainer]);
        return $query->fetchColumn() > 0; // Devuelve true si existe, false si no
    }
    // Inserta la actividad en la base de datos
    function insertActivity($nameActivity, $duration, $capacityMax, $id_Trainer){
        // 1. Abro la base de datos
        $db = $this->getConection();

        // 2. Enviar la consulta (2 sub-pasos) prepare y execute
        $query = $db->prepare('INSERT INTO actividades (name_activity, duration, capacity_max, id_Trainer) VALUES(?,?,?,?)');
        $query->execute([$nameActivity, $duration, $capacityMax, $id_Trainer]);

        // 3. Obtengo y devuelvo el último id que se insertó
        return $db->lastInsertId();
    }

    //Elimina Todas las Actividades que tiene un entrenador
    public function deleteActivitiesByTrainer($id_Trainer) {
        $db = $this->getConection();

        $query = $db->prepare("DELETE FROM actividades WHERE id_Trainer = ?");
        $query->execute([$id_Trainer]);
    }

    function deleteActivity($id_Activity) {
        $db = $this->getConection();

        $query = $db->prepare('DELETE FROM actividades WHERE id_Activity = ?');
        $query->execute([$id_Activity]);
    }

     // Actualiza la información de una actividad existente basado en su ID.
     public function editActivity($nameActivity, $duration, $capacityMax, $id_Trainer, $id_Activity){
        $db = $this->getConection();
        
        // Aquí corregimos el orden de los parámetros en la consulta
        $query = $db->prepare('UPDATE actividades SET name_activity=?, duration=?, capacity_max=?, id_Trainer=? WHERE id_Activity=?');
        $query->execute([$nameActivity, $duration, $capacityMax, $id_Trainer, $id_Activity]); // El id_Activity debe ser el último
    }
}
