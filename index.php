        <?php include("admin/includes/init.php");
        include("includes/header.php");
        // $photos = Photo::find_all();
        $page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
        $items_per_page = 4;
        $items_total_count = Photo::count_all();

        $paginate = new Paginate($page,$items_per_page,$items_total_count);
        $sql = "SELECT * FROM photo ";
        $sql .= " LIMIT {$items_per_page} ";
        $sql .= " OFFSET {$paginate->offset()}";
        $photos = Photo::find_this_query($sql);
        ?>


        <div class="row">
        
            <!-- Blog Entries Column -->
            <div class="col-md-12">
           
    <div class="row">
    <?php foreach ($photos as $photo):?>
    <div class="col-xs-6 col-md-3">
 
    <a href="photo.php?id=<?php echo $photo->id;?>" class="thumbnail">
    
    <img class="home-photos img-responsive" src="admin/<?php echo $photo->picture_path();?>" alt="">
    </a>
   
    </div>

    <?php endforeach; ?>  
   
  
    
    </div>
 
         <div class="row">
       <ul class="pager">


       <?php
       
       if($paginate->page_total()>1){
             if($paginate->has_next()){
                echo "<li class='next'><a href=''>next</a></li>"  ;
             }
       }
       
       
       ?>
       <!-- <li class="previous"><a href="">previous</a></li>
          -->
       
       </ul>


         </div>

            </div>




            <!-- Blog Sidebar Widgets Column -->
            <!-- <div class="col-md-4">

            
                 <?php //include("includes/sidebar.php"); ?>



        </div> -->
        <!-- /.row -->

        <?php include("includes/footer.php"); ?>
