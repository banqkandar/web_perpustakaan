
<?php 
 
    if (isset($_POST['simpan'])) {
        
        $tgl_dikembalikan=$_POST['tgl_dikembalikan'];
        $status_keterlambatan=$_POST['status'];
        $terlambat=$_POST['selisih'];
        $denda=$_POST['denda'];
        $no_peminjamanna=$_POST['no_peminjaman'];
        $noanggota=$_POST['no_anggota'];

        $sql = $koneksi->query(" insert into pengembalian (tgl_dikembalikan,status_keterlambatan,terlambat,denda,no_peminjaman) values('$tgl_dikembalikan','$status_keterlambatan','$terlambat','$denda','$no_peminjamanna')");

        $update = $koneksi->query("update anggota set status_peminjaman='Tidak Pinjam' where no_anggota='$noanggota' ");
        if (($sql) && ($update)) {
        ?>
            <script type="text/javascript">
                
                alert ("Data Berhasil Disimpan");
                window.location.href="index.php?page=pengembalian&aksi=kosong";

            </script>   
        <?php
        }
    }


?>  