<?php
include 'configuracion/conexion_db_e3.php';
class User {
    private $nombre_usuario;
    private $username;
    private $db;

    public function __construct($db){
        $this->db=$db;
    }

    public function userExists($user, $pass) {
        echo "<p>ejecutando userexists</p>";
        $query = "SELECT count(uid) as total FROM usuarios WHERE username=$user AND password=$pass";
        $result = $this->db -> prepare($query);
        $result ->execute();
        $fetch = $result -> fetchall();
        $number = $fetch['total'];

        if ($number){
            return TRUE;
        } else {
            echo "$number";
            return FALSE;
        }
    }

    public function setUser($user){
        $query = "SELECT * FROM usuarios WHERE username=:user";
        $result = $this->db -> prepare($query);
        $result ->execute(['user'=>$user]);

        foreach($result as $r){
            $this->nombre_usuario = $r['nombreusuario'];
            $this->username = $r['username'];
        }
    }

    public function getNombre(){
        return $this->nombre;
    }
}
?>