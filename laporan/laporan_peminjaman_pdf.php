<?php

$koneksi = new mysqli("localhost","root","","perpus");

$content = '
	<style type="text/css">
		.tabel{border-collapse: collapse;}
		.tabel th{padding: 8px 5px; background-color: #cccccc;}
		.tabel td{padding: 8px 5px;}
	</style>
';

$content .= '

<page>
	<h2 align="center">Laporan Data Peminjaman Buku</h2>
	<h3 align="center">Perpustakaan</h3>
	<hr>

	<table border="1" class="tabel" align="center">
		<tr>
	        <th>No Peminjaman</th>
			<th>Tanggal Peminjaman </th>
	        <th>Tanggal Pengembalian </th>
			<th>No Anggota </th>
			<th>Kode Buku</th> 
    	</tr>';
 

		$sql = $koneksi ->query("select * from peminjaman");

		while ($data=$sql -> fetch_assoc()) {

		$content .='
			<tr> 
				<td>'.$data['no_peminjaman'].'</td>
				<td>'.$data['tgl_peminjaman'].'</td>
				<td>'.$data['tgl_pengembalian'].'</td>
				<td>'.$data['no_anggota'].'</td>
				<td>'.$data['kode_buku'].'</td> 
			</tr>

		';
	}
	$content .=' 
	</table>
</page>';

	require_once('../assets/html2pdf/html2pdf.class.php');
	$html2pdf = new HTML2PDF('P','A4','fr');
	$html2pdf->WriteHTML($content);
	$html2pdf->Output('Laporan data Peminjaman.pdf');

?>