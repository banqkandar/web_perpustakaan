<?php

	$kode_buku = $_GET['kode_buku'];

	$sql       = $koneksi->query("select * from buku where kode_buku='$kode_buku'");

	$tampil = $sql->fetch_assoc();

	$tahun2 = $tampil['tahun_terbit'];

	$lokasi = $tampil['lokasi'];

?>
<div class="panel panel-primary">
<div class="panel-heading">
	Ubah Data
</div>
<div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form method="POST">
                                        <input type="hidden" name="kode" value="<?php echo "$kode_buku "; ?>">
                                        <div class="form-group">
                                            <label>Judul</label>
                                            <input class="form-control" name="judul" value="<?php echo $tampil['judul']; ?>" />
                                        </div>

                                        <div class="form-group">
                                            <label>Kategori</label>
                                            <input class="form-control" name="kategori" value="<?php echo $tampil['kategori']; ?>"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Pengarang</label>
                                            <input class="form-control" name="pengarang" value="<?php echo $tampil['pengarang']; ?>"/>
                                        </div>

                                        <div class="form-group">
                                            <label>Penerbit</label>
                                            <input class="form-control" name="penerbit" value="<?php echo $tampil['penerbit']; ?>"/>
                                        </div>

                                        <div class="form-group">
                                            <label>Tahun Terbit</label>
                                            <select class="form-control" name="tahun_terbit" />
                                                <?php 

                                                	$tahun = date("Y");

                                                	for ($i=$tahun-29; $i <= $tahun; $i++) { 

                                                			if ($i==$tahun2 ) {

                                                			echo'<option value="'.$i.'" selected>'.$i.'</option>';
                                                			
                                                			}else{


                                                			echo'<option value="'.$i.'">'.$i.'</option>';
                                                			}
                                                	}

                                                ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>ISBN</label>
                                            <input class="form-control" name="isbn" value="<?php echo $tampil['isbn']; ?>"/>
                                        </div>

                                        <div class="form-group">
                                            <label>Lokasi</label>
                                            <select class="form-control" name="lokasi" value="<?php echo $tampil['lokasi']; ?>" />
                                                <option value="rak1" <?php if ($lokasi=='rak1') {echo "selected";} ?>>Rak 1</option>
                                                <option value="rak2" <?php if ($lokasi=='rak2') {echo "selected";} ?>>Rak 2</option>
                                                <option value="rak3" <?php if ($lokasi=='rak3') {echo "selected";} ?>>Rak 3</option>
                                            </select>
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
		$judul        = $_POST['judul'];
        $pengarang  = $_POST['pengarang'];
        $penerbit   = $_POST['penerbit'];
        $kategori   = $_POST['kategori'];
        $tahun      = $_POST['tahun_terbit'];
        $isbn       = $_POST['isbn']; 
        $lokasi     = $_POST['lokasi'];
        $kode =$_POST['kode'];
		$sql = $koneksi->query("update buku set judul='$judul', kategori='$kategori', pengarang='$pengarang',penerbit='$penerbit',tahun_terbit='$tahun',isbn='$isbn',lokasi='$lokasi' where kode_buku='$kode'");
	if ($sql) {
		?>
			<script type="text/javascript">
				
				alert ("Ubah Data Berhasil Disimpan");
				window.location.href="?page=buku&aksi=kosong";

			</script>
		<?php
	}
	}


?>    