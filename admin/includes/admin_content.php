
            <div class="container-fluid">

<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Blank Page
            <small>Subheading</small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
            </li>
            <li class="active">
                <i class="fa fa-file"></i> Blank Page
            </li>
        </ol>

        <?php
      
    //    $users = User::find_all();
    //    foreach ($users as $user) {
    //        echo $user->username."<br>";
    //        # code...
    //    }
       
       
    //   $found_user = User::find_user_by_id(1);
    //  $user = User::instantation($found_user);
    //     echo $user->username."<br>";
    //     echo $user->first_name;
    // $found_user = User::find_user_by_id(2);
    // echo $found_user->username;


    // $photos = new Photos();

    // $user = new User();
    // $user->username = "keya";
    // $user->password = "keya";
    // $user->first_name = "keya the";
    // $user->last_name = "fucking robot";

    // $user->create();
    // $update_user = User::find_user_by_id(8);
    // $update_user->find_user_by_id(9);
   
    // $update_user->username = "john007";
    // $update_user->password = "007";
    // $update_user->first_name = "john";
    // $update_user->last_name = "doe";
    // $update_user->update();
    // $user = User::find_user_by_id(10);
    // $user->password = "123";
    // $user->save();

        $user = new User();
        $user->username = "jeet";
        $user->first_name = "jeet";
        $user->save();
        


        // $Photos = Photo::find_all();
        //    foreach ($Photos as $Photo) {
        //        echo $Photo->id."<br>";
        //        echo $Photo->title."<br>";
        //        echo $Photo->description."<br>";
        //        # code...
        //    }

        //      $photo = new Photo();
        // $photo->title = "hello";
        // $Photo->file_name = "mypic.jpeg";
        // // $Photo->type = "image";
        // // $Photo->size = 11;
        // $photo->create();
           
        // $delete= Photo::find_by_id(5);
        // $delete->delete();
        // $create_photo = new Photo();
        // $create_photo->title = "jeet";
        // $create_photo->file_name = "image";
        // $create_photo->save();
        echo INCLUDES_PATH;
        ?>
    </div>
</div>
<!-- /.row -->

</div>