<?php
    echo 'Kiitos vastaamisesta! Olemme lähettäneet sähköpostissa listan osaamistasi ohjelmointikielistä!';
    $skills = implode('<br>', $_POST['planguages']);
    mail('admin@php-ohjelmointi.com', 'Kiitos vastaamisesta!', $skills);
?>