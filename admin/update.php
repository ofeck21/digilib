<?php  
if (isset($_POST['simpanAnggota'])) {
	$noreg = $_POST['noreg'];
	$nama = $_POST['nama'];
	$status = $_POST['status'];
	$id= $_POST['id'];



	$uaQ = mysqli_query($con, "UPDATE users SET noreg='$noreg', nama='$nama', reg=$status WHERE id_user=$id ");
	if ($uaQ) {
		echo "<script>
			swal('Data Telah Diubah!', {
				icon: 'success',
				button: false,
				timer: 2000
			});
			location=(href='index.php');
		</script>";
	}else{
		echo "<script>
			swal('Data Gagal Diubah!', {
				icon: 'error',
				button: false,
				timer:2000
			});
		</script>";
	}
}
elseif (isset($_POST['updateTopik'])) {
	$id= $_POST['id'];
	$topik = $_POST['topik'];

	$uT = mysqli_query($con, "UPDATE topik SET topik='$topik' WHERE id_topik=$id ");
	if ($uT) {
		echo "<script>
			swal('Data Telah Diubah!', {
				icon: 'success',
				button: false,
				timer: 2000
			});
			location=(href='index.php');
		</script>";
	}else{
		echo "<script>
			swal('Data Gagal Diubah!', {
				icon: 'error',
				button: false,
				timer:2000
			});
		</script>";
	}
}
elseif (isset($_POST['simpanData'])) {
	$id= $_POST['id'];

	$pengarang  = $_POST['pengarang'];
	$judul 		= $_POST['judul'];
	$abstrak	= $_POST['abstrak'];
	$topik 		= $_POST['topik'];
	$tahun		= $_POST['tahun'];

	$cover 		= $_FILES['cover']['name'];
	$coname		= $pengarang.'_'.$_FILES['cover']['name'];
	$typeC		= $_FILES['cover']['type'];
	$tmp_cover	= $_FILES['cover']['tmp_name'];

	$bab1		= $_FILES['babi']['name'];
	$b1name		= $pengarang.'_'.$_FILES['babi']['name'];
	$type1		= $_FILES['babi']['type'];
	$tmp_bab1	= $_FILES['babi']['tmp_name'];

	$bab2		= $_FILES['babii']['name'];
	$b2name		= $pengarang.'_'.$_FILES['babii']['name'];
	$type2		= $_FILES['babii']['type'];
	$tmp_bab2	= $_FILES['babii']['tmp_name'];

	$bab3		= $_FILES['babiii']['name'];
	$b3name		= $pengarang.'_'.$_FILES['babiii']['name'];
	$type3		= $_FILES['babiii']['type'];
	$tmp_bab3	= $_FILES['babiii']['tmp_name'];

	$bab4		= $_FILES['babiv']['name'];
	$b4name		= $pengarang.'_'.$_FILES['babiv']['name'];
	$type4		= $_FILES['babiv']['type'];
	$tmp_bab4	= $_FILES['babiv']['tmp_name'];

	$bab5		= $_FILES['babv']['name'];
	$b5name		= $pengarang.'_'.$_FILES['babv']['name'];
	$type5 		= $_FILES['babv']['type'];
	$tmp_bab5	= $_FILES['babv']['tmp_name'];

	$dir_cover	= 'file/cover/'.$pengarang.'_'.$cover;
	$dir_ta1	= 'file/ta/'.$pengarang.'_'.$bab1;
	$dir_ta2	= 'file/ta/'.$pengarang.'_'.$bab2;
	$dir_ta3	= 'file/ta/'.$pengarang.'_'.$bab3;
	$dir_ta4	= 'file/ta/'.$pengarang.'_'.$bab4;
	$dir_ta5	= 'file/ta/'.$pengarang.'_'.$bab5;

	if ($pengarang == '' || 
		$judul == '' || 
		$abstrak == '' || 
		$topik == '' || 
		$tahun == '' 
		) {
		echo "<script>
				swal('Pastikan Data Lengkap!', {
					icon: 'error',
					button: false,
					timer: 2000
				});
			</script>";
	}else{
		//semua
		if ($cover != '' && $bab1 != '' && $bab2 != '' && $bab3 != '' && $bab4 != '' && $bab5 != '') {
			if ( ($typeC == 'image/jpeg' || $typeC == 'image/jpg' || $typeC == 'image/png') && ($type1 != 'application/pdf' || $type2 != 'application/pdf' || $type3 != 'application/pdf' || $type4 != 'application/pdf' || $type5 != 'application/pdf') ) {
				$upCover = move_uploaded_file($tmp_cover, $dir_cover);
				$upload1 = move_uploaded_file($tmp_bab1, $dir_ta1);
				$upload2 = move_uploaded_file($tmp_bab2, $dir_ta2);
				$upload3 = move_uploaded_file($tmp_bab3, $dir_ta3);
				$upload4 = move_uploaded_file($tmp_bab4, $dir_ta4);
				$upload5 = move_uploaded_file($tmp_bab5, $dir_ta5);

				if ($upCover && $upload1 && $upload2 && $upload3 && $upload4 && $upload5) {
					$uD = mysqli_query($con, "UPDATE library SET pengarang='$pengarang', judul='$judul', tahun='$tahun', abstrak='$abstrak', id_topik='$topik', cover='$coname', babi='$b1name', babii='$b2name', babiii='$b3name', babiv='$b4name', babv='$b5name' WHERE id_library=$id ");
					if ($uD) {
						echo "<script>
								swal('Data Telah Diubah!', {
									icon: 'success',
									button: false,
									timer: 2000
								});
								location=(href='index.php?anggota');
							</script>";
					}else{
						echo "<script>
							swal('Data Gagal Diubah!', {
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
			}else{
				echo "<script>
						swal('Tipe File Tidak Sesuai!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
			}
			//cover
		}elseif ($cover != '' && $bab1 == '' && $bab2 == '' && $bab3 == '' && $bab4 == '' && $bab5 == '') {
			if ($typeC == 'image/jpeg' || $typeC == 'image/jpg' || $typeC == 'image/png') {
				$upload = move_uploaded_file($tmp_cover, $dir_cover);
				if ($uplaod) {
					$uD = mysqli_query($con, "UPDATE library SET pengarang='$pengarang', judul='$judul', tahun='$tahun', abstrak='$abstrak', id_topik='$topik', cover='$coname' WHERE id_library=$id ");
					if ($uD) {
						echo "<script>
								swal('Data Telah Diubah!', {
									icon: 'success',
									button: false,
									timer: 2000
								});
								location=(href='index.php?anggota');
							</script>";
					}else{
						echo "<script>
							swal('Data Gagal Diubah!', {
								icon: 'error',
								button: false,
								timer: 2000
							});
						</script>";
					}
				}else{
					echo "<script>
						swal('File Gagal Diupload!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
				}
			}else{
				echo "<script>
						swal('Tipe File Tidak Sesuai!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
			}
			//bab1
		}elseif ($cover == '' && $bab1 != '' && $bab2 == '' && $bab3 == '' && $bab4 == '' && $bab5 == '') {
			if ($type1 == 'application/pdf') {
				
				$upload = move_uploaded_file($tmp_bab1, $dir_ta1);
				if ($upload) {
					$uD = mysqli_query($con, "UPDATE library SET pengarang='$pengarang', judul='$judul', tahun='$tahun', abstrak='$abstrak', id_topik='$topik',  babi='$b1name' WHERE id_library=$id ");
					if ($uD) {
						echo "<script>
								swal('Data Telah Diubah!', {
									icon: 'success',
									button: false,
									timer: 2000
								});
								location=(href='index.php?anggota');
							</script>";
					}else{
						echo "<script>
							swal('Data Gagal Diubah!', {
								icon: 'error',
								button: false,
								timer: 2000
							});
						</script>";
					}
				}else{
					echo "<script>
						swal('File Gagal Diupload!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
				}
			}else{
				echo "<script>
						swal('Tipe File Tidak Sesuai!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
			}
			//bab2
		}elseif ($cover == '' && $bab1 == '' && $bab2 != '' && $bab3 == '' && $bab4 == '' && $bab5 == '') {
			if ($type2 == 'application/pdf') {
				
				$upload = move_uploaded_file($tmp_bab2, $dir_ta2);
				if ($upload) {
					$uD = mysqli_query($con, "UPDATE library SET pengarang='$pengarang', judul='$judul', tahun='$tahun', abstrak='$abstrak', id_topik='$topik',  babii='$b2name' WHERE id_library=$id ");
					if ($uD) {
						echo "<script>
								swal('Data Telah Diubah!', {
									icon: 'success',
									button: false,
									timer: 2000
								});
								location=(href='index.php?anggota');
							</script>";
					}else{
						echo "<script>
							swal('Data Gagal Diubah!', {
								icon: 'error',
								button: false,
								timer: 2000
							});
						</script>";
					}
				}else{
					echo "<script>
						swal('File Gagal Diupload!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
				}
			}else{
				echo "<script>
						swal('Tipe File Tidak Sesuai!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
			}
			//bab3
		}elseif ($cover == '' && $bab1 == '' && $bab2 == '' && $bab3 != '' && $bab4 == '' && $bab5 == '') {
			if ($type3 == 'application/pdf') {
				
				$upload = move_uploaded_file($tmp_bab3, $dir_ta3);
				if ($upload) {
					$uD = mysqli_query($con, "UPDATE library SET pengarang='$pengarang', judul='$judul', tahun='$tahun', abstrak='$abstrak', id_topik='$topik',  babiii='$b3name' WHERE id_library=$id ");
					if ($uD) {
						echo "<script>
								swal('Data Telah Diubah!', {
									icon: 'success',
									button: false,
									timer: 2000
								});
								location=(href='index.php?anggota');
							</script>";
					}else{
						echo "<script>
							swal('Data Gagal Diubah!', {
								icon: 'error',
								button: false,
								timer: 2000
							});
						</script>";
					}
				}else{
					echo "<script>
						swal('File Gagal Diupload!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
				}
			}else{
				echo "<script>
						swal('Tipe File Tidak Sesuai!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
			}
			//bab4
		}elseif ($cover == '' && $bab1 == '' && $bab2 == '' && $bab3 == '' && $bab4 != '' && $bab5 == '') {
			if ($type4 == 'application/pdf') {
				
				$upload = move_uploaded_file($tmp_bab4, $dir_ta4);
				if ($upload) {
					$uD = mysqli_query($con, "UPDATE library SET pengarang='$pengarang', judul='$judul', tahun='$tahun', abstrak='$abstrak', id_topik='$topik',  babiv='$b4name' WHERE id_library=$id ");
					if ($uD) {
						echo "<script>
								swal('Data Telah Diubah!', {
									icon: 'success',
									button: false,
									timer: 2000
								});
								location=(href='index.php?anggota');
							</script>";
					}else{
						echo "<script>
							swal('Data Gagal Diubah!', {
								icon: 'error',
								button: false,
								timer: 2000
							});
						</script>";
					}
				}else{
					echo "<script>
						swal('File Gagal Diupload!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
				}
			}else{
				echo "<script>
						swal('Tipe File Tidak Sesuai!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
			}
			//bab5
		}elseif ($cover == '' && $bab1 == '' && $bab2 == '' && $bab3 == '' && $bab4 == '' && $bab5 != '') {
			if ($type5 == 'application/pdf') {
				
				$upload = move_uploaded_file($tmp_bab5, $dir_ta5);
				if ($upload) {
					$uD = mysqli_query($con, "UPDATE library SET pengarang='$pengarang', judul='$judul', tahun='$tahun', abstrak='$abstrak', id_topik='$topik',  babv='$b5name' WHERE id_library=$id ");
					if ($uD) {
						echo "<script>
								swal('Data Telah Diubah!', {
									icon: 'success',
									button: false,
									timer: 2000
								});
								location=(href='index.php?anggota');
							</script>";
					}else{
						echo "<script>
							swal('Data Gagal Diubah!', {
								icon: 'error',
								button: false,
								timer: 2000
							});
						</script>";
					}
				}else{
					echo "<script>
						swal('File Gagal Diupload!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
				}
			}else{
				echo "<script>
						swal('Tipe File Tidak Sesuai!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
			}
			//cover 1
		}elseif ($cover != '' && $bab1 != '' && $bab2 == '' && $bab3 == '' && $bab4 == '' && $bab5 == '') {
			if ( ($typeC == 'image/jpeg' || $typeC == 'image/jpg' || $typeC == 'image/png') && ($type1 == 'application/pdf')) {
				$upCover = move_uploaded_file($tmp_cover, $dir_cover);
				$upload1 = move_uploaded_file($tmp_bab1, $dir_ta1);
				if ($upload1 && $upCover) {
					$uD = mysqli_query($con, "UPDATE library SET pengarang='$pengarang', judul='$judul', tahun='$tahun', abstrak='$abstrak', id_topik='$topik', cover='$coname', babi='$b1name' WHERE id_library=$id ");
					if ($uD) {
						echo "<script>
								swal('Data Telah Diubah!', {
									icon: 'success',
									button: false,
									timer: 2000
								});
								location=(href='index.php?anggota');
							</script>";
					}else{
						echo "<script>
							swal('Data Gagal Diubah!', {
								icon: 'error',
								button: false,
								timer: 2000
							});
						</script>";
					}
				}else{
					echo "<script>
						swal('File Gagal Diupload!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
				}
			}else{
				echo "<script>
						swal('Tipe File Tidak Sesuai!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
			}
			//cover 2
		}elseif ($cover != '' && $bab1 == '' && $bab2 != '' && $bab3 == '' && $bab4 == '' && $bab5 == '') {
			if ( ($typeC == 'image/jpeg' || $typeC == 'image/jpg' || $typeC == 'image/png') && ($type2 == 'application/pdf')) {
				$upCover = move_uploaded_file($tmp_cover, $dir_cover);
				$upload2 = move_uploaded_file($tmp_bab2, $dir_ta2);
				if ($upload2 && $upCover) {
					$uD = mysqli_query($con, "UPDATE library SET pengarang='$pengarang', judul='$judul', tahun='$tahun', abstrak='$abstrak', id_topik='$topik', cover='$coname', babii='$b2name' WHERE id_library=$id ");
					if ($uD) {
						echo "<script>
								swal('Data Telah Diubah!', {
									icon: 'success',
									button: false,
									timer: 2000
								});
								location=(href='index.php?anggota');
							</script>";
					}else{
						echo "<script>
							swal('Data Gagal Diubah!', {
								icon: 'error',
								button: false,
								timer: 2000
							});
						</script>";
					}
				}else{
					echo "<script>
						swal('File Gagal Diupload!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
				}
			}else{
				echo "<script>
						swal('Tipe File Tidak Sesuai!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
			}
			//cover 3
		}elseif ($cover != '' && $bab1 == '' && $bab2 == '' && $bab3 != '' && $bab4 == '' && $bab5 == '') {
			if ( ($typeC == 'image/jpeg' || $typeC == 'image/jpg' || $typeC == 'image/png') && ($type3 == 'application/pdf')) {
				$upCover = move_uploaded_file($tmp_cover, $dir_cover);
				$upload3 = move_uploaded_file($tmp_bab3, $dir_ta3);
				if ($upload3 && $upCover) {
					$uD = mysqli_query($con, "UPDATE library SET pengarang='$pengarang', judul='$judul', tahun='$tahun', abstrak='$abstrak', id_topik='$topik', cover='$coname', babiii='$b3name' WHERE id_library=$id ");
					if ($uD) {
						echo "<script>
								swal('Data Telah Diubah!', {
									icon: 'success',
									button: false,
									timer: 2000
								});
								location=(href='index.php?anggota');
							</script>";
					}else{
						echo "<script>
							swal('Data Gagal Diubah!', {
								icon: 'error',
								button: false,
								timer: 2000
							});
						</script>";
					}
				}else{
					echo "<script>
						swal('File Gagal Diupload!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
				}
			}else{
				echo "<script>
						swal('Tipe File Tidak Sesuai!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
			}
			//cover 4
		}elseif ($cover != '' && $bab1 == '' && $bab2 == '' && $bab3 == '' && $bab4 != '' && $bab5 == '') {
			if ( ($typeC == 'image/jpeg' || $typeC == 'image/jpg' || $typeC == 'image/png') && ($type4 == 'application/pdf')) {
				$upCover = move_uploaded_file($tmp_cover, $dir_cover);
				$upload4 = move_uploaded_file($tmp_bab4, $dir_ta4);
				if ($upload4 && $upCover) {
					$uD = mysqli_query($con, "UPDATE library SET pengarang='$pengarang', judul='$judul', tahun='$tahun', abstrak='$abstrak', id_topik='$topik', cover='$coname', babiv='$b4name' WHERE id_library=$id ");
					if ($uD) {
						echo "<script>
								swal('Data Telah Diubah!', {
									icon: 'success',
									button: false,
									timer: 2000
								});
								location=(href='index.php?anggota');
							</script>";
					}else{
						echo "<script>
							swal('Data Gagal Diubah!', {
								icon: 'error',
								button: false,
								timer: 2000
							});
						</script>";
					}
				}else{
					echo "<script>
						swal('File Gagal Diupload!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
				}
			}else{
				echo "<script>
						swal('Tipe File Tidak Sesuai!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
			}
			//cover 5
		}elseif ($cover != '' && $bab1 == '' && $bab2 == '' && $bab3 == '' && $bab4 == '' && $bab5 != '') {
			if ( ($typeC == 'image/jpeg' || $typeC == 'image/jpg' || $typeC == 'image/png') && ($type5 == 'application/pdf')) {
				$upCover = move_uploaded_file($tmp_cover, $dir_cover);
				$upload5 = move_uploaded_file($tmp_bab5, $dir_ta5);
				if ($upload5 && $upCover) {
					$uD = mysqli_query($con, "UPDATE library SET pengarang='$pengarang', judul='$judul', tahun='$tahun', abstrak='$abstrak', id_topik='$topik', cover='$coname', babv='$b5name' WHERE id_library=$id ");
					if ($uD) {
						echo "<script>
								swal('Data Telah Diubah!', {
									icon: 'success',
									button: false,
									timer: 2000
								});
								location=(href='index.php?anggota');
							</script>";
					}else{
						echo "<script>
							swal('Data Gagal Diubah!', {
								icon: 'error',
								button: false,
								timer: 2000
							});
						</script>";
					}
				}else{
					echo "<script>
						swal('File Gagal Diupload!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
				}
			}else{
				echo "<script>
						swal('Tipe File Tidak Sesuai!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
			}
			//12
		}elseif ($cover == '' && $bab1 != '' && $bab2 != '' && $bab3 == '' && $bab4 == '' && $bab5 == '') {
			if ( $type1 == 'application/pdf' && $type2 == 'application/pdf' ) {
				$upload1 = move_uploaded_file($tmp_bab1, $dir_ta1);
				$upload2 = move_uploaded_file($tmp_bab2, $dir_ta2);
				if ($upload1 && $upload2) {
					$uD = mysqli_query($con, "UPDATE library SET pengarang='$pengarang', judul='$judul', tahun='$tahun', abstrak='$abstrak', id_topik='$topik', babi='$b1name', babii='$b2name' WHERE id_library=$id ");
					if ($uD) {
						echo "<script>
								swal('Data Telah Diubah!', {
									icon: 'success',
									button: false,
									timer: 2000
								});
								location=(href='index.php?anggota');
							</script>";
					}else{
						echo "<script>
							swal('Data Gagal Diubah!', {
								icon: 'error',
								button: false,
								timer: 2000
							});
						</script>";
					}
				}else{
					echo "<script>
						swal('File Gagal Diupload!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
				}
			}else{
				echo "<script>
						swal('Tipe File Tidak Sesuai!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
			}
			//13
		}elseif ($cover == '' && $bab1 != '' && $bab2 == '' && $bab3 != '' && $bab4 == '' && $bab5 == '') {
			if ( $type1 == 'application/pdf' && $type3 == 'application/pdf' ) {
				$upload1 = move_uploaded_file($tmp_bab1, $dir_ta1);
				$upload2 = move_uploaded_file($tmp_bab3, $dir_ta3);
				if ($upload1 && $upload2) {
					$uD = mysqli_query($con, "UPDATE library SET pengarang='$pengarang', judul='$judul', tahun='$tahun', abstrak='$abstrak', id_topik='$topik', babi='$b1name', babiii='$b3name' WHERE id_library=$id ");
					if ($uD) {
						echo "<script>
								swal('Data Telah Diubah!', {
									icon: 'success',
									button: false,
									timer: 2000
								});
								location=(href='index.php?anggota');
							</script>";
					}else{
						echo "<script>
							swal('Data Gagal Diubah!', {
								icon: 'error',
								button: false,
								timer: 2000
							});
						</script>";
					}
				}else{
					echo "<script>
						swal('File Gagal Diupload!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
				}
			}else{
				echo "<script>
						swal('Tipe File Tidak Sesuai!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
			}
			//14
		}elseif ($cover == '' && $bab1 != '' && $bab2 == '' && $bab3 == '' && $bab4 != '' && $bab5 == '') {
			if ( $type1 == 'application/pdf' && $type4 == 'application/pdf' ) {
				$upload1 = move_uploaded_file($tmp_bab1, $dir_ta1);
				$upload2 = move_uploaded_file($tmp_bab4, $dir_ta4);
				if ($upload1 && $upload2) {
					$uD = mysqli_query($con, "UPDATE library SET pengarang='$pengarang', judul='$judul', tahun='$tahun', abstrak='$abstrak', id_topik='$topik', babi='$b1name', babiv='$b4name' WHERE id_library=$id ");
					if ($uD) {
						echo "<script>
								swal('Data Telah Diubah!', {
									icon: 'success',
									button: false,
									timer: 2000
								});
								location=(href='index.php?anggota');
							</script>";
					}else{
						echo "<script>
							swal('Data Gagal Diubah!', {
								icon: 'error',
								button: false,
								timer: 2000
							});
						</script>";
					}
				}else{
					echo "<script>
						swal('File Gagal Diupload!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
				}
			}else{
				echo "<script>
						swal('Tipe File Tidak Sesuai!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
			}
			//15
		}elseif ($cover == '' && $bab1 != '' && $bab2 == '' && $bab3 == '' && $bab4 == '' && $bab5 != '') {
			if ( $type1 == 'application/pdf' && $type5 == 'application/pdf' ) {
				$upload1 = move_uploaded_file($tmp_bab1, $dir_ta1);
				$upload2 = move_uploaded_file($tmp_bab5, $dir_ta5);
				if ($upload1 && $upload2) {
					$uD = mysqli_query($con, "UPDATE library SET pengarang='$pengarang', judul='$judul', tahun='$tahun', abstrak='$abstrak', id_topik='$topik', babi='$b1name', babv='$b5name' WHERE id_library=$id ");
					if ($uD) {
						echo "<script>
								swal('Data Telah Diubah!', {
									icon: 'success',
									button: false,
									timer: 2000
								});
								location=(href='index.php?anggota');
							</script>";
					}else{
						echo "<script>
							swal('Data Gagal Diubah!', {
								icon: 'error',
								button: false,
								timer: 2000
							});
						</script>";
					}
				}else{
					echo "<script>
						swal('File Gagal Diupload!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
				}
			}else{
				echo "<script>
						swal('Tipe File Tidak Sesuai!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
			}
			//23
		}elseif ($cover == '' && $bab1 == '' && $bab2 != '' && $bab3 != '' && $bab4 == '' && $bab5 == '') {
			if ( $type2 == 'application/pdf' && $type3 == 'application/pdf' ) {
				$upload1 = move_uploaded_file($tmp_bab2, $dir_ta2);
				$upload2 = move_uploaded_file($tmp_bab3, $dir_ta3);
				if ($upload1 && $upload2) {
					$uD = mysqli_query($con, "UPDATE library SET pengarang='$pengarang', judul='$judul', tahun='$tahun', abstrak='$abstrak', id_topik='$topik', babii='$b2name', babiii='$b3name' WHERE id_library=$id ");
					if ($uD) {
						echo "<script>
								swal('Data Telah Diubah!', {
									icon: 'success',
									button: false,
									timer: 2000
								});
								location=(href='index.php?anggota');
							</script>";
					}else{
						echo "<script>
							swal('Data Gagal Diubah!', {
								icon: 'error',
								button: false,
								timer: 2000
							});
						</script>";
					}
				}else{
					echo "<script>
						swal('File Gagal Diupload!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
				}
			}else{
				echo "<script>
						swal('Tipe File Tidak Sesuai!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
			}
			//24
		}elseif ($cover == '' && $bab1 == '' && $bab2 != '' && $bab3 == '' && $bab4 != '' && $bab5 == '') {
			if ( $type2 == 'application/pdf' && $type4 == 'application/pdf' ) {
				$upload1 = move_uploaded_file($tmp_bab2, $dir_ta2);
				$upload2 = move_uploaded_file($tmp_bab4, $dir_ta4);
				if ($upload1 && $upload2) {
					$uD = mysqli_query($con, "UPDATE library SET pengarang='$pengarang', judul='$judul', tahun='$tahun', abstrak='$abstrak', id_topik='$topik', babii='$b2name', babiv='$b4name' WHERE id_library=$id ");
					if ($uD) {
						echo "<script>
								swal('Data Telah Diubah!', {
									icon: 'success',
									button: false,
									timer: 2000
								});
								location=(href='index.php?anggota');
							</script>";
					}else{
						echo "<script>
							swal('Data Gagal Diubah!', {
								icon: 'error',
								button: false,
								timer: 2000
							});
						</script>";
					}
				}else{
					echo "<script>
						swal('File Gagal Diupload!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
				}
			}else{
				echo "<script>
						swal('Tipe File Tidak Sesuai!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
			}
			//25
		}elseif ($cover == '' && $bab1 == '' && $bab2 != '' && $bab3 == '' && $bab4 == '' && $bab5 != '') {
			if ( $type2 == 'application/pdf' && $type5 == 'application/pdf' ) {
				$upload1 = move_uploaded_file($tmp_bab2, $dir_ta2);
				$upload2 = move_uploaded_file($tmp_bab5, $dir_ta5);
				if ($upload1 && $upload2) {
					$uD = mysqli_query($con, "UPDATE library SET pengarang='$pengarang', judul='$judul', tahun='$tahun', abstrak='$abstrak', id_topik='$topik', babii='$b2name', babv='$b5name' WHERE id_library=$id ");
					if ($uD) {
						echo "<script>
								swal('Data Telah Diubah!', {
									icon: 'success',
									button: false,
									timer: 2000
								});
								location=(href='index.php?anggota');
							</script>";
					}else{
						echo "<script>
							swal('Data Gagal Diubah!', {
								icon: 'error',
								button: false,
								timer: 2000
							});
						</script>";
					}
				}else{
					echo "<script>
						swal('File Gagal Diupload!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
				}
			}else{
				echo "<script>
						swal('Tipe File Tidak Sesuai!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
			}
			//34
		}elseif ($cover == '' && $bab1 == '' && $bab2 == '' && $bab3 != '' && $bab4 != '' && $bab5 == '') {
			if ( $type3 == 'application/pdf' && $type4 == 'application/pdf' ) {
				$upload1 = move_uploaded_file($tmp_bab3, $dir_ta3);
				$upload2 = move_uploaded_file($tmp_bab4, $dir_ta4);
				if ($upload1 && $upload2) {
					$uD = mysqli_query($con, "UPDATE library SET pengarang='$pengarang', judul='$judul', tahun='$tahun', abstrak='$abstrak', id_topik='$topik', babiii='$b3name', babiv='$b4name' WHERE id_library=$id ");
					if ($uD) {
						echo "<script>
								swal('Data Telah Diubah!', {
									icon: 'success',
									button: false,
									timer: 2000
								});
								location=(href='index.php?anggota');
							</script>";
					}else{
						echo "<script>
							swal('Data Gagal Diubah!', {
								icon: 'error',
								button: false,
								timer: 2000
							});
						</script>";
					}
				}else{
					echo "<script>
						swal('File Gagal Diupload!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
				}
			}else{
				echo "<script>
						swal('Tipe File Tidak Sesuai!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
			}
			//35
		}elseif ($cover == '' && $bab1 == '' && $bab2 == '' && $bab3 != '' && $bab4 == '' && $bab5 != '') {
			if ( $type3 == 'application/pdf' && $type5 == 'application/pdf' ) {
				$upload1 = move_uploaded_file($tmp_bab3, $dir_ta3);
				$upload2 = move_uploaded_file($tmp_bab5, $dir_ta5);
				if ($upload1 && $upload2) {
					$uD = mysqli_query($con, "UPDATE library SET pengarang='$pengarang', judul='$judul', tahun='$tahun', abstrak='$abstrak', id_topik='$topik', babiii='$b3name', babv='$b5name' WHERE id_library=$id ");
					if ($uD) {
						echo "<script>
								swal('Data Telah Diubah!', {
									icon: 'success',
									button: false,
									timer: 2000
								});
								location=(href='index.php?anggota');
							</script>";
					}else{
						echo "<script>
							swal('Data Gagal Diubah!', {
								icon: 'error',
								button: false,
								timer: 2000
							});
						</script>";
					}
				}else{
					echo "<script>
						swal('File Gagal Diupload!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
				}
			}else{
				echo "<script>
						swal('Tipe File Tidak Sesuai!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
			}
			//45
		}elseif ($cover == '' && $bab1 == '' && $bab2 == '' && $bab3 == '' && $bab4 != '' && $bab5 != '') {
			if ( $type4 == 'application/pdf' && $type5 == 'application/pdf' ) {
				$upload1 = move_uploaded_file($tmp_bab4, $dir_ta4);
				$upload2 = move_uploaded_file($tmp_bab5, $dir_ta5);
				if ($upload1 && $upload2) {
					$uD = mysqli_query($con, "UPDATE library SET pengarang='$pengarang', judul='$judul', tahun='$tahun', abstrak='$abstrak', id_topik='$topik', babiv='$b4name', babv='$b5name' WHERE id_library=$id ");
					if ($uD) {
						echo "<script>
								swal('Data Telah Diubah!', {
									icon: 'success',
									button: false,
									timer: 2000
								});
								location=(href='index.php?anggota');
							</script>";
					}else{
						echo "<script>
							swal('Data Gagal Diubah!', {
								icon: 'error',
								button: false,
								timer: 2000
							});
						</script>";
					}
				}else{
					echo "<script>
						swal('File Gagal Diupload!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
				}
			}else{
				echo "<script>
						swal('Tipe File Tidak Sesuai!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
			}
			//cover 12
		}elseif ($cover != '' && $bab1 != '' && $bab2 != '' && $bab3 == '' && $bab4 == '' && $bab5 == '') {
			if ( ($typeC == 'image/jpeg' || $typeC == 'image/jpg' || $typeC == 'image/png') && ($type1 == 'application/pdf' && $type2 == 'application/pdf') ) {
				$upload1 = move_uploaded_file($tmp_cover, $dir_cover);
				$upload2 = move_uploaded_file($tmp_bab1, $dir_ta1);
				$upload3 = move_uploaded_file($tmp_bab2, $dir_ta2);
				if ($upload1 && $upload2 && $upload3) {
					$uD = mysqli_query($con, "UPDATE library SET pengarang='$pengarang', judul='$judul', tahun='$tahun', abstrak='$abstrak', id_topik='$topik', cover='$coname', babi='$b1name', babii='$b2name' WHERE id_library=$id ");
					if ($uD) {
						echo "<script>
								swal('Data Telah Diubah!', {
									icon: 'success',
									button: false,
									timer: 2000
								});
								location=(href='index.php?anggota');
							</script>";
					}else{
						echo "<script>
							swal('Data Gagal Diubah!', {
								icon: 'error',
								button: false,
								timer: 2000
							});
						</script>";
					}
				}else{
					echo "<script>
						swal('File Gagal Diupload!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
				}
			}else{
				echo "<script>
						swal('Tipe File Tidak Sesuai!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
			}
			//cover 13
		}elseif ($cover != '' && $bab1 != '' && $bab2 == '' && $bab3 != '' && $bab4 == '' && $bab5 == '') {
			if ( ($typeC == 'image/jpeg' || $typeC == 'image/jpg' || $typeC == 'image/png') && ($type1 == 'application/pdf' && $type3 == 'application/pdf') ) {
				$upload1 = move_uploaded_file($tmp_cover, $dir_cover);
				$upload2 = move_uploaded_file($tmp_bab1, $dir_ta1);
				$upload3 = move_uploaded_file($tmp_bab3, $dir_ta3);
				if ($upload1 && $upload2 && $upload3) {
					$uD = mysqli_query($con, "UPDATE library SET pengarang='$pengarang', judul='$judul', tahun='$tahun', abstrak='$abstrak', id_topik='$topik', cover='$coname', babi='$b1name', babiii='$b3name' WHERE id_library=$id ");
					if ($uD) {
						echo "<script>
								swal('Data Telah Diubah!', {
									icon: 'success',
									button: false,
									timer: 2000
								});
								location=(href='index.php?anggota');
							</script>";
					}else{
						echo "<script>
							swal('Data Gagal Diubah!', {
								icon: 'error',
								button: false,
								timer: 2000
							});
						</script>";
					}
				}else{
					echo "<script>
						swal('File Gagal Diupload!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
				}
			}else{
				echo "<script>
						swal('Tipe File Tidak Sesuai!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
			}
			//cover 14
		}elseif ($cover != '' && $bab1 != '' && $bab2 == '' && $bab3 == '' && $bab4 != '' && $bab5 == '') {
			if ( ($typeC == 'image/jpeg' || $typeC == 'image/jpg' || $typeC == 'image/png') && ($type1 == 'application/pdf' && $type4 == 'application/pdf') ) {
				$upload1 = move_uploaded_file($tmp_cover, $dir_cover);
				$upload2 = move_uploaded_file($tmp_bab1, $dir_ta1);
				$upload3 = move_uploaded_file($tmp_bab4, $dir_ta4);
				if ($upload1 && $upload2 && $upload3) {
					$uD = mysqli_query($con, "UPDATE library SET pengarang='$pengarang', judul='$judul', tahun='$tahun', abstrak='$abstrak', id_topik='$topik', cover='$coname', babi='$b1name', babiv='$b4name' WHERE id_library=$id ");
					if ($uD) {
						echo "<script>
								swal('Data Telah Diubah!', {
									icon: 'success',
									button: false,
									timer: 2000
								});
								location=(href='index.php?anggota');
							</script>";
					}else{
						echo "<script>
							swal('Data Gagal Diubah!', {
								icon: 'error',
								button: false,
								timer: 2000
							});
						</script>";
					}
				}else{
					echo "<script>
						swal('File Gagal Diupload!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
				}
			}else{
				echo "<script>
						swal('Tipe File Tidak Sesuai!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
			}
			//cover 15
		}elseif ($cover != '' && $bab1 != '' && $bab2 == '' && $bab3 == '' && $bab4 == '' && $bab5 != '') {
			if ( ($typeC == 'image/jpeg' || $typeC == 'image/jpg' || $typeC == 'image/png') && ($type1 == 'application/pdf' && $type5 == 'application/pdf') ) {
				$upload1 = move_uploaded_file($tmp_cover, $dir_cover);
				$upload2 = move_uploaded_file($tmp_bab1, $dir_ta1);
				$upload3 = move_uploaded_file($tmp_bab5, $dir_ta5);
				if ($upload1 && $upload2 && $upload3) {
					$uD = mysqli_query($con, "UPDATE library SET pengarang='$pengarang', judul='$judul', tahun='$tahun', abstrak='$abstrak', id_topik='$topik', cover='$coname', babi='$b1name', babv='$b5name' WHERE id_library=$id ");
					if ($uD) {
						echo "<script>
								swal('Data Telah Diubah!', {
									icon: 'success',
									button: false,
									timer: 2000
								});
								location=(href='index.php?anggota');
							</script>";
					}else{
						echo "<script>
							swal('Data Gagal Diubah!', {
								icon: 'error',
								button: false,
								timer: 2000
							});
						</script>";
					}
				}else{
					echo "<script>
						swal('File Gagal Diupload!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
				}
			}else{
				echo "<script>
						swal('Tipe File Tidak Sesuai!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
			}
			//cover 23
		}elseif ($cover != '' && $bab1 == '' && $bab2 != '' && $bab3 != '' && $bab4 == '' && $bab5 == '') {
			if ( ($typeC == 'image/jpeg' || $typeC == 'image/jpg' || $typeC == 'image/png') && ($type2 == 'application/pdf' && $type3 == 'application/pdf') ) {
				$upload1 = move_uploaded_file($tmp_cover, $dir_cover);
				$upload2 = move_uploaded_file($tmp_bab2, $dir_ta2);
				$upload3 = move_uploaded_file($tmp_bab3, $dir_ta3);
				if ($upload1 && $upload2 && $upload3) {
					$uD = mysqli_query($con, "UPDATE library SET pengarang='$pengarang', judul='$judul', tahun='$tahun', abstrak='$abstrak', id_topik='$topik', cover='$coname', babii='$b2name', babiii='$b3name' WHERE id_library=$id ");
					if ($uD) {
						echo "<script>
								swal('Data Telah Diubah!', {
									icon: 'success',
									button: false,
									timer: 2000
								});
								location=(href='index.php?anggota');
							</script>";
					}else{
						echo "<script>
							swal('Data Gagal Diubah!', {
								icon: 'error',
								button: false,
								timer: 2000
							});
						</script>";
					}
				}else{
					echo "<script>
						swal('File Gagal Diupload!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
				}
			}else{
				echo "<script>
						swal('Tipe File Tidak Sesuai!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
			}
			//cover 24
		}elseif ($cover != '' && $bab1 == '' && $bab2 != '' && $bab3 == '' && $bab4 != '' && $bab5 == '') {
			if ( ($typeC == 'image/jpeg' || $typeC == 'image/jpg' || $typeC == 'image/png') && ($type2 == 'application/pdf' && $type4 == 'application/pdf') ) {
				$upload1 = move_uploaded_file($tmp_cover, $dir_cover);
				$upload2 = move_uploaded_file($tmp_bab2, $dir_ta2);
				$upload3 = move_uploaded_file($tmp_bab4, $dir_ta4);
				if ($upload1 && $upload2 && $upload3) {
					$uD = mysqli_query($con, "UPDATE library SET pengarang='$pengarang', judul='$judul', tahun='$tahun', abstrak='$abstrak', id_topik='$topik', cover='$coname', babii='$b2name', babiv='$b4name' WHERE id_library=$id ");
					if ($uD) {
						echo "<script>
								swal('Data Telah Diubah!', {
									icon: 'success',
									button: false,
									timer: 2000
								});
								location=(href='index.php?anggota');
							</script>";
					}else{
						echo "<script>
							swal('Data Gagal Diubah!', {
								icon: 'error',
								button: false,
								timer: 2000
							});
						</script>";
					}
				}else{
					echo "<script>
						swal('File Gagal Diupload!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
				}
			}else{
				echo "<script>
						swal('Tipe File Tidak Sesuai!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
			}
			//cover 25
		}elseif ($cover != '' && $bab1 == '' && $bab2 != '' && $bab3 == '' && $bab4 == '' && $bab5 != '') {
			if ( ($typeC == 'image/jpeg' || $typeC == 'image/jpg' || $typeC == 'image/png') && ($type2 == 'application/pdf' && $type5 == 'application/pdf') ) {
				$upload1 = move_uploaded_file($tmp_cover, $dir_cover);
				$upload2 = move_uploaded_file($tmp_bab2, $dir_ta2);
				$upload3 = move_uploaded_file($tmp_bab5, $dir_ta5);
				if ($upload1 && $upload2 && $upload3) {
					$uD = mysqli_query($con, "UPDATE library SET pengarang='$pengarang', judul='$judul', tahun='$tahun', abstrak='$abstrak', id_topik='$topik', cover='$coname', babii='$b2name', babv='$b5name' WHERE id_library=$id ");
					if ($uD) {
						echo "<script>
								swal('Data Telah Diubah!', {
									icon: 'success',
									button: false,
									timer: 2000
								});
								location=(href='index.php?anggota');
							</script>";
					}else{
						echo "<script>
							swal('Data Gagal Diubah!', {
								icon: 'error',
								button: false,
								timer: 2000
							});
						</script>";
					}
				}else{
					echo "<script>
						swal('File Gagal Diupload!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
				}
			}else{
				echo "<script>
						swal('Tipe File Tidak Sesuai!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
			}
			//cover 34
		}elseif ($cover != '' && $bab1 == '' && $bab2 == '' && $bab3 != '' && $bab4 != '' && $bab5 == '') {
			if ( ($typeC == 'image/jpeg' || $typeC == 'image/jpg' || $typeC == 'image/png') && ($type3 == 'application/pdf' && $type4 == 'application/pdf') ) {
				$upload1 = move_uploaded_file($tmp_cover, $dir_cover);
				$upload2 = move_uploaded_file($tmp_bab3, $dir_ta3);
				$upload3 = move_uploaded_file($tmp_bab4, $dir_ta4);
				if ($upload1 && $upload2 && $upload3) {
					$uD = mysqli_query($con, "UPDATE library SET pengarang='$pengarang', judul='$judul', tahun='$tahun', abstrak='$abstrak', id_topik='$topik', cover='$coname', babiii='$b3name', babiv='$b4name' WHERE id_library=$id ");
					if ($uD) {
						echo "<script>
								swal('Data Telah Diubah!', {
									icon: 'success',
									button: false,
									timer: 2000
								});
								location=(href='index.php?anggota');
							</script>";
					}else{
						echo "<script>
							swal('Data Gagal Diubah!', {
								icon: 'error',
								button: false,
								timer: 2000
							});
						</script>";
					}
				}else{
					echo "<script>
						swal('File Gagal Diupload!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
				}
			}else{
				echo "<script>
						swal('Tipe File Tidak Sesuai!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
			}
			//cover 35
		}elseif ($cover != '' && $bab1 == '' && $bab2 == '' && $bab3 != '' && $bab4 == '' && $bab5 != '') {
			if ( ($typeC == 'image/jpeg' || $typeC == 'image/jpg' || $typeC == 'image/png') && ($type3 == 'application/pdf' && $type5 == 'application/pdf') ) {
				$upload1 = move_uploaded_file($tmp_cover, $dir_cover);
				$upload2 = move_uploaded_file($tmp_bab3, $dir_ta3);
				$upload3 = move_uploaded_file($tmp_bab5, $dir_ta5);
				if ($upload1 && $upload2 && $upload3) {
					$uD = mysqli_query($con, "UPDATE library SET pengarang='$pengarang', judul='$judul', tahun='$tahun', abstrak='$abstrak', id_topik='$topik', cover='$coname', babiii='$b3name', babv='$b5name' WHERE id_library=$id ");
					if ($uD) {
						echo "<script>
								swal('Data Telah Diubah!', {
									icon: 'success',
									button: false,
									timer: 2000
								});
								location=(href='index.php?anggota');
							</script>";
					}else{
						echo "<script>
							swal('Data Gagal Diubah!', {
								icon: 'error',
								button: false,
								timer: 2000
							});
						</script>";
					}
				}else{
					echo "<script>
						swal('File Gagal Diupload!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
				}
			}else{
				echo "<script>
						swal('Tipe File Tidak Sesuai!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
			}
			//cover 45
		}elseif ($cover != '' && $bab1 == '' && $bab2 == '' && $bab3 == '' && $bab4 != '' && $bab5 != '') {
			if ( ($typeC == 'image/jpeg' || $typeC == 'image/jpg' || $typeC == 'image/png') && ($type4 == 'application/pdf' && $type5 == 'application/pdf') ) {
				$upload1 = move_uploaded_file($tmp_cover, $dir_cover);
				$upload2 = move_uploaded_file($tmp_bab4, $dir_ta4);
				$upload3 = move_uploaded_file($tmp_bab5, $dir_ta5);
				if ($upload1 && $upload2 && $upload3) {
					$uD = mysqli_query($con, "UPDATE library SET pengarang='$pengarang', judul='$judul', tahun='$tahun', abstrak='$abstrak', id_topik='$topik', cover='$coname', babiv='$b4name', babv='$b5name' WHERE id_library=$id ");
					if ($uD) {
						echo "<script>
								swal('Data Telah Diubah!', {
									icon: 'success',
									button: false,
									timer: 2000
								});
								location=(href='index.php?anggota');
							</script>";
					}else{
						echo "<script>
							swal('Data Gagal Diubah!', {
								icon: 'error',
								button: false,
								timer: 2000
							});
						</script>";
					}
				}else{
					echo "<script>
						swal('File Gagal Diupload!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
				}
			}else{
				echo "<script>
						swal('Tipe File Tidak Sesuai!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
			}
		}
		//123
		elseif ($cover == '' && $bab1 != '' && $bab2 != '' && $bab3 != '' && $bab4 == '' && $bab5 == '') {
			if ( $type1 == 'application/pdf' && $type2 == 'application/pdf' && $type3 == 'application/pdf' ) {
				$upload1 = move_uploaded_file($tmp_bab1, $dir_ta1);
				$upload2 = move_uploaded_file($tmp_bab2, $dir_ta2);
				$upload3 = move_uploaded_file($tmp_bab3, $dir_ta3);
				if ($upload1 && $upload2 && $upload3) {
					$uD = mysqli_query($con, "UPDATE library SET pengarang='$pengarang', judul='$judul', tahun='$tahun', abstrak='$abstrak', id_topik='$topik', babi='$b1name', babii='$b2name', babiii='$b3name' WHERE id_library=$id ");
					if ($uD) {
						echo "<script>
								swal('Data Telah Diubah!', {
									icon: 'success',
									button: false,
									timer: 2000
								});
								location=(href='index.php?anggota');
							</script>";
					}else{
						echo "<script>
							swal('Data Gagal Diubah!', {
								icon: 'error',
								button: false,
								timer: 2000
							});
						</script>";
					}
				}else{
					echo "<script>
						swal('File Gagal Diupload!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
				}
			}else{
				echo "<script>
						swal('Tipe File Tidak Sesuai!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
			}
			//124
		}elseif ($cover == '' && $bab1 != '' && $bab2 != '' && $bab3 == '' && $bab4 != '' && $bab5 == '') {
			if ( $type1 == 'application/pdf' && $type2 == 'application/pdf' && $type4 == 'application/pdf' ) {
				$upload1 = move_uploaded_file($tmp_bab1, $dir_ta1);
				$upload2 = move_uploaded_file($tmp_bab2, $dir_ta2);
				$upload3 = move_uploaded_file($tmp_bab4, $dir_ta4);
				if ($upload1 && $upload2 && $upload3) {
					$uD = mysqli_query($con, "UPDATE library SET pengarang='$pengarang', judul='$judul', tahun='$tahun', abstrak='$abstrak', id_topik='$topik', babi='$b1name', babii='$b2name', babiv='$b4name' WHERE id_library=$id ");
					if ($uD) {
						echo "<script>
								swal('Data Telah Diubah!', {
									icon: 'success',
									button: false,
									timer: 2000
								});
								location=(href='index.php?anggota');
							</script>";
					}else{
						echo "<script>
							swal('Data Gagal Diubah!', {
								icon: 'error',
								button: false,
								timer: 2000
							});
						</script>";
					}
				}else{
					echo "<script>
						swal('File Gagal Diupload!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
				}
			}else{
				echo "<script>
						swal('Tipe File Tidak Sesuai!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
			}
			//125
		}elseif ($cover == '' && $bab1 != '' && $bab2 != '' && $bab3 == '' && $bab4 == '' && $bab5 != '') {
			if ( $type1 == 'application/pdf' && $type2 == 'application/pdf' && $type5 == 'application/pdf' ) {
				$upload1 = move_uploaded_file($tmp_bab1, $dir_ta1);
				$upload2 = move_uploaded_file($tmp_bab2, $dir_ta2);
				$upload3 = move_uploaded_file($tmp_bab5, $dir_ta5);
				if ($upload1 && $upload2 && $upload3) {
					$uD = mysqli_query($con, "UPDATE library SET pengarang='$pengarang', judul='$judul', tahun='$tahun', abstrak='$abstrak', id_topik='$topik', babi='$b1name', babii='$b2name', babv='$b5name' WHERE id_library=$id ");
					if ($uD) {
						echo "<script>
								swal('Data Telah Diubah!', {
									icon: 'success',
									button: false,
									timer: 2000
								});
								location=(href='index.php?anggota');
							</script>";
					}else{
						echo "<script>
							swal('Data Gagal Diubah!', {
								icon: 'error',
								button: false,
								timer: 2000
							});
						</script>";
					}
				}else{
					echo "<script>
						swal('File Gagal Diupload!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
				}
			}else{
				echo "<script>
						swal('Tipe File Tidak Sesuai!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
			}
			
		}
		//134
		elseif ($cover == '' && $bab1 != '' && $bab2 == '' && $bab3 != '' && $bab4 != '' && $bab5 == '') {
			if ( $type1 == 'application/pdf' && $type3 == 'application/pdf' && $type4 == 'application/pdf' ) {
				$upload1 = move_uploaded_file($tmp_bab1, $dir_ta1);
				$upload2 = move_uploaded_file($tmp_bab3, $dir_ta3);
				$upload3 = move_uploaded_file($tmp_bab4, $dir_ta4);
				if ($upload1 && $upload2 && $upload3) {
					$uD = mysqli_query($con, "UPDATE library SET pengarang='$pengarang', judul='$judul', tahun='$tahun', abstrak='$abstrak', id_topik='$topik', babi='$b1name', babiii='$b3name', babv='$b4name' WHERE id_library=$id ");
					if ($uD) {
						echo "<script>
								swal('Data Telah Diubah!', {
									icon: 'success',
									button: false,
									timer: 2000
								});
								location=(href='index.php?anggota');
							</script>";
					}else{
						echo "<script>
							swal('Data Gagal Diubah!', {
								icon: 'error',
								button: false,
								timer: 2000
							});
						</script>";
					}
				}else{
					echo "<script>
						swal('File Gagal Diupload!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
				}
			}else{
				echo "<script>
						swal('Tipe File Tidak Sesuai!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
			}
			
		}
		//135
		elseif ($cover == '' && $bab1 != '' && $bab2 == '' && $bab3 != '' && $bab4 == '' && $bab5 != '') {
			if ( $type1 == 'application/pdf' && $type3 == 'application/pdf' && $type5 == 'application/pdf' ) {
				$upload1 = move_uploaded_file($tmp_bab1, $dir_ta1);
				$upload2 = move_uploaded_file($tmp_bab3, $dir_ta3);
				$upload3 = move_uploaded_file($tmp_bab5, $dir_ta5);
				if ($upload1 && $upload2 && $upload3) {
					$uD = mysqli_query($con, "UPDATE library SET pengarang='$pengarang', judul='$judul', tahun='$tahun', abstrak='$abstrak', id_topik='$topik', babi='$b1name', babiii='$b3name', babv='$b5name' WHERE id_library=$id ");
					if ($uD) {
						echo "<script>
								swal('Data Telah Diubah!', {
									icon: 'success',
									button: false,
									timer: 2000
								});
								location=(href='index.php?anggota');
							</script>";
					}else{
						echo "<script>
							swal('Data Gagal Diubah!', {
								icon: 'error',
								button: false,
								timer: 2000
							});
						</script>";
					}
				}else{
					echo "<script>
						swal('File Gagal Diupload!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
				}
			}else{
				echo "<script>
						swal('Tipe File Tidak Sesuai!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
			}
			
		}
		//145
		elseif ($cover == '' && $bab1 != '' && $bab2 == '' && $bab3 == '' && $bab4 != '' && $bab5 != '') {
			if ( $type1 == 'application/pdf' && $type4 == 'application/pdf' && $type5 == 'application/pdf' ) {
				$upload1 = move_uploaded_file($tmp_bab1, $dir_ta1);
				$upload2 = move_uploaded_file($tmp_bab4, $dir_ta4);
				$upload3 = move_uploaded_file($tmp_bab5, $dir_ta5);
				if ($upload1 && $upload2 && $upload3) {
					$uD = mysqli_query($con, "UPDATE library SET pengarang='$pengarang', judul='$judul', tahun='$tahun', abstrak='$abstrak', id_topik='$topik', babi='$b1name', babiv='$b4name', babv='$b5name' WHERE id_library=$id ");
					if ($uD) {
						echo "<script>
								swal('Data Telah Diubah!', {
									icon: 'success',
									button: false,
									timer: 2000
								});
								location=(href='index.php?anggota');
							</script>";
					}else{
						echo "<script>
							swal('Data Gagal Diubah!', {
								icon: 'error',
								button: false,
								timer: 2000
							});
						</script>";
					}
				}else{
					echo "<script>
						swal('File Gagal Diupload!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
				}
			}else{
				echo "<script>
						swal('Tipe File Tidak Sesuai!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
			}
			
		}
		//234
		elseif ($cover == '' && $bab1 == '' && $bab2 != '' && $bab3 != '' && $bab4 != '' && $bab5 == '') {
			if ( $type3 == 'application/pdf' && $type2 == 'application/pdf' && $type4 == 'application/pdf' ) {
				$upload1 = move_uploaded_file($tmp_bab3, $dir_ta3);
				$upload2 = move_uploaded_file($tmp_bab2, $dir_ta2);
				$upload3 = move_uploaded_file($tmp_bab4, $dir_ta4);
				if ($upload1 && $upload2 && $upload3) {
					$uD = mysqli_query($con, "UPDATE library SET pengarang='$pengarang', judul='$judul', tahun='$tahun', abstrak='$abstrak', id_topik='$topik', babiii='$b3name', babii='$b2name', babiv='$b4name' WHERE id_library=$id ");
					if ($uD) {
						echo "<script>
								swal('Data Telah Diubah!', {
									icon: 'success',
									button: false,
									timer: 2000
								});
								location=(href='index.php?anggota');
							</script>";
					}else{
						echo "<script>
							swal('Data Gagal Diubah!', {
								icon: 'error',
								button: false,
								timer: 2000
							});
						</script>";
					}
				}else{
					echo "<script>
						swal('File Gagal Diupload!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
				}
			}else{
				echo "<script>
						swal('Tipe File Tidak Sesuai!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
			}
			//235
		}elseif ($cover == '' && $bab1 == '' && $bab2 != '' && $bab3 != '' && $bab4 == '' && $bab5 != '') {
			if ( $type3 == 'application/pdf' && $type2 == 'application/pdf' && $type5 == 'application/pdf' ) {
				$upload1 = move_uploaded_file($tmp_bab3, $dir_ta3);
				$upload2 = move_uploaded_file($tmp_bab2, $dir_ta2);
				$upload3 = move_uploaded_file($tmp_bab5, $dir_ta5);
				if ($upload1 && $upload2 && $upload3) {
					$uD = mysqli_query($con, "UPDATE library SET pengarang='$pengarang', judul='$judul', tahun='$tahun', abstrak='$abstrak', id_topik='$topik', babiii='$b3name', babii='$b2name', babiv='$b5name' WHERE id_library=$id ");
					if ($uD) {
						echo "<script>
								swal('Data Telah Diubah!', {
									icon: 'success',
									button: false,
									timer: 2000
								});
								location=(href='index.php?anggota');
							</script>";
					}else{
						echo "<script>
							swal('Data Gagal Diubah!', {
								icon: 'error',
								button: false,
								timer: 2000
							});
						</script>";
					}
				}else{
					echo "<script>
						swal('File Gagal Diupload!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
				}
			}else{
				echo "<script>
						swal('Tipe File Tidak Sesuai!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
			}
			//245
		}
		elseif ($cover == '' && $bab1 == '' && $bab2 != '' && $bab3 == '' && $bab4 != '' && $bab5 != '') {
			if ( $type3 == 'application/pdf' && $type2 == 'application/pdf' && $type5 == 'application/pdf' ) {
				$upload1 = move_uploaded_file($tmp_bab4, $dir_ta4);
				$upload2 = move_uploaded_file($tmp_bab2, $dir_ta2);
				$upload3 = move_uploaded_file($tmp_bab5, $dir_ta5);
				if ($upload1 && $upload2 && $upload3) {
					$uD = mysqli_query($con, "UPDATE library SET pengarang='$pengarang', judul='$judul', tahun='$tahun', abstrak='$abstrak', id_topik='$topik', babiv='$b4name', babii='$b2name', babiv='$b5name' WHERE id_library=$id ");
					if ($uD) {
						echo "<script>
								swal('Data Telah Diubah!', {
									icon: 'success',
									button: false,
									timer: 2000
								});
								location=(href='index.php?anggota');
							</script>";
					}else{
						echo "<script>
							swal('Data Gagal Diubah!', {
								icon: 'error',
								button: false,
								timer: 2000
							});
						</script>";
					}
				}else{
					echo "<script>
						swal('File Gagal Diupload!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
				}
			}else{
				echo "<script>
						swal('Tipe File Tidak Sesuai!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
			}
			//345
			}elseif ($cover == '' && $bab1 == '' && $bab2 == '' && $bab3 != '' && $bab4 != '' && $bab5 != '') {
			if ( $type3 == 'application/pdf' && $type4 == 'application/pdf' && $type4 == 'application/pdf' ) {
				$upload1 = move_uploaded_file($tmp_bab3, $dir_ta3);
				$upload2 = move_uploaded_file($tmp_bab5, $dir_ta5);
				$upload3 = move_uploaded_file($tmp_bab4, $dir_ta4);
				if ($upload1 && $upload2 && $upload3) {
					$uD = mysqli_query($con, "UPDATE library SET pengarang='$pengarang', judul='$judul', tahun='$tahun', abstrak='$abstrak', id_topik='$topik', babiii='$b3name', babv='$b5name', babiv='$b4name' WHERE id_library=$id ");
					if ($uD) {
						echo "<script>
								swal('Data Telah Diubah!', {
									icon: 'success',
									button: false,
									timer: 2000
								});
								location=(href='index.php?anggota');
							</script>";
					}else{
						echo "<script>
							swal('Data Gagal Diubah!', {
								icon: 'error',
								button: false,
								timer: 2000
							});
						</script>";
					}
				}else{
					echo "<script>
						swal('File Gagal Diupload!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
				}
			}else{
				echo "<script>
						swal('Tipe File Tidak Sesuai!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
			}
			//cover 123
		}elseif ($cover != '' && $bab1 != '' && $bab2 != '' && $bab3 != '' && $bab4 == '' && $bab5 == '') {
			if ( ($typeC == 'image/jpeg' || $typeC == 'image/jpg' || $typeC == 'image/png') && ($type1 == 'application/pdf' && $type2 == 'application/pdf' && $type3 == 'application/pdf') ) {
				$upload1 = move_uploaded_file($tmp_cover, $dir_cover);
				$upload2 = move_uploaded_file($tmp_bab1, $dir_ta1);
				$upload3 = move_uploaded_file($tmp_bab2, $dir_ta2);
				$upload4 = move_uploaded_file($tmp_bab3, $dir_ta3);
				if ($upload1 && $upload2 && $upload3 && $upload4) {
					$uD = mysqli_query($con, "UPDATE library SET pengarang='$pengarang', judul='$judul', tahun='$tahun', abstrak='$abstrak', id_topik='$topik', cover='$coname', babi='$b1name', babii='$b2name', babiii='$b3name' WHERE id_library=$id ");
					if ($uD) {
						echo "<script>
								swal('Data Telah Diubah!', {
									icon: 'success',
									button: false,
									timer: 2000
								});
								location=(href='index.php?anggota');
							</script>";
					}else{
						echo "<script>
							swal('Data Gagal Diubah!', {
								icon: 'error',
								button: false,
								timer: 2000
							});
						</script>";
					}
				}else{
					echo "<script>
						swal('File Gagal Diupload!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
				}
			}else{
				echo "<script>
						swal('Tipe File Tidak Sesuai!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
			}
		}
		//cover 124
		elseif ($cover != '' && $bab1 != '' && $bab2 != '' && $bab3 == '' && $bab4 != '' && $bab5 == '') {
			if ( ($typeC == 'image/jpeg' || $typeC == 'image/jpg' || $typeC == 'image/png') && ($type4 == 'application/pdf' && $type2 == 'application/pdf' && $type1 == 'application/pdf') ) {
				$upload1 = move_uploaded_file($tmp_cover, $dir_cover);
				$upload2 = move_uploaded_file($tmp_bab4, $dir_ta4);
				$upload3 = move_uploaded_file($tmp_bab2, $dir_ta2);
				$upload4 = move_uploaded_file($tmp_bab1, $dir_ta1);
				if ($upload1 && $upload2 && $upload3 && $upload4) {
					$uD = mysqli_query($con, "UPDATE library SET pengarang='$pengarang', judul='$judul', tahun='$tahun', abstrak='$abstrak', id_topik='$topik', cover='$coname', babiv='$b4name', babii='$b2name', babi='$b1name' WHERE id_library=$id ");
					if ($uD) {
						echo "<script>
								swal('Data Telah Diubah!', {
									icon: 'success',
									button: false,
									timer: 2000
								});
								location=(href='index.php?anggota');
							</script>";
					}else{
						echo "<script>
							swal('Data Gagal Diubah!', {
								icon: 'error',
								button: false,
								timer: 2000
							});
						</script>";
					}
				}else{
					echo "<script>
						swal('File Gagal Diupload!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
				}
			}else{
				echo "<script>
						swal('Tipe File Tidak Sesuai!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
			}
		}
		//cover 125
		elseif ($cover != '' && $bab1 != '' && $bab2 != '' && $bab3 == '' && $bab4 == '' && $bab5 != '') {
			if ( ($typeC == 'image/jpeg' || $typeC == 'image/jpg' || $typeC == 'image/png') && ($type5 == 'application/pdf' && $type2 == 'application/pdf' && $type1 == 'application/pdf') ) {
				$upload1 = move_uploaded_file($tmp_cover, $dir_cover);
				$upload2 = move_uploaded_file($tmp_bab5, $dir_ta5);
				$upload3 = move_uploaded_file($tmp_bab2, $dir_ta2);
				$upload4 = move_uploaded_file($tmp_bab1, $dir_ta1);
				if ($upload1 && $upload2 && $upload3 && $upload4) {
					$uD = mysqli_query($con, "UPDATE library SET pengarang='$pengarang', judul='$judul', tahun='$tahun', abstrak='$abstrak', id_topik='$topik', cover='$coname', babiv='$b4name', babii='$b2name', babiii='$b3name' WHERE id_library=$id ");
					if ($uD) {
						echo "<script>
								swal('Data Telah Diubah!', {
									icon: 'success',
									button: false,
									timer: 2000
								});
								location=(href='index.php?anggota');
							</script>";
					}else{
						echo "<script>
							swal('Data Gagal Diubah!', {
								icon: 'error',
								button: false,
								timer: 2000
							});
						</script>";
					}
				}else{
					echo "<script>
						swal('File Gagal Diupload!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
				}
			}else{
				echo "<script>
						swal('Tipe File Tidak Sesuai!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
			}
		}
		//cover 234
		elseif ($cover != '' && $bab1 == '' && $bab2 != '' && $bab3 != '' && $bab4 != '' && $bab5 == '') {
			if ( ($typeC == 'image/jpeg' || $typeC == 'image/jpg' || $typeC == 'image/png') && ($type4 == 'application/pdf' && $type2 == 'application/pdf' && $type3 == 'application/pdf') ) {
				$upload1 = move_uploaded_file($tmp_cover, $dir_cover);
				$upload2 = move_uploaded_file($tmp_bab4, $dir_ta4);
				$upload3 = move_uploaded_file($tmp_bab2, $dir_ta2);
				$upload4 = move_uploaded_file($tmp_bab3, $dir_ta3);
				if ($upload1 && $upload2 && $upload3 && $upload4) {
					$uD = mysqli_query($con, "UPDATE library SET pengarang='$pengarang', judul='$judul', tahun='$tahun', abstrak='$abstrak', id_topik='$topik', cover='$coname', babiv='$b4name', babii='$b2name', babiii='$b3name' WHERE id_library=$id ");
					if ($uD) {
						echo "<script>
								swal('Data Telah Diubah!', {
									icon: 'success',
									button: false,
									timer: 2000
								});
								location=(href='index.php?anggota');
							</script>";
					}else{
						echo "<script>
							swal('Data Gagal Diubah!', {
								icon: 'error',
								button: false,
								timer: 2000
							});
						</script>";
					}
				}else{
					echo "<script>
						swal('File Gagal Diupload!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
				}
			}else{
				echo "<script>
						swal('Tipe File Tidak Sesuai!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
			}
		}
		//cover 235
		elseif ($cover != '' && $bab1 == '' && $bab2 != '' && $bab3 != '' && $bab4 == '' && $bab5 != '') {
			if ( ($typeC == 'image/jpeg' || $typeC == 'image/jpg' || $typeC == 'image/png') && ($type5 == 'application/pdf' && $type2 == 'application/pdf' && $type3 == 'application/pdf') ) {
				$upload1 = move_uploaded_file($tmp_cover, $dir_cover);
				$upload2 = move_uploaded_file($tmp_bab5, $dir_ta5);
				$upload3 = move_uploaded_file($tmp_bab2, $dir_ta2);
				$upload4 = move_uploaded_file($tmp_bab3, $dir_ta3);
				if ($upload1 && $upload2 && $upload3 && $upload4) {
					$uD = mysqli_query($con, "UPDATE library SET pengarang='$pengarang', judul='$judul', tahun='$tahun', abstrak='$abstrak', id_topik='$topik', cover='$coname', babv='$b5name', babii='$b2name', babiii='$b3name' WHERE id_library=$id ");
					if ($uD) {
						echo "<script>
								swal('Data Telah Diubah!', {
									icon: 'success',
									button: false,
									timer: 2000
								});
								location=(href='index.php?anggota');
							</script>";
					}else{
						echo "<script>
							swal('Data Gagal Diubah!', {
								icon: 'error',
								button: false,
								timer: 2000
							});
						</script>";
					}
				}else{
					echo "<script>
						swal('File Gagal Diupload!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
				}
			}else{
				echo "<script>
						swal('Tipe File Tidak Sesuai!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
			}
		}
		//cover 345
		elseif ($cover != '' && $bab1 == '' && $bab2 == '' && $bab3 != '' && $bab4 != '' && $bab5 != '') {
			if ( ($typeC == 'image/jpeg' || $typeC == 'image/jpg' || $typeC == 'image/png') && ($type5 == 'application/pdf' && $type4 == 'application/pdf' && $type3 == 'application/pdf') ) {
				$upload1 = move_uploaded_file($tmp_cover, $dir_cover);
				$upload2 = move_uploaded_file($tmp_bab5, $dir_ta5);
				$upload3 = move_uploaded_file($tmp_bab4, $dir_ta4);
				$upload4 = move_uploaded_file($tmp_bab3, $dir_ta3);
				if ($upload1 && $upload2 && $upload3 && $upload4) {
					$uD = mysqli_query($con, "UPDATE library SET pengarang='$pengarang', judul='$judul', tahun='$tahun', abstrak='$abstrak', id_topik='$topik', cover='$coname', babi='$b1name', babii='$b2name', babiii='$b3name' WHERE id_library=$id ");
					if ($uD) {
						echo "<script>
								swal('Data Telah Diubah!', {
									icon: 'success',
									button: false,
									timer: 2000
								});
								location=(href='index.php?anggota');
							</script>";
					}else{
						echo "<script>
							swal('Data Gagal Diubah!', {
								icon: 'error',
								button: false,
								timer: 2000
							});
						</script>";
					}
				}else{
					echo "<script>
						swal('File Gagal Diupload!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
				}
			}else{
				echo "<script>
						swal('Tipe File Tidak Sesuai!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
			}
		}
		//cover 134
		elseif ($cover != '' && $bab1 != '' && $bab2 == '' && $bab3 != '' && $bab4 != '' && $bab5 == '') {
			if ( ($typeC == 'image/jpeg' || $typeC == 'image/jpg' || $typeC == 'image/png') && ($type1 == 'application/pdf' && $type4 == 'application/pdf' && $type3 == 'application/pdf') ) {
				$upload1 = move_uploaded_file($tmp_cover, $dir_cover);
				$upload2 = move_uploaded_file($tmp_bab1, $dir_ta1);
				$upload3 = move_uploaded_file($tmp_bab4, $dir_ta4);
				$upload4 = move_uploaded_file($tmp_bab3, $dir_ta3);
				if ($upload1 && $upload2 && $upload3 && $upload4) {
					$uD = mysqli_query($con, "UPDATE library SET pengarang='$pengarang', judul='$judul', tahun='$tahun', abstrak='$abstrak', id_topik='$topik', cover='$coname', babi='$b1name', babiv='$b4name', babiii='$b3name' WHERE id_library=$id ");
					if ($uD) {
						echo "<script>
								swal('Data Telah Diubah!', {
									icon: 'success',
									button: false,
									timer: 2000
								});
								location=(href='index.php?anggota');
							</script>";
					}else{
						echo "<script>
							swal('Data Gagal Diubah!', {
								icon: 'error',
								button: false,
								timer: 2000
							});
						</script>";
					}
				}else{
					echo "<script>
						swal('File Gagal Diupload!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
				}
			}else{
				echo "<script>
						swal('Tipe File Tidak Sesuai!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
			}
		}
		//cover 135
		elseif ($cover != '' && $bab1 != '' && $bab2 == '' && $bab3 != '' && $bab4 == '' && $bab5 != '') {
			if ( ($typeC == 'image/jpeg' || $typeC == 'image/jpg' || $typeC == 'image/png') && ($type1 == 'application/pdf' && $type5 == 'application/pdf' && $type3 == 'application/pdf') ) {
				$upload1 = move_uploaded_file($tmp_cover, $dir_cover);
				$upload2 = move_uploaded_file($tmp_bab1, $dir_ta1);
				$upload3 = move_uploaded_file($tmp_bab5, $dir_ta5);
				$upload4 = move_uploaded_file($tmp_bab3, $dir_ta3);
				if ($upload1 && $upload2 && $upload3 && $upload4) {
					$uD = mysqli_query($con, "UPDATE library SET pengarang='$pengarang', judul='$judul', tahun='$tahun', abstrak='$abstrak', id_topik='$topik', cover='$coname', babi='$b1name', babv='$b5name', babiii='$b3name' WHERE id_library=$id ");
					if ($uD) {
						echo "<script>
								swal('Data Telah Diubah!', {
									icon: 'success',
									button: false,
									timer: 2000
								});
								location=(href='index.php?anggota');
							</script>";
					}else{
						echo "<script>
							swal('Data Gagal Diubah!', {
								icon: 'error',
								button: false,
								timer: 2000
							});
						</script>";
					}
				}else{
					echo "<script>
						swal('File Gagal Diupload!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
				}
			}else{
				echo "<script>
						swal('Tipe File Tidak Sesuai!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
			}
		}
		//cover 145
		elseif ($cover != '' && $bab1 != '' && $bab2 == '' && $bab3 == '' && $bab4 != '' && $bab5 != '') {
			if ( ($typeC == 'image/jpeg' || $typeC == 'image/jpg' || $typeC == 'image/png') && ($type1 == 'application/pdf' && $type4 == 'application/pdf' && $type5 == 'application/pdf') ) {
				$upload1 = move_uploaded_file($tmp_cover, $dir_cover);
				$upload2 = move_uploaded_file($tmp_bab1, $dir_ta1);
				$upload3 = move_uploaded_file($tmp_bab4, $dir_ta4);
				$upload4 = move_uploaded_file($tmp_bab5, $dir_ta5);
				if ($upload1 && $upload2 && $upload3 && $upload4) {
					$uD = mysqli_query($con, "UPDATE library SET pengarang='$pengarang', judul='$judul', tahun='$tahun', abstrak='$abstrak', id_topik='$topik', cover='$coname', babi='$b1name', babiv='$b4name', babv='$b5name' WHERE id_library=$id ");
					if ($uD) {
						echo "<script>
								swal('Data Telah Diubah!', {
									icon: 'success',
									button: false,
									timer: 2000
								});
								location=(href='index.php?anggota');
							</script>";
					}else{
						echo "<script>
							swal('Data Gagal Diubah!', {
								icon: 'error',
								button: false,
								timer: 2000
							});
						</script>";
					}
				}else{
					echo "<script>
						swal('File Gagal Diupload!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
				}
			}else{
				echo "<script>
						swal('Tipe File Tidak Sesuai!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
			}
		}
		//cover 245
		elseif ($cover != '' && $bab1 == '' && $bab2 == '' && $bab3 == '' && $bab4 != '' && $bab5 != '') {
			if ( ($typeC == 'image/jpeg' || $typeC == 'image/jpg' || $typeC == 'image/png') && ($type2 == 'application/pdf' && $type4 == 'application/pdf' && $type5 == 'application/pdf') ) {
				$upload1 = move_uploaded_file($tmp_cover, $dir_cover);
				$upload2 = move_uploaded_file($tmp_bab2, $dir_ta2);
				$upload3 = move_uploaded_file($tmp_bab4, $dir_ta4);
				$upload4 = move_uploaded_file($tmp_bab5, $dir_ta5);
				if ($upload1 && $upload2 && $upload3 && $upload4) {
					$uD = mysqli_query($con, "UPDATE library SET pengarang='$pengarang', judul='$judul', tahun='$tahun', abstrak='$abstrak', id_topik='$topik', cover='$coname', babii='$b2name', babiv='$b4name', babv='$b5name' WHERE id_library=$id ");
					if ($uD) {
						echo "<script>
								swal('Data Telah Diubah!', {
									icon: 'success',
									button: false,
									timer: 2000
								});
								location=(href='index.php?anggota');
							</script>";
					}else{
						echo "<script>
							swal('Data Gagal Diubah!', {
								icon: 'error',
								button: false,
								timer: 2000
							});
						</script>";
					}
				}else{
					echo "<script>
						swal('File Gagal Diupload!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
				}
			}else{
				echo "<script>
						swal('Tipe File Tidak Sesuai!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
			}
		}
		//1234
		elseif ($cover == '' && $bab1 != '' && $bab2 != '' && $bab3 != '' && $bab4 != '' && $bab5 == '') {
			if ( $type2 == 'application/pdf' && $type4 == 'application/pdf' && $type1 == 'application/pdf' && $type3 == 'application/pdf' ) {
				$upload1 = move_uploaded_file($tmp_bab1, $dir_ta1);
				$upload2 = move_uploaded_file($tmp_bab2, $dir_ta2);
				$upload3 = move_uploaded_file($tmp_bab4, $dir_ta4);
				$upload4 = move_uploaded_file($tmp_bab3, $dir_ta3);
				if ($upload1 && $upload2 && $upload3 && $upload4) {
					$uD = mysqli_query($con, "UPDATE library SET pengarang='$pengarang', judul='$judul', tahun='$tahun', abstrak='$abstrak', id_topik='$topik',  babi='$b1name', babii='$b2name', babiv='$b4name', babiii='$b3name' WHERE id_library=$id ");
					if ($uD) {
						echo "<script>
								swal('Data Telah Diubah!', {
									icon: 'success',
									button: false,
									timer: 2000
								});
								location=(href='index.php?anggota');
							</script>";
					}else{
						echo "<script>
							swal('Data Gagal Diubah!', {
								icon: 'error',
								button: false,
								timer: 2000
							});
						</script>";
					}
				}else{
					echo "<script>
						swal('File Gagal Diupload!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
				}
			}else{
				echo "<script>
						swal('Tipe File Tidak Sesuai!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
			}
		}
		//1235
		elseif ($cover == '' && $bab1 != '' && $bab2 != '' && $bab3 != '' && $bab4 == '' && $bab5 != '') {
			if ( $type2 == 'application/pdf' && $type5 == 'application/pdf' && $type1 == 'application/pdf' && $type3 == 'application/pdf' ) {
				$upload1 = move_uploaded_file($tmp_bab1, $dir_ta1);
				$upload2 = move_uploaded_file($tmp_bab2, $dir_ta2);
				$upload3 = move_uploaded_file($tmp_bab5, $dir_ta5);
				$upload4 = move_uploaded_file($tmp_bab3, $dir_ta3);
				if ($upload1 && $upload2 && $upload3 && $upload4) {
					$uD = mysqli_query($con, "UPDATE library SET pengarang='$pengarang', judul='$judul', tahun='$tahun', abstrak='$abstrak', id_topik='$topik',  babi='$b1name', babii='$b2name', babv='$b5name', babiii='$b3name' WHERE id_library=$id ");
					if ($uD) {
						echo "<script>
								swal('Data Telah Diubah!', {
									icon: 'success',
									button: false,
									timer: 2000
								});
								location=(href='index.php?anggota');
							</script>";
					}else{
						echo "<script>
							swal('Data Gagal Diubah!', {
								icon: 'error',
								button: false,
								timer: 2000
							});
						</script>";
					}
				}else{
					echo "<script>
						swal('File Gagal Diupload!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
				}
			}else{
				echo "<script>
						swal('Tipe File Tidak Sesuai!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
			}
		}
		//2345
		elseif ($cover == '' && $bab1 == '' && $bab2 != '' && $bab3 != '' && $bab4 != '' && $bab5 != '') {
			if ( $type2 == 'application/pdf' && $type4 == 'application/pdf' && $type5 == 'application/pdf' && $type3 == 'application/pdf' ) {
				$upload1 = move_uploaded_file($tmp_bab5, $dir_ta5);
				$upload2 = move_uploaded_file($tmp_bab2, $dir_ta2);
				$upload3 = move_uploaded_file($tmp_bab4, $dir_ta4);
				$upload4 = move_uploaded_file($tmp_bab3, $dir_ta3);
				if ($upload1 && $upload2 && $upload3 && $upload4) {
					$uD = mysqli_query($con, "UPDATE library SET pengarang='$pengarang', judul='$judul', tahun='$tahun', abstrak='$abstrak', id_topik='$topik',  babv='$b5name', babii='$b2name', babiv='$b4name', babiii='$b3name' WHERE id_library=$id ");
					if ($uD) {
						echo "<script>
								swal('Data Telah Diubah!', {
									icon: 'success',
									button: false,
									timer: 2000
								});
								location=(href='index.php?anggota');
							</script>";
					}else{
						echo "<script>
							swal('Data Gagal Diubah!', {
								icon: 'error',
								button: false,
								timer: 2000
							});
						</script>";
					}
				}else{
					echo "<script>
						swal('File Gagal Diupload!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
				}
			}else{
				echo "<script>
						swal('Tipe File Tidak Sesuai!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
			}
		}
		//cover 1234
		elseif ($cover != '' && $bab1 != '' && $bab2 != '' && $bab3 != '' && $bab4 != '' && $bab5 == '') {
			if ( ($typeC == 'image/jpeg' || $typeC == 'image/jpg' || $typeC == 'image/png') && ($type1 == 'application/pdf' && $type4 == 'application/pdf' && $type3 == 'application/pdf' && $type2 == 'application/pdf') ) {
				$upload1 = move_uploaded_file($tmp_cover, $dir_cover);
				$upload2 = move_uploaded_file($tmp_bab1, $dir_ta1);
				$upload3 = move_uploaded_file($tmp_bab4, $dir_ta4);
				$upload4 = move_uploaded_file($tmp_bab3, $dir_ta3);
				$upload5 = move_uploaded_file($tmp_bab2, $dir_ta2);
				if ($upload1 && $upload2 && $upload3 && $upload4) {
					$uD = mysqli_query($con, "UPDATE library SET pengarang='$pengarang', judul='$judul', tahun='$tahun', abstrak='$abstrak', id_topik='$topik', cover='$coname', babi='$b1name',  babii='$b2name', babiv='$b4name', babiii='$b3name' WHERE id_library=$id ");
					if ($uD) {
						echo "<script>
								swal('Data Telah Diubah!', {
									icon: 'success',
									button: false,
									timer: 2000
								});
								location=(href='index.php?anggota');
							</script>";
					}else{
						echo "<script>
							swal('Data Gagal Diubah!', {
								icon: 'error',
								button: false,
								timer: 2000
							});
						</script>";
					}
				}else{
					echo "<script>
						swal('File Gagal Diupload!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
				}
			}else{
				echo "<script>
						swal('Tipe File Tidak Sesuai!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
			}
		}
		//cover 1235
		elseif ($cover != '' && $bab1 != '' && $bab2 != '' && $bab3 != '' && $bab4 == '' && $bab5 != '') {
			if ( ($typeC == 'image/jpeg' || $typeC == 'image/jpg' || $typeC == 'image/png') && ($type1 == 'application/pdf' && $type5 == 'application/pdf' && $type3 == 'application/pdf' && $type2 == 'application/pdf') ) {
				$upload1 = move_uploaded_file($tmp_cover, $dir_cover);
				$upload2 = move_uploaded_file($tmp_bab1, $dir_ta1);
				$upload3 = move_uploaded_file($tmp_bab5, $dir_ta5);
				$upload4 = move_uploaded_file($tmp_bab3, $dir_ta3);
				$upload5 = move_uploaded_file($tmp_bab2, $dir_ta2);
				if ($upload1 && $upload2 && $upload3 && $upload4) {
					$uD = mysqli_query($con, "UPDATE library SET pengarang='$pengarang', judul='$judul', tahun='$tahun', abstrak='$abstrak', id_topik='$topik', cover='$coname', babi='$b1name',  babii='$b2name', babv='$b5name', babiii='$b3name' WHERE id_library=$id ");
					if ($uD) {
						echo "<script>
								swal('Data Telah Diubah!', {
									icon: 'success',
									button: false,
									timer: 2000
								});
								location=(href='index.php?anggota');
							</script>";
					}else{
						echo "<script>
							swal('Data Gagal Diubah!', {
								icon: 'error',
								button: false,
								timer: 2000
							});
						</script>";
					}
				}else{
					echo "<script>
						swal('File Gagal Diupload!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
				}
			}else{
				echo "<script>
						swal('Tipe File Tidak Sesuai!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
			}
		}
		//cover 1245
		elseif ($cover != '' && $bab1 != '' && $bab2 != '' && $bab3 == '' && $bab4 != '' && $bab5 != '') {
			if ( ($typeC == 'image/jpeg' || $typeC == 'image/jpg' || $typeC == 'image/png') && ($type1 == 'application/pdf' && $type4 == 'application/pdf' && $type2 == 'application/pdf' && $type5 == 'application/pdf') ) {
				$upload1 = move_uploaded_file($tmp_cover, $dir_cover);
				$upload2 = move_uploaded_file($tmp_bab1, $dir_ta1);
				$upload3 = move_uploaded_file($tmp_bab4, $dir_ta4);
				$upload4 = move_uploaded_file($tmp_bab2, $dir_ta2);
				$upload5 = move_uploaded_file($tmp_bab5, $dir_ta5);
				if ($upload1 && $upload2 && $upload3 && $upload4) {
					$uD = mysqli_query($con, "UPDATE library SET pengarang='$pengarang', judul='$judul', tahun='$tahun', abstrak='$abstrak', id_topik='$topik', cover='$coname', babi='$b1name',  babv='$b5name', babiv='$b4name', babii='$b2name' WHERE id_library=$id ");
					if ($uD) {
						echo "<script>
								swal('Data Telah Diubah!', {
									icon: 'success',
									button: false,
									timer: 2000
								});
								location=(href='index.php?anggota');
							</script>";
					}else{
						echo "<script>
							swal('Data Gagal Diubah!', {
								icon: 'error',
								button: false,
								timer: 2000
							});
						</script>";
					}
				}else{
					echo "<script>
						swal('File Gagal Diupload!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
				}
			}else{
				echo "<script>
						swal('Tipe File Tidak Sesuai!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
			}
		}
		//cover 1345
		elseif ($cover != '' && $bab1 != '' && $bab2 == '' && $bab3 != '' && $bab4 != '' && $bab5 != '') {
			if ( ($typeC == 'image/jpeg' || $typeC == 'image/jpg' || $typeC == 'image/png') && ($type1 == 'application/pdf' && $type4 == 'application/pdf' && $type3 == 'application/pdf' && $type5 == 'application/pdf') ) {
				$upload1 = move_uploaded_file($tmp_cover, $dir_cover);
				$upload2 = move_uploaded_file($tmp_bab1, $dir_ta1);
				$upload3 = move_uploaded_file($tmp_bab4, $dir_ta4);
				$upload4 = move_uploaded_file($tmp_bab3, $dir_ta3);
				$upload5 = move_uploaded_file($tmp_bab5, $dir_ta5);
				if ($upload1 && $upload2 && $upload3 && $upload4) {
					$uD = mysqli_query($con, "UPDATE library SET pengarang='$pengarang', judul='$judul', tahun='$tahun', abstrak='$abstrak', id_topik='$topik', cover='$coname', babi='$b1name',  babv='$b5name', babiv='$b4name', babiii='$b3name' WHERE id_library=$id ");
					if ($uD) {
						echo "<script>
								swal('Data Telah Diubah!', {
									icon: 'success',
									button: false,
									timer: 2000
								});
								location=(href='index.php?anggota');
							</script>";
					}else{
						echo "<script>
							swal('Data Gagal Diubah!', {
								icon: 'error',
								button: false,
								timer: 2000
							});
						</script>";
					}
				}else{
					echo "<script>
						swal('File Gagal Diupload!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
				}
			}else{
				echo "<script>
						swal('Tipe File Tidak Sesuai!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
			}
		}
		//cover 2345
		elseif ($cover != '' && $bab1 == '' && $bab2 != '' && $bab3 != '' && $bab4 != '' && $bab5 != '') {
			if ( ($typeC == 'image/jpeg' || $typeC == 'image/jpg' || $typeC == 'image/png') && ($type2 == 'application/pdf' && $type4 == 'application/pdf' && $type3 == 'application/pdf' && $type5 == 'application/pdf') ) {
				$upload1 = move_uploaded_file($tmp_cover, $dir_cover);
				$upload2 = move_uploaded_file($tmp_bab2, $dir_ta2);
				$upload3 = move_uploaded_file($tmp_bab4, $dir_ta4);
				$upload4 = move_uploaded_file($tmp_bab3, $dir_ta3);
				$upload5 = move_uploaded_file($tmp_bab5, $dir_ta5);
				if ($upload1 && $upload2 && $upload3 && $upload4) {
					$uD = mysqli_query($con, "UPDATE library SET pengarang='$pengarang', judul='$judul', tahun='$tahun', abstrak='$abstrak', id_topik='$topik', cover='$coname', babii='$b2name',  babv='$b5name', babiv='$b4name', babiii='$b3name' WHERE id_library=$id ");
					if ($uD) {
						echo "<script>
								swal('Data Telah Diubah!', {
									icon: 'success',
									button: false,
									timer: 2000
								});
								location=(href='index.php?anggota');
							</script>";
					}else{
						echo "<script>
							swal('Data Gagal Diubah!', {
								icon: 'error',
								button: false,
								timer: 2000
							});
						</script>";
					}
				}else{
					echo "<script>
						swal('File Gagal Diupload!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
				}
			}else{
				echo "<script>
						swal('Tipe File Tidak Sesuai!', {
							icon: 'error',
							button: false,
							timer: 2000
						});
					</script>";
			}
		}
		else{
			$uD = mysqli_query($con, "UPDATE library SET pengarang='$pengarang', judul='$judul', tahun='$tahun', abstrak='$abstrak', id_topik='$topik' WHERE id_library=$id ");
			if ($uD) {
				echo "<script>
						swal('Data Telah Diubah!', {
							icon: 'success',
							button: false,
							timer: 2000
						});
						location=(href='index.php?anggota');
					</script>";
			}else{
				echo "<script>
					swal('Data Gagal Diubah!', {
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