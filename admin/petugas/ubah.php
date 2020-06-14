<?php

	$id_petugas = $_GET['id_petugas'];

	$sql       = $koneksi->query("select * from petugas where id_petugas='$id_petugas'");

	$tampil = $sql->fetch_assoc();

?>
<div class="panel panel-primary">
<div class="panel-heading">
	Ubah Data Petugas
</div>
<div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form method="POST">
                                        <input type="hidden" name="kode" value="<?php echo "$kode_buku "; ?>">
                                        <div class="form-group">
                                            <label>Nama Petugas</label>
                                            <input class="form-control" name="nama_petugas" value="<?php echo $tampil['nama_petugas']; ?>" />
                                        </div>

                                        <div class="form-group">
                                            <label>Alamat Petugas</label>
                                            <input class="form-control" name="alamat_petugas" value="<?php echo $tampil['alamat_petugas']; ?>"/>
                                        </div>
                                        <div class="form-group">
                                            <label>No Telepon Petugas</label>
                                            <input class="form-control" name="no_telp_petugas" value="<?php echo $tampil['no_telp_petugas']; ?>"/>
                                        </div>

                                        <div class="form-group">
                                            <label>Username</label>
                                            <input class="form-control" name="username" value="<?php echo $tampil['username']; ?>"/>
                                        </div>

                                        <div class="form-group">
                                            <label>Password</label>
                                            <input class="form-control" name="password" value="<?php echo $tampil['password']; ?>"/>
                                        </div>

                                        <div>
                                        	<input type="submit" name="ubah" value="Ubah" class="btn btn-primary">
                                        </div>
                                    </div>
             </form>
             </div>
</div>
</div>  
</div>      

<?php 
	 
	if (isset($_POST['ubah'])) {
		$nama_petugas         = $_POST['nama_petugas'];
        $alamat_petugas     = $_POST['alamat_petugas'];
        $no_telp_petugas    = $_POST['no_telp_petugas'];
        $username           = $_POST['username'];
        $password           = $_POST['password'];
		$sql = $koneksi->query("update petugas set nama_petugas='$nama_petugas', alamat_petugas='$alamat_petugas', no_telp_petugas='$no_telp_petugas',username='$username',password='$password' where id_petugas='$id_petugas'");
	if ($sql) {
		?>
			<script type="text/javascript">
				
				alert ("Ubah Data Berhasil Disimpan");
				window.location.href="?page=petugas&aksi=kosong";

			</script>
		<?php
	}
	}


?>    