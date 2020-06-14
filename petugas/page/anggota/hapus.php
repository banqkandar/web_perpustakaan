<?php 

	$no_anggota = $_GET['no_anggota'];

	$koneksi->query("delete from anggota where no_anggota='$no_anggota'");

?>

<script type="text/javascript">
	window.location.href="?page=anggota&aksi=kosong";
	alert("Data Berhasil di hapus");
</script>