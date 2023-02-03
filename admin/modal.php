<!-- Modal Tambah Pengguna -->
<div id="tambahPengguna" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Tambah Pengguna</h3>
  </div>
  <div class="modal-body">
    <p>
    	<form method="POST" action=""  class="form-horizontal">

    		<div class="control-group">											
			<label class="control-label" for="firstname">Nomor Registrasi</label>
			<div class="controls">
				<input type="text" class="span4" name="noreg" id="noreg" placeholder="Nomor Registrasi">
			</div> <!-- /controls -->				
		</div> <!-- /control-group -->

		<div class="control-group">											
			<label class="control-label" for="nama">Nama Lengkap</label>
			<div class="controls">
				<input type="text" class="span4" name="nama" id="nama" placeholder="Nama Lengkap">
			</div> <!-- /controls -->				
		</div> <!-- /control-group -->
    </p>
  </div>
  <div class="modal-footer">
    <button type="submit" class="btn btn-primary" name="tambahAngota">Tambah</button>
    <button class="btn" data-dismiss="modal" aria-hidden="true">Batal</button>
    </form>
  </div>
</div>

<!-- Modal Tambah Topik -->
<div id="tambahKategori" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Tambah Topik / Kategori</h3>
  </div>
  <div class="modal-body">
    <form method="POST" action="" class="form-horizontal">
      <div class="form-group">
        <label class="control-label" for="topik">Topik / Kategori TA</label>
        <div class="controls">
          <input type="text" name="topik" class="span4" placeholder="Topik / Kategori">
        </div>
      </div>
  </div>
  <div class="modal-footer">
    <button type="submit" name="tambahTopik" class="btn btn-primary">Tambah</button>
    <button class="btn" data-dismiss="modal" aria-hidden="true">Batal</button>
    </form>
  </div>
</div>

<!-- Modal Update Topik -->
<div id="editTopik" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Ubah Topik / Kategori</h3>
  </div>
  <div class="modal-body">
    <form method="POST" action="" class="form-horizontal">
      <div class="control-group">
        <label class="control-label" for="topik">Topik / Kategori TA</label>
        <div class="controls">
          <p class="hasil-data"></p>
        </div>
      </div>
  </div>
  <div class="modal-footer">
    <button type="submit" name="updateTopik" class="btn btn-primary">Tambah</button>
    <button class="btn" data-dismiss="modal" aria-hidden="true">Batal</button>
    </form>
  </div>
</div>

<!-- Modal Edit Anggota -->
<div id="editAnggota" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Edit Anggota</h3>
  </div>
  <div class="modal-body">
    <form method="POST" action="" class="form-horizontal">
    <p class="hasil-data"></p>
  </div>
  <div class="modal-footer">
    <input type="submit" name="simpanAnggota" class="btn btn-primary" value="Simpan">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Batal</button>
  </form>
  </div>
</div>

<!-- Modal Tambah Data -->
<div id="tambahData" class="modal hide fade modal-lg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Tambah Data</h3>
  </div>
  <div class="modal-body">
    <form method="POST" action="" class="form-horizontal" enctype="multipart/form-data">
      
      <div class="control-group">
        <label class="control-label" for="pegnarang">Pengarang *</label>
        <div class="controls">
          <select name="pengarang" class="span4">
            <option value=""> -- Pilih Pengarang -- </option>
          <?php  
          $sP = mysqli_query($con, "SELECT * FROM users WHERE akses!=1 AND reg=1");
          while ($row = mysqli_fetch_assoc($sP)) {
            echo "<option value='".$row['id_user']."'>".$row['nama']."</option>";
          }
          ?>
          </select>
        </div>
      </div>

      <div class="control-group">
        <label class="control-label" for="judul">Judul *</label>
        <div class="controls">
          <input type="text" name="judul" class="span4" placeholder="Judul TA">
        </div>
      </div>

      <div class="control-group">
        <label class="control-label" for="abstrak">Abstrak *</label>
        <div class="controls">
          <textarea name="abstrak" class="span4"></textarea>
        </div>
      </div>

      <div class="control-group">
        <label class="control-label" for="topik">Topik *</label>
        <div class="controls">
          <select name="topik" class="span4">
            <option value=""> -- Pilih Topik -- </option>
          <?php  
          $sT = mysqli_query($con, "SELECT * FROM topik");
          while ($row = mysqli_fetch_assoc($sT)) {
            echo "<option value='".$row['id_topik']."'>".$row['topik']."</option>";
          }
          ?>
          </select>
        </div>
      </div>

      <div class="control-group">
        <label class="control-label" for="tahun">Tahun *</label>
        <div class="controls">
          <input type="text" name="tahun" class="span4" placeholder="Tahun">
        </div>
      </div>

      <div class="control-group">
        <label class="control-label" for="cover">Cover</label>
        <div class="controls">
          <input type="file" name="cover" class="span4">
        </div>
      </div>

      <div class="control-group">
        <label class="control-label" for="babi">Bab I *</label>
        <div class="controls">
          <input type="file" name="babi" class="span4">
        </div>
      </div>

      <div class="control-group">
        <label class="control-label" for="babii">Bab II *</label>
        <div class="controls">
          <input type="file" name="babii" class="span4">
        </div>
      </div>

      <div class="control-group">
        <label class="control-label" for="babiii">Bab III *</label>
        <div class="controls">
          <input type="file" name="babiii" class="span4">
        </div>
      </div>

      <div class="control-group">
        <label class="control-label" for="babiv">Bab IV *</label>
        <div class="controls">
          <input type="file" name="babiv" class="span4">
        </div>
      </div>

      <div class="control-group">
        <label class="control-label" for="babv">Bab V *</label>
        <div class="controls">
          <input type="file" name="babv" class="span4">
        </div>
      </div>

  </div>
  <div class="modal-footer">
    <button type="submit" name="tambahData" class="btn btn-primary">Tambah</button>
    <button class="btn" data-dismiss="modal" aria-hidden="true">Batal</button>
    </form>
  </div>
</div>

<!-- Modal Edit Data -->
<div id="editData" class="modal hide fade modal-lg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Edit Data</h3>
  </div>
  <div class="modal-body">
    <form method="POST" action="" class="form-horizontal" enctype="multipart/form-data">
    <p class="hasil-data"></p>
  </div>
  <div class="modal-footer">
    <button type="submit" name="simpanData" class="btn btn-primary">Simpan</button>
    <button class="btn" data-dismiss="modal" aria-hidden="true">Batal</button>
    </form>
  </div>
</div>