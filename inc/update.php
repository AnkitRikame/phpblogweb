<?php  session_start();
?>
<?php
include("../config/db.php");
if(isset($_POST["Post"])){
    // $id = $_POST["id"];
    $post_id = $_POST["id"];
    $title = $_POST["title"];
    $description = $_POST["description"];
    $category = $_POST["category"];

    if($title != "" && $description != "" && $category !=""){
        $sql= "UPDATE posts 
        SET title = '$title',description ='$description', category = '$category' WHERE id = '$post_id'";

        
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
