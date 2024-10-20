<?php 
    class TrainerModel{
        private $db;
        
        public function __construct() {
            $this->db = $this->getConection();
        }
        // Abre la conexión a la base de datos
        private function getConection(){
            $db = new PDO('mysql:host=localhost;dbname=gimnasio_tandil;charset=utf8', 'root', '');
            return $db;
        }

        // Obtiene y devuleve de mi base de datos todas los entrenadores.
        function getTrainers(){
            // 1. Abrimos  una conexión con la base de datos
            $db = $this->getConection();

            // 2. Enviamos la consulta y obtenemos el resultado 
            $query = $db->prepare("SELECT * FROM entrenadores");
            $query->execute(); // Va sin parametros xq yo a la consulta anterior, no le estoy pasando ningún parámetro

            // obtengo todos los datos que arroja la query
            // $activities es un arreglo de actividades
            $trainers = $query->fetchAll(PDO::FETCH_OBJ);

            // 3. Mostrar los datos obtenidos para generar el HTML
            return $trainers;
            // 4. Cerramos la conexión
                    // En PDO no es necesario cerrar la conexión
        }
        function getTrainerById($id_Trainer){
            // 1. Abrimos  una conexión con la base de datos
            $db = $this->getConection();
    
            // 2. Enviar la consulta (2 sub-pasos) prepare y execute
            $query = $db->prepare('SELECT * FROM entrenadores WHERE id_Trainer = ?');
            $query->execute([$id_Trainer]);
    
            // 4. Obtenemos el resultado (fetch si es solo un resultado)
            $trainer = $query->fetch(PDO::FETCH_OBJ);
            return $trainer;
        }
        
        function getActivityById($id_Trainer) {
            // 1. Abrimos  una conexión con la base de datos
            $db = $this->getConection();

            // 2. Enviamos la consulta y obtenemos el resultado 
            $query = $db->prepare("SELECT * FROM Entrenadores WHERE id_Trainer= ?");
            $query->execute([$id_Trainer]); // Va sin parametros xq yo a la consulta anterior, no le estoy pasando ningún parámetro
    
            // obtengo todos los datos que arroja la query
            // $activities es un arreglo de actividades
            $trainer = $query->fetch(PDO::FETCH_OBJ);
    
            // 3. Mostrar los datos obtenidos para generar el HTML
            return $trainer;
            // 4. Cerramos la conexión
                    // En PDO no es necesario cerrar la conexión
        }
        // Inserta la actividad en la base de datos
        function insertTrainer($name, $lastname, $phone, $email, $contracting){
            // 1. Abro la base de datos
            $db = $this->getConection();

            // 2. Enviar la consulta (2 sub-pasos) prepare y execute
            $query = $db->prepare('INSERT INTO entrenadores (name, lastname, phone, email, contracting) VALUES(?,?,?,?,?)');
            $query->execute([$name, $lastname, $phone, $email, $contracting]);

            // 3. Obtengo y devuelvo el último id que se insertó
            return $db->lastInsertId();
        }

        function deleteTrainer($id_Trainer) {
            $db = $this->getConection();

            $query = $db->prepare('DELETE FROM entrenadores WHERE id_Trainer = ?');
            $query->execute([$id_Trainer]);
        }

        // Edita al entrenador
        function editTrainer($name, $lastname, $phone, $email, $contracting, $id_Trainer){
            $db = $this->getConection();
            // Preparar la consulta SQL para actualizar la tabla de entrenadores (asegúrate de que 'trainers' sea el nombre correcto de tu tabla)
            $query = $this->db->prepare("UPDATE entrenadores SET name = ?, lastname = ?, phone = ?, email = ?, contracting = ? WHERE id_Trainer = ?");

            // Ejecutar la consulta pasando los valores de forma segura
            $query->execute([$name, $lastname, $phone, $email, $contracting, $id_Trainer]);
        }
}