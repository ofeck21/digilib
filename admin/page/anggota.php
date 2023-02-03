<div class="span12">
  <div class="widget">

    <div class="widget-header">
        <i class="icon-group"></i>
        <h3>Data Anggota</h3>
        <a href="#tambahData" role="button" class="btn btn-primary pull-right" data-toggle="modal" style="margin-top: 5px; margin-right: 5px;">Tambah Data</a>
    </div> <!-- /widget-header -->

    <div class="widget-content">
      <table class="table table-hover table-bordered">
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Judul TA </th>
          <th>Topik</th>
          <th>Tahun</th>
          <th>Status</th>
          <th>Aksi</th>
        </tr>
        <?php 
        $no = 1; 
        $sL = mysqli_query($con, "SELECT * FROM (( library 
                  INNER JOIN users ON library.pengarang = users.id_user) 
                  INNER JOIN topik ON library.id_topik = topik.id_topik ) ORDER BY id_library DESC");
        if (mysqli_num_rows($sL) == 0) {
          echo "<tr><td>Tidak Ada Data</td></tr>";
        }else{
        while ($row = mysqli_fetch_assoc($sL)) { ?>
          <tr>
            <td><?php echo $no ?></td>
            <td><?php echo $row['nama'] ?></td>
            <td><?php echo $row['judul'] ?></td>
            <td><?php echo $row['topik'] ?></td>
            <td><?php echo $row['tahun'] ?></td>
            <td>
              <?php 
              if ($row['status'] == 1){
                echo "<span class='btn btn-mini btn-success'>Lengkap</span>";
              }else{
                echo "<span class='btn btn-mini btn-danger'>Kurang</span>";
              }
              ?></td>
            <td>
              <a href="?detail=<?php echo $row['id_library']?>" class="btn btn-mini btn-info" title="Detail"><i class="icon-search"></i></a> - 
              <button class="btn btn-mini editData" data-target="#editData" id="<?php echo $row['id_library'] ?>" title="Ubah"  data-toggle='modal'><i class="icon-edit"></i></button> - <a class="btn btn-mini btn-danger" href="index.php?anggota&hapusData=<?php echo $row['id_library'] ?>" onclick="return confirm('Apa Kamu Yakin ?')" title="Hapus">  <i class="icon-trash"></i></a>
            </td>
          </tr>
        <?php 
        $no++;
         } 
        }?>
      </table>
    </div>
  
  </div>
</div>