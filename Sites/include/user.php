<?php
class User {
    private $nombre_usuario;
    private $username;
    private $db;

    public function __construct($db){
        $this->db=$db;
    }

    public function userExists($user, $pass, $email) {
        $query = "SELECT uid, username, correo FROM usuarios WHERE username='$user' AND password='$pass' AND correo='$email' AND activos=TRUE";
        $result = $this->db -> prepare($query);
        $result ->execute();
        $fetch = $result -> fetchAll();
        $number = 0;
        foreach ($fetch as $f){
            $number+=1;
        }

        if ($number){
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function setUser($user){
        $query = "SELECT username, nombreusuario FROM usuarios NATURAL JOIN cuentas WHERE username='$user'";
        $result = $this->db -> prepare($query);
        $result ->execute();
        $fetch = $result -> fetchAll();

        foreach($fetch as $r){
            $this->nombre_usuario = $r[1];
            $this->username = $r[0];
        }
    }

    public function getNombre(){
        return $this->nombre;
    }
}
?>
