<?php
    function Connect() {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "es 10 php marini 2";
    
        $connection = new mysqli($servername, $username, $password, $dbname);
        if ($connection->connect_error) {
            die("Connection error: " . $connection->connect_error . ". Error code: " . $connection->connect_errno) . "<br>";
        }

        return $connection;
    }

    function PerformQuery($sql_string) {
        $conn = Connect();

        $results = $conn->query($sql_string);
        if ($conn->error)
            die("Querying error: " . $conn->error . ". Error code: " . $conn->errno . "<br>");
        
        $conn->close();
        return $results;
    }

    function Read($sql) {
        $results = PerformQuery($sql);
        $queryrowsnumber = $results->num_rows;

        if ($queryrowsnumber == 0) { die(); }

        for ($i = 0; $i < $queryrowsnumber; $i++) {
            $row = $results->fetch_assoc();
            echo "<div class='product'>";
            echo "<div class='product-title'>";
            echo "<div class='product-header'>";
            echo "<h3 class='product-name'>Article name: " . $row['name'] . "</h3>";
            echo "<h3>Brand: " . $row['brand'] . "</h3>";
            echo "<h3>Sold by: " . $row['seller'] . "</h3>";
            echo "</div>";
            echo "<img src='" . $row['image_url'] . "' class='image'>";
            echo "</div>";
            echo "<div class='product-info'>";
            echo "<h3 id=price>Price: " . $row['price'] . "€</h3>";
            echo "<p>" . $row['description'] . "</p>";
            echo "</div>";
            echo "</div>";
        }
    }

    function ReadTable($sql) {
        $results = PerformQuery($sql);
        $queryrowsnumber = $results->num_rows;

        if ($queryrowsnumber == 0) { die(); }

        for ($i = 0; $i < $queryrowsnumber; $i++) {
            $row = $results->fetch_assoc();

            echo "<div class=pcontainer>";
            echo "<h5 class=pscontainer>Article id: " . $row['id'] . "</h5>";
            echo "<h5 class=pscontainer>" . $row['name'] . "</h5>";
            echo "<h5 class=pscontainer>" . $row['brand'] . "</h5>";
            echo "<h5 class=desc-wrap>" . $row['description'] . "</h5>";
            echo "<h5 class=pscontainer>" . $row['price'] . "€</h5>";
            echo "<img src='" . $row['image_url'] . "' class='pimage'>";
            echo "</div>";
        }
    }

    function ReadTable2($sql) {
        $results = PerformQuery($sql);
        $queryrowsnumber = $results->num_rows;

        if ($queryrowsnumber == 0) { die(); }

        echo "<table class=myprods>";
        echo "<thead>";
        echo "<tr>";
        echo "<th><h4>Id</h4></th>";
        echo "<th><h4>Name</h4></th>";
        echo "<th><h4>Brand</h4></th>";
        echo "<th><h4>Price</h4></th>";
        echo "<th><h4>Description</h4></th>";
        echo "<th><h4>Immagine</h4></th>";
        echo "</tr>";
        echo "</thead>";
        for ($i = 0; $i < $queryrowsnumber; $i++) {
            $row = $results->fetch_assoc();

            echo "<tr>";
            echo "<td><h5>" . $row['id'] . "</h5></td>";
            echo "<td><h5>" . $row['name'] . "</h5></td>";
            echo "<td><h5>" . $row['brand'] . "</h5></td>";
            echo "<td><h5 class=desc-wrap>" . $row['description'] . "</h5></td>";
            echo "<td><h5>" . $row['price'] . "€</h5></td>";
            echo "<td><img src='" . $row['image_url'] . "' class='pimage'></td>";
            echo "</tr>";
        }
        echo "</table>";
    }

    function Redirect($page) {
        header("Location: " . $page);
        die();
    }
    
    function RedirectError($page, $error_code) {
        header("Location: " . $page . "?error=" . $error_code);
        die();
    }

    function RedirectSuccess($page, $succes) {
        header("Location: " . $page . "?success=" . $succes);
        die();
    }

    function FixIndex($deleted_id) {
        $results = PerformQuery("SELECT id FROM products");

        for ($i = $deleted_id; $i <= $results->num_rows; $i++) {
            $targetid = $i + 1;
            PerformQuery("UPDATE products SET id = $i WHERE id = $targetid");
        }
        
        $ai = $results->num_rows + 1;
        PerformQuery("ALTER TABLE products AUTO_INCREMENT = $ai");
    }
?>