<?php
    include "lib.php";

    session_start();
    
    if (!isset($_SESSION['logged'])) {
        Redirect("index.php");
    }
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
        <form action="insert.php" method="POST" class="container" enctype="multipart/form-data">
            <?php
                if (isset($_GET['success'])) {
                    echo "<h4 class='success'>Product added correctly</h4>";
                }
            ?>
            <h4 class='info'>Name</h4>    
            <div class="container2">
                <h4 class="pref">└</h4><input type="text" name="name" placeholder="Product name...">
            </div>
            <h4 class='info'>Brand</h4>
            <div class="container2">
                <h4 class="pref">└</h4><input type="text" name="brand" placeholder="Product brand...">
            </div>
            <h4 class='info'>Description</h4>
            <div class="container2">
                <h4 class="pref">└</h4><input type="text" name="desc" placeholder="Product description...">
            </div>
            <h4 class='info'>Price</h4>
            <div class="container2">
                <h4 class="pref">└</h4><input type="text" name="price" placeholder="Product price...">
            </div>
            <h4 class='info'>Image</h4>
            <div class="container2">
                <h4 class="pref">└</h4><input type="text" name="image" placeholder="Product image link...">
            </div>
            <?php
                if (isset($_GET['error'])) {
                    $errors = array("fields cannot be left blank", "price must be numeric", "name is too long", "brand is too long", "description is too long");
                    $err_desc = $errors[$_GET['error'] - 1];
                    echo "<h4 class='error'>" . $err_desc . "</h4>";
                }
            ?>
            <input type="submit" value="Add product" id="submit" name="add">
        </form>
    </section>
</body>
</html>