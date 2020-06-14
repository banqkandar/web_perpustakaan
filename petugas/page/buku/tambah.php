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
                                            <label>Judul</label>
                                            <input class="form-control" name="judul" required="yes" />
                                        </div>

                                        <div class="form-group">
                                            <label>Kategori Buku</label>
                                            <input class="form-control" name="kategori" required="yes"/>
                                        </div>

                                        <div class="form-group">
                                            <label>Tahun Terbit</label>
                                            <select class="form-control" name="tahun_terbit" required="yes">
                                                <?php 

                                                    $tahun = date("Y");

                                                    for ($i=$tahun-29; $i <= $tahun; $i++) { 
                                                        echo'

                                                            <option value="'.$i.'">'.$i.'</option>
                                                        
                                                        ';
                                                    }

                                                ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Pengarang</label>
                                            <input class="form-control" name="pengarang" required="yes" />
                                        </div>

                                        <div class="form-group">
                                            <label>Penerbit</label>
                                            <input class="form-control" name="penerbit" required="yes"/>
                                        </div>

                                        <div class="form-group">
                                            <label>Kode Isbn</label>
                                            <input class="form-control" name="isbn" required="yes"/>
                                        </div>

                                        <div class="form-group">
                                            <label>Lokasi</label>
                                            <select class="form-control" name="lokasi" required="yes">
                                                <option value="rak1">Rak 1</option>
                                                <option value="rak2">Rak 2</option>
                                                <option value="rak3">Rak 3</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                        <label> ID Petugas </label>
                                        <select name="idpetugas" required="yes" class="form-control" required="yes">
                                            <option value=""> Pilih Id Petugas </option>
                                            <?php
                                                $tampil=mysqli_query($koneksi,"Select id_petugas from petugas");
                                                while ($r=mysqli_fetch_assoc($tampil)){   
                                                    echo'<option value="'.$r[id_petugas].'" >'.$r[id_petugas].'</option>';
                                            }
                                            ?> 
                                        </select> 
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
         $judul            = $_POST['judul'];
        $kategori         = $_POST['kategori'];
        $tahun_terbit     = $_POST['tahun_terbit'];
        $pengarang        = $_POST['pengarang'];
        $penerbit         = $_POST['penerbit'];
        $lokasi           = $_POST['lokasi'];
        $isbn             = $_POST['isbn'];
        $idpetugas       = $_POST['idpetugas'];        
        $sql = $koneksi->query("insert into buku (judul,kategori,tahun_terbit,penerbit,pengarang,isbn,lokasi,id_petugas) values('$judul', '$kategori', '$tahun_terbit','$penerbit', '$pengarang','$isbn','$lokasi','$idpetugas')");
    if ($sql) {
        ?>
            <script type="text/javascript">
                
                alert ("Data Berhasil Disimpan");
                window.location.href="?page=buku&aksi=kosong";

            </script>
        <?php
    }
    }


?>  