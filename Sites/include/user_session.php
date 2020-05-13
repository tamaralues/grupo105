<?php

class userSession{

    public function __construct(){
        session_start();
    }

    public function setCurrentUser($user){
        $_SESSION['user']=$user;
    }

    public function getCurrentUser(){
        return $_SESSION['user'];
    }

    public function closeSesion(){
        session_unset();
        session_destroy();
    }
}

?>