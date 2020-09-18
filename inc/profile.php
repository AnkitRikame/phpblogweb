<?php session_start();?>

<?php
include("../config/db.php");
if(isset($_POST["profile"])){
    $profession = $_POST["profession"];
    $gender = $_POST["gender"];

    if($profession != '' && $gender != ''){

        $sql = "INSERT INTO profile (profession,gender,user_role) VALUES ('$profession','$gender',1)";
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


<?php include("header.php");?>

<div class="container">

    <form class="form-horizontal mt-4" action="dashboard.php" method="POST">
        <fieldset>
            <legend>ADD PROFILE</legend>

            <div class="row">
                <div class="col-md-6">

                    <div class="form-group">
                        <label for="profession" class="col-lg-2 col-form-label">Profession</label>
                        <div class="col-lg-10">
                            <input type="text" name="profession" class="form-control-plaintext" placeholder="Enter profession">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">

                    <div class="form-group">
                        <label for="gender" class="col-lg-2 col-form-label">Gender</label>
                        <div class="col-lg-10">
                            <input type="gender" name="gender" class="form-control-plaintext"
                                placeholder="Enter Your Gender">
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="col-lg-10">

                            <input type="submit" name="profile" value="Add Profile" class="btn btn-primary">
                            <button type="reset" class="btn btn-default"> Cancel</button>
                        </div>
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="form-group">
                    <div class="col-lg-6">
                        <?php if(isset($_POST["profile"])):?>
                        <div class="alert alert-dismissible alert-warning"></div>
                        <div>
                            <p><?php echo '$error;'?></p>
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

<?php include("footer.php")?>