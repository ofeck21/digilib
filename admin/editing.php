<?php  
require_once '../config.php';
if(isset($_POST['idx'])) {
        $id = $_POST['idx'];      
        $sql = mysqli_query ($con, "SELECT * FROM users WHERE id_user = '$id' ");
        $row = mysqli_fetch_assoc($sql);

?>
<form method="POST" action=""  class="form-horizontal">
  <input type="hidden" name="id" value="<?php echo $id ?>">
      <div class="control-group">                     
    <label class="control-label" for="firstname">Nomor Registrasi</label>
    <div class="controls">
      <input type="text" class="span4" name="noreg" id="noreg" value="<?php echo $row['noreg'] ?>">
    </div> <!-- /controls -->       
  </div> <!-- /control-group -->

  <div class="control-group">                     
    <label class="control-label" for="firstname">Nama Lengkap</label>
    <div class="controls">
      <input type="text" class="span4" name="nama" id="nama" value="<?php echo $row['nama'] ?>">
    </div> <!-- /controls -->       
  </div> <!-- /control-group -->

  <div class="control-group">                     
    <label class="control-label" for="firstname">Status Registrasi</label>
    <div class="controls">
      <select name="status" class="span4">
        <option value="<?php echo $row['reg'] ?>"> -- 
          <?php  
            if ($row['reg']==1) {
              echo "Sudah";
            }else{
              echo "Belum";
            }
          ?> --
        </option>
        <option value="1">Sudah</option>
        <option value="0">Belum</option>
      </select>
    </div> <!-- /controls -->       
  </div> <!-- /control-group -->
<?php } 
elseif (isset($_POST['topik'])) {
  $id = $_POST['topik'];
  $sql = mysqli_query ($con, "SELECT * FROM topik WHERE id_topik = '$id' ");
  $row = mysqli_fetch_assoc($sql);
?>

<form method="POST" action=""  class="form-horizontal">

  <input type="hidden" name="id" value="<?php echo $id ?>">

  <input type="text" class="span4" name="topik" id="topik" value="<?php echo $row['topik'] ?>">

<?php 
}
elseif (isset($_POST['data'])) {
  $id = $_POST['data'];
  $sql = mysqli_query($con, "SELECT * FROM (( library 
                  INNER JOIN users ON library.pengarang = users.id_user) 
                  INNER JOIN topik ON library.id_topik = topik.id_topik ) WHERE id_library = $id");
  $r = mysqli_fetch_assoc($sql);
?>
      
<div class="control-group">
  <label class="control-label" for="pegnarang">Pengarang *</label>
  <div class="controls">
    <input type="hidden" name="id" value="<?php echo $id ?>">
    <select name="pengarang" class="span4">
      <option value="<?php echo $r['id_user'] ?>"> -- <?php echo $r['nama'] ?> -- </option>
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
    <input type="text" name="judul" class="span4" value="<?php echo $r['judul'] ?>">
  </div>
</div>

<div class="control-group">
  <label class="control-label" for="abstrak">Abstrak *</label>
  <div class="controls">
    <textarea name="abstrak" class="span4">
      <?php echo $r['abstrak'] ?>
    </textarea>
  </div>
</div>

<div class="control-group">
  <label class="control-label" for="topik">Topik *</label>
  <div class="controls">
    <select name="topik" class="span4">
      <option value="<?php echo $r['id_topik'] ?>"> -- <?php echo $r['topik'] ?> -- </option>
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
    <input type="text" name="tahun" class="span4" value="<?php echo $r['tahun'] ?>">
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

<?php
}
?>