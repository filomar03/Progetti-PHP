<?php
    include 'lib.php';

    echo "<a href='index.php'>Main page</a> <br>";
    
    if (isset($_POST['remove'])) {
        $rowid = $_POST['rowid'];
        $_POST = array();

        $sql = "DELETE FROM contacts WHERE id = $rowid";
        PerformQuery($sql);
        FixIndex($rowid);
        echo "Contact removed";
    }
?>