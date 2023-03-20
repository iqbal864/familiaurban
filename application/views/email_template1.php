<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
	Yang terhormat,
	<br><br>
	Bapak/Ibu <?= $nama ?>
	<br><br>
	Terima kasih atas kepercayaan Anda memilih kami, Familia Urban sebagai pilihan dalam memilih hunian idaman.
	<br>
	Pesan Anda akan segera kami proses melalui Tim Marketing. Mohon menunggu. Untuk informasi detail produk dari Familia Urban juga dapat diakses melalui platform media sosial Familia Urban di bawah.
	<br><br>
	Terima Kasih,
	<br>
	<img src="https://picture.rumah123.com/r123/premium/398x300-fit/developer/logo/developer-logo-timah-properti-01-1569998982.png" style="width:100px; height:auto;">
	<br>
	<b>Familia Urban</b>
	<br>
	<a href="familiaurban.com">familiaurban.com</a>
	<br>
	Telp <a href="tel:<?= $kontak['telp'] ?>"><?= $kontak['telp'] ?></a>, <a href="tel:<?= $kontak['no_wa'] ?>"><?= $kontak['no_wa'] ?></a>
	<br>
	Email <a href="mailto: <?= $kontak['email'] ?>"><?= $kontak['email'] ?></a>
	<br>
	<?= htmlentities($alamat['alamat']) ?>
	<br>
	<a href="<?= $alamat['link'] ?>">Buka Google Maps</a>
</body>

</html>
