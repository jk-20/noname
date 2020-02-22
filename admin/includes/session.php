<?php

class Session{

private $signin;
public $user_id;


    function __construct(){
        session_start();
    }

}

$session = new Session();
?>