<?php  

require_once 'config.php';

if (!empty($_SESSION['digilib'])) {
	if ($_SESSION['digiAkses'] == 2) {
		header('location:user/');
	}else if ($_SESSION['digiAkses'] == 1) {
		header('location:admin/');
	}
}

$error = array();

if (isset($_POST['login'])) {

	$username = $_POST['username'];
	$password = md5($_POST['password']);

	if (empty($username) OR empty($password)) {
		$error = 'Username atau Password tidak boleh kosong.';
	}else {
		//select users
		$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
		$result = mysqli_query ($con, $query);
		$row = mysqli_fetch_assoc($result);

		if (mysqli_num_rows($result) > 0) {
			if ($row['akses']==1) {
				$_SESSION['digilib']=$row['username'];
				$_SESSION['digiAkses']=$row['akses'];
				header('location:admin/');
			}elseif ($row['akses']==2) {
				$_SESSION['digilib']=$row['username'];
				$_SESSION['digiAkses']=$row['akses'];
				header('location:user/');
			}else{
				die('<h1>Akses ditolak.');
			}
		}else{
			$error = 'Login Gagal';
		}
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login - Digital Library - Universitas Islam Madura</title>
	<link rel="icon" type="img/icon" href="assets/img/logo.png">
	<link rel="stylesheet" type="text/css" href="assets/css/login-style.css">
</head>
<body>
	<div class="header">
		<div class="wrapper">
			<a href="<?php echo(PATH); ?>"><img src="assets/img/digilib.png" width="300"></a>
		</div>
	</div>
	<div class="content">
		<div class="login">
			<div class="login-header">
				<img src="assets/img/logo.png" width="90" class="logo">
				<h2>Login Area</h2>
			</div>
				<?php if (isset($_POST['login']) && !empty($error) ) {
					echo "<p class='warning wrapper'>";
					echo $error;
					echo "</p>";
				 } ?>
			<div class="login-content">
				<form method="POST" action="">
					<input type="text" name="username" placeholder="USERNAME" required>
					<input type="password" name="password" placeholder="PASSWORD" required>
					<input type="submit" name="login" value="LOGIN">
				</form>
			</div>
			<div class="login-footer">
				Belum Memiliki akun ? <a href="register.php">Daftar</a>
			</div>
		</div>
	</div>
	<?php require_once 'template/footer.php'; ?>