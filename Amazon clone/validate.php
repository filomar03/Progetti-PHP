<?php
    include "lib.php";

    //resume session
    session_start();

    //check if client arrived here legally
    if (!(isset($_POST['log_in']) || isset($_POST['register']))) {
        Redirect("index.php");
    } else {
        //check if logging or registering
        if (isset($_POST['log_in'])) {
            //obtain form variables
            $email = trim($_POST['email']);
            $password = trim($_POST['pswd']);
            $_POST = array();

            //check if fields are empty
            if (empty($email) || empty($password)) {
                RedirectError("index.php", 1);
            }

            //obtain matching users from db
            $results = PerformQuery("SELECT pswd, id, permissions, username FROM `users` WHERE email = '$email'");
            
            //check if user exist
            if ($results->num_rows == 1) {
                $row = $results->fetch_assoc();
                
                //check if credentials match
                if (hash("sha256", $password) == $row['pswd']) {
                    $_SESSION['logged'] = true;
                    $_SESSION['user_id'] = $row['id'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['permissions'] = $row['permissions'];
                    Redirect("home.php");
                } else {
                    RedirectError("index.php", 3);
                }
            } else {
                RedirectError("index.php", 2);
            }

        } else if (isset($_POST['register'])) {
            //obtain form variables
            $user = trim($_POST['username']);
            $email = trim($_POST['email']);
            $password = trim($_POST['pswd']);
            $password2 = trim($_POST['pswd_confirm']);
            $_POST = array();
        
            //check if fields are empty
            if (empty($user) || empty($email) || empty($password) || empty($password2)) {
                RedirectError("register.php", 1);
            }

            //check if form values overflow lenght limit
            if (strlen($user) > 16) {
                RedirectError("register.php", 3);
            }

            if (strlen($email) > 64) {
                RedirectError("register.php", 4);
            }

            //obtain matching users from db
            $results = PerformQuery("SELECT id FROM `users` WHERE email = '$email'");

            //check if email already exist in database
            if ($results->num_rows == 1) {
                RedirectError("register.php", 2);
            } else {
                //check if the two passwords are identical
                if ($password == $password2) {
                    $password = hash("sha256", $password);

                    PerformQuery("INSERT INTO users (username, email, pswd) VALUES ('$user', '$email', '$password')");
                    $_SESSION['logged'] = true;
                    $_SESSION['username'] = $user;
                    $_SESSION['permissions'] = 0;

                    $results = PerformQuery("SELECT id FROM users WHERE email = '$email'");
                    $_SESSION['user_id'] = $results->fetch_assoc()['id'];
                    
                    Redirect("home.php");
                } else {
                    RedirectError("register.php", 5);
                }
            }
        }
    }
?>