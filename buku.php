<?php
session_start();
//require_once "core/init.php"; <- tidak digunakan untuk mencegah konflik karena belum login
require_once "function/db.php";

?>
<!DOCTYPE html>
<html>
<head>
	<title>Buku</title>
	<link href="assets/css/bootstrap.css" rel="stylesheet" />
	<link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   <!-- TABLE STYLES-->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />

	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="view/main.css"/>

	<script src="bootstrap/jquery.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>

	<div class="jumbotron" style="background-color:#0090BD; margin-bottom:3px;">
			<div class="container">
				<div class="row">
					<div class="col-md-3"> <br>
						<center><img src="img/book.png" width="68%"> </center>
					</div>
					<div class="col-md-8"> <br>
						<font face="lucida handwriting" size="8">  SISTEM INFORMASI PERPUSTAKAAN  </font></h2>
					</div>
				</div>
			</div>
		</div>
		<br>
<div class="col-md-12">
	<div class="panel panel-primary">
                        <div class="panel-heading">
                             <b>Data Buku Perpustakaan</b>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                        	<div class="col-md-12">
	<table class="table table-striped table-bordered table-hover" id="dataTables-example">
		<thead>
			<tr>
				<th>No</th>
                <th>Kode Buku</th>
                <th>Judul</th>
                <th>Kategori</th>
                <th>Pengarang</th>
                <th>Penerbit</th>
                <th>Tahun Terbit</th>
                <th>Lokasi</th>
                <th>ISBN</th>
            </tr>
        </thead>
        <tbody>

        	<?php

        		$sql = $koneksi ->query("select * FROM buku ORDER BY judul asc");
        		$no = 1;

        		while ($data=$sql -> fetch_assoc()) {

        		 

        	?>
        	<tr>
        		<td><?php echo $no; ?></td>
        		<td><?php echo $data['kode_buku']; ?></td>
        		<td><?php echo $data['judul'];?></a></td>
                <td><?php echo $data['kategori'];?></td>
        		<td><?php echo $data['pengarang'];?></td>
        		<td><?php echo $data['penerbit'];?></td>
        		<td><?php echo $data['tahun_terbit'];?></td>
        		<td><?php echo $data['lokasi'];?></td>
                <td><?php echo $data['isbn'];?></td>
        	</tr>
			<?php
				$no++;
			}
			?>
		</tbody>

	</table>
</div>
</div>
</div>
</div> <!-- akhir container-fluid -->

<footer class="container-fluid text-center">
	<p>Copyright &copy; 2018 Sistem Informasi Perpustakaan</a></p>
	<p>Santuy Team</p>
</footer>

<script>
$(document).ready(function(){
	$("#panel-pinjam").hide().fadeIn(1500);
	$(window).load(function(){
		$("#proses-pinjam").modal("show");
	});
});
</script>

    <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- CUSTOM SCRIPTS -->
    <script src="../assets/js/custom.js"></script>
</body>
</html>