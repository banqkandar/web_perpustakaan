<?php

$koneksi = new mysqli("localhost","root","","perpus");

$content = '
	<style type="text/css">
		.tabel{border-collapse: collapse;}
		.tabel th{padding: 10px 8px;}
		.tabel td{padding: 10px 8px;}
	</style>
';



$no_anggota = $_GET['no_anggota'];

$sql = $koneksi ->query("select * from anggota where no_anggota='$no_anggota'");

while ($data=$sql -> fetch_assoc()) {

$content .= '

<page>
	<h2 align="center">PERPUSTAKAAN</h2>
	<h3 align="center">Jl.Banjaran No.45, Telp(022)5947704</h3>
	<hr>
	<h2 align="center">Kartu Anggota</h2>

	<table border="0" class="tabel">
		<tr>
            <th>NIM</th> <td>:</td> <td>'.$data['nim'].'</td>   
        </tr>';

		$content .='
			<tr>
        		<th>Nama</th> <td>:</td> <td>'.$data['nama_anggota'].'</td>
        		
        	</tr>

		';

		$content .='
			<tr>
				<th>Alamat Anggota</th><td>:</td><td>'.$data['alamat'].'</td>
			</tr>
		';

		$content .='
			<tr>
				<th>Program Studi</th><td>:</td><td>'.$data['prodi'].'</td>
			</tr>
		';
	}
	$content .=' 
	</table>
</page>';

	require_once('../assets/html2pdf/html2pdf.class.php');
	$html2pdf = new HTML2PDF('L','A4','fr');
	$html2pdf->WriteHTML($content);
	$html2pdf->Output('Kartu Anggota.pdf');

?>