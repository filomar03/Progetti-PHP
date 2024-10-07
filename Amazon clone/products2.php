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
    <link rel='stylesheet' type='text/css' media='screen' href='control2.css'>
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
                    <li><h4><a href="home.php">back to home</a></h4></li>
                    <li><h4><a href="index.php">log out</a></h4></li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- Section-1 -->
    <section>
        <form action="modify.php" method="POST">
            <div class="container">
                <?php
                    if (isset($_GET['success'])) {
                        echo "<h4 class='success'>Product removed correctly</h4>";
                    }

                    if (isset($_GET['error'])) {
                        $errors = array("id cannot be left blank/id must be a number", "specified id doesn't exist", "that product doesn't belong to you");
                        $err_desc = $errors[$_GET['error'] - 1];
                        echo "<h4 class='error'>" . $err_desc . "</h4>";
                    }
                ?>
                <h1>enter the id of the desired article:</h1>
                <div class="container2">
                    <input class="input" type="text" name="pid" placeholder="id...">
                    <input class="btn" type="submit" name="modify" value="Modify">
                    <input class="btn" type="submit" name="remove" value="Remove">
                </div>
            </div>
        </form>
    </section>

    <!-- Section 2 -->    
    <section>
        <div class="table-container">
            <?php
                if ($_SESSION['permissions'] == 0) {
                    ReadTable("SELECT id, name, brand, description, price, image_url FROM products WHERE seller_id = '$_SESSION[user_id]'");
                } else {
                    ReadTable("SELECT id, name, brand, description, price, image_url FROM products");
                }
            ?>
        </div>
    </section>
</body>
</html>