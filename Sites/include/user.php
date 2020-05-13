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
        $query = "SELECT uid, username FROM usuarios WHERE username=$user AND password=$pass";
        $result = $this->db -> prepare($query);
        $result ->execute();
        $fetch = $result -> fetchAll();
        $number = 0;
        foreach ($fetch as $f){
            $number+=1;
            echo "<p>$f[1]</p>";
        }
        if ($result){
            echo "<p>query exitosa</p>";
        } else {
            echo "<p>query fallida</p>";
        }
        echo "<p>$number</p>";
        if ($number){
            return TRUE;
        } else {
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