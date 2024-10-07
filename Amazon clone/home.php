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
    <link rel='stylesheet' type='text/css' media='screen' href='home.css'>
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
                    <li><h4><a href="products.php">add a product</a></h4></li>
                    <li><h4><a href="products2.php">Modify a product</a></h4></li>
                    <li><h4><a href="index.php">log out</a></h4></li>
                </ul>
            </div>
        </nav>
    </header>
    
    <!-- Section-1 -->
    <section>
        <form action="search.php" method="POST" class="search-bar">
            <h2 id="title">Filter products by name</h2>
            <div class="search-div">
                <input type="text" name="name" id="filter" placeholder="filter string..." required>
                <input type="submit" id="filter-apply" value="Apply">
            </div>
        </form>
        <div class="products-container">
            <?php
                Read("SELECT name, brand, seller, description, price, image_url FROM `products` WHERE 1");
            ?>
        </div>
    </section>
</body>
</html>