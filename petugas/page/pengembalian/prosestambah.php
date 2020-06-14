<div class="panel panel-default">
<div class="panel panel-primary">
<div class="panel-heading">
	Tambah Data Pengembalian
</div>
<div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <form method="POST" action="index.php?page=pengembalian&aksi=proseslagi"> 
                    <?php
                        $no_pinjam=$_POST['nopeminjaman'];
                        $tgl_dikembalikan=$_POST['tgl_dikembalikan'];
                        $sql = $koneksi ->query("select * from peminjaman inner join buku using(kode_buku) inner join anggota using(no_anggota) where no_peminjaman=$no_pinjam");  
                        $tampilna = $sql->fetch_assoc();
                    ?>
                                        <div class="form-group">
                                            <label> No Peminjaman</label>
                                            <input type="text" name="no_peminjaman" readonly value="<?php echo $tampilna['no_peminjaman'] ; ?>" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label> No Anggota </label>
                                            <input type="text" name="no_anggota" readonly value="<?php echo $tampilna['no_anggota'] ; ?>" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label> Nama Anggota</label>
                                            <input type="text" name="nama_anggota" readonly value="<?php echo $tampilna['nama_anggota'] ; ?>" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label> Kode Buku </label>
                                            <input type="text" name="kode_buku" readonly value="<?php echo $tampilna['kode_buku'] ; ?>" class="form-control"> 
                                        </div>
                                        <div class="form-group">
                                            <label>Judul </label>
                                            <input type="text" name="judul" readonly value="<?php echo $tampilna['judul'] ; ?>" class="form-control"> 
                                        </div>   
                                        <div class="form-group">
                                            <label> Tanggal Peminjaman </label>
                                            <input type="text" name="tgl_peminjaman" readonly value="<?php echo $tampilna['tgl_peminjaman'] ; ?>" class="form-control"> 
                                        </div>
                                        <div class="form-group">
                                            <label> Tanggal Pengembalian </label>
                                            <input type="text" name="tgl_pengembalian" readonly value="<?php echo $tampilna['tgl_pengembalian'] ; ?>" class="form-control"> 
                                        </div>
                                        <div class="form-group">
                                            <label> Tanggal Dikembalikan </label>
                                            <input type="date" name="tgl_dikembalikan" readonly value="<?php echo $tgl_dikembalikan ; ?>" class="form-control"> 
                                        </div>
                                        <?php 
                                            $denda = 1000;
                                            $harusnya=$tampilna['tgl_pengembalian'];
                                            $dikembalikanna=$tgl_dikembalikan; 

                                            $lambat = terlambat($harusnya,$dikembalikanna);
                                            $dendatotal = $lambat*$denda;
 
                                            if ($lambat > 0 ) {
                                                $status_keterlambatan = "Terlambat";
                                            } else {
                                                $status_keterlambatan = " Tidak Terlambat";
                                            }
                                        ?>
                                        <div class="form-group">
                                            <label> Status Keterlambatan </label>
                                            <input type="text" name="status" readonly class="form-control" value="<?php echo "$status_keterlambatan"; ?>"> 
                                        </div> 
                                        <div class="form-group">
                                            <label> Selisih Hari Keterlambatan</label>
                                            <input type="text" name="selisih" readonly class="form-control" value="<?php echo "$lambat"; ?>" > 
                                        </div> 
                                        <div class="form-group">
                                            <label> Denda </label>
                                            <input type="text" name="denda" readonly class="form-control" value="<?php echo "$dendatotal"; ?>"> 
                                        </div> 
                                        <div>
                                            <input type="submit" name="simpan" value="Simpan" class="btn btn-primary" onclick=""> 
                                        </div> 
                        </form> <br>
                        <a href="index.php?page=pengembalian&aksi=kosong"><button class="btn btn-danger"> Kembali </button> </a>
                 
             </div>
</div>
</div>  
</div>      
