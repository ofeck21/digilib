<?php 
require_once 'config.php';

if (!empty($_SESSION['digilib'])) {
	if ($_SESSION['digiAkses'] == 2) {
		header('location:user/');
	}else if ($_SESSION['digiAkses'] == 1) {
		header('location:admin/');
	}
}

if (isset($_POST['daftar'])) {
	$noreg = $_POST['noreg'];
	$nama = $_POST['nama'];
	$username = $_POST['username'];
	$password = md5($_POST['password']);

	$cek = mysqli_query($con, "SELECT * FROM users WHERE noreg='$noreg'");
	$row = mysqli_fetch_assoc($cek);

	if(mysqli_num_rows($cek)>0){
		if ($row['reg']==0) {
			$sql = "UPDATE users SET nama='$nama', username='$username', password='$password', akses=2, reg=1 WHERE id_user=$row[id_user] ";
			if (mysqli_query($con, $sql)) {
					$_SESSION['digilib']=$username;
					$_SESSION['digiAkses']=2;
					header('location:user/');
			}else{
				$error = 'Pendaftaran Gagal !';
			}
		}else{
			$error = 'Pendaftaran Gagal, Anda pernah mendaftar sebelumnya!';
		}
	}else{
		$error = 'Nomor Registrasi tidak ditemukan';
	}

}

require_once 'template/header.php';
require_once 'template/menu.php';
?>

	<div class="content">
		<div class="wrapper">
			<div class="register">
				<div class="header">
					<h3>Pendaftaran</h3>
				</div>
				<div class="reg-content">
					Silahkan isi form di bawah ini untuk melakukan pendaftaran !
					<hr>
					<form method="POST" action="" name="daftar" onsubmit="return validasi_daftar()">
						<input type="text" name="noreg" placeholder="Nomor Registrasi" required>
						<input type="text" name="nama" placeholder="Nama Lengkap" required>
						<input type="text" name="username" placeholder="Username" required>
						<input type="password" name="password" placeholder="Password" required>
						<input type="password" name="pass" placeholder="Password yang Sama" required>
						<input type="submit" name="daftar" value="DAFTAR">
					</form>
				</div>
			</div>
			<?php if (isset($_POST['daftar']) && !empty($error) ) {
					echo "<p class='warning wrapper'>";
					echo $error;
					echo "</p>";
				 } ?>
		</div>
	</div>

<?php require_once 'template/footer.php'; ?>