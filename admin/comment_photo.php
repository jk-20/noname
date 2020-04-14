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
           comments page 
            <small>Subheading</small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
            </li>
            <li class="active">
                <i class="fa fa-comment"></i>  <a href="add_comment.php" class="btn btn-xs btn-primary">Add comment</a>
            </li>
           
        </ol>

          


        <div class="col-md-12">

        <table class="table table-hover">
        <thead>
        <th>ID</th>
        <th>Author</th>
        <th>body</th>
    
        </thead>
        <tbody>
       
           <?php 
           if(empty($_GET['id'])){
               redirect("photos.php");
           }
           
           ?>
           <?php foreach($comments as $comment) :?>

           <tr>
           <td><?php echo $comment->id; ?></td>
           <!-- <td><img src="<?php //echo $comment->comment_image_placeholder(); ?>" alt="" height="100px" width="100px" class="thumbnail"> </td> -->
           
           <td><?php echo $comment->author; ?>
           <div class="actions-link">
             
           <a href="delete_comment.php?id=<?php echo $comment->id; ?>" class="btn btn-xs btn-danger">Delete</a>
           <!-- <a href="edit_comment.php?id=<?php echo $comment->id; ?>" class="btn btn-xs btn-warning">Edit</a> -->

           </div>
           </td>
           <td><?php echo $comment->body ;?></td>
          
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