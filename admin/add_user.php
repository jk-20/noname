<?php include("includes/header.php"); ?>
<?php 
  if(!$session->is_signed_in()){ redirect("login.php");}?>



  <?php
 
    $message = ""; 
        $user = new User();

    if(isset($_POST['submit'])){

        if($user){
            $user->username = $_POST['username'];
            $user->first_name = $_POST['first_name'];
            $user->last_name = $_POST['last_name'];
            $user->password = $_POST['password'];
            $user->set_file($_FILES['user_image']);
            $user->save();

            if($user->save()){
                $message = "<h1 class='text-success'>user create  successfully</h1>";
            }else{
                $message = join("<br>", $user->errors);
            }
            
        }
           

           
       
       
    }
  
  
  
  
  
  ?>
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
           
            
          <?php include("includes/top_nav.php"); ?>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <?php include("includes/side_bar_nav.php"); ?>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">
        
        <div class="container-fluid">

<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
          Add User page 
            <small>Subheading</small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
            </li>
            <li class="active">
                <i class="fa fa-file"></i> <a href="users.php"> Back</a>
            </li>
        </ol>

        
        <div class="col-md-6 col-md-offset-3">
        <?php echo $message; ?>         
        <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
        <label for="username">username</label>
        <input type="text" name="username" class="form-control" value="">
        </div>
        
        <div class="form-group">
        <label for="first_name">First Name</label>
        <input type="text" name="first_name" class="form-control" value="">
        </div>
        <div class="form-group">
        <label for="last_name"> Last Name</label>
        <input type="text" name="last_name" class="form-control" value="">
        </div>
        <div class="form-group">
       
        <input type="file" name="user_image" value="">
        </div>
        <div class="form-group">
        <label for="password"> Password</label>
        <input type="password" name="password" class="form-control" value="">
        </div>
        <!-- <div class="form-group">
        <input type="file" name="user_image">
        
        </div> -->
       <input type="submit" name="submit" value="Add User" class="btn btn-primary" >
        </form>
        </div>
       
                    
    </div>
</div>
<!-- /.row -->

</div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>