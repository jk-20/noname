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
         All Users
           
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
            </li>
            <li class="active">
                <i class="fa fa-user"></i>  <a href="add_user.php" class="btn btn-xs btn-primary">Add user</a>
            </li>
           
        </ol>

          


        <div class="col-md-12">

        <table class="table table-hover">
        <thead>
        <th>ID</th>
        <th>Photo</th>
        <th>Username</th>
        <th>First Name</th>
        <th>Last name</th>
        </thead>
        <tbody>
       
           <?php $users = User::find_all(); ?>
           <?php foreach($users as $user) :?>

           <tr>
           <td><?php echo $user->id; ?></td>
           <td><img src="<?php echo $user->user_image_placeholder(); ?>" alt="" height="100px" width="100px" class="thumbnail"> </td>
           
           <td><?php echo $user->username; ?>
           <div class="actions-link">
             
           <a href="delete_user.php?id=<?php echo $user->id; ?>" class="btn btn-xs btn-danger">Delete</a>
           <a href="edit_user.php?id=<?php echo $user->id; ?>" class="btn btn-xs btn-warning">Edit</a>

           </div>
           </td>
           <td><?php echo $user->first_name ;?></td>
           <td><?php echo $user->last_name;?></td>
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