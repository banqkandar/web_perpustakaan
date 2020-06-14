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
	<h2 align="center">Laporan Data Anggota</h2>
	<h3 align="center">Perpustakaan</h3>
	<hr>

	<table border="1" class="tabel" align="center">
		<tr>
            <th>No</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Alamat Anggota</th>
            <th>No Telepon</th>
            <th>Jenis Kelamin</th>
            <th>Program Studi</th>
            <th>Status Peminjaman</th>
        </tr>';

		$no = 1;

		$sql = $koneksi ->query("select * from anggota");

		while ($data=$sql -> fetch_assoc()) {
		
		$jk = ($data['jk']=='l')?"Laki-Laki":"Wanita";

		$content .='
			<tr>
        		<td>'.$no++.'</td>
        		<td>'.$data['nim'].'</td>
        		<td>'.$data['nama_anggota'].'</td>
        		<td>'.$data['alamat'].'</td>
        		<td>'.$data['no_telp'].'</td>
        		<td>'.$jk.'</td>
        		<td>'.$data['prodi'].'</td>
        		<td>'.$data['status_peminjaman'].'</td>
        	</tr>

		';
	}
	$content .=' 
	</table>
</page>';

	require_once('../assets/html2pdf/html2pdf.class.php');
	$html2pdf = new HTML2PDF('L','A4','fr');
	$html2pdf->WriteHTML($content);
	$html2pdf->Output('Laporan data anggota.pdf');

?>