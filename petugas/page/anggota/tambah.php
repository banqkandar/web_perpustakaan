 

<div class="panel panel-primary">
<div class="panel-heading">
Tambah Data
</div>
<div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form method="POST">
                                        <div class="form-group">
                                            <label>Nim</label>
                                            <input class="form-control" name="nim" required="yes" />
                                        </div>

                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input class="form-control" name="nama_anggota" required="yes"/>
                                        </div>

                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <input class="form-control" name="alamat" required="yes"/>
                                        </div>

                                        <div class="form-group">
                                            <label>No Telepon</label>
                                            <input class="form-control" type="text" name="no_telp" id="no" required="yes"/>
                                        </div>
                                        <div class="form-group">    
                                            <label> Jenis Kelamin   </label> 
                                            <div class="radio"> 
                                                <label><input type="radio" name="jk" id="optionsRadios1" value="L" checked />Laki - Laki </label>
                                            </div>
                                            <div class="radio"> 
                                                <label><input type="radio" name="jk" id="optionsRadios2" value="P"/> Perempuan </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Program Studi</label>
                                            <input class="form-control" type="text" name="prodi" id="prodi" />
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
        $nim            = $_POST['nim'];
        $nama_anggota   = $_POST['nama_anggota'];
        $alamat         = $_POST['alamat'];
        $no_telp        = $_POST['no_telp'];
        $jk             = $_POST['jk'];
        $prodi          = $_POST['prodi']; 
		
		$sql = $koneksi->query("insert into anggota (nim,nama_anggota,alamat,no_telp,jk,prodi,status_peminjaman)values('$nim', '$nama_anggota', '$alamat','$no_telp', '$jk', '$prodi','Tidak pinjam')");
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