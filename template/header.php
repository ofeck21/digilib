<!DOCTYPE html>
<html>
<head>
	<title>Digital Library - Universitas Islam Madura</title>
	<link rel="icon" type="img/icon" href="<?php echo PATH; ?>/assets/img/logo.png">
	<link rel="stylesheet" type="text/css" href="<?php echo PATH; ?>/assets/css/style.css">
	<script>
	function validasi_daftar() {
	    var password = document.forms["daftar"]["password"].value;
	    var pass = document.forms["daftar"]["pass"].value;
	    if (password != pass) {
	        alert("Password Harus Sama");
	        return false;
	    }
	}
	</script>
</head>
<body>
	<div class="header">
		<div class="wrapper">
			<a href="<?php echo(PATH); ?>"><img src="<?php echo PATH; ?>/assets/img/digilib.png" width="300"></a>
		</div>
	</div>