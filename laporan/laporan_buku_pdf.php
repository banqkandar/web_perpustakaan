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
	<h2 align="center">Laporan Data Buku</h2>
	<h3 align="center">Perpustakaan</h3>
	<hr>

	<table border="1" class="tabel" align="center">
		<tr>
	        <th>No</th>
			<th>Kode Buku </th>
	        <th>Judul</th>
			<th>Kategori</th>
			<th>Tahun Terbit</th>
	        <th>Pengarang</th>
	        <th>Penerbit</th>
	        <th>ISBN</th> 
    	</tr>';

		$no = 1;

		$sql = $koneksi ->query("select * from buku");

		while ($data=$sql -> fetch_assoc()) {

		$content .='
			<tr>
				<td>'.$no++.'</td>
				<td>'.$data['kode_buku'].'</td>
				<td>'.$data['judul'].'</td>
				<td>'.$data['kategori'].'</td>
				<td>'.$data['tahun_terbit'].'</td>
				<td>'.$data['pengarang'].'</td>
				<td>'.$data['penerbit'].'</td>
				<td>'.$data['isbn'].'</td> 
			</tr>

		';
	}
	$content .=' 
	</table>
</page>';

	require_once('../assets/html2pdf/html2pdf.class.php');
	$html2pdf = new HTML2PDF('P','A4','fr');
	$html2pdf->WriteHTML($content);
	$html2pdf->Output('Laporan data buku.pdf');

?>