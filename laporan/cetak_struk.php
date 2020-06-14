<?php

$koneksi = new mysqli("localhost","root","","perpus");

$content = '
	<style type="text/css">
		.tabel{border-collapse: collapse;}
		.tabel th{padding: 10px 8px;}
		.tabel td{padding: 10px 8px;}
	</style>
';



$no_pengembalian = $_GET['no_pengembalian'];

$sql = $koneksi ->query("select * from pengembalian inner join peminjaman using (no_peminjaman) where no_pengembalian='$no_pengembalian'");

while ($data=$sql -> fetch_assoc()) {

$content .= '

<page>
	<h2 align="center">PERPUSTAKAAN</h2>
	<h3 align="center">Jl.Banjaran No.45, Telp(022)5947704</h3>
	<hr>
	<h2 align="center">Struk Denda </h2>

	<table border="0" class="tabel">
	';

		$content .='
			<tr> <td>No Peminjaman </td> <td>:</td> <td>'.$data['no_peminjaman'].'</td>  </tr>
			<tr> <td>No Pengembalian </td> <td>:</td> <td>'.$data['no_pengembalian'].'</td>  </tr>
			<tr> <td>Tangal Peminjaman</td> <td>:</td> <td>'.$data['tgl_peminjaman'].'</td>  </tr>
			<tr> <td>Tanggal Pengembalian</td> <td>:</td> <td>'.$data['tgl_pengembalian'].'</td>  </tr>
			<tr> <td>Tanggal Dikembalikan </td> <td>:</td> <td>'.$data['tgl_dikembalikan'].'</td>  </tr>
			<tr> <td>No Anggota </td> <td>:</td> <td>'.$data['no_anggota'].'</td>  </tr>
			<tr> <td>Selisih terlambat (hari) </td> <td>:</td> <td>'.$data['terlambat'].'</td>  </tr>
			<tr> <td>Denda </td> <td>:</td> <td>Rp.'.$data['denda'].'</td>  </tr>
		';
 
	}
	$content .=' 
	</table>
</page>';

	require_once('../assets/html2pdf/html2pdf.class.php');
	$html2pdf = new HTML2PDF('L','A4','fr');
	$html2pdf->WriteHTML($content);
	$html2pdf->Output('Cetak Struk.pdf');

?>