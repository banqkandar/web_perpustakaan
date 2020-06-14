    <div class="row">
            <div class="col-md-12">
                 <h2> Halaman Admin </h2> 
                 <h4>Selamat Datang <?php echo $akun['nama'];?> dihalaman admin Aplikasi Perpustakaan Berbasis web</h4>  
            </div>
    </div>              
         <!-- /. ROW  -->
    <hr />

    <div class="row">
    <div class="col-md-4 col-sm-3 col-xs-6">           
     <div class="panel panel-back noti-box">
        <span class="icon-box bg-color-red set-icon">
            <i class="fa fa-book"></i>
        </span>
        <div class="text-box" >
            <?php
                $sql = $koneksi ->query("select count(*) from buku");
                $rowbuku = mysqli_fetch_row($sql); 
                $hasilbuku = $rowbuku[0];
            ?>
            
            <p class="main-text"><?php echo "$hasilbuku"; ?> Buku</p>
            <p class="text-muted">Tersedia</p>
        </div>
    </div>
</div>

<div class="col-md-4 col-sm-3 col-xs-6">           
<div class="panel panel-back noti-box">
    <span class="icon-box bg-color-green set-icon">
        <i class="fa fa-users"></i>
    </span>
    <div class="text-box" >
         <?php
                $sql = $koneksi ->query("select count(*) from anggota");
                $rowanggota = mysqli_fetch_row($sql); 
                $hasilanggota = $rowanggota[0];
            ?>
        <p class="main-text"><?php echo "$hasilanggota"; ?> Orang</p>
        <p class="text-muted">Anggota</p>
    </div>
 </div>
 </div>

<div class="col-md-4 col-sm-6 col-xs-6">           
<div class="panel panel-back noti-box">
    <span class="icon-box bg-color-blue set-icon">
        <i class="fa fa-user"></i>
    </span>
    <div class="text-box" >
        <?php
                $sql = $koneksi ->query("select count(*) from petugas");
                $rowpertugas = mysqli_fetch_row($sql); 
                $hasilpetugas = $rowpertugas[0];
            ?>
        <p class="main-text"><?php echo "$hasilpetugas"; ?> Orang</p>
        <p class="text-muted">Petugas</p>
    </div>
 </div>
 </div>

 <div class="col-md-4 col-sm-6 col-xs-6">           
<div class="panel panel-back noti-box">
    <span class="icon-box bg-color-blue set-icon">
        <i class="fa fa-history"></i>
    </span>
    <div class="text-box" >
        <?php
                $sql = $koneksi ->query("select count(*) from peminjaman");
                $rowpeminjaman = mysqli_fetch_row($sql); 
                $hasilpeminjaman = $rowpeminjaman[0];
            ?>
        <p class="main-text"><?php echo "$hasilpeminjaman"; ?> Orang</p>
        <p class="text-muted">Peminjam Buku</p>
    </div>
 </div>
 </div>

  <div class="col-md-4 col-sm-6 col-xs-6">           
<div class="panel panel-back noti-box">
    <span class="icon-box bg-color-blue set-icon">
        <i class="fa fa-retweet"></i>
    </span>
    <div class="text-box" >
        <?php
                $sql = $koneksi ->query("select count(*) from pengembalian");
                $rowpengembalian = mysqli_fetch_row($sql); 
                $hasilpengembalian = $rowpengembalian[0];
            ?>
        <p class="main-text"><?php echo "$hasilpengembalian"; ?> Transaksi</p>
        <p class="text-muted">Pengembalian Buku</p>
    </div>
 </div>
 </div>