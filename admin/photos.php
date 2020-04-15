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
        <th>Comments</th>
        </thead>
        <tbody>
       
           <?php $photos = Photo::find_all(); ?>
           <?php foreach($photos as $photo) :?>

           <tr>
           
           <td><img src="<?php echo $photo->picture_path(); ?>" alt="" height="150px" width=150px" class="thumbnail">
         
           <div class="picture-link">
             
           <a href="delete_photo.php?id=<?php echo $photo->id; ?>" class="btn btn-xs btn-danger">Delete</a>
           <a href="edit_photo.php?id=<?php echo $photo->id; ?>" class="btn btn-xs btn-warning">Edit</a>
           <a href="../photo.php?id=<?php echo $photo->id; ?>" class="btn btn-xs btn-success">View</a>
           </div>
           
           </td>
           <td><?php echo $photo->id; ?></td>
           <td><?php echo $photo->title; ?></td>
           <td><?php echo $photo->size ;?></td>
           <td><?php echo $photo->description;?></td>

           <td>
           <a href="comment_photo.php?id=<?php echo $photo->id; ?>">
           
           <?php
           
           $comments = Comment::find_the_comment($photo->id);
           
           echo count($comments);?>
           
           </a>
          
           
           </td>
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