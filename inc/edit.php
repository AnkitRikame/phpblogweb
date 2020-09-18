<?php session_start();?>
<?php if(!isset($_SESSION['username'])):?>

    <?php header('Location:dashboard.php');?>

<?php else:?>

<?php 
    include("../config/db.php");
    $id = $_GET['id']; 
    $posts_query = " SELECT * FROM posts WHERE id = '$id'";
        $posts_result= mysqli_query($conn,$posts_query) or die ("error");
        if(mysqli_num_rows($posts_result)> 0){
            while($posts = mysqli_fetch_assoc($posts_result)){
                $id = $posts['id'];
                $title = $posts['title'];
                $description = $posts['description'];
                $category = $posts['category'];
            }
        }
?>

<?php include("header.php");?>
<div class="container">

    <form class="form-horizontal mt-4" action="update.php" 
    method="POST" enctype="multipart/form-data">
    <input type = "hidden" name="id" value = <?php echo $id;?>>
        <fieldset>
            <legend>UPDATE POST</legend>
            <hr>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title" class="col-lg-3 col-form-label"><strong>Title </strong></label>
                        <div class="col-lg-9">
                            <input type="text" name="title" value=<?php echo $title;?> class="form-control" placeholder="Enter Title">
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title" class="col-lg-3 col-form-label"><strong> Enter Description <strong></label>
                        <div class="col-lg-9">
                           <textarea class="form-control" row="10" cols="10" 
                           name="description" placeholder="Description">
                           <?php echo $description;?></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="category" class="col-lg-3 col-form-label"> Category </label>
                    <div class="col-lg-9">
                        <select name="category" class="form-control">
                        <option value=<?php echo $category;?>><?php echo $category;?></option>
                            <option value="Entertainment">Entertainment</option>
                            <option value="Technology">Technology </option>
                            <option value="Sports">Sports</option>
                            <option value="Politics">Politics</option>
                    </div>
                    </div>
                </div>
            </div>

           
            <hr>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                    
                        <div class="col-lg-14 mt-4" >
                            <input  type="submit" name="Post" value="Update Post" 
                            value="Add Profile" class="btn btn-success">
                            <a href=dashboard.php class="btn btn-danger">Back</a>
                        </div>
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="form-group">
                    <div class="col-lg-6">
                        <?php if(isset($_POST["Post"])):?>
                        <div class="alert alert-dismissible alert-warning"></div>
                        <div>
                            <p><?php echo $error;?></p>
                        </div>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </fieldset>
    </form>
</div>
</body>

</html>

<?php endif;?>