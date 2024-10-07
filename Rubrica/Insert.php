<?php
    include 'lib.php';

    echo "<a href='index.php'>Main page</a> <br>";

    $name = strtolower(trim($_POST['fname']));
    $surname = strtolower(trim($_POST['lname']));
    $phone_number = trim($_POST['number']);
    $_POST = array();
    
    if (empty($name) || empty($surname) || empty($phone_number))
        die("No field/s can be left blank");
    else if (!is_numeric($phone_number))
        die("Phone number cannot contain letters");

    $sql ="SELECT id FROM contacts WHERE number = $phone_number";
    $results = PerformQuery($sql);
    
    if ($results->num_rows == 1)
        die("A contact with the specified phone number is already registered");

    $sql = "INSERT INTO contacts (name, surname, number) VALUES ('$name', '$surname', '$phone_number')";
    PerformQuery($sql);
    die("Contact added");
?>