<?php
    include "lib.php";

    session_start();
    session_unset();
    
    if (isset($_POST['accedi'])) {
        $idapple = trim($_POST["idapple"]);
        $pswd = trim($_POST["pswd"]);
    
        if (empty($idapple) || empty($pswd)) {
            Redirect("index.php?error=1");
        }

        $result = PerformQuery("SELECT password, nome, cognome FROM utenti WHERE id_apple = '$idapple'");
        if ($result->num_rows == 0) {
            Redirect("index.php?error=2");
        }

        $row = $result->fetch_row();

        if ($row[0] == hash("md5", $pswd)) {
            $_SESSION['user'] = $row[1] . " " . $row[2];
            Redirect("home.php");
        } else {
            Redirect("index.php?error=3");
        }
    } else if (isset($_POST['portale-registrati'])) {
        Redirect("registrati.php");
    } else if (isset($_POST['registrati'])) {
        $idapple = trim($_POST["idapple"]);
        $pswd = trim($_POST["pswd"]);
        $nome = trim($_POST["nome"]);
        $cognome = trim($_POST["cognome"]);
    
        if (empty($idapple) || empty($pswd) || empty($nome) || empty($cognome) ) {
            Redirect("registrati.php?error=1");
        }

        $result = PerformQuery("SELECT password, nome, cognome FROM utenti WHERE id_apple = '$idapple'");
        if ($result->num_rows == 0) {
            $pswd = hash("md5", $pswd);
            PerformQuery("INSERT INTO utenti (nome, cognome, id_apple, password) VALUES ('$nome', '$cognome', '$idapple', '$pswd')");
            $_SESSION['user'] = $nome . " " . $cognome;
            Redirect("home.php");
        } else {
            Redirect("registrati.php?error=2");
        }
    } else if (isset($_POST['portale-index'])) {
        Redirect("index.php");
    } else {
        Redirect("index.php?error=4");
    }
?>