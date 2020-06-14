<?php
	

	$koneksi = new mysqli("localhost","root","","perpus");

	$filename = "anggota_exel-(".date('d-m-Y').").xls";

	header("content-disposition: attechment; filename='$filename'");
	header("content-type: application/vdn.ms-exel");


?>

<h2>Laporan Anggota</h2>

<table border="1">
	<tr>
	    <th>No</th>
	    <th>NIM</th>
	    <th>Nama</th>
	    <th>Alamat Anggota</th>
	    <th>No Telepon</th>
	    <th>Jenis Kelamin</th>
	    <th>Program Studi</th>
	    <th>Status Peminjaman</th>
	</tr>
	<?php

        $no = 1;
		$sql = $koneksi ->query("select * from anggota");

            while ($data=$sql -> fetch_assoc()) {
                                    		
            $jk = ($data['jk']=='l')?"Laki-Laki":"Wanita";
	
	?>

	<tr>
		<td><?php echo $no++; ?></td>
		<td><?php echo $data['nim'];?></td>
		<td><?php echo $data['nama_anggota'];?></td>
		<td><?php echo $data['alamat'];?></td>
		<td><?php echo $data['no_telp'];?></td>
		<td><?php echo $data['prodi'];?></td>
		<td><?php echo $jk;?></td>
		<td><?php echo $data['status_peminjaman'];?></td>
	</tr>

	<?php  } ?>

</table>