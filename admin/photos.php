<?php include("includes/header.php"); ?>
<?php 
  if(!$session->is_signed_in()){ redirect("login.php");}?>
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
           photos page 
            <small>Subheading</small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
            </li>
            <li class="active">
                <i class="fa fa-file"></i> Blank Page
            </li>
        </ol>


        <div class="col-md-12">

        <table class="table table-hover">
        <thead>
        <th>Photo</th>
        <th>ID</th>
       
        <th>Title</th>
        <th>Size</th>
        <th>File description</th>
        </thead>
        <tbody>
        <?php // $Photos = Photo::find_all();
           //foreach ($Photos as $Photo) {
            // echo "<tr>";
        

            // echo "<td><img src='$Photo->file_name' alt='' width='40px' height='50px'></td>";
            // echo "<td>$Photo->id</td>";
            // echo "<td>$Photo->title</td>";
            // echo "<td>$Photo->size</td>";
            // echo "<td>$Photo->description</td>";
            
            // echo "</tr>";  
           //} ?>
           <?php $photos = Photo::find_all(); ?>
           <?php foreach($photos as $photo) :?>

           <tr>
           
           <td><img src="<?php echo $photo->picture_path(); ?>" alt="" width='70px' height='50px'>
         
           <div class="picture-link">
             <br>
           <a href="delete_photo.php/?id=<?php echo $photo->id; ?>" class="btn btn-xs btn-primary">Delete</a>
           <a href="" class="btn btn-xs btn-primary">Edit</a>
           <a href="" class="btn btn-xs btn-primary">View</a>
           </div>
           
           </td>
           <td><?php echo $photo->id; ?></td>
           <td><?php echo $photo->title; ?></td>
           <td><?php echo $photo->size ;?></td>
           <td><?php echo $photo->description;?></td>
           </tr>
           <?php endforeach; ?>
           
      
       
        </tbody>
        </table>
        </div>
    </div>
</div>
<!-- /.row -->

</div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>