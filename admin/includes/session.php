<?php

class Session{

private $sign_in = false;
public $user_id;
public $message ;


    function __construct(){
        session_start();
        $this->check_the_login();
    $this->check_message();    
    }

    public function is_sign_in(){
        return $this->sign_in;
    }

    public function login($user){
        if($user){
            $this->user_id = $_SESSION['user_id'] = $user->id;
            $this->sign_in = true;
        }
        }


        public function logout(){
            unset($_SESSION['user_id']);
            unset($user->id);
            $this->sign_in = false;
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

        public function message($msg=""){
            if(!empty($msg)){
                $_SESSION['message'] = $msg;
            }else{
                return $this->message;
            }
        }
        private function check_message(){
            if(isset($_SESSION['message'])){
                $this->message = $_SESSION['message'];
                unset($_SESSION['message']);
            }else{
                $this->message="";

            }
        }
}








$session = new Session();
?>