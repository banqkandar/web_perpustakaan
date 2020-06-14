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
	<h2 align="center">Laporan Data Pengembalian Buku</h2>
	<h3 align="center">Perpustakaan</h3>
	<hr>

	<table border="1" class="tabel" align="center">
		<tr>
	        <th>No Pengembalian</th>
			<th>Tanggal dikembalikan </th>
	        <th>Status Keterlambatan </th>
			<th>Terlambat </th>
			<th>Denda</th>
			<th>No Peminjaman</th> 
    	</tr>';
 

		$sql = $koneksi ->query("select * from pengembalian");

		while ($data=$sql -> fetch_assoc()) {

		$content .='
			<tr> 
				<td>'.$data['no_pengembalian'].'</td>
				<td>'.$data['tgl_dikembalikan'].'</td>
				<td>'.$data['status_keterlambatan'].'</td>
				<td>'.$data['terlambat'].'</td>
				<td>'.$data['denda'].'</td>
				<td>'.$data['no_peminjaman'].'</td>
			</tr>

		';
	}
	$content .=' 
	</table>
</page>';

	require_once('../assets/html2pdf/html2pdf.class.php');
	$html2pdf = new HTML2PDF('P','A4','fr');
	$html2pdf->WriteHTML($content);
	$html2pdf->Output('Laporan data Pengembalian.pdf');

?>