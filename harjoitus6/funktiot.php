<?php
    if (isset($_POST['addbutton'])) {
        if (!file_exists('kansio')) {
            mkdir('kansio', 0777, true);
            fopen(__DIR__ . '/kansio/tiedosto.txt', 'w', 'tekstiä');
            echo 'Kansio luotu harjoitus6 -kansion sisään.';
        } else {
            echo 'Kansio on jo olemassa!';
        }
    }

    else if (isset($_POST['deletebutton'])) {
        if (!file_exists('kansio')) {
            echo 'Kansiota ei ole!';
        } else {
            unlink(__DIR__ . '/kansio/tiedosto.txt');
            rmdir(__DIR__ . '/kansio');
            echo 'Kansio poistettu.';
        }
    }
?>