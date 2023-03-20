<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
	Dear,
	<br><br>
	Mr/Mrs <?= $nama ?>
	<br><br>
	Thank you for your trust in choosing us, Familia Urban as your choice in choosing your dream residence.
	<br>
	We will immediately process your message through the Marketing Team. Please wait. Detailed product information from Familia Urban can also be accessed via the Familia Urban social media platform below.
	<br><br>
	Thank you,
	<br>
	<img src="https://picture.rumah123.com/r123/premium/398x300-fit/developer/logo/developer-logo-timah-properti-01-1569998982.png" style="width:100px; height:auto;">
	<br>
	<b>Familia Urban</b>
	<br>
	<a href="familiaurban.com">familiaurban.com</a>
	<br>
	Tel <a href="tel:<?= $kontak['telp'] ?>"><?= $kontak['telp'] ?></a>, <a href="tel:<?= $kontak['no_wa'] ?>"><?= $kontak['no_wa'] ?></a>
	<br>
	Email <a href="mailto: <?= $kontak['email'] ?>"><?= $kontak['email'] ?></a>
	<br>
	<?= htmlentities($alamat['alamat']) ?>
	<br>
	<a href="<?= $alamat['link'] ?>">Open Google Maps</a>
</body>

</html>
