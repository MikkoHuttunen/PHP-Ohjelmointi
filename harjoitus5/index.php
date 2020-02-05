<!DOCTYPE html>
<html>
<head>
<title>Tehtävä 5</title>
</head>
<body>
    <p><b>Mitä ohjelmointikieliä osaat?</b></p>
    <form action='send.php' method='post'>
        <select name='planguages[]' multiple size='5'>
            <option value='C'>C</option>
            <option value='C#'>C#</option>
            <option value='C++'>C++</option>
            <option value='Java'>Java</option>
            <option value='PHP'>PHP</option>
            <option value='Javascript'>Javascript</option>
            <option value='Python'>Python</option>
        </select>
        <input type='submit' value='Lähetä' />
    </form>
</body>
</html>