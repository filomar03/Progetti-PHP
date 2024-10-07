<?php
    include 'lib.php';

    session_start();
    
    if (!isset($_SESSION['logged'])) {
        Redirect("index.php");
    }

    if (!isset($_POST['add'])) {
        Redirect("products.php");
    }

    $name = trim($_POST['name']);
    $brand = trim($_POST['brand']);
    $desc = trim($_POST['desc']);
    $price = trim($_POST['price']);
    $image_url = trim($_POST['image']);
    $_POST = array();

    if (empty($name) || empty($brand) || empty($desc) || empty($price)) {
        RedirectError("products.php", 1);
    }

    if (!is_numeric($price)) {
        RedirectError("products.php", 2);
    }

    if (strlen($name) > 32) {
        RedirectError("products.php", 3);
    }

    if (strlen($brand) > 16) {
        RedirectError("products.php", 4);
    }

    if (strlen($desc) > 512) {
        RedirectError("products.php", 5);
    }

    $sql = "INSERT INTO products (name, brand, seller, seller_id, description, price, image_url) VALUES ('$name', '$brand', '$_SESSION[username]', '$_SESSION[user_id]', '$desc', '$price', '$image_url')";
    PerformQuery($sql);
    RedirectSuccess("products.php", true);
?>