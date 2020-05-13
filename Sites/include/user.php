<?php

class User {
    private $nombre_usuario;
    private $username;

    public function userExists($user, $pass){
        $query = "SELECT * FROM usuarios NATURAL JOIN cuentas WHERE username=:user AND password=:pass";
        $result = $db -> prepare($query);
        $result ->execute(['user'=>$user, 'pass'=>$pass]);

        if ($result->rowCount()){
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function setUser($user){
        $query = "SELECT * FROM usuarios WHERE username=:user";
        $result = $db -> prepare($query);
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