<html>
<head>
<title>Muokkaa sivua</title>
<!-- Liitetään TinyMCE:n JS-koodi sivulle-->
<script type="text/javascript" src="tiny_mce/tiny_mce.js"></script>
<!-- Yksinkertainen TinyMCE -editori-ikkuna korvaa textarean näillä asetuksilla-->
<script type="text/javascript">
	tinyMCE.init({
		mode : "textareas",
		theme : "simple"
	});
</script>

</head>
<body>
	<?php
		session_start();

		if (@$_POST['username'] == 'kökkö' && $_POST['password'] == 'kökkö') {
			$_SESSION['username'] = $_POST['username'];
		}

		if (isset($_SESSION['username'])) {
	?>

	<p><a href="muokkaasivua.php">Muokkaa sivua</a> - <a href="naytasivu.php">Näytä sivu</a> - <a href="logout.php">Kirjaudu ulos</a></p>
	<form action="tallennasivu.php" method="post"> 

	<?php
		$tiedosto = "sivu.txt"; 
		//avataan $tiedosto
		$avattu = fopen ($tiedosto, "rb"); 
		//tiedosto luetaan fread-funktiolla muuttujaan $data
		$data = fread ($avattu, filesize($tiedosto)); 
		// suljetaan avattu tiedosto
		fclose ($avattu); 
		//tulostetaan data textareaan

	?>

	<!-- Textarea korvataan TinyMCE-editori-ikkunalla-->
	<textarea name="muokattu" rows="20" cols="80">

	<?php
	echo $data;
	//Toinen tapa tehdä sama homma kuin edellä
	//$tiedosto = "sivu.txt";
	//file-funktio lukee koko tiedoston taulukkoon.
	//$d=file($tiedosto);
	//taulukon kaikki rivit tulostetaan textareaan.
	//for ($i=0;$i<count($d);$i++){ 
	//echo  $d[$i]; } 
	?>

	</textarea><br>
	<input type="submit" value="tallenna">
	</form>
	<p>WWW-sivun muokkaus selaimella.</p>
	<p>Muokkaasivua.php lukee teksitiedoston sisällön textareaan. 
	Tallennasivu.php tallentaa textarean sisällön tekstitiedostoon ja heittää käyttäjän suoraan
	sivulle naytasivu.php, jolle tuodaan incluuderilla tekstitiedoston sisältö.

	<?php
		} else {
			print 'wrong username or/and password or login deprecated, because session is not used.';
		}
	?>
</body>
</html>
