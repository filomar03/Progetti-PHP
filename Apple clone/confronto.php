<?php
    session_start();
    
    include "lib.php";

    if (!isset($_SESSION['user'])) {
        Redirect("autenticazione.php");
    }

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
                    <li><h3><a class="current" href="confronto.php?type=0">Confronto</a></h3></li>
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
    <?php
        if (isset($_GET['p1']) && isset($_GET['p2'])) {
            Redirect("confronto-finale.php?p1=" . $_GET['p1'] . "&p2=" . $_GET['p2']);
        }
    ?>
    <section id="seleziona-comparazione">
    <h1 id="confronta-titolo">Confronta tra:</h1>
    <div class="dropdown-container">
        <div class="dropdown">
            <button class="dropbtn"><?php
            $tipi = array("Mac", "iPhone", "iPad");
            echo $tipi[$_GET['type']];
            ?></button>
            <div class="dropdown-items">
                <a href="confronto.php?type=0">Mac</a>
                <a href="confronto.php?type=1">iPhone</a>
                <a href="confronto.php?type=2">iPad</a>
            </div>
        </div>
    </div>
    </section>
    <section id="comparazione">
        <div class="dropdown-container">
            <div class="dropdown">
                <button class="dropbtn"><?php 
                if (!isset($_GET['p1'])) {
                    echo "Seleziona un prodotto";
                } else {
                    $results = PerformQuery("SELECT modello FROM prodotti WHere id LIKE '$_GET[p1]'");
                    echo $results->fetch_assoc()['modello'];
                }
                ?></button>
                <div class="dropdown-items">
                    <?php
                        $tipo = $tipi[$_GET['type']];
                        $results = PerformQuery("SELECT id, modello FROM prodotti WHERE tipo LIKE '$tipo'");
                        for($i = 0; $i < $results->num_rows; $i++) {
                            $prodotto = $results->fetch_assoc();
                            if (isset($_GET['p2'])) {
                                if ($prodotto['id'] != $_GET['p2']) {
                                    echo "<a href=confronto.php?type=" . $_GET['type'] . "&p1=" . $prodotto['id'] . "&p2=" . $_GET['p2'] . ">" . $prodotto['modello'] . "</a>";
                                }
                            } else {
                                echo "<a href=confronto.php?type=" . $_GET['type'] . "&p1=" . $prodotto['id'] . ">" . $prodotto['modello'] . "</a>";
                            }
                        }
                    ?>
                </div>
            </div>
            <div class="dropdown">
                <button class="dropbtn"><?php 
                    if (!isset($_GET['p2'])) {
                        echo "Seleziona un prodotto";
                    } else {
                        $results = PerformQuery("SELECT modello FROM prodotti WHere id LIKE '$_GET[p2]'");
                        echo $results->fetch_assoc()['modello'];
                    }
                ?></button>
                <div class="dropdown-items">
                    <?php
                        $tipo = $tipi[$_GET['type']];
                        $results = PerformQuery("SELECT id, modello FROM prodotti WHERE tipo LIKE '$tipo'");
                        for($i = 0; $i < $results->num_rows; $i++) {
                            $prodotto = $results->fetch_assoc();
                            if (isset($_GET['p1'])) {
                                if ($prodotto['id'] != $_GET['p1']) {
                                    echo "<a href=confronto.php?type=" . $_GET['type'] . "&p1=" . $_GET['p1'] . "&p2=" . $prodotto['id'] . ">" . $prodotto['modello'] . "</a>";
                                }
                            } else {
                                echo "<a href=confronto.php?type=" . $_GET['type'] . "&p2=" . $prodotto['id'] . ">" . $prodotto['modello'] . "</a>";
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </section>
</body>
</html>