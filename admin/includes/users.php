<?php

class User {

    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;
public static function find_all_users(){

    return self::find_this_query("SELECT * FROM user") ;
}

public static function find_user_by_id($user_id){
    
    $result_set = self::find_this_query("SELECT * FROM user WHERE id=$user_id") ;
    $fetch_users = mysqli_fetch_array($result_set);
    
    return $fetch_users;
}

public static function find_this_query($sql){
    global $database;
    $result_set = $database->query($sql);
    return $result_set;
}


public static function instantation($fetch_user){
    $the_object = new self; 
    $the_object->id = $fetch_user['id'];
    $the_object->username = $fetch_user['username'];
    $the_object->password = $fetch_user['password'];
    $the_object->first_name = $fetch_user['first_name'];
    $the_object->last_name = $fetch_user['last_name'];
    
    return $the_object;
}


}






?>