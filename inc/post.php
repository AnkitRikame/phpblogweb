<?php session_start();?>
<?php 
include("../config/db.php");
if(isset($_POST["Post"])){
    // $id = $_POST["id"];
    $title = $_POST["title"];
    $description = $_POST["description"];
    $category = $_POST["category"];

    if($title != "" && $description != "" && $category !=""){
        $sql= "INSERT INTO posts (title,description,category,user_role) VALUES ('$title','$description','$category',1)";
        
         $query = $conn->query($sql);        
        if($query){
            header('Location:dashboard.php');
        }
        else{
            $error = "Failed to Register User";
        }
    }
    else{
           $error ="Failed to Register User";
    }
}
?>

<?php if(!isset($_SESSION['username'])):?>
    <?php header('Location:dashboard.php');?>
<?php else:?>



<?php include("header.php");?>
<div class="container">

    <form class="form-horizontal mt-4" action="post.php" 
    method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>ADD POST</legend>
            <hr>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title" class="col-lg-3 col-form-label"><strong>Title </strong></label>
                        <div class="col-lg-9">
                            <input type="text" name="title" class="form-control" placeholder="Enter Title">
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
                           name="description" placeholder="Description"></textarea>
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
                            <option >Select</option>
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
                            <input  type="submit" name="Post" value="Add Post" 
                            value="Add Profile" class="btn btn-success">

                            <input type="reset" name ="Cancel" class="btn btn-primary"/>
                            
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

