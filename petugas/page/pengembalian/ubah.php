<?php

    $no_pengembalian = $_GET['no_pengembalian'];

    $sql       = $koneksi->query("select * from pengembalian where no_pengembalian='$no_pengembalian'");

    $tampilna = $sql->fetch_assoc();
?>

<div class="panel panel-default">
<div class="panel panel-primary">
<div class="panel-heading">
    Edit Data Pengembalian
</div>
<div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form method="POST">
                                         <div class="form-group"> 
                                            <label> No Pengembalian  </label>
                                            <input type="text" name="no_pengembalian" class="form-control" readonly value="<?php echo $tampilna['no_pengembalian']; ?>">
                                        </div> 
                                        <div class="form-group">
                                            <label> Tanggal Dikembalikan  </label>
                                            <input type="date" name="tgl_dikembalikan" class="form-control" value="<?php echo $tampilna['tgl_dikembalikan']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label> Status Keterlambatan </label>
                                            <input type="text" name="status" class="form-control"  value="<?php echo $tampilna['status_keterlambatan']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label> Selisih Keterlambatan </label>
                                            <input type="text" name="terlambat" class="form-control" value="<?php echo $tampilna['terlambat']; ?>" required>
                                        </div> 
                                        <div class="form-group">
                                            <label> Denda  </label><br>
                                            <input type="text" required="yes" name="denda" value="<?php echo $tampilna['denda']; ?>" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label> No Peminjaman  </label>
                                            <input type="text" name="no_peminjaman" class="form-control" readonly value="<?php echo $tampilna['no_peminjaman']; ?>" required>
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

        $tgl_dikembalikan=$_POST['tgl_dikembalikan'];
        $status_keterlambatan=$_POST['status'];
        $denda=$_POST['denda'];
        $terlambat=$_POST['terlambat'];
        $no_peminjaman=$_POST['no_peminjaman'];  
        $no_pengembalian=$_POST['no_pengembalian'];
      
        $sql = $koneksi->query("update pengembalian set tgl_dikembalikan='$tgl_dikembalikan' , status_keterlambatan='$status_keterlambatan' , terlambat ='$terlambat', denda='$denda' where no_pengembalian='$no_pengembalian' "); 

        if ($sql) {
        ?>
            <script type="text/javascript">
                
                alert ("Data Berhasil Disimpan");
                window.location.href="?page=pengembalian&aksi=kosong";

            </script>   
        <?php
        }
    }


?>  