<?php 
require_once '../config.php';
if (empty($_SESSION['digilib'])) {
	header('location:../login.php');
}else{
	if ($_SESSION['digiAkses']!=1) {
		header('location:../user/');
	}
}
require_once '../config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Admin - Digilib UIM</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600"
        rel="stylesheet">
<link href="css/font-awesome.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/pages/dashboard.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/sweetalert2.min.css">
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span
                    class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a><a class="brand" href="index.php">Admin - Digilib UIM </a>
      <div class="nav-collapse">
        <ul class="nav pull-right">
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="icon-user"></i> Admin <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="?settings">Settings</a></li>
              <li><a href="../logout.php">Logout</a></li>
            </ul>
          </li>
        </ul>
        <form class="navbar-search pull-right">
          <input type="text" class="search-query" placeholder="Cari">
        </form>
      </div>
      <!--/.nav-collapse --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /navbar-inner --> 
</div>
<!-- /navbar -->
<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container">
      <ul class="mainnav">
        <li><a href="index.php"><i class="icon-dashboard"></i><span>Beranda</span> </a> </li>
        <li><a href="?anggota"><i class="icon-list-alt"></i><span>Data Anggota</span> </a> </li>
        <li><a href="?ta"><i class="icon-book"></i><span>Draf TA</span> </a> </li>
      </ul>
    </div>
    <!-- /container --> 
  </div>
  <!-- /subnavbar-inner --> 
</div>
<!-- /subnavbar -->
<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
	      	
<?php  
if (isset($_GET['anggota'])) {
	require_once 'page/anggota.php';
}elseif (isset($_GET['ta'])) {
  require_once 'page/drafta.php';
}
else{
	require_once 'page/beranda.php';
}

?>
	      	
	  </div> <!-- /row -->
    </div>
    <!-- /container --> 
  </div>
  <!-- /main-inner --> 
</div>
<!-- /main -->

<div class="footer">
  <div class="footer-inner">
    <div class="container">
      <div class="row">
        <div class="span12"> &copy; 2018 Digital Library - Dibuat Dengan <i class="icon-heart"></i> Untuk Universitas Islam Madura. </div>
        <!-- /span12 --> 
      </div>
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /footer-inner --> 
</div>
<!-- /footer --> 

<?php 
require_once 'modal.php';
?>
<!-- Le javascript
================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 
<script src="js/jquery-1.7.2.min.js"></script> 
<script src="js/excanvas.min.js"></script> 
<script src="js/bootstrap.js"></script>
 
<script src="js/base.js"></script> 

<!-- Sweet Alert -->
<script src="js/sweetalert.min.js"></script>

<script type="text/javascript">
	 $(document).ready(function(){
        $(document).on('click', '.editAnggota', function(){
          var idx = $(this).attr("id");
          $.ajax({
                type : 'post',
                url : 'editing.php',
                data :  'idx='+ idx,
                success : function(data){
                $('.hasil-data').html(data);//menampilkan data ke dalam modal
                }
            });
        });

        $(document).on('click', '.editTopik', function(){
          var topik = $(this).attr("id");
          $.ajax({
                type : 'post',
                url : 'editing.php',
                data :  'topik='+ topik,
                success : function(data){
                $('.hasil-data').html(data);//menampilkan data ke dalam modal
                }
            });
        });

        $(document).on('click', '.editData', function(){
          var data = $(this).attr("id");
          $.ajax({
                type : 'post',
                url : 'editing.php',
                data :  'data='+ data,
                success : function(data){
                $('.hasil-data').html(data);//menampilkan data ke dalam modal
                }
            });
        });

    });
</script>

<?php 
require_once 'hapus.php'; 
require_once 'tambah.php';
require_once 'update.php';
?>

</body>
</html>
