<html>
<head>
<title>Kirjaudu ulos</title>
</head>
<body>
    <?php
        session_start();
        session_destroy();
        unset($_SESSION['username']);
    ?>
    
    <p>Kirjauduit ulos onnistuneesti.</p>
    <p><a href="index.html">Takaisin etusivulle</a>
</body>
</html>
