<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                    	<div class="panel panel-primary">
                        <div class="panel-heading">
                             Tambah Data Pengembalian
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive"><label> Cari tahu No Peminjaman buku yang akan dikembalikan </label>
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No Anggota</th>
                                            <th>NIM</th>
                                            <th>Nama Anggota</th>
                                            <th>Kode Buku</th>
                                            <th>Judul </th> 
                                            <th> <stron> No Peminjaman </stron></th>
                                            <th> Tanggal Peminjaman</th> 
                                            <th> Tanggal Pengembalian</th> 
                                        </tr>
                                    </thead>
                                    <tbody> 
                                    	<?php 
                                    		$sql = $koneksi ->query("select * from peminjaman inner join buku using(kode_buku) inner join anggota using(no_anggota)"); 
                                    		while ($data=$sql -> fetch_assoc()) { 
                                    	?>
                                    	<tr>
                                    		<td><?php echo $data['no_anggota']; ?></td>
                                            <td><?php echo $data['nim']; ?></td>
                                    		<td><?php echo $data['nama_anggota'];?></td>
                                            <td><?php echo $data['kode_buku'];?></td>
                                    		<td><?php echo $data['judul'];?></td>
                                            <td><strong><?php echo $data['no_peminjaman'];?></strong></td>
                                    		<td><?php echo $data['tgl_peminjaman'];?></td>  
                                            <td><?php echo $data['tgl_pengembalian'];?></td>  
                                    	</tr>

                                    	<?php  } ?>
                                    </tbody>
                                </table>
                              </div> <br>
                             <form method="POST" action="index.php?page=pengembalian&aksi=prosestambah"> 
                                 <div class="form-group">
                                    <label> No Peminjaman </label>
                                        <select name="nopeminjaman" required="yes" class="form-control" required="yes">
                                            <option value=""> Pilih No Peminjaman </option>
                                                <?php
                                                    $tampil=mysqli_query($koneksi,"Select no_peminjaman from peminjaman");
                                                    while ($r=mysqli_fetch_assoc($tampil)){   
                                                    echo'<option value="'.$r[no_peminjaman].'" >'.$r[no_peminjaman].'</option>';
                                                    }
                                                ?> 
                                        </select> 
                                </div>
                                <div class="form-group">
                                    <label> Tanggal Pengembalian </label> <br>
                                    <input type="date" name="tgl_dikembalikan" required="yes">  
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary"> Cek Data </button>
                                </div>
                            </form>   
                     </div>
                </div>
          </div>
           




 	</div>
</div>    