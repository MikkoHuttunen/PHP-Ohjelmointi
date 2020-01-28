<!DOCTYPE html>
<html>
<head>
<title>Tehtävä 4</title>
</head>
<body>
    <p><b>Laskin</b></p>
    <form method="post" action="calculator.php">
        <table>
            <tr> 
                <td>Luku1: <input type='text' name='luku1'></td>
            </tr>
            <tr>
                <td>Luku2: <input type='text' name='luku2'></td>
            </tr>
        </table>
        <br>
        <input type='submit' value="laske summa" name="summa">
        <input type='submit' value="laske tulo" name="tulo">
    </form>
    <br>
    <?php 
        include('./calculator.php');
    ?>
</body>
</html>