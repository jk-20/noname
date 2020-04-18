<?php

class  User extends Db_object {
    
    protected static $db_table = "user";
 protected static $db_table_field = array('username','password','first_name','last_name','user_image');
    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;
    public $user_image;
    public $tmp_path;
    public $upload_directory = "images";

    public $image_placeholder = "http://placehold.it400x400&text=image";

    public $errors = array();
       public  $upload_errors_array = array(

        UPLOAD_ERR_OK               => "there is no error",
        UPLOAD_ERR_INI_SIZE         => "bigger then the uploaded MAX_FILE_SIZE directive",
        UPLOAD_ERR_FORM_SIZE        => "uploaded file exceeds the MAX_FILE_SIZE",
        UPLOAD_ERR_PARTIAL          => "the uploaded file was only patially uploaded",
        UPLOAD_ERR_NO_FILE          => "no file was uploaded",
        UPLOAD_ERR_NO_TMP_DIR       => "missing temporary folder",
        UPLOAD_ERR_CANT_WRITE       => "failed to write file the disk",
        UPLOAD_ERR_EXTENSION        => "A php extension stopped the file upload."
        
        );

        public function user_image_placeholder(){

            return empty($this->user_image) ? $this->image_placeholder : $this->upload_directory.DS.$this->user_image;
         }
 
   public function set_file($file) {
            
      if(empty($file) || !$file || !is_array($file)){
          $this->errors[] = "There was no file uploaded here ";
          return false;
      }elseif($file['error'] !=0){
          $this->errors[] = $this->upload_errors_array[$file['error']];
          return false;
              }else{

       $this->user_image = basename($file['name']);
       $this->tmp_path = $file['tmp_name'];
      
      }
  }

   public function upload_photo(){
    
           if(!empty($this->errors)){
               return false;
           }
           if(empty($this->user_image) || empty($this->tmp_path)){
               $this->errors[] = "file was not available";
               return false;
           }
         $target_path = SITE_ROOT . DS . 'admin' . DS . $this->upload_directory . DS . $this->user_image;
           if(file_exists($target_path)){
               $this->errors[] = "The file {$this->user_image} already exists";
               return false;
           }
           if(move_uploaded_file($this->tmp_path, $target_path)){
              
                   unset($this->tmp_path);
                   return true;
                
               }else{
                  $this->errors[] = "file directory probably does not have permission to write  ";
                  return false;
              }
              $this->create();
           }
          
       
 







      public static function verify_user($username,$password){
            global $database;
            $username = $database->escape_string($username);
            $password = $database->escape_string($password);

            $sql = "SELECT * FROM ".self::$db_table." WHERE ";
            $sql .= "username = '$username' ";
            $sql .= "AND password = '$password' ";
            $sql .= "LIMIT 1";

            $the_result_array = self::find_this_query($sql);
  
            return !empty($the_result_array) ? array_shift($the_result_array) : false ;

      }  

      

      //delete user method

   //    public function user_picture_path(){
   //       return $this->upload_directory . DS . $this->user_image;
   //   }


   //   public function delete_user(){
   //       if($this->delete()){
   //           $target_path = SITE_ROOT .DS . 'admin' . DS . $this->user_picture_path();
   //           return unlink($target_path) ? true : false ;
   //       }else{

   //           return false;

   //       }
   //   }

public function ajax_save_user_image($user_image, $user_id){

    $this->user_image = $user_image;
    $this->id = $user_id;
    $this->save();
}
   

    

    


    

}




?>