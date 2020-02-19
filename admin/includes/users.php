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
    
    $the_result_array = self::find_this_query("SELECT * FROM user WHERE id=$user_id") ;
    // $found_users = mysqli_fetch_array($result_set);
    // if(!empty($the_result_array)){
    //     $first_item = array_shift($the_result_array);
    //     return $first_item;
    // }else{
    //     return false;
    // }
    return !empty($the_result_array) ? array_shift($the_result_array) : false;
    return $found_users;
}

public static function find_this_query($sql){
    global $database;
    $result_set = $database->query($sql);
    $the_object_array = array();
    while($row = mysqli_fetch_array($result_set)){
        $the_object_array[] = self::instantation($row);
    }
    return $the_object_array;
}


public static function instantation($the_record){
    $the_object = new self; 
    // $the_object->id = $fetch_user['id'];
    // $the_object->username = $fetch_user['username'];
    // $the_object->password = $fetch_user['password'];
    // $the_object->first_name = $fetch_user['first_name'];
    // $the_object->last_name = $fetch_user['last_name'];

foreach ($the_record as $the_attribute => $value) {

    if($the_object->has_the_attribute($the_attribute)){
        
        $the_object->$the_attribute=$value;
    }
}
    
    return $the_object;
}

private function has_the_attribute($the_attribute){
    $object_properties = get_object_vars($this);
    return array_key_exists($the_attribute,$object_properties);

}



}






?>