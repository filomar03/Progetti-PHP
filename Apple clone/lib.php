<?php
    function Connect() {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "progetto a piacere apple";
    
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

    function ReadTable($sql) {
        $results = PerformQuery($sql);
        $queryrowsnumber = $results->num_rows;

        if ($queryrowsnumber == 0) { die(); }

        for ($i = 0; $i < $queryrowsnumber; $i++) {
            $row = $results->fetch_assoc();

            echo "<div class=pcontainer>";
            echo "<h5 class=pscontainer>Modello: " . $row['modello'] . "</h5>";
            echo "<img src='" . $row['foto'] . "' class='pimage'>";
            echo "<h5 class=pscontainer>Prezzo: " . $row['prezzo'] . "€</h5>";
            echo "</div>";
        }
    }

    function ReadInfo($id) {
        $results = PerformQuery("SELECT * FROM prodotti WHERE id = '$id'");
        $info = $results->fetch_assoc();

        echo "<div class='comp-box'>";
        echo "<div class='pname'>";
        echo "<h1><span class=text-style>Modello: </span>" . $info['modello'] . "</h1>";
        echo "</div>";
        echo "<div class='pinfo'>";
        echo "<img src='" . $info['foto'] . "' class='pi-image'>";
        echo "<h3><span class=text-style>Tecnologia schermo: </span>" . $info['tecnologia_schermo'] . "</h3>";
        if ($info['tecnologia_schermo'] != "non integrato") {
            echo "<h3><span class=text-style>Dimensione schermo: </span>" . $info['dimensione_schermo'] . "\"</h3>";
        }
        echo "<h3><span class=text-style>Memoria RAM: </span>" . $info['ram'] . "GB</h3>";
        echo "<h3><span class=text-style>Memoria di archiviazione: </span>" . $info['archiviazione'] . "GB</h3>";
        echo "<h3><span class=text-style>Connettività: </span>" . $info['connettività'] . "</h3>";
        echo "<h3><span class=text-style>Prezzo: </span>" . $info['prezzo'] . "€</h3>";
        echo "</div>";
        echo "</div>";

    }

    function Redirect($page) {
        header("Location: " . $page);
        die();
    }
?>