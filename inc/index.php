<?php
include("../config/db.php");
if(isset($_POST["register"])){
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    if($username != '' && $email != '' && $password != ''){

        $pwd_hash = sha1($password);
        $sql = "INSERT INTO users (username,email,password,user_role) VALUES ('$username','$email','$pwd_hash',0)";
        $query = $conn->query($sql);        
        if($query){
            header('Location:view.php');
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
        <form class="form-horizontal" action="view.php" method="POST">
            <fieldset>
                <legend>REGISTER USER</legend>

                <div class="row">
                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="username" class="col-lg-2 col-form-label">Username</label>
                            <div class="col-lg-10">
                                <input type="text" name="username" class="form-control-plaintext"
                                    placeholder="Enter Username">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="email" class="col-lg-2 col-form-label">Email</label>
                            <div class="col-lg-10">
                                <input type="email" name="email" class="form-control-plaintext"
                                    placeholder="Enter Email">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="password" class="col-lg-2 col-form-label">Password</label>
                            <div class="col-lg-10">
                                <input type="password" name="password" class="form-control-plaintext"
                                    placeholder="Enter Password">
                            </div>
                        </div>
                    </div>
                </div>



                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="col-lg-10">

                                <input type="submit" name="register" value="Register" class="btn btn-primary">
                                <button type="reset" class="btn btn-default"> Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="row">
                    <div class="form-group">
                        <div class="col-lg-6">
                            <?php if(isset($_POST["register"])):?>
                            <div class= "alert alert-dismissible alert-warning"></div>
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

<?php include("footer.php")?>