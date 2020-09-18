<?php
session_start();
?>
<?php 
    include("../config/db.php");
    $id = $_SESSION['id'];
    $query = "SELECT * FROM posts WHERE id='$id'";
    $result = mysqli_query($conn,$query) or die('error');
    if(mysqli_num_rows($result)> 0){
        while($row = mysqli_fetch_assoc($result)){
            $id = $row['id'];
            $title = $row['title'];
            $description = $row['description'];
            $category = $row['category'];
        }
    }
?>

<?php if(!$_SESSION['username']):?>
    <?php header('Location:login.php');?>
<?php else:?>

<?php include("header.php");?>
    <div class="container">
    <?php 
        $url = $_SERVER['PHP_SELF'];
        $seg = explode('/',$url);
        $path = "http://127.0.0.1".$seg[0].'/'.$seg[1];
        $full_url = $path.'/'.'img'.'/'.'avatar.png';
        // echo $full_url;
    ?>

    <?php if($_SESSION['id'] == 1):?>
            <h1 mt-4 style="text-align:center;" backgroung-color="blue;"> Admin Dashboard </h1>
            
    <?php else:?>
            <h1 mt-4 style="text-align:center;"> Users Dashboard </h1>
            <hr>
    <?php endif;?>
        <h1 style="text-align:center;"><?php echo 'Welcome,' .$_SESSION['username'];?></h1>
         <div class="row">
             <div class="col-lg-12">
                <p style ="text-align:center;" >
                <?php if(isset($title)):?>
                
                <!-- <h4 style="text-align:center;"><?php echo $title;?></h4>
                <h4 style="text-align:center;"><?php echo $description;?></h4>
                <h4 style="text-align:center;"><?php echo $category;?></h4> -->
                <?php else:?>
                    <!-- <h4 style="text-align:center;"><?php echo $category;?></h4> -->
                <?php endif;?>
            </div>
        </div>

        <h1 style ="text-align:center">ALL POSTS </h1>
</div>

    <?php 
        $posts_query = " SELECT * FROM posts";
        $posts_result= mysqli_query($conn,$posts_query) or die ("error");
        if(mysqli_num_rows($posts_result)> 0){
            while($posts = mysqli_fetch_assoc($posts_result)){
                $id = $posts['id'];
                $title = $posts['title'];
                $description = $posts['description'];
                $category = $posts['category'];

    ?>
                <div class = "row">
                    <div class="col-lg-2">
                        <h3> <?php echo $title;?>
                    </div>

                    <div class="col-lg-10 mb-4">
                        <h3><a href=""><?php echo $title;?></a></h3>
                        <p><?php echo $description;?></p>
                        <a href=""><?php echo $category;?></a>
                        <hr>
                        <div class="row mb-8">

                            <?php if($_SESSION['id'] != 1):?>
                            <div class="col-lg-1"><a class="btn btn-success" href=view.php?id=<?php echo $id;?>>View</a></div>
                            <?php else:?>
                            <div class="col-lg-1"><a class="btn btn-success" href=view.php?id=<?php echo $id;?>>View</a></div>
                            <div class="col-lg-1"><a class="btn btn-primary" href=edit.php?id=<?php echo $id;?>>Edit</a></div>
                            <!-- <div class="col-lg-1"><a href=delete.php?id=<?php echo $id;?>>Delete</a></div> -->

                            <div class="col-lg-1">
                                <form action="delete.php" method="POST">
                                    <input type = "hidden" name="id" value=<?php echo $id;?>>
                                    <input type = "hidden" name="title" value=<?php echo $title;?>>
                                   
                                    <input type="submit" name="delete" value="Delete"
                                    class="btn btn-danger"> 
                                </form>
                            </div>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
                <?php
            }
        }
 ?>
<?php endif;?>
<?php include("footer.php")?>

