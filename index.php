<?php require_once 'config.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<link rel="icon" type="img/icon" href="assets/img/logo.png">
	<title>Digital Library - Universitas Islam Madura</title>
	<link rel="stylesheet" type="text/css" href="assets/css/index-style.css">
</head>
<body>
	<div class="headline">
		<div class="line-top"></div>
		<div class="container">
			<div class="login-anggota">

				<?php 
				if (!empty($_SESSION['digilib'])) {
					if ($_SESSION['digiAkses'] == 2) { ?>
						<a href="user/">Profile</a> -  
						<a href="logout.php">Keluar</a>
					<?php }else if ($_SESSION['digiAkses'] == 1) { ?>
						<a href="admin/">Admin</a> -  
						<a href="logout.php">Keluar</a>
					<?php }
				} else{ ?>
				<a href="login.php">Masuk</a> -  
				<a href="register.php">Daftar</a>
				<?php } ?>
			</div>
		</div>
	</div>
	<div class="content">
		<div class="container">
			<img src="assets/img/digilib.png" width="600">
			<form method="GET" action="" class="form">
				<input type="text" name="q" placeholder="Masukan kata kunci">
				<input type="submit" name="cari" value="CARI">
			</form>
			<div class="lebih-lanjut">
				<a href="?lebihlanjut">Pencarian Lebih Lanjut</a>
			</div>
		</div>
	</div>
<?php require_once 'template/footer.php'; ?>