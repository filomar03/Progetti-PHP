<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
</head>
<body>
    <a href="index.php">Main page</a>
    <?php
        include 'lib.php';

        $filterstr = strtolower(trim($_POST['filter']));
        $_POST = array();
        
        if (empty($filterstr)) {
            die("<br>Cannot leave the filter parameter blank");
        }

        Read("SELECT id, name, surname, number FROM contacts WHERE surname LIKE '%$filterstr%'", 1);
    ?>
</body>
</html>