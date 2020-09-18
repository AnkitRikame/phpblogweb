

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>


    <title>PHP BLOG </title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">

    <div class="col-lg-10">
        <a class="navbar-brand" href="#" style="color: #fff;">WELCOME TO ANKIT BLOG APPLICATION</a>
    </div>

    <div clas="col-lg-2">

    <div class="btn-group">
        <a href="#" class="btn btn-default" style="color: #fff;">Settings</a>
        <a href="#" class="btn btn-default dropdown-toggle" style="color: #fff;" 
        data-toggle="dropdown" aria-expaned="false">
        <span class="caret"></span>
        </a>

        <ul class="dropdown-menu" style="color:#0000;">

            <?php $login_url = 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF'];?>
            <?php if($login_url == 'http://127.0.0.1/phpblog/index.php'):?>    
            <li><a href=login.php>Login</a></li>    
           <?php elseif(isset($_SESSION['username'])):?> 
                <li><a href=dashboard.php>Dashboard</a></li>
                <li><a href=profile.php>Add Profile</a></li>
                <?php

                        if($_SESSION['id']==1){ ?>
                            <li><a href=post.php>Add Post </a></li>
                        <?php   }else{

                        }
                
                ?>
                
                <li><a href=logout.php>Logout </a></li> 
                 
           <?php else:?>
            <li><a href=index.php>Guest User </a></li> 
            <?php endif;?>
            <li><a href=login.php> Admin </a></li>
            
        </ul>
    </div>
    </div>
    </nav>
    </body>
    </html>