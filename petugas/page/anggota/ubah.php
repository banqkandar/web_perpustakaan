<?php

	$no_anggota = $_GET['no_anggota'];

	$sql = $koneksi->query("select * from anggota where no_anggota='$no_anggota'");

	$tampil = $sql->fetch_assoc();

	$jkl = $tampil['jk'];
?>
<div class="panel panel-primary">
<div class="panel-heading">
	Ubah Data
</div>
<div class="panel-body">
                            <div class="row">
                                 <div class="col-md-12">
                                    <form method="POST">
                                        <div class="form-group">
                                            <label>No Anggota</label>
                                            <input class="form-control" name="no_anggota" value="<?php echo $tampil['no_anggota']; ?>" readonly/>
                                        </div>
                                        <div class="form-group">
                                            <label>Nim</label>
                                            <input class="form-control" name="nim" value="<?php echo $tampil['nim']; ?>"/>
                                        </div>

                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input class="form-control" name="nama_anggota" value="<?php echo $tampil['nama_anggota']; ?>"/>
                                        </div>

                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <input class="form-control" name="alamat" value="<?php echo $tampil['alamat']; ?>" />
                                        </div>

                                        <div class="form-group">
                                            <label>No Telepon</label>
                                            <input class="form-control" name="no_telp" value="<?php echo $tampil['no_telp']; ?>" />
                                        </div>
                                        <div class="form-group">   
                                            <label> Jenis Kelamin   </label> 
                                            <div class="radio"> 

                                                <label><input type="radio" name="jk" id="optionsRadios1" value="L" <?php  
                                                    if( $jkl=='l'){ 
                                                        echo 'checked="yes"';
                                                    } ?> /> Laki - Laki </label>
                                            </div>
                                            <div class="radio"> 
                                                <label><input type="radio" name="jk" id="optionsRadios2" value="P" <?php  
                                                    if( $jkl=='p'){ 
                                                        echo 'checked="yes"';
                                                    } ?> /> Perempuan </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Program Studi</label>
                                            <input class="form-control" name="prodi" value="<?php echo $tampil['prodi']; ?>" />
                                        </div>
                                         <div class="form-group">
                                            <label> Status Peminjaman </label>
                                            <input class="form-control" name="status_peminjaman" value="<?php echo $tampil['status_peminjaman']; ?>" />
                                        </div>
                                        <div>
                                        	<input type="submit" name="simpan" value="Ubah" class="btn btn-primary">
                                        </div>
                                    </div>
             </form>
             </div>
</div>
</div>  
</div>      

<?php 
 
	if (isset($_POST['simpan']) ){
		$no_anggota   = $_POST['no_anggota'];
    $nim            = $_POST['nim'];
    $nama_anggota   = $_POST['nama_anggota'];
    $alamat         = $_POST['alamat'];
    $no_telp        = $_POST['no_telp'];
    $jk             = $_POST['jk'];
    $prodi          = $_POST['prodi'];
    $status =       $_POST['status_peminjaman'];

		$sql = $koneksi->query("update anggota set nama_anggota='$nama_anggota', alamat='$alamat', no_telp='$no_telp', prodi='$prodi', jk='$jk',status_peminjaman='$status', nim='$nim' where no_anggota='$no_anggota'");
	if ($sql) {
		?>
			<script type="text/javascript">
				
				alert ("Data Berhasil Disimpan");
				window.location.href="?page=anggota&aksi=kosong";

			</script>
		<?php
	}
	}


?>    