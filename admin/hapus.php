<?php 

if (isset($_GET['hapus'])) {
	$id=$_GET['hapus'];
	$hd =  mysqli_query($con, "DELETE FROM library WHERE pengarang=$id");
	$hapus = mysqli_query($con, "DELETE FROM users WHERE id_user=$id");
	if ($hapus) {
		echo "<script>
			swal('Data Telah Dihapus!', {
				icon: 'success',
				button: false,
			});
			location=(href='index.php');
		</script>";
	}else{
		echo "<script>
			swal('Data Gagal Dihapus!', {
				icon: 'danger',
				button: false,
			});
		</script>";
	}
}
elseif (isset($_GET['hapusTopik'])) {
	$id=$_GET['hapusTopik'];
	$hapus = mysqli_query($con, "DELETE FROM topik WHERE id_topik=$id");
	if ($hapus) {
		echo "<script>
			swal('Topik Telah Dihapus!', {
				icon: 'success',
				button: false,
			});
			location=(href='index.php');
		</script>";
	}else{
		echo "<script>
			swal('Topik Gagal Dihapus!', {
				icon: 'danger',
				button: false,
			});
		</script>";
	}
}elseif (isset($_GET['hapusData'])) {
	$id = $_GET['hapusData'];
	$hapus = mysqli_query($con, "DELETE FROM library WHERE id_library=$id");
	if ($hapus) {
		echo "<script>
			swal('Data Telah Dihapus!', {
				icon: 'success',
				button: false,
			});
			location=(href='index.php?anggota');
		</script>";
	}else{
		echo "<script>
			swal('Data Gagal Dihapus!', {
				icon: 'danger',
				button: false,
			});
		</script>";
	}
}
 ?>