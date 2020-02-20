<html>
<body>
    <h1>Vieraskirja</h1>
    <form action="vkirja.php" method="post">
        Nimesi: <input name="nimi"><br><br>
        Viestisi: <textarea name="viesti" size="50" rows="3"></textarea><br><br>
        <img src="captcha.jpg"><br><br>
        Kuvan teksti: <input name="captcha"><br/><br>
        <input type="submit" value=" Jätä viesti ">
    </form>
    <h3>Viestit:</h3>
    <?php include ('vkirja.txt'); ?>
    <hr>
</body>
</html>
<?php
    if (isset($_POST['nimi']) && isset($_POST['viesti']) && $_POST['captcha'] === '6138B') {
        $nimi = $_POST['nimi'];
        $viesti = $_POST['viesti'];
        $uusirivi = '<p><b>' . date('d.m.Y H:i') . ', ' .
        filter_var($nimi, FILTER_SANITIZE_STRING) . '</b>: ' . filter_var($viesti, FILTER_SANITIZE_STRING) .
        '</p>';
        $viestit = lueTdsto();
        kirjoitaTdsto($uusirivi, $viestit);
    }

    function lueTdsto() {
        $file = fopen('vkirja.txt','r');
        $viestit = fread($file,'9999');
        fclose($file);
        return $viestit;
    }

    function kirjoitaTdsto($entry, $oldentries) {
        $tiedosto = fopen('vkirja.txt', 'w');
        fwrite($tiedosto, $entry);
        fclose($tiedosto);
        $tiedosto = fopen('vkirja.txt', 'a');
        fwrite($tiedosto, $oldentries);
        fclose($tiedosto);
    }
?>