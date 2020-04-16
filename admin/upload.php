<?php include("includes/header.php"); ?>
<?php 
  if(!$session->is_signed_in()){ redirect("login.php");}?>
<?php
$message = "";
if(isset($_POST['submit'])){
    $photo = new Photo();
    $photo->title = $_POST['title'];
    $photo->set_file($_FILES['file_name']) ;

    if($photo->save()){
        $message = "<h1 class='text-success'>Photo uploaded successfully</h1>";
    }else{
        $message = join("<br>", $photo->errors);
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
           Upload Photo
           
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
            </li>
            <li class="active">
                <i class="fa fa-file"></i><a href="index.php"> Home</a>
            </li>
        </ol>

        <div class="col-sm-6">

       <h1 class="text-danger"><?php echo $message; ?></h1> 
        <form action="upload.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
        <input type="text" name="title" class="form-control">
        </div>
        <div class="form-group">
        <input type="file" name="file_name">
        </div>
        <input type="submit" name="submit" class="btn btn-primary">
        
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