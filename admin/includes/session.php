<?php

class Session{

private $sign_in = false;
public $user_id;


    function __construct(){
        session_start();
        $this->check_the_login();
    }

}

public function is_sign_in(){
    return $this->$sign_in;
}

public function login($user_id){
if($user){
    $this->user_id = $_SESSION['user_id'] = $user->id;
    $this->sign_in = true;
}
}

private function check_the_login(){
    if(isset($_SESSION['user_id'])){
        $this->user_id = $_SESSION['user_id'];
        $this ->sign_in = true;
    }else{
        unset($this->user_id);
        $this ->sign_in = false;
    }
}

$session = new Session();
?>