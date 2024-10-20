<?php
class UserModel{
    protected $db;

    function __construct(){
      $this->db = new PDO('mysql:host=localhost;dbname=gimnasio_tandil;charset=utf8', 'root', '');
    }

    public function getByName($name){
        $db = $this->db;
        $query = $db->prepare('SELECT * FROM administrador WHERE name = ?');
        $query->execute([$name]);

        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function isAdmin($id) {
      $query = $this->db->prepare('SELECT admin FROM `administrador` WHERE id_Admin = ?');
      $query->execute([$id]);
  
      $user = $query->fetch(PDO::FETCH_OBJ);
      var_dump("Usuario obtenido: ", $user); // Para depuración
  
      if ($user) {
          // Verificar el valor de admin
          var_dump("Valor de admin: " . $user->admin); // Para depuración
          return (bool)$user->admin; // Asegúrate de que sea un valor booleano
      } else {
          return false;
      }
  }
}