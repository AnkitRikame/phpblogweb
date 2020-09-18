<?php 
session_start();
include("../config/db.php");

    if(isset($_POST['delete'])){
        $id = $_POST['id'];
        $title = $_POST['title'];

        $sql = "DELETE FROM posts WHERE id = $id";
        $query = $conn->query($sql);
        if($query){
            header("location:dashboard.php");
        }


    //     $data = array(
    //         'id' => $id,
    //         'title' => $title,
    // );

    print_r($data);
}
?>