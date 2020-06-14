<div class="panel panel-default">
<div class="panel panel-primary">
<div class="panel-heading">
	Tambah Data Peminjaman
</div>
<div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form method="POST"> 
                                        <div class="form-group">
                                            <label> No Anggota Peminjam  </label>
                                            <select name="noanggota" required="yes" class="form-control" required="yes">
                                                <option value=""> Pilih No Anggota </option>
                                                <?php
                                                    $tampil=mysqli_query($koneksi,"Select no_anggota from anggota where status_peminjaman='Tidak Pinjam'");
                                                    while ($r=mysqli_fetch_assoc($tampil)){   
                                                        echo'<option value="'.$r[no_anggota].'" >'.$r[no_anggota].'</option>';
                                                }
                                                ?> 
                                            </select> 
                                        </div>
                                        <div class="form-group">
                                            <label> Kode Buku  </label>
                                            <select name="kode_buku" required="yes" class="form-control" required="yes">
                                                <option value=""> Pilih Kode Buku </option>
                                                <?php
                                                    $tampil=mysqli_query($koneksi,"Select kode_buku from buku");
                                                    while ($r=mysqli_fetch_assoc($tampil)){   
                                                        echo'<option value="'.$r[kode_buku].'" >'.$r[kode_buku].'</option>';
                                                }
                                                ?> 
                                            </select> 
                                        </div>
                                        <div class="form-group">
                                            <label> Tanggal Peminjaman  </label><br>
                                            <input type="date" required="yes" name="tgl_pinjam"><br>
                                            <label> * Masa Peminjaman adalah 7 hari </label>
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
        
        $noanggota=$_POST['noanggota'];
        $kode_buku=$_POST['kode_buku'];
        $tgl_pinjam=$_POST['tgl_pinjam'];
        $tgl_kembali=date('Y-m-d', strtotime('+7 days', strtotime($tgl_pinjam))); 
      
        $sql = $koneksi->query("insert into peminjaman (tgl_peminjaman,tgl_pengembalian,no_anggota,kode_buku) values('$tgl_pinjam','$tgl_kembali','$noanggota','$kode_buku')");
        $update = $koneksi->query("update anggota set status_peminjaman='Pinjam' where no_anggota='$noanggota' ");
        if (($sql) && ($update)) {
        ?>
            <script type="text/javascript">
                
                alert ("Data Berhasil Disimpan");
                window.location.href="?page=peminjaman&aksi=kosong";

            </script>   
        <?php
        }
    }


?>  