<?php
	

	$koneksi = new mysqli("localhost","root","","perpus");

	$filename = "pengembalian_exel-(".date('d-m-Y').").xls";

	header("content-disposition: attechment; filename='$filename'");
	header("content-type: application/vdn.ms-exel");


?>

<h2>Laporan Data Pengembalian Buku</h2>

<table border="1">
	<tr> 
			<th>No Pengembalian</th>
			<th>Tanggal dikembalikan </th>
	        <th>Status Keterlambatan </th>
			<th>Terlambat </th>
			<th>Denda</th>
			<th>No Peminjaman</th>
    </tr>
	<?php 
		$sql = $koneksi ->query("select * from pengembalian");
		while ($data=$sql -> fetch_assoc()) {
		
	
	?>

	<tr> 
		<td><?php echo $data['no_pengembalian'];?></td>
		<td><?php echo $data['tgl_dikembalikan'];?></td>
		<td><?php echo $data['status_keterlambatan'];?></td>
		<td><?php echo $data['terlambat'];?></td>
		<td><?php echo $data['denda'];?></td> 
		<td><?php echo $data['no_peminjaman'];?></td> 
	</tr>

	<?php  } ?>

</table>