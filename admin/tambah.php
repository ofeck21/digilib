<?php 

if (isset($_POST['tambahAngota'])) {
	$noreg = $_POST['noreg'];
	$nama = $_POST['nama'];

	$qC = mysqli_query($con, "SELECT * FROM users WHERE noreg=$noreg");

	if (mysqli_num_rows($qC) > 0) {
		echo "<script>
			swal('Nomor Registrasi Sudah Digunakan!', {
				icon: 'error',
				button: false,
				timer: 2000
			});
		</script>";
	}else{

		$qT = mysqli_query($con, "INSERT INTO users (noreg, nama, akses, reg ) VALUES ('$noreg', '$nama', 2, 0)");

		if ($qT) {
			echo "<script>
				swal('Data Telah Ditambahkan!', {
					icon: 'success',
					button: false,
				});
				location=(href='index.php');
			</script>";
		}else{
			echo "<script>
				swal('Data Gagal Ditambahkan!', {
					icon: 'error',
					button: false,
					timer: 2000
				});
			</script>";
		}
	}
}elseif (isset($_POST['tambahTopik'])) {
	$topik = $_POST['topik'];

	$tQ = mysqli_query($con, "INSERT INTO topik (id_topik, topik) VALUES (null, '$topik')");

	if ($tQ) {
		echo "<script>
				swal('Data Telah Ditambahkan!', {
					icon: 'success',
					button: false,
				});
				location=(href='index.php');
			</script>";
		}else{
			echo "<script>
				swal('Data Gagal Ditambahkan!', {
					icon: 'error',
					button: false,
					timer: 2000
				});
			</script>";
		}
}elseif (isset($_POST['tambahData'])) {

	$pengarang  = $_POST['pengarang'];
	$judul 		= $_POST['judul'];
	$abstrak	= $_POST['abstrak'];
	$topik 		= $_POST['topik'];
	$tahun		= $_POST['tahun'];

	$cover 		= $_FILES['cover']['name'];
	$typeC		= $_FILES['cover']['type'];
	$tmp_cover	= $_FILES['cover']['tmp_name'];

	$bab1		= $_FILES['babi']['name'];
	$type1		= $_FILES['babi']['type'];
	$tmp_bab1	= $_FILES['babi']['tmp_name'];

	$bab2		= $_FILES['babii']['name'];
	$type2		= $_FILES['babii']['type'];
	$tmp_bab2	= $_FILES['babii']['tmp_name'];

	$bab3		= $_FILES['babiii']['name'];
	$type3		= $_FILES['babiii']['type'];
	$tmp_bab3	= $_FILES['babiii']['tmp_name'];

	$bab4		= $_FILES['babiv']['name'];
	$type4		= $_FILES['babiv']['type'];
	$tmp_bab4	= $_FILES['babiv']['tmp_name'];

	$bab5		= $_FILES['babv']['name'];
	$type5 		= $_FILES['babv']['type'];
	$tmp_bab5	= $_FILES['babv']['tmp_name'];

	$dir_cover	= 'file/cover/'.$cover;
	$dir_ta1	= 'file/ta/'.$bab1;
	$dir_ta2	= 'file/ta/'.$bab2;
	$dir_ta3	= 'file/ta/'.$bab3;
	$dir_ta4	= 'file/ta/'.$bab4;
	$dir_ta5	= 'file/ta/'.$bab5;



	if ($pengarang == '' || 
		$judul == '' || 
		$abstrak == '' || 
		$topik == '' || 
		$tahun == '' || 
		$bab1 == '' || 
		$bab2 == '' || 
		$bab3 == '' ||
		$bab4 == '' ||
		$bab5 == ''
		) {
		echo "<script>
				swal('Pastikan Data Lengkap!', {
					icon: 'error',
					button: false,
					timer: 2000
				});
			</script>";
	}else{

		if ($cover != '' && ($typeC == 'image/jpeg' || $typeC == 'image/jpg' || $typeC == 'image/png')) {
			move_uploaded_file($tmp_cover, $dir_cover);
		}

		if ( $type1 != 'application/pdf' || $type2 != 'application/pdf' || $type3 != 'application/pdf' || $type4 != 'application/pdf' || $type5 != 'application/pdf' ) {
				echo "<script>
						swal('Tipe File Tidak Sesuai!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
			}else{
				
				$upload1 = move_uploaded_file($tmp_bab1, $dir_ta1);
				$upload2 = move_uploaded_file($tmp_bab2, $dir_ta2);
				$upload3 = move_uploaded_file($tmp_bab3, $dir_ta3);
				$upload4 = move_uploaded_file($tmp_bab4, $dir_ta4);
				$upload5 = move_uploaded_file($tmp_bab5, $dir_ta5);

				if ($upload1 && $upload2 && $upload3 && $upload4 && $upload5) {

					$sTdb = mysqli_query($con, "INSERT INTO library (id_library, pengarang, judul, tahun, id_topik, cover, babi, babii, babiii, babiv, babv, abstrak, status) VALUES (null, $pengarang, '$judul', '$tahun', $topik, '$cover', '$bab1', '$bab2', '$bab3', '$bab4', '$bab5', '$abstrak', 1) ");
					if ($sTdb) {
						echo "<script>
							swal('Data Telah Ditambahkan!', {
								icon: 'success',
								button: false,
								timer: 2000
							});
							location=(href='index.php?anggota');
						</script>";
					}else{
						echo "<script>
							swal('Data Gagal Ditambahkan!', {
								icon: 'error',
								button: false,
								timer: 2000
							});
						</script>";
					}			
				}else{
					echo "<script>
							swal('Data Gagal Diupload!', {
								icon: 'error',
								button: false,
								timer: 2000
							});
						</script>";
				}

			}
	}


}

 ?>