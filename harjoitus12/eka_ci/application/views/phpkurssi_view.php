<!--View osio hallinnoi mitä käyttäjä näkee verkkosivulla.-->
<html>
	<head>
		<!--Ladataan tyylitiedosto rootin assets -kansiosta.-->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/style.css" />
		<title><?php echo $page_title; ?></title>
	</head>
	<body>
		<!--Tulostetaan tieto tietokannasta.-->
		<?php foreach($result as $row):?>
		<h3><?php echo $row->title; ?></h3>
		<a href="<?php echo $there; ?>">To Another page</a>
		<p><?php echo $row->text; ?></p>
		<br />
		<?php endforeach;?>
		<!--Kalenteri toiminto.-->
		<p><?php echo $calendar ?></p>
	</body>
</html>