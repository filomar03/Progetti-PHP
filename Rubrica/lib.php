<?php
    function Connect() {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "es 6 php marini";
    
        $connection = new mysqli($servername, $username, $password, $dbname);
        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        }

        return $connection;
    }

    function PerformQuery($sql_string) {
        $conn = Connect();

        $results = $conn->query($sql_string);
        if (!$results) {
            echo "Error: " . $conn->error;
            $conn->close();
            die();
        }

        $conn->close();
        return $results;
    }

    function Read($sql, $id_position_in_query) {
        $results = PerformQuery($sql);

        $id_index = $id_position_in_query - 1;
        
        echo "<table style='margin-top: 7.5vh'>";

        $queryrownumber = $results->num_rows;
        for ($i = 0; $i < $queryrownumber; $i++) {

            $row = $results->fetch_row();

            echo "<tr>";
            for ($j = 0; $j < count($row); $j++) {
                if ($j != $id_index) {
                    echo "<td>" . ucfirst($row[$j]) . "</td>";
                }
                if ($j == count($row) - 1) {
                    echo "<td><form action='Delete.php' method='POST'><input style='font-size: 3vh;' type='submit' name='remove' value='Delete'><input type='hidden' name='rowid' value='$row[$id_index]'></form></td>";
                }
            }
            echo "</tr>";
        }
        echo "</table>";
    }

    function FixIndex($startid) {
        $results = PerformQuery("SELECT id FROM contacts");

        for ($i = $startid; $i <= $results->num_rows; $i++) {
            $targetid = $i + 1;
            PerformQuery("UPDATE contacts SET id = $i WHERE id = $targetid LIMIT 1");
        }

        PerformQuery("ALTER TABLE contacts AUTO_INCREMENT = $results->num_rows");
    }
?>