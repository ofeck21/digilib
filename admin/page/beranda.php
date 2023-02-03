	      	<div class="span8">      		
	      		
	      		<div class="widget ">
	      			
	      			<div class="widget-header">
	      				<i class="icon-user"></i>
	      				<h3>Data Anggota</h3>
	      				 <a href="#tambahPengguna" role="button" class="btn btn-primary pull-right" data-toggle="modal" style="margin-top: 5px; margin-right: 5px;">Tambah Anggota</a>
	  				</div> <!-- /widget-header -->
					
					<div class="widget-content">

						<table class="table table-hover table-bordered">
							<tr>
								<th>No</th>
								<th>Nomor Registrasi</th>
								<th>Nama Lengkap</th>
								<th>Status Registrasi</th>
								<th>Aksi</th>
							</tr>
						

						<?php 
						$status = '';
						
							$qU = mysqli_query($con, "SELECT * FROM users WHERE akses!=1 ORDER BY id_user DESC");
							$no=1;
							while ($row = mysqli_fetch_assoc($qU)) { ?>

							<tr>
								<td><?php echo $no; ?></td>
								<td><?php echo $row['noreg']; ?></td>
								<td><?php echo $row['nama']; ?></td>
								<td>
									<?php  
									$status = $row['reg'];
									if ($status==1) {
										$status="<span class='btn btn-success btn-mini'>Sudah</span>";
									}else{
										$status="<span class='btn btn-warning btn-mini'>Belum</span>";
									}

									echo $status;

									?>
								</td>
								<td> <button class="btn btn-mini editAnggota" data-target="#editAnggota" id="<?php echo $row['id_user'] ?>" title="Ubah"  data-toggle='modal'><i class="icon-edit"></i></button> - <a class="btn btn-mini btn-danger" href="?hapus=<?php echo $row['id_user'] ?>" onclick="return confirm('Apa Kamu Yakin ?')" title="Hapus">  <i class="icon-trash"></i></a> </td>
							</tr>

						<?php 
						$no++;
							}
						?>
						</table>
					</div> <!-- /widget-content -->
						
				</div> <!-- /widget -->
	      		
		    </div> <!-- /span8 -->
	      	

	      	<div class="span4">      		
	      		
	      		<div class="widget ">
	      			
	      			<div class="widget-header">
	      				<i class="icon-tags"></i>
	      				<h3>Topik / Ketegori TA</h3>
	      				<a href="#tambahKategori" role="button" class="btn btn-primary pull-right" data-toggle="modal" style="margin-top: 5px; margin-right: 5px;">Tambah Topik</a>
	  				</div> <!-- /widget-header -->
					
					<div class="widget-content">
						<table class="table table-hover ">
							<tr>
								<th>No</th>
								<th>Topik</th>
								<th>Aksi</th>
							</tr>		

						<?php  
						$no = 1;
						$tQ = mysqli_query($con, "SELECT * FROM topik");
						if (mysqli_num_rows($tQ) > 0) {
							while ($row = mysqli_fetch_assoc($tQ)) {
								echo "<tr>
									<td>".$no."</td>
									<td>".$row['topik']."</td>
									<td> <button class='btn btn-mini editTopik' data-target='#editTopik' id='".$row['id_topik']."' title='Ubah'  data-toggle='modal'><i class='icon-edit'></i></button> - <a class='btn btn-mini btn-danger' href='?hapusTopik=".$row['id_topik']."' onclick=\"return confirm('Apa Kamu Yakin ?')\" title='Hapus'>  <i class='icon-trash'></i></a> </td>
								</tr>";
								$no++;
							}
						}
						?>
						</table>
					</div> <!-- /widget-content -->
						
				</div> <!-- /widget -->
	      		
		    </div> <!-- /span8 -->