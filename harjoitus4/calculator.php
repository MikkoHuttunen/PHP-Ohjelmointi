<?php
    if (isset($_POST['summa'])) {
        if (empty($_POST['luku1']) || empty($_POST['luku2'])) {
            echo 'Et syöttänyt lukua kenttään Luku1 tai Luku2';
        } else {
            echo('Lukujen summa on ' . ($_POST['luku1'] + $_POST['luku2']));
        }
    }

    else if (isset($_POST['tulo'])) {
        if (empty($_POST['luku1']) || empty($_POST['luku2'])) {
            echo 'Et syöttänyt lukua kenttään Luku1 tai Luku2';
        } else {
            echo('Lukujen tulo on ' . ($_POST['luku1'] * $_POST['luku2']));
        }
    }
?>