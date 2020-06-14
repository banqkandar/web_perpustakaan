<?php
	

	$koneksi = new mysqli("localhost","root","","perpus");

	$filename = "peminjaman_exel-(".date('d-m-Y').").xls";

	header("content-disposition: attechment; filename='$filename'");
	header("content-type: application/vdn.ms-exel");


?>

<h2>Laporan Data Peminjaman Buku</h2>

<table border="1">
	<tr> 
			 <th>No Peminjaman</th>
			<th>Tanggal Peminjaman </th>
	        <th>Tanggal Pengembalian </th>
			<th>No Anggota </th>
			<th>Kode Buku</th> 
    </tr>
	<?php 
		$sql = $koneksi ->query("select * from peminjaman");
		while ($data=$sql -> fetch_assoc()) {
		
	
	?>

	<tr> 
		<td><?php echo $data['no_peminjaman'];?></td>
		<td><?php echo $data['tgl_peminjaman'];?></td>
		<td><?php echo $data['tgl_pengembalian'];?></td>
		<td><?php echo $data['no_anggota'];?></td>
		<td><?php echo $data['kode_buku'];?></td> 
	</tr>

	<?php  } ?>

</table>