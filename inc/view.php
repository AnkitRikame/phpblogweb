<?php session_start();?>

<?php if (!isset($_SESSION['username']));
?>
<?php include("header.php");
?>
<?php include("../config/db.php");
?>

<div class="container">
<h1> View Post </h1>
<?php echo $id = $_GET['id'];?>

<?php

        $posts_query = " SELECT * FROM posts WHERE id = '$id'";
        $posts_result= mysqli_query($conn,$posts_query) or die ("error");
        if(mysqli_num_rows($posts_result)> 0){
            while($posts = mysqli_fetch_assoc($posts_result)){
                $id = $posts['id'];
                $title = $posts['title'];
                $description = $posts['description'];
                $category = $posts['category'];


            //     $data = array(
            //             'id' => $id,
            //             'title' => $title,
            //             'description' => $description,
            //             'category' => $category
            //         );
    
            //         echo '<pre>';
            //         print_r($data);
            //         echo '</pre>';
              }
            }
?>

<?php if(!$_SESSION['username']):?>
    <?php header('Location:login.php');?>
<?php else:?>


<div class ="row">
    <h1 style="text-align:center;"><?php echo $title ;?></h1>
    


    <div class="col-lg-8">
    <p> <?php echo $description;?></p>
    <a href=""><?php echo $category;?></a>

    <div class ="row mb-4">
    <div class="col-lg-8">

        <div class="col-lg-2">
            <a href="">Like(50)</a>
        </div>

        <div class="col-lg-2">
            <a href="">Like(59)</a>
        </div>

        <div class="col-lg-2">
            <a href="">Like(60)</a>
        </div>

        <a href=dashboard.php class="btn btn-danger">Back</a>
    </div>

    
    </div>
    </div>
</div>

<?php endif;

 include("footer.php");
 ?>

