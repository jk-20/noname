<?php require_once("includes/header.php"); ?>

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">SB Admin</a>
            </div>
            <!-- Top Menu Items -->
           
            <?php include("includes/top_nav.php"); ?>



            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <?php include("includes/side_nav.php"); ?>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            main dashboard
                            <small>Subheading</small>

                            
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> 
                               
                            </li>
                        </ol>
                        <?php
                    //     $users = User::find_all_users();
                    //    foreach($users as $user){
                    //     echo $user->username."<br>";
                    //    }
                      
                        //    echo $user->id;
                        //    $result_set = User :: find_all_users();
                        //    while($row = mysqli_fetch_array($result_set)){
                        //       echo $row['username']."<br>";
                        //    }

                        // $result_set = Userno :: only_first_user();
                        // while($row = mysqli_fetch_array($result_set)){
                        //     echo $row['username'];
                        // }
                    //    $users = User::find_all_users();
                    //    foreach($users as $user){
                    //     echo $user->username."<br>";
                    //    }
                        $found_user = User::find_user_by_id(2);
                        echo $found_user->username;
                        

                            
                            ?>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
  <?php include("includes/footer.php"); ?>