<?php
    include 'functions.php';

    $opiskelija = new Opiskelija('Matti', 'Meikäläinen', '010292-761P', 60);

    echo $opiskelija->getEtunimi() . ' ' . $opiskelija->getSukunimi() . ' on opiskelija jonka henkilötunnus on ' . $opiskelija->getHenkiloTunnus() . ' ja opintopistekertymä on ' . $opiskelija->getOp();
?>