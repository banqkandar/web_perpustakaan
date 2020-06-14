<?php 

	$kode_buku = $_GET['kode_buku'];

	$koneksi->query("delete from buku where kode_buku='$kode_buku'");

?>

<script type="text/javascript">
	window.location.href="?page=buku&aksi=kosong";
	alert("Data Berhasil di hapus");
</script>