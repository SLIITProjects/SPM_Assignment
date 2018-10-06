<?php spl_autoload_register(function($class){
   include_once "../classes/".$class.".php";
});?>
<?php
    $admin = new Admin();
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $adminUser = $_POST['username'];
        $adminPass = md5($_POST['password']);

        $checkLogin = $admin->login($adminUser,$adminPass);
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Area</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for login page-->
    <link href="css/login.css" rel="stylesheet">
</head>

<body class="text-center">
<form class="form-signin" action="index.php" method="post" autocomplete="off">
<h1 class="text-center">Admin Login</h1>
    <span style="color:red">
            <?php
                if(isset($checkLogin)){
                    echo $checkLogin;
                }
            ?>
    </span>
    <div class="form-group">
    <label for="Username" class="sr-only">Username</label>
    <input type="text" name="username"  class="form-control" placeholder="Username" required autofocus>

    </div>
    <div class="form-group">
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" name="password" class="form-control" placeholder="Password" required>
    </div>

    <input class="btn btn-lg btn-primary btn-block" type="submit" value="Login">
</form>
</body>
</html>