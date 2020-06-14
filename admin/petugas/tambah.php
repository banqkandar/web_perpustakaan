<div class="panel panel-default">
<div class="panel panel-primary">
<div class="panel-heading">
	Tambah Data
</div>
<div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form method="POST">
                                        <div class="form-group">
                                            <label>Nama Petugas</label>
                                            <input class="form-control" name="nama_petugas" />
                                        </div>

                                        <div class="form-group">
                                            <label>Alamat Petugas</label>
                                            <input class="form-control" name="alamat_petugas" />
                                        </div>

                                        <div class="form-group">
                                            <label>No Telepon Petugas</label>
                                            <input class="form-control" name="no_telp_petugas" />
                                        </div>

                                        <div class="form-group">
                                            <label>Username</label>
                                            <input class="form-control" name="username" />
                                        </div>

                                        <div class="form-group">
                                            <label>Password</label>
                                            <input class="form-control" name="password" />
                                        </div>

                                        <div>
                                        	<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                                        </div>
                                    </div>
             </form>
             </div>
</div>
</div>  
</div>      

<?php 
     
    if (isset($_POST['simpan'])) {
        $nama_petugas           = $_POST['nama_petugas'];
        $alamat_petugas         = $_POST['alamat_petugas'];
        $no_telp_petugas        = $_POST['no_telp_petugas'];
        $username               = $_POST['username'];
        $password               = $_POST['password'];

        $sql = $koneksi->query("insert into petugas (nama_petugas,alamat_petugas,no_telp_petugas,username,password) values('$nama_petugas', '$alamat_petugas', '$no_telp_petugas','$username', '$password')");
    if ($sql) {
        ?>
            <script type="text/javascript">
                
                alert ("Data Berhasil Disimpan");
                window.location.href="?page=petugas&aksi=kosong";

            </script>
        <?php
    }
    }


?>  