<?php
    include "lib.php";

    session_start();
    
    if (!isset($_SESSION['logged'])) {
        Redirect("index.php");
    }

    $id = $_GET['id'];
    unset($_SESSION['mod_id']);
    $_SESSION['mod_id'] = $id;

    if (!is_numeric($id)) { RedirectError("products2.php", 1); }

    $results = PerformQuery("SELECT seller_id FROM products WHERE id = '$id'");
    if ($results->num_rows == 0) { RedirectError("products2.php", 2); }

    if ($results->fetch_assoc()['seller_id'] != $_SESSION['user_id'] && $_SESSION['permissions'] < 1) { RedirectError("products2.php", 3); }

    $results = PerformQuery("SELECT name, brand, description, price, image_url FROM products WHERE id = '$_GET[id]'");
    $prod_info = $results->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Amazon dei poveri</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='control.css'>
</head>
<body>
    <!-- Navbar -->
    <header>
        <nav id="navbar">
            <div class="container">
                <div class="container">
                    <h1>amazon dei poveri</h1>
                    <?php
                        echo "<h4 class='name'>welcome back " . $_SESSION['username'] . "</h4>";
                    ?>
                </div>
                <ul>
                    <li><h4><a href="home.php">back to home</a></h4></li>
                    <li><h4><a href="products2.php">Modify a product</a></h4></li>
                    <li><h4><a href="index.php">log out</a></h4></li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- Section-1 -->
    <section>
        <form action="update_handle.php" method="POST" class="container" enctype="multipart/form-data">
            <h4 class='info'>Name</h4>    
            <div class="container2">
                <h4 class="pref">└</h4><input type="text" name="name" value="<?php 
                echo $prod_info['name'];
                ?>">
            </div>
            <h4 class='info'>Brand</h4>
            <div class="container2">
                <h4 class="pref">└</h4><input type="text" name="brand" value="<?php 
                echo $prod_info['brand'];
                ?>">
            </div>
            <h4 class='info'>Description</h4>
            <div class="container2">
                <h4 class="pref">└</h4><input type="text" name="desc" value="<?php 
                echo $prod_info['description'];
                ?>">
            </div>
            <h4 class='info'>Price</h4>
            <div class="container2">
                <h4 class="pref">└</h4><input type="text" name="price" value="<?php 
                echo $prod_info['price'];
                ?>">
            </div>
            <h4 class='info'>Image</h4>
            <div class="container2">
                <h4 class="pref">└</h4><input type="text" name="image" value="<?php 
                echo $prod_info['image_url'];
                ?>">
            </div>
            <input type="submit" id="submit" value="Cancel" name="canc">
            <input type="submit" id="submit" value="Update product" name="update">
        </form>
    </section>
</body>
</html>