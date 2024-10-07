<?php
    session_start();
?>
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
            <?php
                if (isset($_SESSION['user'])) {
                    echo "<h3 style='margin-right:2rem; color: #fff;'>Bentornato " . $_SESSION['user'] . "</h3>";
                    echo "<h3><a class=item2 href=autenticazione.php id=login>Log out</a></h3>";
                } else {
                    echo "<h3><a class=item2 href=index.php id=login>Accedi</a></h3>";
                }
            ?>
        </div>
    </nav>
    <section class="s1">
        <h1 class="title">iMac</h1>
        <h1 class="rainbow">Viva il colore</h1>
        <div class="container"></div>
        <h1 class="text">A partire da 1499€</h1>
    </section>
</body>
</html>