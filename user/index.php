
<?php 
require_once '../config.php';
if (empty($_SESSION['digilib'])) {
	header('location:../login.php');
}else{
	if ($_SESSION['digiAkses']!=2) {
		header('location:../admin/');
	}
}

require_once '../template/header.php';
require_once '../template/menu.php';
?>
<a href="../logout.php">Keluar</a>
