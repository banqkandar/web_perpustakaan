<?php

    $no_peminjaman = $_GET['no_peminjaman'];

    $sql       = $koneksi->query("select * from peminjaman where no_peminjaman='$no_peminjaman'");

    $tampilna = $sql->fetch_assoc();
?>

<div class="panel panel-default">
<div class="panel panel-primary">
<div class="panel-heading">
   Ubah Data Peminjaman
</div>
<div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form method="POST">
                                         <div class="form-group"> 
                                            <label> No Peminjaman  </label>
                                            <input type="text" name="no_peminjaman" class="form-control" readonly value="<?php echo $tampilna['no_peminjaman']; ?>">
                                        </div> 
                                        <div class="form-group">
                                            <label> No Anggota Peminjam  </label>
                                            <input type="text" name="no_anggota" class="form-control" readonly value="<?php echo $tampilna['no_anggota']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label> Kode Buku  </label>
                                            <select name="kode_buku" required="yes" class="form-control" required="yes">
                                                <option value=""> Pilih Kode Buku </option>
                                                <?php
                                                    $tampil=mysqli_query($koneksi,"Select kode_buku from buku order by kode_buku asc");
                                                    while ($r=mysqli_fetch_assoc($tampil)){   
                                                        echo'<option value="'.$r[kode_buku].'" >'.$r[kode_buku].'</option>';
                                                }
                                                ?> 
                                            </select> 
                                        </div>
                                        <div class="form-group">
                                            <label> Tanggal Peminjaman  </label><br>
                                            <input type="date" required="yes" name="tgl_pinjam"><br> 
                                        </div>
                                        <div class="form-group">
                                            <label> Tanggal Pengembalian  </label><br>
                                            <input type="date" required="yes" name="tgl_kembali"><br> 
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
        $no_peminjaman=$_POST['no_peminjaman']; 
        $kode_buku=$_POST['kode_buku'];
        $tgl_pinjam=$_POST['tgl_pinjam']; 
        $tgl_kembali=$_POST['tgl_kembali']; 
      
        $sql = $koneksi->query("update peminjaman set kode_buku='$kode_buku' , tgl_peminjaman='$tgl_pinjam' , tgl_pengembalian ='$tgl_kembali' where no_peminjaman='$no_peminjaman' "); 

        if ($sql) {
        ?>
            <script type="text/javascript">
                
                alert ("Data Berhasil Disimpan");
                window.location.href="?page=peminjaman&aksi=kosong";

            </script>   
        <?php
        }
    }


?>  