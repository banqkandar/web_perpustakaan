<?php 

	$id_petugas = $_GET['id_petugas'];

	$koneksi->query("delete from petugas where id_petugas='$id_petugas'");

?>

<script type="text/javascript">
	window.location.href="?page=petugas&aksi=kosong";
	alert("Data Berhasil di hapus");
</script>