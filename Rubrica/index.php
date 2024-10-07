<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Address book</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
</head>
<body>
    <h1 style="text-align: center; margin-top: 30px;" class="resize">Create new contact</h1>
    <form action="insert.php" method="POST">
        <input class="center" type="text" name="fname" placeholder="Name">
        <input class="center" type="text" name="lname" placeholder="Surname">
        <input class="center" type="text" name="number" placeholder="Cell number">
        <input class="center" type="button" value="Submit">
        <input class="center" type="reset" value="Reset">
    </form>
    <h1 style="text-align: center; margin-top: 50px;" class="resize">Consult existing contacts</h1>
    <form action="Search.php" method="POST" style="text-align: center;">
        <label style="margin-top: 2.5vh; width: 25vw; height: 5vh; font-size: 2.5vh; display:block; margin:auto;" for="filter">Filter by surname</label>
        <input style="margin-top: 0.5vh; width: 25vw; height: 5vh; font-size: 2.5vh;" type="text" placeholder="Surname" name="filter">
        <input style="margin-top: 0.5vh; width: 7.5vw; height: 5vh; font-size: 2.5vh;" type="button" value="Filter">
    </form>
    <?php
        include 'lib.php';

        Read("SELECT id, name, surname, number FROM contacts", 1);
    ?>
    <script src="main.js"></script>
</body>
</html>