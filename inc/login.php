<?php
session_start();
include("../config/db.php");
if(isset($_POST["login"])){
    $email = $_POST["email"];
    $password = $_POST["password"];

    if($email != "" && $password != ""){
        $passwd = sha1($password);
        $sql="SELECT * FROM users WHERE email = '$email' AND password ='$passwd'";
        $result= mysqli_query($conn,$sql) or die('Error');

        if(mysqli_num_rows($result)> 0){
            while($row = mysqli_fetch_assoc($result)){
                $id = $row['id'];
                $username = $row['username'];
                $password = $row['password'];
                $email = $row['email'];

                $_SESSION['id']= $id;
                $_SESSION['username']= $username;
                $_SESSION['password']= $password;
                $_SESSION['email']= $email;

                header('Location:dashboard.php');


                // $data = array(
                //     'id' => $id,
                //     'username' => $username,
                //     'email' => $email,
                //     'password' => $password
                // );

                // echo '<pre>';
                // print_r($data);
                // echo '</pre>';
            }
            
        }
        else{
            $error = "Username or Password is Incoorect!";
        }
    }
    else{
            $error= "Please fill the details!";
        }
}

?>

<?php if(isset($_SESSION['username'])):?>
    <?php header('Location:dashboard.php');?>
<?php else:?>
<?php include("header.php");?>

<div class="container">

    <form class="form-horizontal mt-4" action="login.php" method="POST">
        <fieldset>
            <legend>LOGIN USER</legend>

            <div class="row">
                <div class="col-md-6">

                    <div class="form-group">
                        <label for="email" class="col-lg-2 col-form-label">Email</label>
                        <div class="col-lg-10">
                            <input type="email" name="email" class="form-control-plaintext" placeholder="Enter email">
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
                                placeholder="Enter password">
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="col-lg-10">

                            <input type="submit" name="login" value="Login" class="btn btn-primary">
                            <button type="reset" class="btn btn-default"> Cancel</button>
                        </div>
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="form-group">
                    <div class="col-lg-6">
                        <?php if(isset($_POST["login"])):?>
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

<?php include("footer.php")?>