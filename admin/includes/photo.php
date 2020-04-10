<?php 
class  Photo extends Db_object {
    protected static $db_table = "photo";
protected static $db_table_field = array('id','title','caption','description','file_name','alternate_text','type','size');
       public $id;
       public $title;
       public $caption;
       public $description;
       public $file_name;
       public $alternate_text;
       public $type;
       public $size;
       
       public $tmp_path;
       public $upload_directory = "images";
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


        public function set_file($file) {
            
            if(empty($file) || !$file || !is_array($file)){
                $this->errors[] = "There was no file uploaded here ";
                return false;
            }elseif($file['error'] !=0){
                $this->errors[] = $this->upload_errors_array[$file['error']];
                return false;
                    }else{

             $this->file_name = basename($file['name']);
             $this->tmp_path = $file['tmp_name'];
             $this->type = $file['type'];
             $this->size = $file['size'];
            }
        }

         public function save(){
             if($this->id){
                 $this->update();
             }else{
                 if(!empty($this->errors)){
                     return false;
                 }
                 if(empty($this->file_name) || empty($this->tmp_path)){
                     $this->errors[] = "file was not available";
                     return false;
                 }
               $target_path = SITE_ROOT . DS . 'admin' . DS . $this->upload_directory . DS . $this->file_name;
                 if(file_exists($target_path)){
                     $this->errors[] = "The file {$this->file_name} already exists";
                     return false;
                 }
                 if(move_uploaded_file($this->tmp_path, $target_path)){
                     if($this->create()){
                         unset($this->tmp_path);
                         return true;
                     }else{
                        $this->errors[] = "file directory probably does not have permission to write  ";
                        return false;
                    }
                 }
                 $this->create();
             }
         }   
            
        // public function save(){
        //     if($this->id){
        //         $this->update();
        //     }else{
        //         if(!empty($this->errors)){
        //             return false;
        //         }
        //         if(empty($this->file_name) || empty($this->tmp_path)){
        //             $this->errors[] = "the file was not available";
        //             return false;
        //         }

        //         $target_path = SITE_ROOT . DS . 'admin' . DS . $this->$upload_directory . DS . $this->file_name;



        //         $this->create();
        //     }




        // }
        
        
        public function picture_path(){
            return $this->upload_directory . DS . $this->file_name;
        }


        public function delete_photo(){
            if($this->delete()){
                $target_path = SITE_ROOT .DS . 'admin' . DS . $this->picture_path();
                return unlink($target_path) ? true : false ;
            }else{

                return false;

            }
        }
    

}



?>