<?php  
	$no_pengembalian = $_GET['no_pengembalian']; 
	$koneksi->query("delete from pengembalian where no_pengembalian='$no_pengembalian'");

?>

<script type="text/javascript">
	window.location.href="?page=pengembalian&aksi=kosong";
	alert("Data Berhasil di hapus");
</script>