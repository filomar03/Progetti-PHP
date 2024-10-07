<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Progetto a piacere</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>
<body>
    <nav id="navbar">
        <div class="container">
            <ul>
                <div class="subcontainer">
                    <li><a href="home.php" style="padding-right: 1.35rem;"><img src="imgs/Apple.png" width="42" height="42"></a></li>
                    <li><h3><a class="item" href="prodotti.php?type=0">Mac</a></h3></li>
                    <li><h3><a class="item" href="prodotti.php?type=1">iPhone</a></h3></li>
                    <li><h3><a class="item" href="prodotti.php?type=2">iPad</a></h3></li>
                    <li><h3><a class="item" href="confronto.php?type=0">Confronto</a></h3></li>
                </div>
            </ul>
            <h3><a class="item2" href="home.php" id="login">Home</a></h3>
        </div>
    </nav>
    <section class="form-section">
        <form action="autenticazione.php" method="POST">
            <?php
                if (isset($_GET['error'])) {
                    $errors = array("Alcuni campi sono vuoti", "ID Apple già registrato");
                    $err_desc = $errors[$_GET['error'] - 1];
                    echo "<h4 class=error>$err_desc</h4>";
                }
            ?>
            <h2>Registrati</h2>
            <input id="text" type="text" name="nome" placeholder="Nome...">
            <input id="text" type="text" name="cognome" placeholder="Cognome...">
            <input id="text" type="text" name="idapple" placeholder="ID Apple...">
            <input id="text" type="password" name="pswd" placeholder="Password...">
            <input id="btn" type="submit" name="registrati" value="Registrati">
            <input id="btn" type="submit" name="portale-accedi" value="Accedi">
        </form>
    </section>
</body>
</html>