<?php 

	$no_peminjaman = $_GET['no_peminjaman'];

	$koneksi->query("delete from peminjaman where no_peminjaman='$no_peminjaman'");

?>

<script type="text/javascript">
	window.location.href="?page=peminjaman&aksi=kosong";
	alert("Data Berhasil di hapus");
</script>