<?php
    include "lib.php";
    
    session_start();
    
    if (!isset($_SESSION['logged'])) {
        Redirect("index.php");
    }

    if (!(isset($_POST['canc']) || isset($_POST['update']))) {
        Redirect("products2.php");
    } else {
        if (isset($_POST['canc'])) {
            $_POST = array();
            Redirect("products2.php");
        } else if (isset($_POST['update'])) {     
            $name = trim($_POST['name']);
            $brand = trim($_POST['brand']);
            $desc = trim($_POST['desc']);
            $price = trim($_POST['price']);
            $image_url = trim($_POST['image']);
            $id = $_SESSION['mod_id'];
            $_POST = array();

            if (empty($name) || empty($brand) || empty($desc) || empty($price)) {
                Redirect("home.php");
            }
        
            if (!is_numeric($price)) {
                Redirect("home.php");
            }
        
            if (strlen($name) > 32) {
                Redirect("home.php");
            }
        
            if (strlen($brand) > 16) {
                Redirect("home.php");
            }
        
            if (strlen($desc) > 512) {
                Redirect("home.php");
            }

            $sql = "UPDATE products SET name = '$name', brand = '$brand', description = '$desc', price = '$price', image_url = '$image_url' WHERE id = '$id'";
            PerformQuery($sql);
            Redirect("home.php");
        }
    }
?>