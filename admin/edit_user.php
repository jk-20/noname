<?php include("includes/header.php"); ?>
<?php 
  if(!$session->is_signed_in()){ redirect("login.php");}?>



  <?php
                  if(empty($_GET['id'])){
                  redirect("users.php");
                  }else{
                    $user = User::find_by_id($_GET['id']);
                    if(isset($_POST['update'])){
                    
                        
                            if($user){


                              
                              $user->username = $_POST['username'];
                              $user->password = $_POST['password'];
                              $user->first_name = $_POST['first_name'];
                              $user->last_name = $_POST['last_name'];

                              if(empty($_FILES['user_image'])){
                                $user->save();
                              }else{
                                $user->set_file($_FILES['user_image']);
                                $user->upload_photo();
                                $user->save();
                                redirect("edit_user.php?id={$user->id}");
                              }
                              
  
                              
                        
                            }
                            
                           
                    }
                  }
 

   
  
  
  
  
  
  ?>

<!-- modal code here  -->


<div class="modal fade" id="photo-library">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Gallery System Library</h4>
      </div>
      <div class="modal-body">
          <div class="col-md-9">
             <div class="thumbnails row">
            
                <!-- PHP LOOP HERE CODE HERE-->
                
               <div class="col-xs-2">
                 <a role="checkbox" aria-checked="false" tabindex="0" id="" href="#" class="thumbnail">
                   <img class="modal_thumbnails img-responsive" src="<!-- PHP LOOP HERE CODE HERE-->" data="<!-- PHP LOOP HERE CODE HERE-->">
                 </a>
                  <div class="photo-id hidden"></div>
               </div>

                    <!-- PHP LOOP HERE CODE HERE-->

             </div>
          </div><!--col-md-9 -->

  <div class="col-md-3">
    <div id="modal_sidebar"></div>
  </div>

   </div><!--Modal Body-->
      <div class="modal-footer">
        <div class="row">
               <!--Closes Modal-->
              <button id="set_user_image" type="button" class="btn btn-primary" disabled="true" data-dismiss="modal">Apply Selection</button>
        </div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->






<!-- modal code end -->





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
          Edit users page 
            <small>Subheading</small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
            </li>
            <li class="active">
                <i class="fa fa-file"></i> <a href="users.php">Back</a>
            </li>
        </ol>

        
        <div class="col-md-8">
        
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">


        
        <div class="form-group">
        <label for="username">username</label>
        <input type="text" name="username" class="form-control" value="<?php echo $user->username; ?>">
        </div>
       
        <div class="form-group">
        <label for="password">password</label>
        <input type="password" name="password" class="form-control" value="<?php echo $user->password; ?>">
        </div>
        <div class="form-group">
        <label for="first_name">first name</label>
        <input type="text" name="first_name" class="form-control" value="<?php echo $user->first_name; ?>">
        </div>
        <div class="form-group">
        <label for="last_name">last name</label>
        <input type="text" name="last_name" class="form-control" value="<?php echo $user->last_name; ?>">
        </div>
       
        <div class="form-group">
        
        <input type="file" name="user_image">
        </div>
       
        </div>

        <div class="col-md-4" >
                            <div  class="user-info-box">
                                <div class="info-box-header">
                                   <h4>User profile picture<span id="toggle" class="glyphicon glyphicon-menu-up pull-right"></span></h4>
                                </div>
                            <div class="inside">
                              <div class="box-inner">
                              <div class="form-group">
 <a href="#" class="thumbnail" data-toggle="modal" data-target="#photo-library">
 <img src="<?php echo $user->user_image_placeholder(); ?> 
                      "alt="" height="100px" width="150px" class="thumbnail"></a>
        
                                    </div>
                              </div>
                              <div class="info-box-footer clearfix">
                                <div class="info-box-delete pull-left">
                                    <a  href="delete_user.php?id=<?php echo $user->id; ?>" class="btn btn-danger btn-md ">Delete</a>   
                                </div>
                                <div class="info-box-update pull-right ">
                                    <input type="submit" name="update" value="Update" class="btn btn-primary btn-md ">
                                </div>   
                              </div>
                            </div>          
                        </div>
                    </div>
                    </form>
    </div>
</div>
<!-- /.row -->

</div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>