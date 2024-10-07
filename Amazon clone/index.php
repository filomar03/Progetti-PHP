<?php
    //start session e reset 
    session_start();
    session_unset();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Amazon dei poveri</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='login.css'>
</head>
<body>
    <div class="container">
        <form action="validate.php" method="POST">
            <h1>input your account credentials</h1>
            <input class="input" type="text" name="email" placeholder="Email...">
            <input class="input" type="password" name="pswd" placeholder="Password...">
            <?php
                //print the error if exist
                if (isset($_GET['error'])) {
                    $errors = array("fields cannot be left blank", "this email/user isn't registered yet", "wrong password");
                    $err_desc = $errors[$_GET['error'] - 1];
                    echo "<h4 class='error'>$err_desc</h4>";
                }
            ?>
            <input class="btn" type="submit" name="log_in" value="Log in">
        </form>
        <h3><a href="register.php" class="lbtn">Register</a></h3>
    </div>
</body>
</html>