<?php
    include 'lib.php';

    session_start();
    
    if (!isset($_SESSION['logged'])) {
        Redirect("index.php");
    }

    if (!(isset($_POST['modify']) || isset($_POST['remove']))) {
        Redirect("products2.php");
    } else {
        if (isset($_POST['modify'])) {
            Redirect("update.php?id=$_POST[pid]");
        } else if (isset($_POST['remove'])) {
            $id = trim($_POST['pid']);
            $_POST = array();
        
            if (!is_numeric($id)) {
                RedirectError("products2.php", 1);
            }
        
            $results = PerformQuery("SELECT seller_id FROM products WHERE id = '$id'");
            if ($results->num_rows == 0) { RedirectError("products2.php", 2); }

            if ($results->fetch_assoc()['seller_id'] != $_SESSION['user_id']) {
                RedirectError("products2.php", 3);
            }

            PerformQuery("DELETE FROM products WHERE id = $id");
            //FixIndex($id); purtoppo ho dovuto commentarla se no mentre uno modificava un prodotto e contemporaneamente un altro ne eliminava uno con un id precedente scalavano gli id e modificavi il successivo
            RedirectSuccess("products2.php", true);
        }
    }
?>